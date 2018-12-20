<?php

/**
 * output of settings panel
 */
function irtt_settings_html() {
    get_template_part('admin/templates/settings');
}

function irtt_settings() {
    add_submenu_page(
            'themes.php', __('تنظیمات اختصاصی اندیشکده بین الملل', 'irtt'), __('تنظیمات اختصاصی', 'irtt'), 'administrator', 'irtt-settings', 'irtt_settings_html'
    );
}

function settings_section_thumbnails() {
    _e('تصاویر پیش فرض مورد استفاده برای وبسایت . اگر تصویر شاخص را برای هر یک از پست ها نگذارید از تصاویر پیش فرض استفاده می شود.', 'irtt');
}

function irtt_register_settings() {
    register_setting('irtt-settings', 'irtt_settings');
    add_settings_section('thumbnails', __('تصاویر پیش فرض', 'irtt'), 'settings_section_thumbnails', 'irtt-settings');

    add_settings_field('post-thumbnail', __('تصویر پیش فرض پست', 'irtt'), 'irtt_post_thumbnail_html', 'irtt-settings', 'thumbnails', array('id' => 'post-thumbnail', 'name' => 'post_thumbnail'));
    add_settings_field('category-thumbnail', __('تصویر پیش فرض دسته بندی', 'irtt'), 'irtt_category_thumbnail_html', 'irtt-settings', 'thumbnails', array('id' => 'category-thumbnail', 'name' => 'category_thumbnail'));
    add_settings_field('product-thumbnail', __('تصویر پیش فرض محصول', 'irtt'), 'irtt_product_thumbnail_html', 'irtt-settings', 'thumbnails', array('id' => 'product-thumbnail', 'name' => 'product_thumbnail'));
}

function irtt_post_thumbnail_html($args) {
    $group_options = get_option('irtt_settings');
    $post_thumbnail = $group_options['post_thumbnail'];
    ?>
    <div class="rngwp-btn-wrapper">
        <input type="hidden" class="rng-link-banner2" id="<?php echo $args['id'] ?>" name="irtt_settings[<?php echo $args['name'] ?>]" value="<?php echo $post_thumbnail; ?>">
        <button class="rng-button-banner2 wp-core-ui button rng-btn-select"><?php _e('افزودن فایل', 'irtt') ?></button>
        <button class="wp-core-ui button rng-btn-reset2" <?php echo (empty($post_thumbnail)) ? "disabled" : ""; ?>><?php _e('پاک کردن فایل', 'irtt') ?></button>
    </div>
    <?php
}

function irtt_category_thumbnail_html($args) {
    $group_options = get_option('irtt_settings');
    $category_thumbnail = $group_options['category_thumbnail'];
    ?>
    <div class="rngwp-btn-wrapper">
        <input type="hidden" class="rng-link-banner2" id="<?php echo $args['id'] ?>" name="irtt_settings[<?php echo $args['name']  ?>]" value="<?php echo $category_thumbnail; ?>">
        <button class="rng-button-banner2 wp-core-ui button rng-btn-select"><?php _e('افزودن فایل', 'irtt') ?></button>
        <button class="wp-core-ui button rng-btn-reset2" <?php echo (empty($category_thumbnail)) ? "disabled" : ""; ?>><?php _e('پاک کردن فایل', 'irtt') ?></button>
    </div>
    <?php
}

function irtt_product_thumbnail_html($args) {
    $group_options = get_option('irtt_settings');
    $product_thumbnail = $group_options['product_thumbnail'];
    ?>
    <div class="rngwp-btn-wrapper">
        <input type="hidden" class="rng-link-banner2" id="<?php echo $args['id'] ?>" name="irtt_settings[<?php echo $args['name']  ?>]" value="<?php echo $product_thumbnail; ?>">
        <button class="rng-button-banner2 wp-core-ui button rng-btn-select"><?php _e('افزودن فایل', 'irtt') ?></button>
        <button class="wp-core-ui button rng-btn-reset2" <?php echo (empty($product_thumbnail)) ? "disabled" : ""; ?>><?php _e('پاک کردن فایل', 'irtt') ?></button>
    </div>
    <?php
}

add_action('admin_init', 'irtt_register_settings');
add_action('admin_menu', 'irtt_settings');
