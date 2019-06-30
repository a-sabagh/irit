<?php
/**
 * remove woocommerce plugin style sheets
 */
add_filter('woocommerce_enqueue_styles', '__return_false');

add_filter('woocommerce_default_address_fields', 'rng_move_checkout_fields');

function rng_move_checkout_fields($fields) {

    /*
      default priorities: default priorities:
      'first_name' - 10
      'last_name' - 20
      'company' - 30
      'country' - 40
      'address_1' - 50
      'address_2' - 60
      'city' - 70
      'state' - 80
      'postcode' - 90

      ["label"],["required"],["class"],["autocomplete"],["autofocus"],["priority"],["validate"]
     */
    /* ?><pre><?php var_dump($fields); ?></pre><?php */


    $fields['first_name']['priority'] = 10;
    $fields['last_name']['priority'] = 20;
    $fields['state']['priority'] = 40;
    $fields['city']['priority'] = 50;
    $fields['address_1']['priority'] = 60;
    $fields['postcode']['priority'] = 70;
    $fields["address_1"]["label"] = "آدرس";
    $fields["address_1"]["placeholder"] = "آدرس دقیق پستی";

    return $fields;
}

/**
 * @snippet       Remove some field from checkout form
 * @testedwith    WooCommerce 3.0.4
 */
add_filter('woocommerce_checkout_fields', 'rng_custom_override_checkout_fields');

function rng_custom_override_checkout_fields($fields) {

//    unset($fields['billing']['billing_first_name']);
//    unset($fields['billing']['billing_last_name']);
    unset($fields['billing']['billing_company']);
//    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
//    unset($fields['billing']['billing_city']);
//    unset($fields['billing']['billing_postcode']);
//    unset($fields['billing']['billing_country']);
//    unset($fields['billing']['billing_state']);
//    unset($fields['billing']['billing_phone']);
//    unset($fields['order']['order_comments']);
//    unset($fields['billing']['billing_email']);
//    unset($fields['account']['account_username']);
//    unset($fields['account']['account_password']);
//    unset($fields['account']['account_password-2']);

    return $fields;
}

function irtt_papulate_product_type_settings() {

    woocommerce_wp_checkbox(array(
        'id' => 'irtt_product_garant',
        'label' => __('گارانتی بازگشت', 'irtt'),
        'placeholder' => '',
        'desc_tip' => 'true',
        'description' => __('گارانتی بازگشت شامل این محصول می گردد', 'irtt'),
    ));
}

add_action("woocommerce_product_options_general_product_data", "irtt_papulate_product_type_settings");

//update new product type meta data
function irtt_update_product_meta($post_id) {
    update_post_meta($post_id, 'irtt_product_garant', $_POST['irtt_product_garant']);
}

add_action("woocommerce_process_product_meta", "irtt_update_product_meta");

/**
 * show product meta information
 */
function irtt_custom_action() {
    try {
        $default_zone = new WC_Shipping_Zone(3);
        $default_methods = $default_zone->get_shipping_methods();
        foreach ($default_methods as $key => $value) {
            if ($value->id === "free_shipping") {
                if ($value->min_amount > 0)
                    $min_amounts = $value->min_amount;
            }
        }
    } catch (Exception $ex) {
        $min_amounts = 700000;
    }
    $currency = get_woocommerce_currency_symbol();
    ?>
    <ul class="comment-send-product">
        <li><i class="fa fa-truck"></i><?php _e("تحویل رایگان سفارشات بالای {$min_amounts} {$currency}", 'irtt') ?></li>
        <?php
        $garant = get_post_meta(get_the_ID(), 'irtt_product_garant', TRUE);
        if ($garant) {
            ?>
            <li><i class="fa fa-certificate"></i><?php _e('تا ۷ روز ضمانت بازگشت محصول', 'irtt'); ?></li>
            <?php
        }
        ?>
        <li><i class="fa fa-support"></i><?php _e('پشتیبانی محصولات', 'irtt'); ?></li>
    </ul>
    <?php
}

add_action('woocommerce_before_add_to_cart_button', 'irtt_custom_action', 5);
