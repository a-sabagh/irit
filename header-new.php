<!DOCTYPE html>
<html <?php echo language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <header id="header">
            <section class="top-header">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <ul class="header-top-social text-center text-lg-right">
                                <li>
                                    <a href="https://www.facebook.com/irtt2/" title="<?php _e("فیس بوک", "irtt"); ?>">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/irtt.ir/" title="<?php _e("اینستاگرام", "irtt"); ?>">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="rss" href="https://www.irthink.com/feed" title="<?php _e("فید", "irtt"); ?>">
                                        <i class="fa fa-rss"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://t.me/IRTTir" title="<?php _e("تلگرام", "irtt"); ?>">
                                        <i class="fa fa-telegram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/in/irthink" title="<?php _e("لینکدین", "irtt"); ?>">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/irthinktank" title="<?php _e("توئیتر", "irtt"); ?>">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://t.me/IRTTir" title="<?php _e("یوتیوب", "irtt"); ?>">
                                        <i class="fa fa-youtube	"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-lg d-flex justify-content-xl-end justify-content-center">

                            <?php
                            $header_menu = array(
                                "theme_location" => "top",
                                "menu_class" => "header-top-menu",
                                "menu_id" => "top-header-menu",
                                "depth" => 1,
                            );
                            wp_nav_menu($header_menu);
                            ?>
                        </div>
                    </div><!--.row-->
                </div><!--.container-->
            </section><!--.top-header-->
            <section class="bottom-header">
                <div class="container">
                    <div class="d-flex flex-nowrap justify-content-xl-start justify-content-between align-items-center">
                        <a href="<?php echo home_url(); ?>" title="<?php bloginfo("blogname"); ?>" >
                            <img class="img-responsive logo" src="<?php echo trailingslashit(get_template_directory_uri()); ?>/images/logo.png" alt="<?php bloginfo("description"); ?>">
                        </a>
                        <nav class="navigation-wrapper">
                            <a href="#" class="menu-toggler" title="<?php esc_html_e("منوی موبایل", "irtt"); ?>"><span>منوی اصلی</span><i class="fa fa-bars"></i></a>
                                <?php
                                $header_menu = array(
                                    "theme_location" => "main",
                                    "menu_id" => "main-menu",
                                    "container" => FALSE,
                                    "depth" => 5,
                                    'after' => '<span class="menu-plus"></span>',
                                );
                                wp_nav_menu($header_menu);
                                ?>
                        </nav>
                        <!--.navigation-wrapper-->
                    </div>
                </div>
            </section><!--.bottom-header-->
        </header><!--#header-->