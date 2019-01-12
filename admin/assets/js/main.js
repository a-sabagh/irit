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
    if (typeof RELATED !== "undefined") {
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
        console.log(RELATED);
        $(".rng-related-posts").select2({
        
            minimumInputLength: 3,
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
});



