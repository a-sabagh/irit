<section class="single-share">
    <span><?php _e('اشتراک گذاری','irtt'); ?></span>
    <ul>
        <li><a target="_blank" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&amp;t=<?php the_title(); ?>" title="<?php _e('اشتراک گذاری','irtt'); ?>"><span class="facebook"><i class="fa fa-facebook"></i></span></a></li>
        <li><a target="_blank" href="https://telegram.me/share/url?url=<?php the_permalink(); ?>/&amp;text=<?php the_title(); ?>" title="<?php _e('اشتراک گذاری','irtt'); ?>"><span class="telegram"><i class="fa fa-paper-plane"></i></span></a></li>
        <li><a target="_blank" href="mailto:example@mail.com?subject=<?php bloginfo('description'); ?>&body=<?php the_title(); ?>&#32;&#32;<?php the_permalink(); ?>" title="<?php _e('اشتراک گذاری','irtt'); ?>"><span class="email"><i class="fa fa-envelope"></i></span></a></li>
        <li><a target="_blank" href="http://plus.google.com/share?url=<?php the_permalink(); ?>&amp;t=<?php the_title(); ?>" title="<?php _e('اشتراک گذاری','irtt'); ?>"><span class="google-plus"><i class="fa fa-google-plus"></i></span></a></li>
        <li><a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&summary=<?php echo share_excerpt(); ?>&source=irtt" title="<?php _e('اشتراک گذاری','irtt'); ?>"><span class="linkedin"><i class="fa fa-linkedin"></i></span></a></li>
        <li><a target="_blank" href="https://twitter.com/share?original_referer=/&text=<?php echo urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')); ?>&url=<?php echo urlencode(html_entity_decode(get_the_permalink(), ENT_COMPAT, 'UTF-8')); ?>" title="<?php _e('اشتراک گذاری','irtt'); ?>"><span class="twitter"><i class="fa fa-twitter"></i></span></a></li>
    </ul>
</section>
<!--.single-share-->