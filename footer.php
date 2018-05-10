            </div>
            <div class="sidebar">
                <?php if (get_sub_menu()): ?>
                    <div class="sub_menu">
                        <?=get_sub_menu()?>
                    </div>
                <?php endif ?>
                <?php if (is_front_page()): ?>
                    <div class="verse">
                        <img src="<?php bloginfo('template_url') ?>/img/john_3_16.png" width="293" height="132" alt="John 3:16">
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="center">
            <div class="copyright">
                <p>&copy; <?php bloginfo('blogname')?>, all rights reserved.</p>
                <p><a href="/privacy-policy">Privacy Policy</a> | Website by <a href="http://www.adverdea.com/">Adverdea</a> | Powered by <a href="http://churchsocialapp.com/" title="Church Management Software">Church Social</a></p>
            </div>
            <div class="address">
                <strong>Ancaster Canadian Reformed Church</strong><br>
                575 Shaver Road, Ancaster Ontario [<a href="http://maps.google.ca/maps?q=575+Shaver+Rd,+Hamilton,+ON+L9G+3K9&hl=en&sll=43.17362,-80.143545&sspn=0.218581,0.528374&hnear=575+Shaver+Rd,+Hamilton,+Hamilton+Division,+Ontario+L9G+3K9&t=m&z=17">map</a>]<br>
                905-304-1114<br>
            </div>
        </div>
    </div>
</div>

<script src="<?php bloginfo('template_url') ?>/js/all.js?v=<?=wp_get_theme()->get('Version')?>"></script>

<?php wp_footer() ?>

</body>
</html>
