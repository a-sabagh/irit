jQuery(document).ready(function ($) {
    //widgets wordpress media uploader type-2
    var file_frame;
    $('.rng-button-banner2').live('click', function (event) {
        event.preventDefault();
        window.prev_element = $(this).prev('.rng-link-banner2');
        window.next_element = $(this).next('.rng-btn-reset2');
        if (file_frame) {
            file_frame.open();
            return;
        }
        file_frame = wp.media.frames.file_frame = wp.media();

        file_frame.on('select', function () {
            attachment = file_frame.state().get('selection').first().toJSON();
            prev_element.val(attachment.id);
            next_element.prop("disabled", false);
        });
        file_frame.open();
    });
    $('.rng-btn-reset2').on('click', function (event) {
        event.preventDefault();
        $(this).prev('.rng-button-banner2').prev('.rng-link-banner2').val('');
        $(this).prop("disabled", true);

    });
    if (
            $('.rng-related-posts').length
            || $('.rng-ajax-call-posts').length
            || $('.rng-ajax-call-products').length
            || $('.rng-ajax-call-categories').length
            )
    {
        (function () {
            if (jQuery && jQuery.fn && jQuery.fn.select2 && jQuery.fn.select2.amd)
                var e = jQuery.fn.select2.amd;
            return e.define("select2/i18n/fa", [], function () {
                return{errorLoading: function () {
                        return"در حال انجام پردازش...";
                    }, inputTooLong: function (e) {
                        var t = e.input.length - e.maximum, n = "لطفاً " + t + " کاراکتر را حذف نمایید";
                        return n;
                    }, inputTooShort: function (e) {
                        var t = e.minimum - e.input.length, n = "لطفاً تعداد " + t + " کاراکتر یا بیشتر وارد نمایید";
                        return n;
                    }, loadingMore: function () {
                        return"در حال بارگذاری نتایج بیشتر...";
                    }, maximumSelected: function (e) {
                        var t = "شما تنها می‌توانید " + e.maximum + " آیتم را انتخاب نمایید";
                        return t;
                    }, noResults: function () {
                        return"هیچ نتیجه‌ای یافت نشد";
                    }, searching: function () {
                        return"در حال جستجو...";
                    }
                };
            }), {define: e.define, require: e.require};
        })();
    }

    if (typeof RELATED !== "undefined") {
        $(".rng-related-posts").select2({

            minimumInputLength: 3,
            width: '100%',
            ajax: {
                url: RELATED.url,
                type: "post",
                dataType: 'json',
                data: function (params) {
                    return {
                        selected: $(this).val(),
                        current: RELATED.current,
                        s: params.term,
                        action: "rngadmin_related_posts",
                        author: RELATED.author
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
    }
    //posts , product , categories ajax call
    console.log(ADMIN_AJAX);
    if (typeof ADMIN_AJAX !== "undefined") {
        $(".rng-ajax-call-posts").select2({
            minimumInputLength: 3,
            width: '100%',
            ajax: {
                url: ADMIN_AJAX.url,
                type: "post",
                dataType: 'json',
                data: function (params) {
                    return {
                        selected: $(this).val(),
                        s: params.term,
                        action: "rng_ajax_call_posts"
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
        $(".rng-ajax-call-products").select2({
            minimumInputLength: 3,
            width: '100%',
            ajax: {
                url: ADMIN_AJAX.url,
                type: "post",
                dataType: 'json',
                data: function (params) {
                    return {
                        selected: $(this).val(),
                        s: params.term,
                        action: "rng_ajax_call_products"
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
        $(".rng-ajax-call-categories").select2({
            minimumInputLength: 3,
            width: '100%',
            ajax: {
                url: ADMIN_AJAX.url,
                type: "post",
                dataType: 'json',
                data: function (params) {
                    return {
                        selected: $(this).val(),
                        s: params.term,
                        action: "rng_ajax_call_categories"
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
    } //endif

    //set variable
    var modal = $(".modal");
    var btn = $(".modal-button");

    if (modal.length) {
        //open modal
        btn.on("click", function (e) {
            e.preventDefault();
            var modal = $(this).data("modal");
            $("#" + modal).show(0, function () {
                $(this).addClass("open-modal");
            });
        });
        //close modal
        $(".modal-close").on("click", function () {
            var modal = $(this).closest(".modal");
            modal.hide();
        });

//        $(".modal").click(function (event) {
//            var modal_content = $(".modal-content").find("*");
//            var target = $(event.target);
//            if (!target.is(modal_content)) {
//                $(this).hide();
//            }
//        });
    }
});





