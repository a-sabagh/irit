<?php

if (!function_exists("irtt_setup")) {

    function irtt_setup() {
        add_theme_support("title-tag");
        add_theme_support("post-thumbnails");
        add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));

        add_theme_support('custom-header');
        add_theme_support("post-formats", array("video"));
        add_theme_support("menus");

        add_image_size("thumb1", 240, 230);
        add_image_size("thumb2", 240, 230);
        add_image_size("thumb3", 240, 230);
        add_image_size("thumb4", 240, 230);
    }

}
if (!function_exists("irtt_load_text_domain")) {

    function rudy_load_text_domain() {
        load_theme_textdomain("irtt", get_template_directory() . "/languages");
    }

}
add_action("init", "irtt_load_text_domain");
add_action("after_setup_theme", "irtt_setup");
