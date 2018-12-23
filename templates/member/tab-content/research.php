<?php
$author_id = get_post_meta(get_the_ID(), "irtt_memberuser", true);
$posts_per_page = get_option('posts_per_page');
$paginate_num = (get_query_var("paged")) ? get_query_var("paged") : false;
$offset = ($paginate_num) ? (($paginate_num - 1) * $posts_per_page) : "0";
$researc_query_args = array(
    'post_type' => 'post',
    'author' => $author_id,
    'offset' => $offset,
    'posts_per_page' => $posts_per_page
);
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
                    <span class="current-item">تاریخ</span>
                    <ul>
                        <li><a href="#">پر بازدید ترین</a></li>
                        <li><a href="#">عنوان مقاله</a></li>
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