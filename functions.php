<?php

// Register main menu
register_nav_menu('main_menu', 'Main Menu');

// Register custom images sizes
add_theme_support('post-thumbnails');
add_image_size('banner', 940, 270, true);

// Force upscaling of images
add_filter(
    'image_resize_dimensions',
    function ($default, $orig_w, $orig_h, $new_w, $new_h, $crop) {
        if (!$crop) {
            return;
        }

        $aspect_ratio = $orig_w / $orig_h;
        $size_ratio = max($new_w / $orig_w, $new_h / $orig_h);

        $crop_w = round($new_w / $size_ratio);
        $crop_h = round($new_h / $size_ratio);

        $s_x = floor(($orig_w - $crop_w) / 2);
        $s_y = floor(($orig_h - $crop_h) / 2);

        return [ 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h ];
    },
    10,
    6
);

// Set content width
if (!isset($content_width)) {
    $content_width = 590;
}

// Setup sub menu
add_filter('wp_nav_menu_objects', function ($sorted_menu_items) {
    foreach ($sorted_menu_items as $menu_item) {
        if (in_array('current_page_ancestor', $menu_item->classes, true) and (int) $menu_item->menu_item_parent === 0) {
            $GLOBALS['menu_item_id'] = $menu_item->ID;
            break;
        }
        if (in_array('current-menu-item', $menu_item->classes, true)) {
            $GLOBALS['menu_item_id'] = $menu_item->ID;
            break;
        }
    }

    return $sorted_menu_items;

});

// Generate sub menu
function get_sub_menu()
{
    global $post;
    global $menu_item_id;

    $menu_items = [];

    foreach (wp_get_nav_menu_items('Main Menu') as $menu_item) {
        if ((string) $menu_item->menu_item_parent === (string) $menu_item_id) {
            $menu_items[] = [
                'url' => $menu_item->url,
                'title' => $menu_item->title,
                'selected' => (string) $menu_item->object_id === (string) $post->ID,
            ];
        }
    }

    if (count($menu_items) === 1) {
        return '';
    }

    return '<ul class="sub_menu">'.array_reduce($menu_items, function ($html, $item) {
        $html .= $item['selected'] ? '<li class="selected">' : '<li>';
        $html .= '<a href="'.$item['url'].'">'.$item['title'].'</a>';
        $html .= '</li>';

        return $html;
    }).'</ul>';
}
