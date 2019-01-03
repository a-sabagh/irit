<div class="tab-content author-quick-view">
    <div class="featured-tab-container author-info-tab">
        <div class="featured-head">
            <ul>
                <li><a href="#"><?php _e('زندگی نامه','irtt'); ?></a></li>
                <li><a href="#"><?php _e('اطلاعات تماس','irtt'); ?></a></li>
            </ul>
        </div>
        <!--.featured-head-->
        <div class="featured-content">
            <div class="tab-menu-content author-life">
                <?php the_content(); ?>
            </div>
            <div class="tab-menu-content author-contact">
                <?php echo wpautop(get_post_meta(get_the_ID() , 'irtt_memcontact',true)); ?>
            </div>
        </div>
        <!--.featured-content-->
    </div>
    <!--.featured-tab-container-->
</div>
<!--.author-quick-view-->