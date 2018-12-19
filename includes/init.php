<?php

if (!function_exists("irtt_setup")) {

    function irtt_setup() {
        add_theme_support("title-tag");
        add_theme_support("post-thumbnails");
        add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
        add_theme_support('custom-header');
        add_theme_support("post-formats", array("video"));
        add_theme_support("menus");

        //localization
        load_theme_textdomain("irtt", get_template_directory() . "/languages");

        //add image template size
        add_image_size("thumb1", 240, 230);
        add_image_size("thumb2", 240, 230);
        add_image_size("thumb3", 240, 230);
        add_image_size("thumb4", 240, 230);
    }

}

function irtt_widgets_init() {
    register_sidebar(array(
        'name' => __('سایدبار آرشیو', 'irtt'),
        'id' => 'archive_side',
        'before_widget' => '<section class="widget">',
        'before_title' => '<div class="widget-title"><h3>',
        'after_title' => '</h3></div><div class="widget-content">',
        'after_widget' => '</div></section>',
    ));
    register_sidebar(array(
        'name' => __('سایدبار صفحه داخلی', 'irtt'),
        'id' => 'blog_inner_side',
        'before_widget' => '<section class="widget">',
        'before_title' => '<div class="widget-title"><h3>',
        'after_title' => '</h3></div><div class="widget-content">',
        'after_widget' => '</div></section>',
    ));
    register_sidebar(array(
        'name' => __('سایدبار جستجو', 'irtt'),
        'id' => 'search_side',
        'before_widget' => '<section class="widget">',
        'before_title' => '<div class="widget-title"><h3>',
        'after_title' => '</h3></div><div class="widget-content">',
        'after_widget' => '</div></section>',
    ));
    register_sidebar(array(
        'name' => __('سایدبار ۴۰۴', 'irtt'),
        'id' => 'not_found_side',
        'before_widget' => '<section class="widget">',
        'before_title' => '<div class="widget-title"><h3>',
        'after_title' => '</h3></div><div class="widget-content">',
        'after_widget' => '</div></section>',
    ));
    register_sidebar(array(
        'name' => __('سایدبار فروشگاه', 'irtt'),
        'id' => 'shop_side',
        'before_widget' => '<section class="widget">',
        'before_title' => '<div class="widget-title"><h3>',
        'after_title' => '</h3></div><div class="widget-content">',
        'after_widget' => '</div></section>',
    ));
    register_sidebar(array(
        'name' => __('سایدبار فوتر', 'irtt'),
        'id' => 'footer_widg',
        'before_widget' => '<section class="footer-widg col-md-3">',
        'before_title' => '<div class="widg-title"><h3>',
        'after_title' => '</h3></div>',
        'after_widget' => '</section>',
    ));
}

$menu_position = array("main"=>__('منوی اصلی','irtt'));
register_nav_menus($menu_position);
add_action("widgets_init", "irtt_widgets_init");
add_action("after_setup_theme", "irtt_setup");
