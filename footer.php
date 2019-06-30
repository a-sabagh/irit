<div class="container top-border clear"></div>
<footer class="container" id="footer">
    <div class="row">
        <?php
        if (is_active_sidebar("footer_widg")):
            dynamic_sidebar("footer_widg");
        endif;
        ?>
        <section class="col-md-3 footer-widg">
            <img src="<?php echo trailingslashit(IRTT_FRONT); ?>images/cafebazaar_logo_download.png" alt="<?php _e('دانلود نسخه موبایل','irtt'); ?>" class="img-responsive footer-logo">
            <ul class="socials">
                <li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a class="facebook" href="https://www.facebook.com/irtt2/"><i class="fa fa-facebook"></i></a></li>
                <li><a class="instagram" href="https://www.instagram.com/irtt.ir/"><i class="fa fa-instagram"></i></a></li>
                <li><a class="twitter" href="https://twitter.com/irthinktank"><i class="fa fa-twitter"></i></a></li>
                <li><a class="rss" href="http://www.irthink.com/feed"><i class="fa fa-rss"></i></a></li>
                <li><a class="linkedin" href="https://www.linkedin.com/in/irthink"><i class="fa fa-linkedin"></i></a></li>
                <li><a class="telegram" href="https://t.me/IRTTir"><i class="fa fa-paper-plane"></i></a></li>
                <li><a class="youtube" href="https://www.youtube.com/channel/UCeCt9ULSQyGHxeXh13ZAg2g"><i class="fa fa-youtube"></i></a></li>
                <li><a class="aparat" href="https://www.aparat.com/irtt.ir"></a></li>
            </ul>
        </section>
    </div>
    <div class="copyright-wrapper">
        <p class="copyright">International Relations Think Tank(www.irthink.com) All Right Reserved 2004-<?php echo date('Y'); ?></p>
    </div>
    <!--.copright-wrapper-->

</footer>
<!--#footer-->
<?php wp_footer(); ?>

</body>

</html>