<section id="papular-product">
    <div class="container">
        <h2 class="section-title"><?php esc_html_e("محصولات منتخب","irtt"); ?></h2>
        <div class="row">
            <?php
            $product_ids = get_theme_mod("irtt_papular_product");
            $args = array(
                "post_type" => array("product"),
                "post__in" => (array) $product_ids,
                "posts_per_page" => 3
            );
            $query = new WP_Query($args);
            if ($query->have_posts()):
                while ($query->have_posts()):
                    $query->the_post();
                    ?>
                    <div class="col-md-3">
                        <div class="product-item">
                            <a class="img-wrapper" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">

                                <?php
                                if (has_post_thumbnail()) {
                                    $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                                    $thumbnail_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE);
                                    $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'full', FALSE);
                                } else {
                                    $group_options = get_option('irtt_settings');
                                    $post_thumbnail_id = $group_options['product_thumbnail'];
                                    $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'full', FALSE);
                                }
                                echo '<img src="' . $thumbnail_url[0] . '" class="r-post-thumb img-responsive" alt="' . $thumbnail_alt . '" >';
                                ?>
                            </a>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" ><h3 class="title"><?php the_title(); ?></h3></a>
                            <p class="content"><?php echo alt_excerpt(); ?></p>
                            <span class="price">
                                <i class="fa fa-money" ></i>
                                <span class="price-value" >
                                    <?php
                                    $product = wc_get_product(get_the_ID());
                                    echo $product->get_price_html();
                                    ?>
                                </span>
                            </span>
                            <span class="category">
                                <i class="fa fa-folder" ></i>
                                <span class="category-value" >
                                    <?php
                                    $product_categories = get_the_terms(get_the_ID(), "product_cat");
                                    echo current($product_categories)->name;
                                    ?>
                                </span>
                            </span>
                            <?php
                            if ($product->is_purchasable() and $product->is_in_stock()) {
                                ?>
                                <div class="add-to-cart-wrapper">
                                    <a href="<?php echo $product->add_to_cart_url(); ?>" title="<?php echo $product->add_to_cart_text(); ?>"><?php echo $product->add_to_cart_text(); ?></a>
                                </div>
                                <?php
                            }
                            ?>

                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
            <div class="col-md-3 papular-product-sidebar">
                <div class="mail-poet-wrapper">
                    <header class="d-flex justify-content-start align-items-center flex-nowrap">
                        <i class="fa fa-envelope-open-o"></i>
                        <div class="text-wrapper">
                            <p class="medium-text">عضویت در خبرنامه</p>
                            <p class="small-text">با عضویت در خبر نامه از جدیدترین اخبار و تخفیف های ما آگاه شوید.</p>
                        </div>
                    </header>
                    <div class="form-wrapper">
                        <form action="" method="post">
                            <input type="text" name="name" value="" placeholder="نام کامل">
                            <input type="text" name="email" value="" placeholder="ایمیل">
                            <input type="submit" value="عضویت در خبرنامه">
                        </form>
                    </div>
                </div><!--.mail-poet-wrapper-->
                <div class="special-sign-in-wrapper">
                    <header>
                        <div><i class="fa fa-users"></i></div>
                        <p>مزایای عضویت در اندیشکده</p>
                    </header>
                    <div class="content" >
                        <ul>
                            <li>دریافت تحلیل های خاورمیانه</li>
                            <li>اقتصاد بین الملل</li>
                            <li>کتاب ها و وقایع</li>
                            <li>مشاوره تخصصی</li>
                        </ul>
                    </div>
                </div><!--.special-sign-in-wrapper-->
            </div><!--.papular-product-sidebar-->
        </div>
    </div><!--.container-->
</section>