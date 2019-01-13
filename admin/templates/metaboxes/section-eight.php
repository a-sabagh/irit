<?php $home_template = get_query_var('irtt_home_template'); ?>
<tr>

    <td colspan="2">
        <p>
            <span><?php _e('بنر های انتهای صفحه اصلی زیر خبر نامه (۲ عدد)', 'irtt'); ?></span>
            <button class="modal-button button" data-modal="section-eight-banners"><?php _e('ویرایش', 'irtt'); ?></button>
        </p>
        <!-- The Modal -->
        <div id="section-eight-banners" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <span class="modal-close">&times;</span>
                    <h2><?php _e('بنر های میانی', 'irtt'); ?></h2>
                </div>
                <div class="modal-body">
                    <div class="splite-columns">
                        <div class="splite-columns-item">
                            <p><?php _e('بنر سمت راست', 'irtt') ?></p>
                            <div class="rngwp-btn-wrapper">
                                <input type="hidden" class="rng-link-banner2" name="irtt_home_template[b8][1][src]" value="<?php echo $home_template['b8'][1]['src']; ?>">
                                <button class="rng-button-banner2 wp-core-ui button rng-btn-select"><?php _e('افزودن فایل', 'irtt') ?></button>
                                <button class="wp-core-ui button rng-btn-reset2" <?php echo (empty($home_template['b8'][1]['src'])) ? "disabled" : ""; ?>><?php _e('پاک کردن فایل', 'irtt') ?></button>
                            </div>
                            <input style="width: 100%" type="text" name="irtt_home_template[b8][1][link]" value="<?php echo $home_template['b8'][1]['link']; ?>" >
                        </div>
                        <div class="splite-columns-item">
                            <p><?php _e('بنر سمت چپ', 'irtt') ?></p>
                            <div class="rngwp-btn-wrapper">
                                <input type="hidden" class="rng-link-banner2" name="irtt_home_template[b8][2][src]" value="<?php echo $home_template['b8'][2]['src']; ?>">
                                <button class="rng-button-banner2 wp-core-ui button rng-btn-select"><?php _e('افزودن فایل', 'irtt') ?></button>
                                <button class="wp-core-ui button rng-btn-reset2" <?php echo (empty($home_template['b8'][2]['src'])) ? "disabled" : ""; ?>><?php _e('پاک کردن فایل', 'irtt') ?></button>
                            </div>
                            <input style="width: 100%" type="text" name="irtt_home_template[b8][2][link]" value="<?php echo $home_template['b8'][2]['link']; ?>" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </td>
</tr>