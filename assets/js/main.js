jQuery(document).ready(function ($) {
    $(".full-slider").slick({
        rtl: true,
        prevArrow: '<span class="slider-arrow arrow-prev fa fa-angle-left"></span>',
        nextArrow: '<span class="slider-arrow arrow-next fa fa-angle-right"></span>'
    });
    //featured-tab
    $(".featured-tab-container").each(function () {
        $(this).find(".featured-content .tab-menu-content").hide(); //hide all contenet of tab
        $(this).find(".featured-head li:first").addClass("active"); //show first tab is active
        $(this).find(".featured-content .tab-menu-content").first().show(); //show first content is of tab
        $(this).find(".featured-head li").click(function (e) {
            e.preventDefault();
            var child_count = $(this).index();
            $(this)
                .parents(".featured-head")
                .siblings(".featured-content")
                .children(".tab-menu-content")
                .hide(); //hide all contenet of tab
            $(this)
                .parents(".featured-head")
                .find("li")
                .removeClass("active"); //remove all active class

            $(this).addClass("active"); //active the tab that you click this
            $(this).parents(".featured-head")
                .siblings(".featured-content")
                .find(".tab-menu-content:nth-child(" + (child_count + 1) + ")")
                .fadeIn(); //fade in the content of tab you click on this
            return false;
        });
    });
    //sale-product-slider
    $(".sale-slider-product").slick({
        rtl: true,
        centerMode: true,
        centerPadding: '0px',
        prevArrow: '<span class="slider-arrow arrow-prev fa fa-angle-left multiple"></span>',
        nextArrow: '<span class="slider-arrow arrow-next fa fa-angle-right multiple"></span>',
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        infinite: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    centerMode: true,
                    infinite: true,
                    dots: false
                }
            },
            {
                breakpoint: 980,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    centerMode: true,
                    dots: false,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerMode: true,
                    dots: false,
                }
            }
        ]
    });
    //home-video-dom
    $(".home-video .play-icon").on('click', function (e) {
        e.preventDefault();
        $("#home-video-dom").get(0).play();
        $(".home-video .play-icon").hide();
        $(".home-video h3").hide();
    });
});
