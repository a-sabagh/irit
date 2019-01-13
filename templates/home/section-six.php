<?php $home_template = get_query_var('irtt_home_template'); ?>
<section class="six container">
    <div class="row">
        <div class="col-md-8">
            <?php
            $category_id_right = $home_template['post_cat_six']['right'];
            ?>
            <div class="box">
                <header class="box-title">
                    <h3><?php echo get_term($category_id_right)->name; ?></h3>
                </header>
                <div class="box-content ht-blog-box">
                    <?php
                    $query_args = array(
                        'post_type' => 'post',
                        'cat' => $category_id_right,
                        'posts_per_page' => 2
                    );
                    $query = new WP_Query($query_args);
                    if ($query->have_posts()):
                        while ($query->have_posts()):
                            $query->the_post();
                            if (has_post_thumbnail()) {
                                $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                                $thumbnail_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE);
                                $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'thumbh', FALSE);
                            } else {
                                $group_options = get_option('irtt_settings');
                                $post_thumbnail_id = $group_options['post_thumbnail'];
                                $thumbnail_alt = get_the_excerpt();
                                $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'thumbh', FALSE);
                            }
                            ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="ht-blog-item">
                                <img src="<?php echo current($thumbnail_url); ?>" class="img-responsive" alt="<?php echo $thumbnail_alt; ?>">
                                <h3><?php the_title(); ?></h3>
                                <span><?php the_author(); ?></span>
                            </a>
                            <?php
                        endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>
                <!--.box-content-->
            </div>
            <!--.box-->
        </div>
        <!--.hd-blog-box-->
        <div class="col-md-4 right-border">
            <div class="box">
                <?php
                $category_id_left = (int) $home_template['post_cat_six']['left'];
                ?>
                <header class="box-title">
                    <h3><?php echo get_term($category_id_left)->name; ?></h3>
                </header>
                <div class="box-content">
                    <ul class="g-blog-box">
                        <?php
                        $qpsc_args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 2,
                            'cat' => $category_id_left
                        );
                        $qpsc = new WP_Query($qpsc_args);
                        if ($qpsc->have_posts()) {
                            while ($qpsc->have_posts()) {
                                $qpsc->the_post();
                                if (has_post_thumbnail()) {
                                    $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                                    $thumbnail_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE);
                                    $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'thumbw2', FALSE);
                                } else {
                                    $group_options = get_option('irtt_settings');
                                    $post_thumbnail_id = $group_options['post_thumbnail'];
                                    $thumbnail_alt = get_the_excerpt();
                                    $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'thumbw2', FALSE);
                                }
                                ?>
                                <li>
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="<?php echo current($thumbnail_url); ?>" alt="<?php echo $thumbnail_alt; ?>">
                                    </a>
                                    <a href="<?php the_permalink(); ?>">
                                        <h3><?php the_title(); ?></h3>
                                    </a>
                                    <p><?php echo small_excerpt(); ?></p>
                                </li>
                                <?php
                            }
                        }
                        wp_reset_postdata();
                        ?>

                    </ul>
                    <a href="<?php echo get_term_link($category_id_left); ?>" class="category-link btn-full btn"><?php _e('مطالب بیشتر', 'irtt'); ?></a>
                </div>
                <!--.box-content-->
            </div>
            <!--.box-->
        </div>
    </div>
    <!--.row-->
</section>
<!--.six-->