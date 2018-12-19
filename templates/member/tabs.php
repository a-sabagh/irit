<?php
global $post;
$current_page = get_the_permalink($post->ID);
?>
<div class="author-tab-header">
    <ul>
        <li <?php echo (!get_query_var("intro")) ? 'class="active"' : ''; ?>><a href="<?php echo $current_page . '/research/'  ?>"><?php _e('پژوهش ها', 'irtt') ?></a></li>
        <li <?php echo (get_query_var("intro")) ? 'class="active"' : ''; ?>><a href="<?php echo $current_page . '/intro/' ?>"><?php _e('بررسی اجمالی', 'irtt') ?></a></li>
    </ul>
</div>