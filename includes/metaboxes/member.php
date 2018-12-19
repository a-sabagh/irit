<?php

function irtt_member_metabox_input($post) {
    wp_nonce_field(basename(__FILE__), 'rng_nonce_member');
    ?>
    <section class="irtt-admin-section">
        <p><?php _e('موقعیت', 'irtt'); ?></p>
        <input type="text" name="irtt_position" value="" class="input-full" >
        <p><?php _e('مهارت ها', 'irtt'); ?></p>
        <textarea class="input-full" name="irtt_skills">
                        
        </textarea>
    </section>
    <section class="irtt-admin-section">
        <table class="irtt-admin-table">
            <tr>
                <td><?php _e('وب سایت', 'irtt'); ?></td>
                <td><input type="text" name="irtt_memsocial_website" value="" class="input-full align-left"></td>
            </tr>
            <tr>
                <td><?php _e('تلگرام', 'irtt'); ?></td>
                <td><input type="text" name="irtt_memsocial_telegram" value="" class="input-full align-left"></td>
            </tr>
            <tr>
                <td><?php _e('ایمیل', 'irtt'); ?></td>
                <td><input type="text" name="irtt_memsocial_email" value="" class="input-full align-left"></td>
            </tr>
            <tr>
                <td><?php _e('توئیتر', 'irtt'); ?></td>
                <td><input type="text" name="irtt_memsocial_twitter" value="" class="input-full align-left"></td>
            </tr>
            <tr>
                <td><?php _e('فیس بوک', 'irtt'); ?></td>
                <td><input type="text" name="irtt_memsocial_facebook" value="" class="input-full align-left"></td>
            </tr>
        </table>
    </section>

    <section class="irtt-admin-section">
        <p><?php _e('اطلاعات تماس', 'irtt'); ?></p>
        <?php wp_editor($contact, "irtt_memcontact"); ?>
    </section>
    <?php
}

function irtt_member_metabox_save($post_id) {
    $is_autosave = wp_is_post_autosave($post_id);
    $is_revision = wp_is_post_revision($post_id);
    $is_valid_nonce = (isset($_POST['rng_nonce_member']) && wp_verify_nonce($_POST['rng_nonce_member'], basename(__FILE__))) ? TRUE : FALSE;
    if ($is_autosave || $is_revision || !$is_valid_nonce) {
        return;
    } else {
        update_post_meta($post_id, $meta_key, $meta_value, $prev_value);
    }
}

add_action('save_post', 'irtt_member_metabox_save');

function irtt_member_metabox_init() {
    add_meta_box('irtt-member', __('تنظیمات دیگر', 'irtt'), 'irtt_member_metabox_input', array('member'), 'normal', 'high');
}

add_action('add_meta_boxes', 'irtt_member_metabox_init');
