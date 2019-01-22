<?php
get_header();
get_template_part('templates/headers/archive');
?>
<main class="container">
    <?php
    global $wp_query;

    $order = (isset($_GET['order_type'])) ? $_GET['order_type'] : null;

    set_query_var('posts_count', $wp_query->found_posts);
    set_query_var('order_type', $order);
    get_template_part('templates/loops/archive', 'order');

    ?>
    <div class="single-main-content row">
        <div class="col-md-8">
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    get_template_part('templates/loops/archive');
                }
            } else {
                get_template_part('templates/loops/no', 'result');
            }
            irtt_pagination();
            ?>

        </div>
        <!--.col-md-8-->
<?php get_sidebar(); ?>
    </div>
</main>
<!--.single-main-content-->
<?php get_footer(); ?>