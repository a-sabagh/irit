<section class="widget single-related">
    <?php
    $categories = get_the_category();
    $post_cats_id = array();
    foreach ($categories as $value) {
        $post_cats_id[] = $value->term_id;
    }
    $author_id = get_the_author_meta('ID');
    
    $rquery_args = array(
        'cat' => $post_cats_id,
        'post_type' => 'post',
        'author' => $author_id,
        'posts_per_page' => 10,
        'post__not_in' => array(get_the_ID()),
        'orderby' => 'rand'
    );

    $related_post_ids = get_post_meta(get_the_ID(), "rng_related_posts", true);

    if (count($related_post_ids) > 2) {
        $rquery_args['post__in'] = $related_post_ids;
        $rquery_args['posts_per_page'] = count($related_post_ids);
        unset($rquery_args['cat']);
        unset($rquery_args['orderby']);
    }

    $rquery = new WP_Query($rquery_args);
    ?>
    <div class="widget-title">
        <h3><?php _e('پست های مرتبط', 'irtt') ?></h3>
        <span><?php _e('از این نویسنده بخوانید', 'irtt'); ?></span>
    </div>
    <div class="widg-content">
        <?php
        if ($rquery->have_posts()) {
            echo '<div class="slider-multiple-simple">';
            while ($rquery->have_posts()):
                $rquery->the_post();
                ?>
                <div class="related-item">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <?php
                        if (has_post_thumbnail()) {
                            $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                            $thumbnail_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE);
                            $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'thumbw2', FALSE);
                        } else {
                            $group_options = get_option('irtt_settings');
                            $post_thumbnail_id = $group_options['post_thumbnail'];
                            $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'thumbw2', FALSE);
                        }
                        echo '<img src="' . $thumbnail_url[0] . '" class="img-responsive" alt="' . $thumbnail_alt . '" >';
                        ?>
                        <h3><?php the_title(); ?></h3>
                    </a>
                </div>
                <!--.related-item-->
                <?php
            endwhile;
            echo '</div>';
        } else {
            get_template_part('templates/loops/no', 'result');
        }
        ?>
    </div>
</section>
<!--.single-related-->