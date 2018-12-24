<?php
get_header();
get_template_part('templates/headers/search');
?>
<main class="container">
    <div class="single-main-content row">
        <div class="col-md-8">
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    get_template_part('templates/loops/archive');
                }
                irtt_pagination();
            } else {
                get_template_part('templates/loops/no','result');
            }
            ?>
        </div>
        <!--.col-md-8-->
        <?php get_sidebar(); ?>
    </div>
</main>
<!--.single-main-content-->
<?php get_footer(); ?>