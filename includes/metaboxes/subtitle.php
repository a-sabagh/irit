<?php

function irtt_subtitle_metabox_input($post) {
    $subtitle = get_post_meta($post->ID, "irtt_subtitle", true);
    wp_nonce_field(basename(__FILE__), 'rng_nonce_subtitle');
    ?>
    <input style="width: 100%;" type="text" name="irtt_subtitle" value="<?php echo $subtitle; ?>" >
    <?php
}

function irtt_subtitle_metabox_save($post_id) {
    $is_autosave = wp_is_post_autosave($post_id);
    $is_revision = wp_is_post_revision($post_id);
    $is_valid_nonce = (isset($_POST['rng_nonce_subtitle']) && wp_verify_nonce($_POST['rng_nonce_subtitle'], basename(__FILE__))) ? TRUE : FALSE;
    if ($is_autosave || $is_revision || !$is_valid_nonce) {
        return;
    } else {
        update_post_meta($post_id, 'irtt_subtitle', $_POST['irtt_subtitle']);
    }
}

add_action('save_post', 'irtt_subtitle_metabox_save');

function irtt_subtitle_metabox_init() {
    add_meta_box("irtt-subtitle", __('زیر عنوان', 'irtt'), "irtt_subtitle_metabox_input", array('post'), 'side', 'high');
}

add_action('add_meta_boxes', 'irtt_subtitle_metabox_init');
