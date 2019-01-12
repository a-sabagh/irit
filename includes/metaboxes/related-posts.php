<?php

function rng_related_posts_metabox_input($post) {
    if (class_exists('WooCommerce')) {
        wp_enqueue_script('select2');
        wp_enqueue_style('select2-style', WC()->plugin_url() . '/assets/css/select2.css');
    } else {
        echo 'پلاگین ووکامرس فعال نیست';
    }
    $data = array(
        "url" => admin_url("admin-ajax.php"),
        "current" => $post->ID,
        "author" => $post->post_author
    );
    wp_localize_script("admin-script", RELATED, $data);
    wp_nonce_field(basename(__FILE__), 'rng_nonce_related_posts');

    $relate_post_ids = get_post_meta($post->ID, "rng_related_posts", true);
    ?>
    <select style="width:100%" multiple="" name="rng_related_posts[]" class="rng-related-posts">
        <?php
        if (!empty($relate_post_ids)) {
            $related_posts = get_posts(array('post_type' => 'post', 'post__in' => $relate_post_ids));
            foreach ($related_posts as $related_post) {
                echo '<option selected="" value="' . $related_post->ID . '">' . $related_post->post_title . '</option>';
            }
        }
        ?>
    </select>
    <?php
}

function rng_related_posts_metabox_save($post_id) {
    $is_autosave = wp_is_post_autosave($post_id);
    $is_revision = wp_is_post_revision($post_id);
    $is_valid_nonce = (isset($_POST['rng_nonce_related_posts']) && wp_verify_nonce($_POST['rng_nonce_related_posts'], basename(__FILE__))) ? TRUE : FALSE;
    if ($is_autosave || $is_revision || !$is_valid_nonce) {
        return;
    } else {
        update_post_meta($post_id, "rng_related_posts", $_POST['rng_related_posts']);
    }
}

add_action('save_post', 'rng_related_posts_metabox_save');

function rng_related_posts_metabox_init() {
    add_meta_box("rng-related-posts", "پست های مرتبط", "rng_related_posts_metabox_input", array('post'), "side", "default");
}

add_action('add_meta_boxes', 'rng_related_posts_metabox_init');
