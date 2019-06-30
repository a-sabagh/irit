<?php get_header('new'); ?>
<main id="main">
    <?php 
    get_template_part("templates/home/new/section","slider");
    get_template_part("templates/home/new/papular","product");
    get_template_part("templates/home/new/middle","left");
    get_template_part("templates/home/new/middle","right");
    get_template_part("templates/home/new/custom","news");
    ?>
</main><!--#main-->
<?php get_footer("new"); ?>