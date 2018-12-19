<div class="col-md-4 sidebar">
    <?php
    if (is_archive()) {
        if (is_active_sidebar("archive_side")):
            dynamic_sidebar("archive_side");
        endif;
    }elseif (is_single()) {
        if (is_active_sidebar("blog_inner_side")):
            dynamic_sidebar("blog_inner_side");
        endif;
    }elseif (is_404()) {
        if (is_active_sidebar("not_found_side")):
            dynamic_sidebar("not_found_side");
        endif;
    }elseif (is_search()) {
        if (is_active_sidebar("search_side")):
            dynamic_sidebar("search_side");
        endif;
    }else {
        if (is_active_sidebar("archive_side")):
            dynamic_sidebar("archive_side");
        endif;
    }
    ?>
</div>
<!--.sidebar-->