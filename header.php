<!DOCTYPE html>
<html <?php echo language_attributes(); ?>>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>

    </head>

    <body>
        <div class="container">
            <header id="header">
                <div class="top-header row">
                    <div class="col-md-4 top-header-right">
                        <img src="<?php echo trailingslashit(IRTT_FRONT); ?>images/logo.jpg" alt="اندیشکده بین الملل" class="img-responsive logo">
                    </div>
                    <!--.top-header-right-->
                    <div class="col-md-8 top-header-left">
                        <ul class="col-md-4 account">
                            <li class="login">
                                <a href="#" title="">
                                    <i class="fa fa-sign-in"></i>ورود<span></span>
                                </a>
                            </li>
                            <li>
                                <a href="#" title="">
                                    <i class="fa fa fa-user-circle-o"></i>عضویت<span></span>
                                </a>
                            </li>
                        </ul>
                        <!--.account-->
                        <ul class="col-md-4 language">
                            <li class="lang"><a href="#">فارسی</a></li>
                            <li class="lang"><a href="#">عربی</a></li>
                            <li class="lang"><a href="#">English</a></li>
                        </ul>
                        <div class="col-md-4 search">
                            <form role="search" method="get" id="searchform" class="searchform" action="https://gnutec.net">
                                <input value="" name="s" id="s" placeholder="جستجو در وبسایت" type="text"><input id="searchsubmit" value="" type="submit">
                            </form>
                        </div>
                    </div>
                    <!--.top-header-right-->
                </div>
                <!--.top-header-->
                <nav class="navigation-wrapper">
                    <a href="#" class="menu-toggler" title="منو"><span>منوی اصلی</span><i class="fa fa-bars"></i></a>
                    <ul id="main-menu">
                        <li class="active"><a href="#">صفحه اصلی</a></li>
                        <li class="menu-item-has-children">
                            <a href="">دوره ها</a>
                            <span class="menu-plus"></span>
                            <ul>
                                <li><a href="#">سطح دوم</a></li>
                                <li class="menu-item-has-children">
                                    <a href="#">مهارت های ICDL</a>
                                    <span class="menu-plus"></span>
                                    <ul>
                                        <li><a href="#">مهارت دوم مایکروسافت آفیس</a></li>
                                        <li><a href="#">مهارت سوم مایکروسافت اکسل</a></li>
                                        <li><a href="#">مهارت اول آشنایی با فناوری اطلاعات</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">سطح دوم</a></li>
                                <li><a href="#">سطح دوم</a></li>
                                <li><a href="#">سطح دوم</a></li>
                            </ul>
                        </li>
                        <li><a href="#">ویدئوی آموزشی</a></li>
                        <li><a href="#">تماس با من</a></li>
                        <li><a href="#">درباره من</a></li>
                    </ul>
                </nav>
                <!--.navigation-wrapper-->
            </header>
        </div>
        <!--.container-->
        <?php wp_head(); ?>