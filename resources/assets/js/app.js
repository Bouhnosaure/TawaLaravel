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
            var service = new google.maps.places.AutocompleteService();
            $("#" + element).tagEditor({
                autocomplete: {
                    source: function (req, callback) {
                        if (req.term.length > 2) {
                            service.getQueryPredictions({input: req.term}, function (predictions, status) {
                                callback($.map(predictions, function ($val, $i) {
                                    return $val.description;
                                }));
                            });
                        }
                    }
                },
                delimiter: '|'
            });
        },
        format_date_eventlist: function (element) {

            $('.' + element).each(function (index) {
                var date = moment($(this).text(), "d/m/Y - H:i").locale(this.lang);
                $(this).html(date.format("E[<span>]MMM[</span>]"));
                $(this).show();
            });
        },
        cropper_initialize: function (type) {
            var $image = $('#cropper-wrapper_' + type + ' > img');
            var cropBoxData = [];
            var canvasData = [];
            var $input = $("#image_profile_" + type);
            var $modal = $("#cropper-modal_" + type);
            var $submit = $("#cropper-submit_" + type);
            var $url = null;


            $input.change(function () {
                inputchange(this);
            });

            //get image from input
            function inputchange(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $url = e.target.result;
                    }
                    reader.readAsDataURL(input.files[0]);
                    delete reader;
                }
                $modal.modal('show');
            }

            //on submit
            $submit.click(function () {
                var datacrop = $image.cropper("getData");
                $("#crop_options_" + type).attr('value', JSON.stringify(datacrop));
                $("#form_image_" + type).trigger('submit');
            });

            $modal.on('shown.bs.modal', function () {
                $image.cropper("replace", $url);
                if (type == 'min') {
                    $image.cropper("setAspectRatio", 1);
                } else if (type == 'wide') {
                    $image.cropper("setAspectRatio", 19 / 5);
                }

                $image.cropper({
                    autoCropArea: 0.5,
                    built: function () {
                        // Strict mode: set crop box data first
                        $image.cropper('setCropBoxData', cropBoxData[type]);
                        $image.cropper('setCanvasData', canvasData[type]);
                    }
                });
            }).on('hidden.bs.modal', function () {
                cropBoxData[type] = $image.cropper('getCropBoxData');
                canvasData[type] = $image.cropper('getCanvasData');
                $("#crop_options_" + type).attr('value', '');
                $("#form_image_" + type).trigger('reset');
                $image.cropper('destroy');
            });

        }

    };

    return $.App;
}(jQuery));