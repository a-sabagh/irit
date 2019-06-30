<?php

function irtt_create_member() {
    $member = array(
        'public' => true,
        'label' => __('هیئت علمی', 'irtt'),
        'description' => __('اعضای هیئت علمی', 'irtt'),
        'exclude_from_search' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'show_in_menu' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        // 'menu_icon' 			=> get_bloginfo('template_directory') . '/images/portfolio-icon.png',
        'menu_icon' => 'dashicons-admin-users',
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
        'rewrite' => array('slug' => 'members')
    );
    $slider = array(
        'public' => true,
        'label' => __('اسلایدر', 'irtt'),
        'description' => __('اسلایدر صفحه اصلی', 'irtt'),
        'exclude_from_search' => true,
        'publicly_queryable' => false,
        'show_ui' => true,
        'show_in_nav_menus' => false,
        'show_in_menu' => true,
        'show_in_admin_bar' => false,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-format-image',
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
    );
    register_post_type('slider', $slider);
    register_post_type('member', $member);
}

add_action('init', 'irtt_create_member', 0);

