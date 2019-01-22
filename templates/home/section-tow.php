<section class="tow container">
    <div class="row">
        <div class="col-md-6 featured-blog  left-border">
            <?php
            $term_id = 52;
            $term_array = get_categories(
                    array(
                        'child_of' => $term_id,
                        'hide_empty' => true
                    )
            );
            $term_array = array_slice($term_array, 0, 4);
            if (!empty($term_array) and isset($term_array) and is_array($term_array)) {
                ?>
                <div class="featured-tab-container right-tab">
                    <div class="featured-head">

                        <h3><?php echo get_term($term_id)->name; ?></h3>
                        <ul>
                            <?php
                            for ($i = 0; $i < count($term_array); $i++):
                                $active = ($i == 0) ? 'class="active"' : '';
                                echo '<li ' . $active . ' ><a href="#">' . $term_array[$i]->name . '</a></li>';
                            endfor;
                            ?>
                        </ul>
                    </div>
                    <!--.featured-head-->
                    <div class="featured-content">
                        <?php
                        foreach ($term_array as $term) {

                            $args = array(
                                'posts_per_page' => 3,
                                'post_type' => 'post',
                                'cat' => $term->term_id
                            );
                            $wp_query = new WP_Query($args);
                            if ($wp_query->have_posts()) {
                                $i = 0;
                                echo '<div class="tab-menu-content">';
                                while ($wp_query->have_posts()) {
                                    $wp_query->the_post();
                                    if ($i == 0) {
                                        if (has_post_thumbnail()) {
                                            $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                                            $thumbnail_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE);
                                            $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'thumbw', FALSE);
                                        } else {
                                            $group_options = get_option('irtt_settings');
                                            $post_thumbnail_id = $group_options['post_thumbnail'];
                                            $thumbnail_alt = get_the_excerpt();
                                            $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'thumbw', FALSE);
                                        }
                                        ?>
                                        <a href="<?php the_permalink(); ?>" class="article-1 full-featured-article" title="<?php the_title(); ?>">
                                            <img src="<?php echo current($thumbnail_url); ?>" class="img-responsive" alt="<?php echo $thumbnail_alt; ?>" />
                                            <div class="article-body full-article-body">
                                                <h3><?php the_title(); ?></h3>
                                                <p><?php echo brief_excerpt(); ?></p>
                                            </div>
                                        </a>
                                        <?php
                                    } elseif ($i == 1) {
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
                                        <div class="article-half-wrapper">
                                            <a href="<?php the_permalink(); ?>" class="article-1 article-half" title="<?php the_title(); ?>">
                                                <img src="<?php echo current($thumbnail_url); ?>" class="img-responsive" alt="<?php echo $thumbnail_alt; ?>" />
                                                <div class="article-body half-article-body">
                                                    <p><?php the_title(); ?></p>
                                                </div>
                                            </a>
                                            <?php
                                        } else {
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
                                            <a href="<?php the_permalink(); ?>" class="article-1 article-half" title="<?php the_title(); ?>">
                                                <img src="<?php echo current($thumbnail_url); ?>" class="img-responsive" alt="<?php echo $thumbnail_alt; ?>" />
                                                <div class="article-body half-article-body">
                                                    <p><?php the_title(); ?></p>
                                                </div>
                                            </a>
                                        </div>
                                        <?php
                                    }
                                    $i++;
                                }
                                echo ($wp_query->post_count == 2) ? '</div>' : '';
                                echo '</div><!--.tab-menu-content-->';
                                wp_reset_postdata();
                            }
                        }
                        echo '<a href="' . get_term_link($term_id) . '" class="category-link btn-full btn">' . __('مطالب بیشتر', 'irtt') . '</a>';
                        ?>
                    </div>
                    <!--.featured-tab-container-->
                </div>
                <!--.featured-tab-->
                <?php
            }
            ?>
        </div>
        <!--.featured-blog-->
        <div class="col-md-6 featured-blog">
            <?php
            $term_id = 17;
            $term_array = get_categories(
                    array(
                        'child_of' => $term_id,
                        'hide_empty' => true
                    )
            );
            $term_array = array_slice($term_array, 0, 4);
            if (!empty($term_array) and isset($term_array) and is_array($term_array)) {
                ?>
                <div class="featured-tab-container left-tab">
                    <div class="featured-head">

                        <h3><?php echo get_term($term_id)->name; ?></h3>
                        <ul>
                            <?php
                            for ($i = 0; $i < count($term_array); $i++):
                                $active = ($i == 0) ? 'class="active"' : '';
                                echo '<li ' . $active . ' ><a href="#">' . $term_array[$i]->name . '</a></li>';
                            endfor;
                            ?>
                        </ul>
                    </div>
                    <!--.featured-head-->
                    <div class="featured-content">
                        <?php
                        foreach ($term_array as $term) {

                            $args = array(
                                'posts_per_page' => 3,
                                'post_type' => 'post',
                                'cat' => $term->term_id
                            );
                            $wp_query = new WP_Query($args);
                            if ($wp_query->have_posts()) {
                                $i = 0;
                                echo '<div class="tab-menu-content">';
                                while ($wp_query->have_posts()) {
                                    $wp_query->the_post();
                                    if ($i == 0) {
                                        if (has_post_thumbnail()) {
                                            $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                                            $thumbnail_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE);
                                            $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'thumbw', FALSE);
                                        } else {
                                            $group_options = get_option('irtt_settings');
                                            $post_thumbnail_id = $group_options['post_thumbnail'];
                                            $thumbnail_alt = get_the_excerpt();
                                            $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'thumbw', FALSE);
                                        }
                                        ?>
                                        <a href="<?php the_permalink(); ?>" class="article-1 full-featured-article" title="<?php the_title(); ?>">
                                            <img src="<?php echo current($thumbnail_url); ?>" class="img-responsive" alt="<?php echo $thumbnail_alt; ?>" />
                                            <div class="article-body full-article-body">
                                                <h3><?php the_title(); ?></h3>
                                                <p><?php echo brief_excerpt(); ?></p>
                                            </div>
                                        </a>
                                        <?php
                                    } elseif ($i == 1) {
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
                                        <div class="article-half-wrapper">
                                            <a href="<?php the_permalink(); ?>" class="article-1 article-half" title="<?php the_title(); ?>">
                                                <img src="<?php echo current($thumbnail_url); ?>" class="img-responsive" alt="<?php echo $thumbnail_alt; ?>" />
                                                <div class="article-body half-article-body">
                                                    <p><?php the_title(); ?></p>
                                                </div>
                                            </a>
                                            <?php
                                        } else {
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
                                            <a href="<?php the_permalink(); ?>" class="article-1 article-half" title="<?php the_title(); ?>">
                                                <img src="<?php echo current($thumbnail_url); ?>" class="img-responsive" alt="<?php echo $thumbnail_alt; ?>" />
                                                <div class="article-body half-article-body">
                                                    <p><?php the_title(); ?></p>
                                                </div>
                                            </a>
                                        </div>
                                        <?php
                                    }
                                    $i++;
                                }
                                echo ($wp_query->post_count == 2) ? '</div>' : '';
                                echo '</div><!--.tab-menu-content-->';
                                wp_reset_postdata();
                            }
                        }
                        echo '<a href="' . get_term_link($term_id) . '" class="category-link btn-full btn">' . __('مطالب بیشتر', 'irtt') . '</a>';
                        ?>
                    </div>
                    <!--.featured-tab-container-->
                </div>
                <!--.featured-tab-->
                <?php
            }
            ?>
        </div>
        <!--.featured-blog-->
    </div>
</section>
<!--.tow-->