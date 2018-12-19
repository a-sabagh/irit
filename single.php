<?php
get_header();
if (have_posts()):
    while (have_posts()):
        the_post();
        get_template_part('templates/headers/single');
        ?>
        <main class="container">
            <div class="single-main-content row">
                <div class="col-md-8">
                    <article class="editor-content">
                        <?php the_content(); ?>
                    </article><!--.editor-content-->
                    <?php
                    get_template_part('templates/single/taglist');
                    get_template_part('templates/single/share');
                    get_template_part('templates/single/author');
                    get_template_part('templates/single/related', 'posts');
                    // If comments are open or we have at least one comment, load up the comment template.
                    if (get_comments_number()) {
                        get_template_part('templates/single/comment', 'template');
                    }
                    if (comments_open()) {
                        get_template_part('templates/single/comment', 'form');
                    }
                    ?>
                </div>
                <!--.col-md-8-->
                <?php get_sidebar(); ?>
            </div>
            <!--.single-main-content-->
        </main>
        <?php
    endwhile;
endif;

get_footer();
