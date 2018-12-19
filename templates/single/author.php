<?php 
$display_name = get_the_author_meta("display_name");
$user_email = get_the_author_meta('user_email');
$user_avatar = get_avatar($user_email, 200 , $display_name , $display_name , array('calss'=>'author'));
$user_description = get_the_author_meta('description');
?>
<section class="single-author">
    <?php echo $user_avatar; ?>
    <a href="<?php echo (get_the_author_link())? get_the_author_link() : '#'; ?>" title="<?php echo $display_name; ?>">
        <h3><?php echo $display_name; ?></h3>
    </a>
    <p><?php echo $user_description; ?></p>
</section>
<!--.single-author-->