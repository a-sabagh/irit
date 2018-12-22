<header class="single-header">
    <nav class="breadcrumbs-wrapper">
        <ul>
            <li><a href="#">اندیشکده بین الملل</a></li>
            <li><a href="#">اقتصاد</a></li>
            <li class="last-item">اقتصاد خلاق ابزار قدرتمند ثروت</li>
        </ul>
    </nav>
    <!--.breadcrumbs-wrapper-->
    <?php
    if (has_post_thumbnail()) {
        $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
        $thumbnail_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE);
        $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'full', FALSE);
    } else {
        $group_options = get_option('irtt_settings');
        $post_thumbnail_id = $group_options['post_thumbnail'];
        $thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'full', FALSE);
    }
    echo '<img src="' . $thumbnail_url[0] . '" class="r-post-thumb img-responsive" alt="' . $thumbnail_alt . '" >';
    ?>

    <div class="black-layer"></div>
    <div class="single-header-content">
        <!--.black-layer-->
        <h1 class="title"><?php the_title(); ?></h1>
        <h3 class="subtitle"><?php echo get_post_meta(get_the_ID(), 'irtt_subtitle', true); ?></h3>
        <!--.subtitle-->
        <!--.sinlge-title-->
        <span class="author"><?php the_author(); ?></span>
        <!--.author-->
        <span class="date"><?php the_date(); ?></span>
        <!--.date-->
    </div>
    <!--.single-header-content-->
</header>
<!--.single-header-->