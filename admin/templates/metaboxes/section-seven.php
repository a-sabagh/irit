<?php $home_template = get_query_var('irtt_home_template'); ?>
<tr class="section-one">
    <td colspan="2">
        <p>
            <span><?php _e('دسته بندی نوشته (قسمت هفتم کنار خبرنامه)', 'irtt'); ?></span>
            <button class="modal-button button" data-modal="section-seven"><?php _e('ویرایش', 'irtt'); ?></button>
        </p>

        <!-- The Modal -->
        <div id="section-seven" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <span class="modal-close">&times;</span>
                    <h2><?php _e('دسته بندی نوشته ها', 'irtt'); ?></h2>
                </div>
                <div class="modal-body">
                    <p><?php _e('دسته بندی نوشته ها.', 'irtt') ?></p>
                    <?php 
                    $term = get_term_by('id', $home_template['post_cat_seven'],'category');
                    ?>
                    <select class="rng-ajax-call-categories" name="irtt_home_template[post_cat_seven]">
                        <?php
                        echo '<option selected="" value="' . $term->term_id . '" >' . $term->name . '</option>';
                        ?>
                    </select>
                    
                </div>
            </div>

        </div>

    </td>

</tr>