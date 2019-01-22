<?php
$post_count = get_query_var('posts_count');
$order = get_query_var('order_type');
?>
<header class="author-research-header">
    <span class="research-count"><?php echo sprintf(__('%u پست'), $post_count); ?></span>
    <!--.research-count-->
    <div class="research-order-wrapper">
        <span class="label"><?php _e('مرتب سازی بر اساس', 'irtt'); ?></span>
        <div class="research-order">
            <span class="current-item">
                <?php
                switch ($order):
                    case 'newest':
                        _e('جدیدترین ها', 'irtt');
                        break;
                    case 'oldest':
                        _e('قدیمی ترین ها', 'irtt');
                        break;
                    case 'papular':
                        _e('پربازدیدترین ها', 'irtt');
                        break;
                    default :
                        _e('پیش فرض', 'irtt');
                        break;
                endswitch;
                ?>
            </span>
            <ul>
                <li><a href="<?php echo add_query_arg(array('order_type' => 'newest')); ?>"><?php _e('جدیدترین ها', 'irtt') ?></a></li>
                <li><a href="<?php echo add_query_arg(array('order_type' => 'oldest')); ?>"><?php _e('قدیمی ترین ها', 'irtt') ?></a></li>
                <li><a href="<?php echo add_query_arg(array('order_type' => 'papular')); ?>"><?php _e('پربازدیدترین ها', 'irtt') ?></a></li>
            </ul>
        </div>
    </div>
    <!--.research-order-query-->
</header>