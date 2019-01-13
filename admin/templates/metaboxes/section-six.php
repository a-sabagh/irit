<?php $home_template = get_query_var('irtt_home_template'); ?>
<tr class="section-one">
    <td colspan="2">
        <p>
            <span><?php _e('دسته بندی نوشته (قسمت ششم بالای خبرنامه)', 'irtt'); ?></span>
            <button class="modal-button button" data-modal="section-six"><?php _e('ویرایش', 'irtt'); ?></button>
        </p>

        <!-- The Modal -->
        <div id="section-six" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <span class="modal-close">&times;</span>
                    <h2><?php _e('دسته بندی نوشته ها', 'irtt'); ?></h2>
                </div>
                <div class="modal-body">
                    <p><?php _e('دسته بندی برای نوشته های سمت راست پیدا کنید.', 'irtt') ?></p>
                    <?php 
                    $term_right = get_term_by('id', $home_template['post_cat_six']['right'],'category');
                    ?>
                    <select class="rng-ajax-call-categories" name="irtt_home_template[post_cat_six][right]">
                        <?php
                        echo '<option selected="" value="' . $term_right->term_id . '" >' . $term_right->name . '</option>';
                        ?>
                    </select>
                    <p><?php _e('دسته بندی برای نوشته های سمت چپ پیدا کنید.', 'irtt') ?></p>
                    <?php
                    $term_left = get_term_by('id', $home_template['post_cat_six']['left'],'category');
                    ?>
                    <select class="rng-ajax-call-categories" name="irtt_home_template[post_cat_six][left]">
                    <?php
                    echo '<option selected="" value="' . $term_left->term_id . '" >' . $term_left->name . '</option>';
                    ?>
                    </select>
                </div>
            </div>

        </div>

    </td>

</tr>