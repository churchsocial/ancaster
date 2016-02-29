<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php wp_title('|', true, 'right').bloginfo('name') ?></title>
    <meta name="description" content="<?php bloginfo('description')?>">
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url') ?>/css/all.css?v=<?=wp_get_theme()->get('Version')?>" />
    <script src="<?php bloginfo('template_url') ?>/js/respond.js"></script>
    <?php wp_head() ?>
</head>

<body>

<div class="header">
    <div class="center">
        <a class="logo" href="/">
            <img src="<?php bloginfo('template_url') ?>/img/logo.png" width="249" height="94" alt="<?php bloginfo('blogname')?>">
        </a>
        <a class="login" href="https://churchsocialapp.com/login" rel="nofollow">Member Login</a>
    </div>
</div>

<div class="container">
    <div class="masthead <?php if (!has_post_thumbnail($post->ID)) echo 'no_banner'; ?>">
        <div class="cross <?php if (!has_post_thumbnail($post->ID)) echo 'no_banner'; ?>"></div>
        <?php wp_nav_menu([
            'theme_location' => 'main_menu',
            'depth' => 2,
            'menu_class' => 'menu',
            'container' => '',
        ]) ?>
        <?php if (has_post_thumbnail($post->ID)): ?>
            <div class="banner">
                <?=get_the_post_thumbnail($post->ID, 'banner') ?>
            </div>
        <?php endif ?>
    </div>
    <div class="columns">
        <div class="center">
            <div class="content">