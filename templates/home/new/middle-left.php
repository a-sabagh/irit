<section class="middle-left">
    <div class="container">
        <div class="row">
            <div class="col-md-4 banner-2">
                <h2 class="section-title"><?php esc_html_e("خدمات اندیشکده بین الملل", "irtt"); ?></h2>
                <img src="<?php echo get_theme_mod("irtt_services_banner"); ?>" alt="<?php esc_html_e("خدمات اندیشکده بین الملل", "irtt"); ?>" class="img-responsive">
            </div>
            <article class="col-md-8">
                <div class="row">
                    <?php
                    $selected_post_id = (int) get_theme_mod("irtt_selected_post");
                    $selected_post = get_post($selected_post_id);
                    $author_id = $selected_post->post_author;
                    $member_arg = $args = array(
                        'post_type' => array('member'),
                        'meta_query' => array(
                            array(
                                'key' => 'irtt_memberuser',
                                'value' => $author_id,
                                'type' => 'NUMERIC',
                                'compare' => '='
                            )
                        )
                    );
                    $member = current(get_posts($member_arg));

                    $member_id = $member->ID;
                    ?>
                    <div class="col-md-8 content">
                        <h2 class="section-title"><?php esc_html_e("مقاله برتر هفته", "irtt"); ?></h2>
                        <a href="<?php echo get_the_permalink($selected_post->ID); ?>" title="<?php echo $selected_post->post_title; ?>">
                            <h2 class="title"><?php echo $selected_post->post_title; ?></h2>
                        </a><br>
                        <p class="author-name"><?php echo esc_html__("نویسنده ", "irtt") . $member->post_title; ?></p>
                        <p class="bio"><?php echo custom_excerpt(300, $member->post_content); ?></p>
                    </div>
                    <div class="col-md-4 author">
                        <?php
                        if (has_post_thumbnail($member->ID)) {
                            $post_thumbnail_id = get_post_thumbnail_id($member->ID);
                            $thumbnail_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE);
                            $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'full', FALSE);
                            echo '<img src="' . $thumbnail_url[0] . '" class="r-post-thumb img-responsive" alt="' . $thumbnail_alt . '" >';
                        } else {
                            ?>
                            <img src="<?php echo trailingslashit(get_template_directory_uri()); ?>/images/personal.jpg" alt="<?php echo $member->post_title; ?>" class="author-avatar img-responsive">
                            <?php
                        }
                        ?>
                    </div><!--.author-->
                </div><!--.row-->
                <p class="article-content"><?php echo custom_excerpt(800, $selected_post->post_content); ?></p>
                <a href="<?php echo get_the_permalink($selected_post->ID); ?>" title="<?php the_title(); ?>" class="read-more"><?php esc_html_e("ادامه مطلب", "irtt"); ?></a>
            </article>
        </div>
    </div>
</section>