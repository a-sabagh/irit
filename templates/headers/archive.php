<?php
$category = $wp_query->get_queried_object();
$category_id = $category->term_id;
$category_cover_id = get_term_meta($category_id, "irtt_category_featured", true);
$category_cover_src = current(wp_get_attachment_image_src($category_cover_id, 'full', true));
?>
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
    if (!empty($category_cover_id)) {
        echo '<img class="single-header-image" src="' . $category_cover_src . '" alt="' . $category->category_description . '">';
    } else {
        ?>
        <img class="single-header-image" src="<?php echo trailingslashit(IRTT_FRONT); ?>images/slider/slider.jpg" alt="<?php echo $category->category_description; ?>">
        <?php
    }
    ?>

    <div class="black-layer"></div>
    <div class="single-header-content">
        <!--.black-layer-->
        <h1 class="title"><?php echo $category->name; ?></h1>

        <h3 class="subtitle"><?php echo $category->category_description; ?></h3>
        <!--.subtitle-->
    </div>
    <!--.single-header-content-->
</header>
<!--.single-header-->