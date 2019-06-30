<?php

function irtt_slider_link_metabox_input($post) {
    wp_nonce_field(basename(__FILE__), 'irtt_nonce_slider_link');
    $slider_link = get_post_meta($post->ID, "irtt_slider_link", true);
    ?>
    <input type="text" style="width: 100%;" name="irtt_slider_link" value="<?php echo $slider_link; ?>" >    
    <?php
}

function irtt_slider_link_metabox_save($post_id) {
    $is_autosave = wp_is_post_autosave($post_id);
    $is_revision = wp_is_post_revision($post_id);
    $is_valid_nonce = (isset($_POST['irtt_nonce_slider_link']) && wp_verify_nonce($_POST['irtt_nonce_slider_link'], basename(__FILE__))) ? TRUE : FALSE;
    if ($is_autosave || $is_revision || !$is_valid_nonce) {
        return;
    } else {
        $meta_key = "irtt_slider_link";
        $meta_value = esc_url($_POST['irtt_slider_link']);
        update_post_meta($post_id, $meta_key, $meta_value);
    }
}

add_action('save_post', 'irtt_slider_link_metabox_save');

function irtt_slider_link_metabox_init() {
    add_meta_box("irtt-slider-link", esc_html__("لینک اسلاید", "irtt"), "irtt_slider_link_metabox_input", array("slider"), "normal", "high");
}

add_action('add_meta_boxes', 'irtt_slider_link_metabox_init');
