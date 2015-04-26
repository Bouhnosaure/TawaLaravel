(function ($) { //an IIFE so safely alias jQuery to $
    $.App = function (lang) {
        this.lang = lang;
    };

    $.App.prototype = {
        datetimepicker_event: function () {
            $('#start_time').datetimepicker({
                format: 'd/m/Y - H:i',
                onShow: function (ct) {
                    this.setOptions({
                        minDate: 0,
                        maxDate: $('#end_time').val() ? $('#end_time').val() : false,
                        formatDate: 'd/m/Y - H:i'
                    })
                },
                timepicker: true,
                lang: this.lang
            });
            $('#end_time').datetimepicker({
                format: 'd/m/Y - H:i',
                onShow: function (ct) {
                    this.setOptions({
                        minDate: $('#start_time').val() ? $('#start_time').val() : false,
                        formatDate: 'd/m/Y - H:i'
                    })
                },
                timepicker: true,
                lang: this.lang
            });
        },
        googlemaps_autocomplete: function (target) {
            var input = document.getElementById(target);
            new google.maps.places.Autocomplete(input);
        },
        enable_flash_modal: function () {
            $('#flash-overlay-modal').modal();
        },
        enable_touchspin: function (element) {
            $("#" + element).TouchSpin({
                min: 1,
                max: 10
            });
        },
        enable_tageditor: function (element) {
            $("#" + element).tagEditor({});
        },
        format_date_eventlist: function (element) {

            $('.' + element).each(function (index) {
                var date = moment($(this).text(), "d/m/Y - H:i");
                $(this).html(date.format("E[<span>]MMM[</span>]"));
                $(this).show();
            });
        }

    };
}(jQuery));