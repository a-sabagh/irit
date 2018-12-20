<?php
get_header();
get_template_part('templates/headers/date');
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
            } else {
                get_template_part('templates/loops/no','result');
            }
            ?>
            <ul class="pagination pagination-border">
                <li><a href="#">1</a></li>
                <li><a class="active" href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">6</a></li>
                <li><a href="#">7</a></li>
            </ul>
        </div>
        <!--.col-md-8-->
        <?php get_sidebar(); ?>
    </div>
</main>
<!--.single-main-content-->
<?php get_footer(); ?>