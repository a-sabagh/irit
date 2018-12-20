<section class="widget single-related">
    <?php
    $author_id = get_the_author_meta('ID');

    $rquery_args = array(
        'post_type' => 'post',
        'author' => $author_id,
        'posts_per_page' => 10,
        'post__not_in' => array(get_the_ID())
    );
    $rquery = new WP_Query($rquery_args);
    ?>
    <div class="widget-title">
        <h3><?php _e('پست های مرتبط', 'irtt') ?></h3>
        <span><?php _e('از این نویسنده بخوانید', 'irtt') ?></span>
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
                            $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'thumbnail', FALSE);
                            echo '<img src="' . $thumbnail_url[0] . '" class="img-responsive" alt="' . $thumbnail_alt . '" >';
                        } else {
                            ?>
                            <figure><img class="img-responsive" src="<?php echo trailingslashit(IRTT_FRONT); ?>images/thumb.jpg" alt=""></figure>
                            <?php } ?>
                        <h3><?php the_title(); ?></h3>
                    </a>
                </div>
                <!--.related-item-->
                <?php
            endwhile;
            echo '</div>';
        } else {
            get_template_part('templates/loops/no','result');
        }
        ?>
    </div>
</section>
<!--.single-related-->