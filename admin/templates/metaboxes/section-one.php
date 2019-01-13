<?php $home_template = get_query_var('irtt_home_template'); ?>
<tr class="section-one">
    <td>
        <p>
            <span><?php _e('پست ها و محصولات برگزیده', 'irtt'); ?></span>
            <button class="modal-button button" data-modal="section-one-tow"><?php _e('ویرایش', 'irtt'); ?></button>
        </p>


        <!-- The Modal -->
        <div id="section-one-tow" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <span class="modal-close">&times;</span>
                    <h2><?php _e('پست ها و محصولات برگزیده', 'irtt'); ?></h2>
                </div>
                <div class="modal-body">
                    <p><?php _e('محصولات برگزیده: حداکثر ۳ محصول', 'irtt') ?></p>
                    <?php
                    $products = get_posts(array('post_type' => 'product', 'post__in' => $home_template['product_top']));
                    ?>
                    <select multiple="" class="rng-ajax-call-products" name="irtt_home_template[product_top][]">
                        <?php
                        foreach ($products as $product) {
                            echo '<option selected="" value="' . $product->ID . '">' . $product->post_title . '</option>';
                        }
                        ?>
                    </select>
                    <p><?php _e('پست های برگزیده: حداکثر ۴ پست', 'irtt') ?></p>
                    <select multiple="" name="irtt_home_template[posts_top][]" class="rng-ajax-call-posts" >
                        <?php
                        $posts = get_posts(array('post_type' => 'post', 'post__in' => $home_template['posts_top']));
                        foreach ($posts as $post):
                            echo '<option selected="" value="' . $post->ID . '">' . $post->post_title . '</option>';
                        endforeach;
                        ?>
                    </select>
                </div>
            </div>

        </div>

    </td>
    <td>
        <p>
            <span><?php _e('اسلایدر', 'irtt'); ?></span>
            <button class="modal-button button" data-modal="section-one-one"><?php _e('ویرایش', 'irtt'); ?></button>
        </p>


        <!-- The Modal -->
        <div id="section-one-one" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <span class="modal-close">&times;</span>
                    <h2><?php _e('اسلایدر', 'irtt'); ?></h2>
                </div>
                <div class="modal-body">
                    <p><?php _e('لیست پست های مربوطه را جهت نمایش در اسلایدر انتخابت کنید.حد اقل ۲ پست و حداکثر ۷پست') ?></p>
                    <select multiple="" name="irtt_home_template[slider][]" class="rng-ajax-call-posts" class="rng-ajax-call-posts" >
                        <?php
                        if (!empty($home_template['slider']) and is_array($home_template['slider'])) {
                            $slides = get_posts(array('post_type' => 'post', 'post__in' => $home_template['slider']));
                            foreach ($slides as $slide) {
                                echo '<option selected="" value="' . $slide->ID . '">' . $slide->post_title . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>

        </div>
    </td>
</tr>