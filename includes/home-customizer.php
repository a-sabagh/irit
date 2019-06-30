<?php

function irtt_customizer_settings($wp_customize) {
    require_once trailingslashit(__DIR__) . 'customizes/Irtt_Customize_Products_Control.php';
    require_once trailingslashit(__DIR__) . 'customizes/Irtt_Customize_Posts_Control.php';
    /* papular product setting */ 
    $wp_customize->add_setting('irtt_papular_product');
    $srvices_banner_control = new Irtt_Customize_Products_Control(
        $wp_customize,
        'irtt_papular_product',
        array(
            'label' => __('محصولات منتخب', 'irtt'),
            'description' => esc_html__('تعداد 3 محصول را انتخاب کنید', 'irtt'),
            'section' => 'static_front_page',
            'settings' => 'irtt_papular_product',
        )
    );
    
    $wp_customize->add_control($srvices_banner_control);
    /* services-banner setting */ 
    $wp_customize->add_setting('irtt_services_banner');
    $srvices_banner_control = new WP_Customize_Image_Control(
        $wp_customize,
        'irtt_services_banner',
        array(
            'label' => __('بنر خدمات اندیشکده', 'irtt'),
            'description' => esc_html__('یک بنر به اندازه مربع حداکثر حجم 100 کیلوبایت', 'irtt'),
            'section' => 'static_front_page',
            'settings' => 'irtt_services_banner',
        )
    );
    $wp_customize->add_control($srvices_banner_control);
    /* selected post */ 
    $wp_customize->add_setting('irtt_selected_post');
    $selected_post = new Irtt_Customize_Posts_Control(
        $wp_customize,
        'irtt_selected_post',
        array(
            'label' => __('مقاله منتخب', 'irtt'),
            'description' => esc_html__('یک مقاله را به عنوان مقاله منتخب صفحه اصلی انتخاب کنید', 'irtt'),
            'section' => 'static_front_page',
            'settings' => 'irtt_selected_post',
        ),
        false
    );
    $wp_customize->add_control($selected_post);
    /* selected news */
    $wp_customize->add_setting('irtt_selected_news');
    $selected_post = new Irtt_Customize_Posts_Control(
        $wp_customize,
        'irtt_selected_news',
        array(
            'label' => __('مقالات منتخب', 'irtt'),
            'description' => esc_html__('4 مقاله به عنوان منتخب انتخاب کنید.', 'irtt'),
            'section' => 'static_front_page',
            'settings' => 'irtt_selected_news',
        )
    );
    $wp_customize->add_control($selected_post);
}

add_action('customize_register', 'irtt_customizer_settings');




