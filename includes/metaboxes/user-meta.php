<?php
add_action('show_user_profile', 'irtt_user_profile_metahtml');
add_action('edit_user_profile', 'irtt_user_profile_metahtml');

function irtt_user_profile_metahtml($user) {
    $member_id = get_user_meta($user->ID,'user_member',true);
    ?>

    <table class="form-table">
        <tbody>
            <tr>
                <th><label><?php _e('انتخاب از میان هیئت علمی', 'irtt') ?></label></th>
                <td>
                    <select style="min-width: 350px;" name="user_member" >
                        <option value=""><?php _e('انتخاب کنید', 'irtt'); ?></option>
                        <?php 
                            $member_args = array(
                                'post_type' => 'member',
                                'posts_per_page' => -1
                            );
                            $members = get_posts($member_args);
                            
                            foreach ($members as $member) {
                                $selected = ($member->ID == $member_id)? 'selected=""' : '';
                                echo '<option ' . $selected . ' value="' . $member->ID . '">' . $member->post_title . '</option>';
                            }
                        ?>
                    </select>
                </td>
            </tr>
        </tbody>
    </table>
    <?php
}

add_action('personal_options_update', 'irtt_user_profile_metasave');
add_action('edit_user_profile_update', 'irtt_user_profile_metasave');

function irtt_user_profile_metasave($user_id) {
    update_user_meta($user_id, 'user_member', $_POST['user_member']);
}
