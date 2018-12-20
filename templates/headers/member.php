<div class="author-header">
    <div class="container">
        <div class="row">
            <div class="col-md-4 author-img">
                <?php
                if (has_post_thumbnail()) {
                    $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                    $thumbnail_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE);
                    $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'large', FALSE);
                    echo '<img src="' . esc_url($thumbnail_url[0]) . '" class="img-responsive img-circle" alt="' . esc_attr($thumbnail_alt) . '" >';
                } else {
                    ?>
                    <img src="<?php echo trailingslashit(IRTT_FRONT); ?>images/personal.jpg" alt="<?php the_excerpt(); ?>" class="img-responsive img-circle">
                <?php } ?>

            </div>
            <div class="col-md-5 author-description">
                <h1 class="author-name"><?php the_title(); ?></h1>
                <span class="position"><?php echo esc_html(get_post_meta(get_the_ID(), 'irtt_position', true)); ?></span>
                <p class="skills">
                    <strong><?php _e('تخصص', 'irtt'); ?> : </strong>
                    <span><?php echo esc_html(get_post_meta(get_the_ID(), 'irtt_skills', true)); ?></span>
                </p>
            </div>
            <div class="col-md-3 author-social">
                <ul>
                    <?php
                    $website = get_post_meta($post->ID, "irtt_memsocial_website", true);
                    $telegram = get_post_meta($post->ID, "irtt_memsocial_telegram", true);
                    $email = get_post_meta($post->ID, "irtt_memsocial_email", true);
                    $twitter = get_post_meta($post->ID, "irtt_memsocial_twitter", true);
                    $facebook = get_post_meta($post->ID, "irtt_memsocial_facebook", true);
                    if (!empty($website)) {
                        echo '<li><a href="' . esc_url($website) . '" title="website"><span>Website</span><i class="fa fa-globe"></i></a></li>';
                    }
                    if (!empty($telegram)) {
                        echo '<li><a href="' . esc_url($telegram) . '" title="telegram"><span>Telegram</span><i class="fa fa-paper-plane"></i></a></li>';
                    }
                    if (!empty($email)) {
                        echo '<li><a href="' . esc_url($email) . '" title="email"><span>Email</span><i class="fa fa-envelope"></i></a></li>';
                    }
                    if (!empty($twitter)) {
                        echo '<li><a href="' . esc_url($twitter) . '" title="twitter"><span>Twitter</span><i class="fa fa-twitter"></i></a></li>';
                    }
                    if (!empty($facebook)) {
                        echo '<li><a href="' . esc_url($facebook) . '" title="facebook"><span>Facebook</span><i class="fa fa-facebook"></i></a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <!--.container-->
</div>
<!--.author-header-->