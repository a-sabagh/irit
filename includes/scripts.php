<?php

if (!function_exists("irtt_enqueue_style")) {

    function irtt_enqueue_style() {
        wp_enqueue_style('reset', trailingslashit(IRTT_FRONT) . 'assets/css/reset.css');
        wp_enqueue_style('bootstrap', trailingslashit(IRTT_FRONT) . 'assets/css/bootstrap.css');
        wp_enqueue_style('woocommerce-general-layout', trailingslashit(IRTT_FRONT) . 'assets/css/woocommerce.css');
        wp_enqueue_style('slick-style', trailingslashit(IRTT_FRONT) . 'assets/css/slick.css');
        wp_enqueue_style('font-awesome', trailingslashit(IRTT_FRONT) . 'assets/css/font-awesome.css');
        wp_enqueue_style('main-style', trailingslashit(IRTT_FRONT) . 'assets/css/main.css');

        wp_enqueue_script("slick-script", trailingslashit(IRTT_FRONT) . "assets/js/slick.js", array('jquery'), "1.8.0", true);
        wp_enqueue_script("main-script", trailingslashit(IRTT_FRONT) . "assets/js/main.js", array('jquery', 'slick-script'), "1.8.0", true);
    }

}

function irtt_admin_enqueue_scripts() {
    wp_enqueue_style('admin-style', trailingslashit(IRTT_ADMIN) . 'assets/css/main.css');
    wp_enqueue_script('admin-script', trailingslashit(IRTT_ADMIN) . 'assets/js/main.js',array('jquery'),wp_get_theme()->get( 'Version' ),true);
}

add_action('admin_enqueue_scripts', 'irtt_admin_enqueue_scripts');
add_action('wp_enqueue_scripts', 'irtt_enqueue_style');