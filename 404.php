<?php
get_header();
get_template_part('templates/headers/archive');
?>
<main class="container">
    <div class="single-main-content row">
        <div class="col-md-8">
            <section class="col-md-8 single-main-content pull-md-left">
                <h2><?php _e('خطای ۴۰۴', 'irtt') ?></h2>
                <h3>
                    متاسفانه صفحه ای که به دنبال آن هستید موجود نمی باشد لطفا برای پیدا کردن مطلب مورد نظر خود یکی از راه های زیر را انتخاب کنید:
                </h3>
                <ul class="not-found-guid">
                    <li><?php _e('از منوی بالای صفحه استفاده کنید. دسته بندی مطالب در منو و زیر منو ها موجود است.', 'irtt'); ?></li>
                    <li><?php _e('از فیلد جستجو استفاده کنید. کلمه مورد نظر خود را وارد کرده و کلیک کنید.', 'irtt'); ?></li>
                    <li><?php _e('در سمت چپ صفحه یا همان ساید بار برخی مطالب ذکر شده اند ، می توانید مطلب مورد نظرتان را آنجا بیابید.', 'irtt'); ?></li>
                    <li><?php _e('در آخر اگر موفق به پیدا کردن مطلب مورد نظر نشدید با ما تماس حاصل فرمایید', 'irtt'); ?></li>
                </ul>
            </section>
        </div>
        <!--.col-md-8-->
        <?php get_sidebar(); ?>
    </div>
</main>
<!--.single-main-content-->
<?php get_footer(); ?>