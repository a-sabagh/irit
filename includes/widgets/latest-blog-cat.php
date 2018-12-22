<?php

class rng_visual_blog_cat extends WP_Widget {

    public function __construct() {
        $widget_options = array(
            'classname' => 'rng_visual_blog_cat',
            'description' => 'جدیدترین مقالات به همراه تصویر شاخص با توجه به دسته بندی'
        );
        parent::__construct("rng_visual_blog_cat", " مقالات بر اساس دسته بندی(RNG)", $widget_options);
    }

    public function widget($args, $instance) {
        $title = !empty($instance['title']) ? $instance['title'] : "پست های اخیر";
        $num_posts = !empty($instance['num_posts']) ? $instance['num_posts'] : 3;
        $cat_post_term_id_selected = !empty($instance['cat_post']) ? $instance['cat_post'] : '';

        $title = apply_filters("widget_title", $title);
        $output = $args["before_widget"];
        $output .= $args["before_title"];
        $output .= $title;
        $output .= $args["after_title"];
        $output .= '<ul class="post-list have-img">';
        $query_widg = array(
            "posts_per_page" => $num_posts,
            'cat' => $cat_post_term_id_selected
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
                $output .= '<a href="' . get_the_permalink() . '" title="' . get_the_title() . '"><h4 class="course-title-widg">' . get_the_title() . '</h4></a>';
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
        $cat_post_array = get_categories();
        $cat_post_term_id = array();
        $cat_post_name = array();
        foreach ($cat_post_array as $value) {
            $cat_post_term_id[] = $value->term_id;
            $cat_post_name[] = $value->name;
        }
        $cat_count = count($cat_post_term_id);
        $cat_post_term_id_selected = !empty($instance['cat_post']) ? $instance['cat_post'] : 'no-work';
        ?>
        <p>
        <p >تیتر ابزارک : </p>
        <input type="text" id="<?php echo $this->get_field_id('title'); ?>" class="widg-title" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />
        <p>دسته بندی مطالب : </p>
        <select class="rng-admin-checkbox latest-blog-select" name="<?php echo $this->get_field_name('cat_post'); ?>">
            <?php
            for ($i = 0; $i < $cat_count; $i++) {
                $selected = ( $cat_post_term_id[$i] == $cat_post_term_id_selected ) ? 'selected' : '';
                echo '<option value="' . $cat_post_term_id[$i] . '" ' . $selected . '>' . $cat_post_name[$i] . '</option>';
            }
            ?>
        </select>
        <p>تعداد : </p>
        <input type="number" id="<?php echo $this->get_field_id('num_posts'); ?>" class="widg-title" name="<?php echo $this->get_field_name("num_posts"); ?>" value="<?php echo $num_posts; ?>" />
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['num_posts'] = $new_instance['num_posts'];
        $instance['cat_post'] = $new_instance['cat_post'];
        return $instance;
    }

}

function register_visual_blog_cat_widget() {
    register_widget("rng_visual_blog_cat");
}

add_action("widgets_init", "register_visual_blog_cat_widget");
