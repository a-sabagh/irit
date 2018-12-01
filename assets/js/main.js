jQuery(document).ready(function ($) {
    $(".full-slider").slick({
        rtl: true,
        prevArrow: '<span class="slider-arrow arrow-prev fa fa-angle-left"></span>',
        nextArrow: '<span class="slider-arrow arrow-next fa fa-angle-right"></span>'
    });
    //featured-tab
//    $(".featured-tab-container .tab-menu-content").hide(); //hide all contenet of tab
//    $("ul.featured-head li:first").addClass("active"); //show first tab is active
//    $(".featured-tab-container .tab-menu-content:first").show(); //show first content is of tab
//    $("ul.featured-head li").click(function () {
//        var child_count = $(this).lenght;
//        console.log(child_count);
//
//        $(".featured-tab-container .tab-menu-content").hide(); //hide all contenet of tab
//        $("ul.featured-head li").removeClass("active"); //remove all active class
//
//        $(this).addClass("active"); //active the tab that you click this
//        $(this).parent("ul")
//            .siblings(".featured-tab-container")
//            .find(".tab-menu-content")[child_count]
//            .fadeIn(); //fade in the content of tab you click on this
//        return false;
//    });
});
