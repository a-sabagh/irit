<article class="post">
    <div class="row">
        <figure class="col-md-4 pull-md-right p-thumbnail">
            <a href="<?php the_permalink(); ?>" title="<?php echo title_excerpt(); ?>">
                <?php
                if (has_post_thumbnail()) {
                    $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                    $thumbnail_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE);
                    $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'full', FALSE);
                } else {
                    $group_options = get_option('irtt_settings');
                    $post_thumbnail_id = $group_options['post_thumbnail'];
                    $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'full', FALSE);
                }
                echo '<img src="' . $thumbnail_url[0] . '" class="r-post-thumb img-responsive" alt="' . $thumbnail_alt . '" >';
                ?>
            </a>
        </figure><!--.post-thumbnail-->
        <section class="col-md-8 pull-md-left p-content">
            <a href="<?php the_permalink(); ?>" title="<?php echo title_excerpt(); ?>" ><h2 class="p-title"><?php the_title(); ?></h2></a>
            <div class="p-meta">
                <span class="date"><i class="fa fa-calendar"></i><?php the_date(); ?></span><span class="cat"><i class="fa fa-folder"></i><?php the_category(" ، "); ?></span>
            </div><!--.p-meta-->
            <p><?php echo archive_excerpt(); ?></p>
            <a href="<?php the_permalink(); ?>" title="<?php echo title_excerpt(); ?>" class="p-read-more"><?php _e("ادامه مطلب","irtt"); ?></a>
        </section><!--.post-content-->
    </div><!--.row-->
</article>
<!--.post-->