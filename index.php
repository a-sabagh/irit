<?php
get_header();
?>
<main id="main">
    <?php
    get_template_part('templates/home/section', 'one');
    get_template_part('templates/home/section', 'tow');
    get_template_part('templates/home/section', 'three');
    get_template_part('templates/home/section', 'four');
    get_template_part('templates/home/section', 'five');
    get_template_part('templates/home/section', 'six');
    get_template_part('templates/home/section', 'seven');
    get_template_part('templates/home/section', 'eight');
    ?>
</main>
<!--#main-->
<?php get_footer(); ?>