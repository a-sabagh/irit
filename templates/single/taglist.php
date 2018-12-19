<?php
$tags = get_the_tags();
if (!empty($tags)):
    ?>
    <section class="single-tag-list">
        <ul>
            <li class="tag-label"><?php _e('برچسب ها','irtt') ?></li>
                <?php
                foreach ($tags as $tag):
                    echo '<li><a class="single-tag-id-' . $tag->term_id . '" href="' . get_term_link($tag->term_id) . '">' . $tag->name . '</a></li>';
                endforeach;
                ?>
        </ul>
    </section>
    <!--.sinlge-tag-list-->
    <?php
endif;

