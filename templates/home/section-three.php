<?php $home_template = get_query_var('irtt_home_template'); ?>
<section class="three container">
    <div class="middle-banner">
        <a href="<?php echo (!empty($home_template['b3'][1]['link']))? $home_template['b3'][1]['link'] : "#"; ?>" class="banner-item">
            <img alt="<?php _e('اندیشکده روابط بین الملل','irtt') ?>" class="img-responsive" src="<?php echo current(wp_get_attachment_image_src($home_template['b3'][1]['src'] , 'full')); ?>">
        </a>
        <!--.cat-item -->
        <a href="<?php echo (!empty($home_template['b3'][2]['link']))? $home_template['b3'][2]['link'] : "#"; ?>" class="banner-item">
            <img alt="<?php _e('اندیشکده روابط بین الملل','irtt') ?>" class="img-responsive" src="<?php echo current(wp_get_attachment_image_src($home_template['b3'][2]['src'], 'full')); ?>">
        </a>
        <!--.cat-item -->
        <a href="<?php echo (!empty($home_template['b3'][3]['link']))? $home_template['b3'][3]['link'] : "#"; ?>" class="banner-item">
            <img alt="<?php _e('اندیشکده روابط بین الملل','irtt') ?>" class="img-responsive" src="<?php echo current(wp_get_attachment_image_src($home_template['b3'][3]['src'], 'full')); ?>">
        </a>
        <!--.cat-item -->
        <a href="<?php echo (!empty($home_template['b3'][4]['link']))? $home_template['b3'][4]['link'] : "#"; ?>" class="banner-item">
            <img alt="<?php _e('اندیشکده روابط بین الملل','irtt') ?>" class="img-responsive" src="<?php echo current(wp_get_attachment_image_src($home_template['b3'][4]['src'], 'full')); ?>">
        </a>
        <!--.cat-item -->
    </div>
    <!--.cat-image -->
</section>
<!--.three-->