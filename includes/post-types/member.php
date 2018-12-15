<?php

if (!function_exists('irtt_create_member')) {

    function irtt_create_member() {
        $args = array(
            'public' => true,
            'label' => __('هیئت علمی','irtt'),
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
        register_post_type('member', $args);
    }

}
add_action('init', 'irtt_create_member', 0);
