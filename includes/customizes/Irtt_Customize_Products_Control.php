<?php

class Irtt_Customize_Products_Control extends WP_Customize_Control {

    public $type = "irtt_products";
    public $multiple;

    public function __construct($manager, $id, $args = array(), $multiple = true) {
        parent::__construct($manager, $id, $args);
        $this->multiple = $multiple;
    }

    public function render_content() {
        $product_ids = $this->value();
        ?>
        <label class="customize-control-title"><?php echo esc_html($this->label); ?></label>
        <span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
        <select data-customize-setting-link="<?php echo $this->id; ?>" 
            <?php if($this->multiple){ ?>
                multiple=""
                name="<?php echo $this->id; ?>[]"
            <?php }else{ ?>
                name="<?php echo $this->id; ?>"
            <?php } ?>
            class="rng-ajax-call-products" >
            <?php
            if (!empty($product_ids)) {
                $products = (array) get_posts(array('post_type' => 'product', 'post__in' => $product_ids));
                foreach ($products as $product) {
                    echo '<option selected="" value="' . $product->ID . '">' . $product->post_title . '</option>';
                }
            }
            ?>
        </select>
        <?php
    }

    public function enqueue() {
        parent::enqueue();
        wp_localize_script("admin-script", "ADMIN_AJAX", array('url' => admin_url("admin-ajax.php")));
        wp_enqueue_script('select2');
        wp_enqueue_style('select2-style', WC()->plugin_url() . '/assets/css/select2.css');
    }

}
