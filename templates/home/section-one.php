<section class="one container">
    <div class="col-md-8 slider-wrapper pull-left-md">
        <div class="slider full-slider">
            <?php
            $qs_args = array(
                'post_type' => 'post',
                'posts_per_page' => 5
            );
            $qs = new WP_Query($qs_args);
            if ($qs->have_posts()) {
                while ($qs->have_posts()) {
                    $qs->the_post();
                    if (has_post_thumbnail()) {
                        $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                        $thumbnail_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE);
                        $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'slider', FALSE);
                    } else {
                        $group_options = get_option('irtt_settings');
                        $post_thumbnail_id = $group_options['post_thumbnail'];
                        $thumbnail_alt = get_the_excerpt();
                        $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'slider', FALSE);
                    }
                    ?>
                    <a href="<?php the_permalink(); ?>" class="slide">
                        <img src="<?php echo current($thumbnail_url); ?>" alt="<?php echo $thumbnail_alt; ?>" class="img-responsive slider-img">
                        <div class="slider-body">
                            <h3 class="item-title"><?php the_title(); ?></h3>
                            <p class="item-excerpt"><?php echo slider_excerpt(); ?></p>
                        </div>
                        <!--.slider-body-->
                    </a>
                    <!--.slide-->
                    <?php
                }
            }
            wp_reset_postdata();
            ?>
        </div>
    </div>
    <!--.slider-->
    <div class="col-md-4 featured pull-right-md">
        <div class="box">
            <header class="box-title">
                <h3><?php _e('محصولات برگزیده', 'irtt'); ?></h3>
            </header>
            <div class="box-content home-featured-product">
                <ul class="featured-product">
                    <?php
                    $qpc_args = array(
                        'post_type' => 'product',
                        'offset' => 10,
                        'posts_per_page' => 3
                    );
                    $qpc = new WP_Query($qpc_args);
                    if ($qpc->have_posts()) {
                        while ($qpc->have_posts()) {
                            $qpc->the_post();
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
                            <li>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <img src="<?php echo current($thumbnail_url); ?>" alt="<?php echo $thumbnail_alt; ?>" class="img-responsive">
                                </a>
                            </li>
                            <?php
                        }
                    }
                    wp_reset_postdata();
                    ?>
                </ul>
            </div>
        </div>

        <div class="box">
            <header class="box-title">
                <h3><?php _e('اخبار برگزیده', 'irtt'); ?></h3>
            </header>
            <div class="box-content bullet-list">
                <ul>

                    <?php
                    $qpsc_args = array(
                        'post_type' => 'post',
                        'offset' => 9,
                        'posts_per_page' => 4
                    );
                    $qpsc = new WP_Query($qpsc_args);
                    if ($qpsc->have_posts()) {
                        while ($qpsc->have_posts()) {
                            $qpsc->the_post();
                            ?>
                            <li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
                            <?php
                        }
                    }
                    wp_reset_postdata();
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <!--.featured-->
</section>
<!--.one-->