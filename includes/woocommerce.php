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
    /*?><pre><?php var_dump($fields); ?></pre><?php*/

    
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