<?php

function rng_home_template_metabox_input($post) {
    wp_nonce_field(basename(__FILE__), 'rng_nonce_home_template');
    set_query_var('irtt_home_template', get_post_meta($post->ID, "irtt_home_template", true));
    if (class_exists('WooCommerce')) {
        wp_enqueue_script('select2');
        wp_enqueue_style('select2-style', WC()->plugin_url() . '/assets/css/select2.css');
    } else {
        echo 'پلاگین ووکامرس فعال نیست';
    }
    ?>
    <table class="irtt-home-template">
        <tbody>
            <?php
            wp_localize_script("admin-script", ADMIN_AJAX, array('url' => admin_url("admin-ajax.php")));
            get_template_part('admin/templates/metaboxes/section', 'one');
            get_template_part('admin/templates/metaboxes/section', 'tow');
            get_template_part('admin/templates/metaboxes/section', 'three');
            get_template_part('admin/templates/metaboxes/section', 'four');
            get_template_part('admin/templates/metaboxes/section', 'five');
            get_template_part('admin/templates/metaboxes/section', 'six');
            get_template_part('admin/templates/metaboxes/section', 'seven');
            get_template_part('admin/templates/metaboxes/section', 'eight');
            ?>
        </tbody>
    </table>
    <?php
}

function rng_home_template_metabox_save($post_id) {
    $page_id = get_option('page_on_front');
    $not_home_template = ($post_id == $page_id) ? FALSE : TRUE;
    $is_autosave = wp_is_post_autosave($post_id);
    $is_revision = wp_is_post_revision($post_id);
    $is_valid_nonce = (isset($_POST['rng_nonce_home_template']) && wp_verify_nonce($_POST['rng_nonce_home_template'], basename(__FILE__))) ? TRUE : FALSE;
    if ($is_autosave || $is_revision || !$is_valid_nonce || $not_home_template) {
        return;
    } else {
        update_post_meta($post_id, "irtt_home_template", $_POST['irtt_home_template']);
    }
}

add_action('save_post', 'rng_home_template_metabox_save');

function rng_home_template_metabox_init() {
    $page_id = get_option('page_on_front');
    global $post;
    if ($post->ID == $page_id)
        add_meta_box("irtt-home-template", __('محتویات اصلی برگه', 'irtt'), "rng_home_template_metabox_input", "page", "normal", "high");
}

add_action('add_meta_boxes', 'rng_home_template_metabox_init');

/**
 * Remove the content editor from pages as all content is handled through Panels
 */
function remove_content_editor() {
    if ((int) get_option('page_on_front') == get_the_ID()) {
        remove_post_type_support('page', 'editor');
    }
}

add_action('admin_head', 'remove_content_editor');
