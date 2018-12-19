<div class="author-header">
    <div class="container">
        <div class="row">
            <div class="col-md-4 author-img">
                <?php
                if (has_post_thumbnail()) {
                    $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                    $thumbnail_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE);
                    $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'large', FALSE);
                    echo '<img src="' . $thumbnail_url[0] . '" class="img-responsive img-circle" alt="' . $thumbnail_alt . '" >';
                } else {
                    ?>
                    <img src="<?php echo trailingslashit(IRTT_FRONT); ?>images/personal.jpg" alt="<?php the_excerpt(); ?>" class="img-responsive img-circle">
                <?php } ?>

            </div>
            <div class="col-md-5 author-description">
                <h1 class="author-name"><?php the_title(); ?></h1>
                <span class="position">کارشناس ارشد</span>
                <p class="skills">
                    <strong>تخصص : </strong>
                    <span>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. </span>
                </p>
            </div>
            <div class="col-md-3 author-social">
                <ul>
                    <li><a href="#" title=""><span>Website</span><i class="fa fa-globe"></i></a></li>
                    <li><a href="#" title=""><span>Telegram</span><i class="fa fa-paper-plane"></i></a></li>
                    <li><a href="#" title=""><span>Email</span><i class="fa fa-envelope"></i></a></li>
                    <li><a href="#" title=""><span>Twitter</span><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" title=""><span>Facebook</span><i class="fa fa-facebook"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!--.container-->
</div>
<!--.author-header-->