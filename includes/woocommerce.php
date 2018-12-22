<?php
/**
 * remove woocommerce plugin style sheets
 */
add_filter('woocommerce_enqueue_styles', '__return_false');
