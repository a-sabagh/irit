<?php

function irtt_category_featured_add() {
    wp_enqueue_media();
    ?>
    <label><?php _e('تصویر شاخص', 'irtt') ?></label>
    <div class="rngwp-btn-wrapper">
        <input type="hidden" class="rng-link-banner2" name="irtt_category_featured" value="">
        <button class="rng-button-banner2 wp-core-ui button rng-btn-select"><?php _e('افزودن فایل','irtt') ?></button>
        <button class="wp-core-ui button rng-btn-reset2" disabled=""><?php _e('پاک کردن فایل','irtt') ?></button>
    </div>
    <?php
}

function irtt_category_featured_created($term_id) {
    $input_name = $_POST['irtt_category_featured'];
    if (isset($input_name) && !empty($input_name)) {
        add_term_meta($term_id, 'irtt_category_featured', $input_name);
    }
}

function irtt_category_featured_edit($term) {
    wp_enqueue_media();
    $category_featured = get_term_meta($term->term_id, 'irtt_category_featured', TRUE);
    ?>
    <table class="form-table">
        <tbody>
            <tr class="form-field form-required term-name-wrap">
                <th scope="row"><label for="name"><?php _e('تصویر شاخص', 'irtt') ?></label></th>
                <td>	

                    <div class="rngwp-btn-wrapper">
                        <input type="hidden" class="rng-link-banner2" name="irtt_category_featured" value="<?php echo $category_featured; ?>">
                        <button class="rng-button-banner2 wp-core-ui button rng-btn-select"><?php _e('افزودن فایل','irtt') ?></button>
                        <button class="wp-core-ui button rng-btn-reset2" <?php echo (empty($category_featured))? "disabled" : "";  ?>><?php _e('پاک کردن فایل','irtt') ?></button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <?php
}

function irtt_category_featured_update($term_id) {
    $input_name = $_POST['irtt_category_featured'];
    update_term_meta($term_id, 'irtt_category_featured', $input_name);
}

add_action('category_add_form_fields', 'irtt_category_featured_add', 50);
add_action('created_category', 'irtt_category_featured_created');
add_action('category_edit_form_fields', 'irtt_category_featured_edit', 50);
add_action('edited_category', 'irtt_category_featured_update');


add_action('post_tag_add_form_fields', 'irtt_category_featured_add', 50);
add_action('created_post_tag', 'irtt_category_featured_created');
add_action('post_tag_edit_form_fields', 'irtt_category_featured_edit', 50);
add_action('edited_post_tag', 'irtt_category_featured_update');
