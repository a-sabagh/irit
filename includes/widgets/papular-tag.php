<?php

class rng_papular_tag_cloud extends WP_Widget {

    public function __construct() {
        $widget_options = array(
            'description' => "محبوب ترین برچسب ها",
            'classname' => "rng-papular-tag-cloud",
        );
        parent::__construct('rng-papular-tag-cloud', "محبوب ترین برچسب ها (RNG)", $widget_options);
    }

    public function widget($args, $instance) {
        $title = (isset($instance['title']) and !empty($instance['title']))? $instance['title'] : "محبوب ترین برچسب ها";
        $tag_count = (isset($instance['tag_count']) and !empty($instance['tag_count']))? $instance['tag_count'] : 5;
        $title = apply_filters("widget_title" , $title);
        $tags = $this->get_tag_cloud($tag_count);
        
        $tag_cloud = "<div class=\"tagcloud\">";
        foreach($tags as $tag){
            $tag_cloud .= "<a class=\"tag-cloud-link\" href=\"" . get_tag_link($tag->term_id) . "\">" . $tag->name . "</a>";
            $tag_cloud .= " ";
        }
        $tag_cloud .= "</div>";
        
        $output = $args['before_widget'];
        $output .= $args['before_title'];
        $output .= $title;
        $output .= $args['after_title'];
        $output .= $tag_cloud;
        $output .= $args['after_widget'];
        
        echo $output;
        
    }

    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['tag_count'] = stripslashes($new_instance['tag_count']);
        return $instance;
    }

    public function form($instance) {
        $title = (isset($instance['title']) and !empty($instance['title']))? $instance['title'] : "";
        $tag_count = (isset($instance['tag_count']) and !empty($instance['tag_count']))? $instance['tag_count'] : "";
        ?>
        <p>تیتر ابزارک را وارد کنید:</p>
        <input type="text" id="<?php echo $this->get_field_id("title"); ?>" class="widg-title"  name="<?php echo $this->get_field_name("title"); ?>" value="<?php echo $title; ?>" >
        <p>تعداد برچسب جهت نمایش را وارد کنید:</p>
        <input type="number" id="<?php echo $this->get_field_id("tag_count"); ?>" class="widg-title" name="<?php echo $this->get_field_name("tag_count"); ?>" value="<?php echo $tag_count; ?>" >
        <?php
    }

    private function get_tag_cloud($count) {
        $args = array(
            "orderby" => "count",
            "order" => "DESC",
            "number" => $count
        );
        return get_tags($args);
    }

}

function register_papular_tag_cloud_widget() {
    register_widget("rng_papular_tag_cloud");
}

add_action("widgets_init", "register_papular_tag_cloud_widget");
