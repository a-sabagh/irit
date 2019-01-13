jQuery(document).ready(function ($) {
    if ($(".full-slider").length) {
        $(".full-slider").slick({
            rtl: true,
            prevArrow: '<span class="slider-arrow arrow-prev fa fa-angle-left"></span>',
            nextArrow: '<span class="slider-arrow arrow-next fa fa-angle-right"></span>'
        });
    }
    //featured-tab
    if ($(".featured-tab-container").length) {
        $(".featured-tab-container").each(function () {
            $(this).find(".featured-head li").removeClass("active"); //remove active class
            $(this).find(".featured-head li:first-child").addClass("active"); //show first tab is active
            $(this).find(".featured-content .tab-menu-content").hide(); //hide all contenet of tab
            $(this).find(".featured-content .tab-menu-content:first-child").show(); //show first content is of tab
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
    }

    //sale-product-slider
    var saleSliderProduct = $(".sale-slider-product");
    if (saleSliderProduct.length) {
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
        });
    }
    //slick-multiple-simple
    var sliderMultipleSimple = $(".slider-multiple-simple");
    if (sliderMultipleSimple.length) {
        sliderMultipleSimple.slick({
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
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        infinite: true,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 550,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    }
    //home-video-dom
    $(".home-video .play-icon").on('click', function (e) {
        e.preventDefault();
        $("#home-video-dom").get(0).play();
        $("#home-video-dom").attr("controls",true); 
        $("#home-video-dom").prop("controls",true); 
        
        $(".home-video .play-icon").hide();
        $(".home-video h3").hide();
    });
    //responsive menu
    $(".menu-item-has-children .menu-plus").on('click', function () {
        $(this).toggleClass("open");
        $(this).next("ul").slideToggle('normal');
    });
    $(".navigation-wrapper .menu-toggler").on('click', function (e) {
        e.preventDefault();
        $(this).next("#main-menu").slideToggle();
    });
});