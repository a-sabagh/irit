<?php
get_header();
if (have_posts()):
    while (have_posts()):
        the_post();
        if (!is_page(get_option('page_on_front')) or get_option('page_on_front') == 0) {
            get_template_part('templates/headers/page');
        }
        ?>
        <main class="container">
            <div class="single-main-content row">
                <div class="col-md-12">
                    <article class="editor-content">
                        <?php the_content(); ?>
                    </article>
                    <!--.editor-content-->
                    <?php
                    //get_template_part('templates/single/share');
                    // If comments are open or we have at least one comment, load up the comment template.
                    if (get_comments_number()) {
                        get_template_part('templates/single/comment', 'template');
                    }
                    if (comments_open()) {
                        get_template_part('templates/single/comment', 'form');
                    }
                    ?>
                </div>
                <!--.col-md-12-->
            </div>
        </main>
        <?php
    endwhile;
endif;

get_footer();
