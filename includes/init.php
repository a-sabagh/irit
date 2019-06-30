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
        add_image_size("slider", 710, 390, true);
        add_image_size("thumbh", 110, 150);
        add_image_size("thumbw", 400, 220);
        add_image_size("thumbw2", 195, 105);
    }

}

add_action("after_setup_theme", "irtt_setup");

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
    /*    register_sidebar(array(
      'name' => __('سایدبار فروشگاه', 'irtt'),
      'id' => 'shop_side',
      'before_widget' => '<section class="widget">',
      'before_title' => '<div class="widget-title"><h3>',
      'after_title' => '</h3></div><div class="widget-content">',
      'after_widget' => '</div></section>',
      )); */
    register_sidebar(array(
        'name' => __('سایدبار فوتر', 'irtt'),
        'id' => 'footer_widg',
        'before_widget' => '<section class="footer-widg col-md-3">',
        'before_title' => '<div class="widg-title"><h3>',
        'after_title' => '</h3></div>',
        'after_widget' => '</section>',
    ));
}

add_action("widgets_init", "irtt_widgets_init");

$menu_position = array(
    "main" => __('منوی اصلی', 'irtt'),
    "top" => __("منوی بالا", "irtt")
);
register_nav_menus($menu_position);

/**
 * adding single software endpoints
 */
function rngwc_add_endpoints() {
    add_rewrite_endpoint('research', EP_PERMALINK);
    add_rewrite_endpoint('intro', EP_PERMALINK);
}

/**
 * single software tab rewrite endpoint
 * @param type $vars
 * @return boolean
 */
function rngwc_filter_request($vars) {
    if (isset($vars['research']))
        $vars['research'] = TRUE;
    if (isset($vars['intro']))
        $vars['intro'] = TRUE;
    return $vars;
}

add_action('init', 'rngwc_add_endpoints');
add_filter('request', 'rngwc_filter_request');

function irtt_order_category_loop($query) {
    $order = (isset($_GET['order_type'])) ? $_GET['order_type'] : null;
    if ($query->is_archive() && $query->is_main_query() && isset($order)) {
        switch ($order):
            case 'newest':
                $query->set('order_by', 'ID');
                $query->set('order', 'DESC');
                break;
            case 'oldest':
                $query->set('order_by', 'ID');
                $query->set('order', 'ASC');
                break;
            case 'papular':
                $query->set('meta_key', 'ja_postviews');
                $query->set('orderby', 'meta_value_num ID');
                $query->set('order', 'DESC');
                break;
        endswitch;
    }
}

add_action('pre_get_posts', 'irtt_order_category_loop');

/**
 * reference list shortcode
 * @param type $atts
 * @param type $content
 * @return type
 */
function irtt_shortcode_reference_list($atts, $content) {
    ob_start();
    echo '<div class="reference-list">'
    . '<h3>'
    . __('منابع', 'irtt')
    . '<i class="fa fa-book"></i>'
    . '</h3>'
    . $content
    . '</div>';
    $outpout = ob_get_clean();
    return $outpout;
}

add_shortcode('r', 'irtt_shortcode_reference_list');
