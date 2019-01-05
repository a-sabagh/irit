<?php

function irtt_member_metabox_input($post) {
    wp_nonce_field(basename(__FILE__), 'rng_nonce_member');
    $position = get_post_meta($post->ID, "irtt_position", true);
    $memberuser = get_post_meta($post->ID, "irtt_memberuser",true);
    $skills = get_post_meta($post->ID, "irtt_skills", true);
    $website = get_post_meta($post->ID, "irtt_memsocial_website", true);
    $telegram = get_post_meta($post->ID, "irtt_memsocial_telegram",true);
    $email = get_post_meta($post->ID, "irtt_memsocial_email", true);
    $twitter = get_post_meta($post->ID, "irtt_memsocial_twitter",true); 
    $facebook = get_post_meta($post->ID, "irtt_memsocial_facebook",true);
    $contact = get_post_meta($post->ID, "irtt_memcontact",true);
    ?>
    <section class="irtt-admin-section">
        <div style="display: flex; flex-direction: row;align-items: center;justify-content: space-between;">
            <div style="width: 50%; padding-left: 10px;">
                <p><?php _e('موقعیت', 'irtt'); ?></p>
                <input type="text" name="irtt_position" value="<?php echo $position; ?>" class="input-full" >
            </div>
            <div style="width: 50%; padding-right: 10px;">
                <p><?php _e('انتخاب کاربر', 'irtt'); ?></p>
                <?php
                $users = get_users(array('role__in' => array('Editor','Author','Administrator')));
                ?>
                <select style="width: 100%;height:40px;" name="irtt_memberuser">
                    <option value="" ><?php _e('انتخاب','irtt'); ?></option>
                    <?php
                    foreach ($users as $user):
                        $selected = ($memberuser == $user->ID)? 'selected' : '';
                        echo '<option value="' . $user->ID . '" ' . $selected . ' >' . $user->display_name . '</option>';
                    endforeach;
                    ?>
                </select>
            </div>
        </div>
        <p><?php _e('مهارت ها', 'irtt'); ?></p>
        <textarea class="input-full" name="irtt_skills"><?php echo $skills; ?></textarea>

    </section>
    <section class="irtt-admin-section">
        <table class="irtt-admin-table">
            <tr>
                <td><?php _e('وب سایت', 'irtt'); ?></td>
                <td><input type="text" name="irtt_memsocial_website" value="<?php echo $website; ?>" class="input-full align-left"></td>
            </tr>
            <tr>
                <td><?php _e('تلگرام', 'irtt'); ?></td>
                <td><input type="text" name="irtt_memsocial_telegram" value="<?php echo $telegram; ?>" class="input-full align-left"></td>
            </tr>
            <tr>
                <td><?php _e('ایمیل', 'irtt'); ?></td>
                <td><input type="text" name="irtt_memsocial_email" value="<?php echo $email; ?>" class="input-full align-left"></td>
            </tr>
            <tr>
                <td><?php _e('توئیتر', 'irtt'); ?></td>
                <td><input type="text" name="irtt_memsocial_twitter" value="<?php echo $twitter; ?>" class="input-full align-left"></td>
            </tr>
            <tr>
                <td><?php _e('فیس بوک', 'irtt'); ?></td>
                <td><input type="text" name="irtt_memsocial_facebook" value="<?php echo $facebook; ?>" class="input-full align-left"></td>
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
        update_post_meta($post_id, "irtt_position", $_POST['irtt_position']);
        update_post_meta($post_id, "irtt_memberuser", $_POST['irtt_memberuser']);
        update_post_meta($post_id, "irtt_skills", $_POST['irtt_skills']);
        update_post_meta($post_id, "irtt_memsocial_website", $_POST['irtt_memsocial_website']);
        update_post_meta($post_id, "irtt_memsocial_telegram", $_POST['irtt_memsocial_telegram']);
        update_post_meta($post_id, "irtt_memsocial_email", $_POST['irtt_memsocial_email']);
        update_post_meta($post_id, "irtt_memsocial_twitter", $_POST['irtt_memsocial_twitter']);
        update_post_meta($post_id, "irtt_memsocial_facebook", $_POST['irtt_memsocial_facebook']);
        update_post_meta($post_id, "irtt_memcontact", $_POST['irtt_memcontact']);
    }
}

add_action('save_post', 'irtt_member_metabox_save');

function irtt_member_metabox_init() {
    add_meta_box('irtt-member', __('تنظیمات دیگر', 'irtt'), 'irtt_member_metabox_input', array('member'), 'normal', 'high');
}

add_action('add_meta_boxes', 'irtt_member_metabox_init');
