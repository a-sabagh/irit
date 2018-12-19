<?php
get_header();
while (have_posts()):
    the_post();
    get_template_part("templates/headers/member");
    ?>

    <div class="author-main-content container">
        <div class="row">
            <div class="col-md-12">
                <div class="author-tab-container">
                    <?php
                    get_template_part('templates/member/tabs');
                    ?>

                    <!--.author-tab-header-->
                    <div class="author-tab-content">
                        <?php
                        if (get_query_var('intro')) {
                            get_template_part('templates/member/tab-content/intro');
                        } else {
                            get_template_part('templates/member/tab-content/research');
                        }
                        ?>
                    </div>
                    <!--.author-tab-content-->
                </div>
                <!--.author-tab-container-->
            </div>
            <!--.col-md-12-->
        </div>
        <!--.row-->
    </div>
    <!--.author-main-content-->

    <?php
endwhile;
get_footer();
