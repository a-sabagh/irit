<?php
$category = $wp_query->get_queried_object();
$category_id = $category->term_id;
if (!empty(get_term_meta($category_id, "irtt_category_featured", true))) {
    $category_cover_id = get_term_meta($category_id, "irtt_category_featured", true);
} else {
    $group_options = get_option('irtt_settings');
    $category_cover_id = $group_options['category_thumbnail'];
}

$category_cover_src = current(wp_get_attachment_image_src($category_cover_id, 'full', true));
?>
<header class="single-header">
    <?php
    irtt_breadcrumbs();
    if (!empty($category_cover_id)) {
        echo '<img class="single-header-image" src="' . $category_cover_src . '" alt="' . $category->category_description . '">';
    }
    ?>

    <div class="black-layer"></div>
    <div class="single-header-content">
        <!--.black-layer-->
        <?php
        if (is_404()) {
            ?>
            <h1 class="title"><?php _e('خطای ۴۰۴','irtt'); ?></h1>

            <h3 class="subtitle"><?php _e('برگه ای که به دنبال آن هستید یافت نشد.','irtt'); ?></h3>
            <?php
        } else {
            ?>
            <h1 class="title"><?php echo $category->name; ?></h1>

            <h3 class="subtitle"><?php echo $category->category_description; ?></h3>
            <?php
        }
        ?>

        <!--.subtitle-->
    </div>
    <!--.single-header-content-->
</header>
<!--.single-header-->