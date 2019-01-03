<section class="four container">
    <div class="row">

        <div class="col-md-5 product-slider left-border">
            <div class="box box-background">
                <header class="box-title">
                    <h3><?php _e('پیشنهاد ویژه', 'irtt'); ?></h3>
                </header>
                <div class="box-content">
                    <?php
                    $args = array(
                        'post_type' => 'product',
                        /* 'meta_query' => array(
                          'relation' => 'OR',
                          array(// Simple products type
                          'key' => '_sale_price',
                          'value' => 0,
                          'compare' => '>',
                          'type' => 'numeric'
                          ),
                          array(// Variable products type
                          'key' => '_min_variation_sale_price',
                          'value' => 0,
                          'compare' => '>',
                          'type' => 'numeric'
                          )
                          ) */
                        'posts_per_page' => 8
                    );
                    $loop = new WP_Query($args);
                    if ($loop->have_posts()) {
                        ?>
                        <div class="sale-slider-product">
                            <?php
                            while ($loop->have_posts()) : $loop->the_post();
                                if (has_post_thumbnail()) {
                                    $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                                    $thumbnail_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE);
                                    $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'thumbh', FALSE);
                                } else {
                                    $group_options = get_option('irtt_settings');
                                    $post_thumbnail_id = $group_options['post_thumbnail'];
                                    $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'thumbh', FALSE);
                                }
                                ?>
                                <div>
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                        <img src="<?php echo current($thumbnail_url) ?>" alt="<?php echo $thumbnail_alt; ?>" class="img-responsive">
                                        <div class="product-description">
                                            <h3><?php the_title(); ?></h3>
                                            <?php
                                            $price = get_post_meta(get_the_ID(), '_price', true);
                                            echo wc_price($price);
                                            ?>

                                        </div>
                                    </a>
                                </div>
                                <?php
                            endwhile;
                            ?>
                        </div>
                        <!--.home-slider-product-->
                        <?php
                    } else {
                        echo __('در حال حاضر محصولی برای فروش ویژه وجود ندارد');
                    }
                    wp_reset_postdata();
                    ?>
                </div>
                <!--.box-content-->
            </div>
            <!--.box-->
        </div>
        <!--.product-slider-->
        <div class="col-md-7 home-video-wrapper">
            <div class="home-video">
                <video id="home-video-dom" width="100%" loop preload="none" poster="<?php echo trailingslashit(IRTT_FRONT); ?>images/fidelcastro.jpg">
                    <source src="https://hw16.cdn.asset.aparat.com/aparat-video/d0791f4c904bf8402148775953b07a2412792129-480p__24836.mp4" type="video/mp4" />
                </video>
                <span class="play-icon"><i class="fa fa-play"></i></span>
                <h3>مستند فیدل کاسترو</h3>
            </div>
        </div>
        <!--.home-video-->
    </div>
</section>
<!--.four-->