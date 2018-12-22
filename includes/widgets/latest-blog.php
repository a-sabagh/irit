<?php

class rng_visual_blog extends WP_Widget {

    public function __construct() {
        $widget_options = array(
            'classname' => 'rng_visual_blog',
            'description' => 'جدیدترین مقالات به همراه تصویر شاخص'
        );
        parent::__construct("rng_visual_blog", " مقالات(RNG)", $widget_options);
    }

    public function widget($args, $instance) {
        $title = !empty($instance['title']) ? $instance['title'] : "پست های اخیر";
        $num_posts = !empty($instance['num_posts']) ? $instance['num_posts'] : 3;
        $title = apply_filters("widget_title", $title);
        $output = $args["before_widget"];
        $output .= $args["before_title"];
        $output .= $title;
        $output .= $args["after_title"];
        $output .= '<ul class="post-list have-img">';
        $query_widg = array(
            "posts_per_page" => $num_posts
        );
        $visual_blog_query = new WP_Query(apply_filters("widget_posts_args", $query_widg));
        if ($visual_blog_query->have_posts()):
            while ($visual_blog_query->have_posts()):
                $visual_blog_query->the_post();
                $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                $thumbnail_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE);
                $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'widget-thumb', FALSE);
                                
                $group_options = get_option('irtt_settings');
                $dpost_thumbnail_id = $group_options['post_thumbnail'];
                $default_blog_thumb = wp_get_attachment_image_src($dpost_thumbnail_id, 'full', FALSE);
                
                $output .= "<li>";
                if (!empty($post_thumbnail_id)) {
                    $output .= '<a class="img-block" href="' . get_the_permalink() . '" title="' . get_the_title() . '"><img class="img-responsive" src="' . $thumbnail_url[0] . '" alt="' . $thumbnail_alt . '"></a>';
                } else {
                    $output .= '<a class="img-block" href="' . get_the_permalink() . '" title="' . get_the_title() . '"><img class="img-responsive" src="' . $default_blog_thumb[0] . '" alt="' . $thumbnail_alt . '"></a>';
                }
                $output .= '<a href="' . get_the_permalink() . '" title="' . get_the_title() . '"><h4>' . get_the_title() . '</h4></a>';
                $output .= '<span class="date">' . get_the_date() . '</span>';
                $output .= "</li>";
            endwhile;
        endif;
        $output .= '</ul>';
        $output .= $args["after_widget"];
        echo $output;
    }

    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : '';
        $num_posts = !empty($instance['num_posts']) ? $instance['num_posts'] : '';
        ?>
        <p>
        <p >تیتر ابزارک : </p>
        <input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />
        <p>تعداد : </p>
        <input type="number" id="<?php echo $this->get_field_id('num_posts'); ?>" name="<?php echo $this->get_field_name("num_posts"); ?>" value="<?php echo $num_posts; ?>" />
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['num_posts'] = $new_instance['num_posts'];
        return $instance;
    }

}

function register_visual_blog_widget() {
    register_widget("rng_visual_blog");
}

add_action("widgets_init", "register_visual_blog_widget");
