<section class="seven container">
    <div class="row fixe-height-seven">
        <div class="col-md-4 mailpoet-wrapper">

            <div class="box">
                <header class="box-title">
                    <h3>عضویت در خبرنامه</h3>
                </header>
                <div class="box-content bullet-list">
                    <p>برای وارد کردن جدید ترین اخبار اندیشکده روابط بین الملل در پست الکترونیک خود ، ایمیل را در این جا وارد کرده و در خبر نامه عضو شوید.</p>
                    <form action="" method="post">
                        <input type="email" name="" value="" placeholder="ایمیل خود را وارد کنید.">
                        <input class="btn-full btn" type="submit" value="ثبت">
                    </form>
                </div>
            </div>

        </div>
        <!--.mailpoet-wrapper-->
        <div class="col-md-4 right-border poll-wrapper">
            <div class="box">
                <header class="box-title">
                    <h3>پرسش و پاسخ</h3>
                </header>
                <div class="box-content bullet-list">
                    <p>مهم ترین نقطه قوت اندیشکده روابط بین الملل را چه می دانید.</p>
                    <form action="" method="post">
                        <textarea name="" placeholder="پاسخ خود را اینجا بنویسید."></textarea>
                        <input class="btn-full btn" type="submit" value="ثبت پاسخ">
                    </form>
                </div>
            </div>
        </div>
        <!--.pol-wrapper-->
        <div class="col-md-4 right-border">
            <div class="box">
                <?php
                $category_id = 25;
                ?>
                <header class="box-title">
                    <h3><?php echo get_term($category_id)->name; ?></h3>
                </header>
                <div class="box-content">
                    <ul class="g-blog-box">
                        <?php
                        $qpsc_args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 2,
                            'cat' => $category_id
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
                    <a href="<?php echo get_term_link($category_id); ?>" class="category-link btn-full btn"><?php _e('مطالب بیشتر', 'irtt'); ?></a>
                </div>
                <!--.box-content-->
            </div>
            <!--.box-->
        </div>
    </div>
</section>
<!--.seven-->