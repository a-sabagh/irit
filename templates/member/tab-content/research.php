<?php
$author_id = get_post_meta(get_the_ID(), "irtt_memberuser", true);
$posts_per_page = get_option('posts_per_page');
$paginate_num = (get_query_var("paged")) ? get_query_var("paged") : false;
$offset = ($paginate_num) ? (($paginate_num - 1) * $posts_per_page) : "0";
$order = (isset($_GET['order_type'])) ? $_GET['order_type'] : null;

$researc_query_args = array(
    'post_type' => 'post',
    'author' => $author_id,
    'offset' => $offset,
    'posts_per_page' => $posts_per_page
);
if (isset($order)) {
    switch ($order):
        case 'newest':
            $researc_query_args = array_merge($researc_query_args, array('order_by' => 'ID', 'order' => 'DESC'));
            break;
        case 'oldest':
            $researc_query_args = array_merge($researc_query_args, array('order_by' => 'ID', 'order' => 'ASC'));
            break;
    endswitch;
}

$rq = new WP_Query($researc_query_args);
$post_count = $rq->found_posts;
?>

<div class="tab-content author-research-body">
    <?php
    if ($rq->have_posts()) {
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
                            default :
                                _e('پیش فرض', 'irtt');
                                break;
                        endswitch;
                        ?>
                    </span>
                    <ul>
                        <li><a href="<?php echo add_query_arg(array('order_type' => 'newest')); ?>"><?php _e('جدیدترین ها', 'irtt') ?></a></li>
                        <li><a href="<?php echo add_query_arg(array('order_type' => 'oldest')); ?>"><?php _e('قدیمی ترین ها', 'irtt') ?></a></li>
                    </ul>
                </div>
            </div>
            <!--.research-order-query-->
        </header>
        <div class="author-research-posts">
            <?php
            while ($rq->have_posts()) {
                $rq->the_post();
                get_template_part('templates/loops/archive');
            }
            ?>
        </div>
        <!--.author-research-posts-->
        <?php
        irtt_pagination($rq);
    } else {
        ?>
        <div class="author-research-posts">
            <?php get_template_part('templates/loops/no', 'result'); ?>
        </div>
        <?php
    }//have not any posts
    wp_reset_postdata();
    ?>
</div>
<!--.author-research-body-->