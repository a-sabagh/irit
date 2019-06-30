<section id="home-slider">
    <div class="full-slider">
        <?php
        $args = array("post_type" => "slider");
        $query = new WP_Query($args);
        if ($query->have_posts()):
            while ($query->have_posts()):
                $query->the_post();
                $slider_id = get_the_ID();
                $slider_link = get_post_meta($slider_id, "irtt_slider_link", true);
                $featured_image = get_the_post_thumbnail_url($slider_id, 'full');
                $slider_src = (!empty($featured_image)) ? $featured_image : trailingslashit(get_template_directory_uri()) . "/images/slider/slider.jpg";
                ?>
                <a href="<?php echo $slider_link; ?>" class="slider-item">
                    <img src="<?php echo $slider_src; ?>" alt="<?php the_content(); ?>" class="img-responsive">
                    <div class="slider-caption-wrapper">
                        <h3 class="slider-caption-title"><?php the_title(); ?></h3>
                        <p class="slider-caption-content"><?php the_content(); ?></p>
                    </div>
                </a>
                <?php
            endwhile;
        endif;
        ?>
    </div><!--.full-slider-->
</section>