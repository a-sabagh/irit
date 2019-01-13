<?php $home_template = get_query_var('irtt_home_template'); ?>
<tr class="section-one">
    <td>
        <p>
            <span><?php _e('پیشنهادات ویژه محصولات', 'irtt'); ?></span>
            <button class="modal-button button" data-modal="section-four-tow"><?php _e('ویرایش', 'irtt'); ?></button>
        </p>


        <!-- The Modal -->
        <div id="section-four-tow" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <span class="modal-close">&times;</span>
                    <h2><?php _e('محصولات پیشنهاد ویژه', 'irtt'); ?></h2>
                </div>
                <div class="modal-body">
                    <p><?php _e('محصولات پیشنهاد ویژه را انتخاب کنید. (حداقل ۴ محصول و حداکثر ۱۰ محصول)', 'irtt') ?></p>
                    <?php
                    $products = get_posts(array('post_type' => 'product', 'post__in' => $home_template['product_sales']));
                    ?>
                    <select multiple="" class="rng-ajax-call-products" name="irtt_home_template[product_sales][]">
                        <?php
                        foreach ($products as $product) {
                            echo '<option selected="" value="' . $product->ID . '">' . $product->post_title . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>

        </div>

    </td>
    <td>
        <p>
            <span><?php _e('ویدئو', 'irtt'); ?></span>
            <button class="modal-button button" data-modal="section-four-one"><?php _e('ویرایش', 'irtt'); ?></button>
        </p>


        <!-- The Modal -->
        <div id="section-four-one" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <span class="modal-close">&times;</span>
                    <h2><?php _e('تنظیمات ویدئو', 'irtt'); ?></h2>
                </div>
                <div class="modal-body">
                    <p><?php _e('لینک ویدئوی با فرمت ترجیحا با فرمت mp4') ?></p>
                    <input type="text" style="width:100%" name="irtt_home_template[video][src]" value="<?php echo $home_template['video']['src']; ?>" >
                    <p><?php _e('تیتر ویدئو') ?></p>
                    <input type="text" style="width:100%" name="irtt_home_template[video][title]" value="<?php echo $home_template['video']['title']; ?>" >
                    <p><?php _e('بنر ویدئو') ?></p>
                    <div class="rngwp-btn-wrapper">
                        <input type="hidden" class="rng-link-banner2" name="irtt_home_template[video][banner]" value="<?php echo $home_template['video']['banner']; ?>">
                        <button class="rng-button-banner2 wp-core-ui button rng-btn-select"><?php _e('افزودن فایل', 'irtt') ?></button>
                        <button class="wp-core-ui button rng-btn-reset2" <?php echo (empty($home_template['video']['banner'])) ? "disabled" : ""; ?>><?php _e('پاک کردن فایل', 'irtt') ?></button>
                    </div>
                </div>
            </div>

        </div>
    </td>
</tr>