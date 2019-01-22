<?php $home_template = get_query_var('irtt_home_template'); ?>
<tr>

    <td colspan="2">
        <p>
            <span><?php _e('بنر های میانی برگه . بالای ویدئو (چهار عدد)', 'irtt'); ?></span>
            <button class="modal-button button" data-modal="section-three-banners"><?php _e('ویرایش', 'irtt'); ?></button>
        </p>
        <!-- The Modal -->
        <div id="section-three-banners" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <span class="modal-close">&times;</span>
                    <h2><?php _e('بنر های میانی', 'irtt'); ?></h2>
                </div>
                <div class="modal-body">
                    <div class="splite-columns">
                        <div class="splite-columns-item">
                            <p><?php _e('بنر اول','irtt') ?></p>
                            <div class="rngwp-btn-wrapper">
                                <input type="hidden" class="rng-link-banner2" name="irtt_home_template[b3][1][src]" value="<?php echo $home_template['b3'][1]['src']; ?>">
                                <button class="rng-button-banner2 wp-core-ui button rng-btn-select"><?php _e('افزودن فایل', 'irtt') ?></button>
                                <button class="wp-core-ui button rng-btn-reset2" <?php echo (empty($home_template['b3'][1]['src'])) ? "disabled" : ""; ?>><?php _e('پاک کردن فایل', 'irtt') ?></button>
                            </div>
                            <input style="width: 100%" type="text" name="irtt_home_template[b3][1][link]" value="<?php echo $home_template['b3'][1]['link']; ?>" >
                        </div>
                        <div class="splite-columns-item">
                            <p><?php _e('بنر دوم','irtt') ?></p>
                            <div class="rngwp-btn-wrapper">
                                <input type="hidden" class="rng-link-banner2" name="irtt_home_template[b3][2][src]" value="<?php echo $home_template['b3'][2]['src']; ?>">
                                <button class="rng-button-banner2 wp-core-ui button rng-btn-select"><?php _e('افزودن فایل', 'irtt') ?></button>
                                <button class="wp-core-ui button rng-btn-reset2" <?php echo (empty($home_template['b3'][2]['src'])) ? "disabled" : ""; ?>><?php _e('پاک کردن فایل', 'irtt') ?></button>
                            </div>
                            <input style="width: 100%" type="text" name="irtt_home_template[b3][2][link]" value="<?php echo $home_template['b3'][2]['link']; ?>" >
                        </div>
                        <div class="splite-columns-item">
                            <p><?php _e('بنر سوم','irtt') ?></p>
                            <div class="rngwp-btn-wrapper">
                                <input type="hidden" class="rng-link-banner2" name="irtt_home_template[b3][3][src]" value="<?php echo $home_template['b3'][3]['src']; ?>">
                                <button class="rng-button-banner2 wp-core-ui button rng-btn-select"><?php _e('افزودن فایل', 'irtt') ?></button>
                                <button class="wp-core-ui button rng-btn-reset2" <?php echo (empty($home_template['b3'][3]['src'])) ? "disabled" : ""; ?>><?php _e('پاک کردن فایل', 'irtt') ?></button>
                            </div>
                            <input style="width: 100%" type="text" name="irtt_home_template[b3][3][link]" value="<?php echo $home_template['b3'][3]['link']; ?>" >
                        </div>
                        <div class="splite-columns-item">
                            <p><?php _e('بنر چهارم','irtt') ?></p>
                            <div class="rngwp-btn-wrapper">
                                <input type="hidden" class="rng-link-banner2" name="irtt_home_template[b3][4][src]" value="<?php echo $home_template['b3'][4]['src']; ?>">
                                <button class="rng-button-banner2 wp-core-ui button rng-btn-select"><?php _e('افزودن فایل', 'irtt') ?></button>
                                <button class="wp-core-ui button rng-btn-reset2" <?php echo (empty($home_template['b3'][4]['src'])) ? "disabled" : ""; ?>><?php _e('پاک کردن فایل', 'irtt') ?></button>
                            </div>
                            <input style="width: 100%" type="text" name="irtt_home_template[b3][4][link]" value="<?php echo $home_template['b3'][4]['link']; ?>" >
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </td>

</tr>