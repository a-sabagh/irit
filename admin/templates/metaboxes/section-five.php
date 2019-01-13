<?php $home_template = get_query_var('irtt_home_template'); ?>
<tr>

    <td colspan="2">
        <p>
            <span><?php _e('بنر های عمودی واقع در میانه صفحه کنار تب محصولات (۴ عدد زیر هم)', 'irtt'); ?></span>
            <button class="modal-button button" data-modal="section-five-banners"><?php _e('ویرایش', 'irtt'); ?></button>
        </p>
        <!-- The Modal -->
        <div id="section-five-banners" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <span class="modal-close">&times;</span>
                    <h2><?php _e('بنر های میانی', 'irtt'); ?></h2>
                </div>
                <div class="modal-body">
                    <div class="splite-columns">
                        <div class="splite-columns-item">
                            <p><?php _e('بنر اول از بالا','irtt') ?></p>
                            <div class="rngwp-btn-wrapper">
                                <input type="hidden" class="rng-link-banner2" name="irtt_home_template[b5][1][src]" value="<?php echo $home_template['b5'][1]['src']; ?>">
                                <button class="rng-button-banner2 wp-core-ui button rng-btn-select"><?php _e('افزودن فایل', 'irtt') ?></button>
                                <button class="wp-core-ui button rng-btn-reset2" <?php echo (empty($home_template['b5'][1]['src'])) ? "disabled" : ""; ?>><?php _e('پاک کردن فایل', 'irtt') ?></button>
                            </div>
                            <input style="width: 100%" type="text" name="irtt_home_template[b5][1][link]" value="<?php echo $home_template['b5'][1]['link']; ?>" >
                        </div>
                        <div class="splite-columns-item">
                            <p><?php _e('بنر دوم از بالا','irtt') ?></p>
                            <div class="rngwp-btn-wrapper">
                                <input type="hidden" class="rng-link-banner2" name="irtt_home_template[b5][2][src]" value="<?php echo $home_template['b5'][2]['src']; ?>">
                                <button class="rng-button-banner2 wp-core-ui button rng-btn-select"><?php _e('افزودن فایل', 'irtt') ?></button>
                                <button class="wp-core-ui button rng-btn-reset2" <?php echo (empty($home_template['b5'][2]['src'])) ? "disabled" : ""; ?>><?php _e('پاک کردن فایل', 'irtt') ?></button>
                            </div>
                            <input style="width: 100%" type="text" name="irtt_home_template[b5][2][link]" value="<?php echo $home_template['b5'][2]['link']; ?>" >
                        </div>
                        <div class="splite-columns-item">
                            <p><?php _e('بنر سوم از بالا','irtt') ?></p>
                            <div class="rngwp-btn-wrapper">
                                <input type="hidden" class="rng-link-banner2" name="irtt_home_template[b5][3][src]" value="<?php echo $home_template['b5'][3]['src']; ?>">
                                <button class="rng-button-banner2 wp-core-ui button rng-btn-select"><?php _e('افزودن فایل', 'irtt') ?></button>
                                <button class="wp-core-ui button rng-btn-reset2" <?php echo (empty($home_template['b5'][3]['src'])) ? "disabled" : ""; ?>><?php _e('پاک کردن فایل', 'irtt') ?></button>
                            </div>
                            <input style="width: 100%" type="text" name="irtt_home_template[b5][3][link]" value="<?php echo $home_template['b5'][3]['link']; ?>" >
                        </div>
                        <div class="splite-columns-item">
                            <p><?php _e('بنر چهارم از بالا','irtt') ?></p>
                            <div class="rngwp-btn-wrapper">
                                <input type="hidden" class="rng-link-banner2" name="irtt_home_template[b5][4][src]" value="<?php echo $home_template['b5'][4]['src']; ?>">
                                <button class="rng-button-banner2 wp-core-ui button rng-btn-select"><?php _e('افزودن فایل', 'irtt') ?></button>
                                <button class="wp-core-ui button rng-btn-reset2" <?php echo (empty($home_template['b5'][4]['src'])) ? "disabled" : ""; ?>><?php _e('پاک کردن فایل', 'irtt') ?></button>
                            </div>
                            <input style="width: 100%" type="text" name="irtt_home_template[b5][4][link]" value="<?php echo $home_template['b5'][4]['link']; ?>" >
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </td>

</tr>