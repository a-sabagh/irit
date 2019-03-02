<?php
/**
* Template Name: Home Page
*
* @package irtt
* @subpackage irtt
*/
get_header();
?>
<main id="main">
    <?php
    $page_id = get_option( 'page_on_front' );
    if(isset($page_id) and !empty($page_id)){
        echo __("لطفا صفحه جاری را با شناسه {$page_id} به عنوان صفحه اصلی انتخاب کنید تا محتوا نمایش داده شود","irtt");
    }else{
        $home_template = get_post_meta($page_id, "irtt_home_template", true);
        set_query_var('irtt_home_template', $home_template);
        get_template_part('templates/home/section', 'one');
        set_query_var('irtt_home_template', $home_template);
        get_template_part('templates/home/section', 'tow');
        set_query_var('irtt_home_template', $home_template);
        get_template_part('templates/home/section', 'three');
        set_query_var('irtt_home_template', $home_template);
        get_template_part('templates/home/section', 'four');
        set_query_var('irtt_home_template', $home_template);
        get_template_part('templates/home/section', 'five');
        set_query_var('irtt_home_template', $home_template);
        get_template_part('templates/home/section', 'six');
        set_query_var('irtt_home_template', $home_template);
        get_template_part('templates/home/section', 'seven');
        set_query_var('irtt_home_template', $home_template);
        get_template_part('templates/home/section', 'eight');
    }
    ?>
</main>
<!--#main-->
<?php get_footer(); ?>