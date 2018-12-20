<!DOCTYPE html>
<html <?php echo language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>

    </head>

    <body <?php body_class(); ?>>
        <div class="container">
            <header id="header">
                <div class="top-header row">
                    <div class="col-md-4 top-header-right">
                        <a href="<?php echo home_url(); ?>" title="<?php bloginfo('title'); ?>">
                            <img src="<?php echo trailingslashit(IRTT_FRONT); ?>images/logo.jpg" alt="<?php bloginfo("description"); ?>" class="img-responsive logo">
                        </a>
                    </div>
                    <!--.top-header-right-->
                    <div class="col-md-8 top-header-left">
                        <ul class="col-md-4 account">

                            <?php
                            if (is_user_logged_in()) {
                                ?>
                                <li class="login">
                                    <a href="<?php echo wp_logout_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ) ?>" title="<?php _e('خروج از ناحیه کاربری','irtt') ?>">
                                        <i class="fa fa-sign-in"></i><?php _e('خروج','irtt') ?><span></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('پروفایل کاربری','irtt') ?>">
                                        <i class="fa fa fa-user-circle-o"></i><?php _e('پروفایل','irtt') ?><span></span>
                                    </a>
                                </li>
                                <?php
                            } else {
                                ?>
                                <li class="login">
                                    <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('ورود یا عضویت','irtt') ?>">
                                        <i class="fa fa-sign-in"></i><?php _e('ورود','irtt') ?><span></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo get_permalink(get_option( 'woocommerce_terms_page_id' )); ?>" title="<?php _e('شرایط و ضوابط','irtt') ?>">
                                        <i class="fa fa fa-user-circle-o"></i><?php _e('قوانین','irtt') ?><span></span>
                                    </a>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                        <!--.account-->
                        <ul class="col-md-4 language">
                            <li class="lang"><a href="#">فارسی</a></li>
                            <li class="lang"><a href="#">عربی</a></li>
                            <li class="lang"><a href="#">English</a></li>
                        </ul>
                        <div class="col-md-4 search">
                            <form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url(); ?>">
                                <input value="" name="s" id="s" placeholder="<?php _e('جستجو در وبسایت', 'irtt'); ?>" type="text"><input id="searchsubmit" value="" type="submit">
                            </form>
                        </div>
                    </div>
                    <!--.top-header-right-->
                </div>
                <!--.top-header-->
                <nav class="navigation-wrapper">
                    <a href="#" class="menu-toggler" title="منو"><span>منوی اصلی</span><i class="fa fa-bars"></i></a>
                        <?php
                        $header_menu = array(
                            "theme_location" => "main",
                            "menu_id" => "main-menu",
                            "container" => FALSE,
                            "depth" => 3,
                            'after' => '<span class="menu-plus"></span>',
                        );
                        wp_nav_menu($header_menu);
                        ?>

                </nav>
                <!--.navigation-wrapper-->
            </header>
        </div>
        <!--.container-->
        <?php wp_head(); ?>