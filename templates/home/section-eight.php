<?php $home_template = get_query_var('irtt_home_template'); ?>
<section class="eight container">
    <div class="middle-banner">
        <a href="<?php echo (!empty($home_template['b8'][1]['link']))? $home_template['b8'][1]['link'] : "#"; ?>" class="banner-item">
            <img alt="<?php _e('اندیشکده روابط بین الملل','irtt') ?>" class="img-responsive" src="<?php echo current(wp_get_attachment_image_src($home_template['b8'][1]['src'] , 'full')); ?>">
        </a>
        <!--.banner-item -->
        <a href="<?php echo (!empty($home_template['b8'][2]['link']))? $home_template['b8'][2]['link'] : "#"; ?>" class="banner-item">
            <img alt="<?php _e('اندیشکده روابط بین الملل','irtt') ?>" class="img-responsive" src="<?php echo current(wp_get_attachment_image_src($home_template['b8'][2]['src'] , 'full')); ?>">
        </a>
        <!--.banner-item -->
    </div>
</section>
<!--.eight-->