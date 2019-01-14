<?php
$author_id = (!empty(get_post_meta(get_the_ID(), "irtt_memberuser", true))) ?
        get_post_meta(get_the_ID(), "irtt_memberuser", true) : false;
$posts_per_page = get_option('posts_per_page');
$paginate_num = (isset($_GET['cpaged'])) ? $_GET['cpaged'] : 1;
$offset = ($paginate_num) ? (($paginate_num - 1) * $posts_per_page) : "0";
$order = (isset($_GET['order_type'])) ? $_GET['order_type'] : null;

$researc_query_args = array(
    'post_type' => 'post',
    'author' => $author_id,
    'paged' => $paginate_num,
    'posts_per_page' => $posts_per_page
);
if(empty($author_id)){
    $researc_query_args['post__in'] = array(0);
}
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
        set_query_var('posts_count', $post_count);
        set_query_var('order_type', $order);
        get_template_part('templates/loops/archive','order');
        ?>
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
//                wp_pagenavi(array('query'=> $rq));
        irtt_cpagination($rq);
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