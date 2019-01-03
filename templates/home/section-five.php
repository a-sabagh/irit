<section class="five container">
    <div class="row">
        <div class="col-md-5 banners-2-wrapper left-border">
            <a href="#" class="banner-item">
                <img class="img-responsive" src="<?php echo trailingslashit(IRTT_FRONT); ?>images/banner.jpg">
            </a>
            <!--.cat-item -->
            <a href="#" class="banner-item">
                <img class="img-responsive" src="<?php echo trailingslashit(IRTT_FRONT); ?>images/banner2.jpg">
            </a>
            <a href="#" class="banner-item">
                <img class="img-responsive" src="<?php echo trailingslashit(IRTT_FRONT); ?>images/banner.jpg">
            </a>
            <!--.cat-item -->
            <a href="#" class="banner-item">
                <img class="img-responsive" src="<?php echo trailingslashit(IRTT_FRONT); ?>images/banner2.jpg">
            </a>
        </div>
        <!--.banner-2-wrapper-->
        <div class="col-md-7 product-tab-wrapper">
            <div class="featured-tab-container left-tab">
                <div class="featured-head">
                    <h3><?php _e('محصولات', 'irtt'); ?></h3>
                    <ul>
                        <?php
                        $product_cats = array(5455, 5456, 5460);
                        for ($i = 0; $i < count($product_cats); $i++):
                            $active = ($i == 0) ? 'class="active"' : '';
                            echo '<li ><a href="' . $active . '">' . get_term($product_cats[$i])->name . '</a></li>';
                        endfor;
                        ?>
                    </ul>
                </div>
                <!--.featured-head-->
                <div class="featured-content">
                    <?php
                    foreach ($product_cats as $category):
                        echo '<div class="tab-menu-content product-tab">';
                        $args = array(
                            'post_type' => 'product',
                            'posts_per_page' => 4,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'product_cat',
                                    'field' => 'term_id',
                                    'terms' => array($category),
                                    'operator' => 'IN',
                                ),
                            ),
                        );
                        $query = new WP_Query($args);
                        if ($query->have_posts()):
                            $i = 0;
                            while ($query->have_posts()):
                                $query->the_post();
                                if (has_post_thumbnail()) {
                                    $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                                    $thumbnail_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE);
                                    $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'thumbh', FALSE);
                                } else {
                                    $group_options = get_option('irtt_settings');
                                    $post_thumbnail_id = $group_options['product_thumbnail'];
                                    $thumbnail_alt = get_the_excerpt();
                                    $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'thumbh', FALSE);
                                }
                                switch ($i):
                                    case 0:
                                        ?>
                                        <div class="row">
                                            <div class="col-sm-6 product-item">
                                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                    <img class="img-responsive" src="<?php echo current($thumbnail_url); ?>" alt="<?php echo $thumbnail_alt; ?>">
                                                    <h3><?php the_title(); ?></h3>
                                                    <span>
                                                        <?php
                                                        $price = get_post_meta(get_the_ID(), '_price', true);
                                                        echo wc_price($price);
                                                        ?>
                                                    </span>
                                                </a>
                                            </div>
                                            <?php
                                            echo ($query->post_count == 1) ? '</div>' : '';
                                            break;
                                        case 1:
                                            ?>
                                            <div class="col-sm-6 product-item">
                                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                    <img class="img-responsive" src="<?php echo current($thumbnail_url); ?>" alt="<?php echo $thumbnail_alt; ?>">
                                                    <h3><?php the_title(); ?></h3>
                                                    <span>
                                                        <?php
                                                        $price = get_post_meta(get_the_ID(), '_price', true);
                                                        echo wc_price($price);
                                                        ?>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                        <!--.row-->
                                        <?php
                                        break;
                                    case 2:
                                        ?>
                                        <div class="row">

                                            <div class="col-sm-6 product-item">
                                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                    <img class="img-responsive" src="<?php echo current($thumbnail_url); ?>" alt="<?php echo $thumbnail_alt; ?>">
                                                    <h3><?php the_title(); ?></h3>
                                                    <span>
                                                        <?php
                                                        $price = get_post_meta(get_the_ID(), '_price', true);
                                                        echo wc_price($price);
                                                        ?>
                                                    </span>
                                                </a>
                                            </div>
                                            <?php
                                            echo ($query->post_count == 3) ? '</div>' : '';
                                            break;
                                        case 3:
                                            ?>
                                            <div class="col-sm-6 product-item">
                                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                    <img class="img-responsive" src="<?php echo current($thumbnail_url); ?>" alt="<?php echo $thumbnail_alt; ?>">
                                                    <h3><?php the_title(); ?></h3>
                                                    <span>
                                                        <?php
                                                        $price = get_post_meta(get_the_ID(), '_price', true);
                                                        echo wc_price($price);
                                                        ?>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                        <!--.row-->
                                        <?php
                                        break;
                                endswitch;
                                $i++;
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        echo '</div><!--.tab-menu-content-->';
                    endforeach;
                    ?>
                </div>
                <!--.featured-tab-container-->
            </div>
            <!--.featured-tab-container-->
        </div>
        <!--.product-tab-wrapper-->
    </div>
</section>
<!--.five-->