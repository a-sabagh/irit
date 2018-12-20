<?php 
if(!current_user_can("manage_options")){
    return;
}
wp_enqueue_media();
if(isset($_GET['settings-updated']) and $_GET['settings-updated'] == TRUE){
    add_settings_error("irtt-settings", "irtt-settings" , __("تنظیمات ذخیره شد","irtt") , "updated");
}elseif(isset($_GET['settings-updated']) and $_GET['settings-updated'] == FALSE){
    add_settings_error("irtt-settings", "irtt-settings" , __("خطا در ذخیره سازی","irtt"));
}
?>
<div class="wrap">
    <h1><?php echo get_admin_page_title(); ?></h1>
    <form action="options.php" method="post">
        <?php 
        settings_fields("irtt-settings");
        do_settings_sections("irtt-settings");
        submit_button(__("ذخیره","irtt"));
        ?>
    </form>
</div>