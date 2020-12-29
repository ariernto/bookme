jQuery(function ($) {
    $.fn.bravoAutocomplete = function (options) {
        return this.each(function () {
            var $this = $(this);
            var main = $(this).closest(".smart-search");
            var textLoading = options.textLoading;
            main.append('<div class="bravo-autocomplete on-message"><div class="list-item"></div><div class="message">'+textLoading+'</div></div>');
            $(document).on("click.Bst", function(event){
                if (main.has(event.target).length === 0 && !main.is(event.target)) {
                    main.find('.bravo-autocomplete').removeClass('show');
                } else {
                    if (options.dataDefault.length > 0) {
                        main.find('.bravo-autocomplete').addClass('show');
                    }
                }
            });
            if (options.dataDefault.length > 0) {
                var items = '';
                for (var index in options.dataDefault) {
                    var item = options.dataDefault[index];
                    items += '<div class="item" data-id="' + item.id + '" data-text="' + item.title + '"> <i class="'+options.iconItem+'"></i> ' + item.title + ' </div>';
                }
                main.find('.bravo-autocomplete .list-item').html(items);
                main.find('.bravo-autocomplete').removeClass("on-message");
            }
            var requestTimeLimit;
            if(typeof options.url !='undefined' && options.url) {
                $this.keyup(function () {
                    main.find('.bravo-autocomplete').addClass("on-message");
                    main.find('.bravo-autocomplete .message').html(textLoading);
                    main.find('.child_id').val("");
                    var query = $(this).val();
                    clearTimeout(requestTimeLimit);
                    if (query.length === 0) {
                        if (options.dataDefault.length > 0) {
                            var items = '';
                            for (var index in options.dataDefault) {
                                var item = options.dataDefault[index];
                                items += '<div class="item" data-id="' + item.id + '" data-text="' + item.title + '"> <i class="' + options.iconItem + '"></i> ' + item.title + ' </div>';
                            }
                            main.find('.bravo-autocomplete .list-item').html(items);
                            main.find('.bravo-autocomplete').removeClass("on-message");
                        } else {
                            main.find('.bravo-autocomplete').removeClass('show');
                        }
                        return;
                    }
                    requestTimeLimit = setTimeout(function () {
                        $.ajax({
                            url: options.url,
                            data: {
                                search: query,
                            },
                            dataType: 'json',
                            type: 'get',
                            beforeSend: function () {
                            },
                            success: function (res) {
                                if (res.status === 1) {
                                    var items = '';
                                    for (var ix in res.data) {
                                        var item = res.data[ix];
                                        items += '<div class="item" data-id="' + item.id + '" data-text="' + item.title + '"> <i class="' + options.iconItem + '"></i> ' + get_highlight(item.title, query) + ' </div>';
                                    }
                                    main.find('.bravo-autocomplete .list-item').html(items);
                                    main.find('.bravo-autocomplete').removeClass("on-message");
                                }
                                if ( typeof res.message === undefined) {
                                    main.find('.bravo-autocomplete').addClass("on-message");
                                }else{
                                    main.find('.bravo-autocomplete .message').html(res.message);
                                }
                            }
                        })
                    }, 700);

                    function get_highlight(text, val) {
                        return text.replace(
                            new RegExp(val + '(?!([^<]+)?>)', 'gi'),
                            '<span class="h-line">$&</span>'
                        );
                    }

                    main.find('.bravo-autocomplete').addClass('show');
                });
            }
            main.find('.bravo-autocomplete').on('click','.item',function () {
                var id = $(this).attr('data-id'),
                    text = $(this).attr('data-text');
                if(id.length > 0 && text.length > 0){
                    text = text.replace(/-/g, "");
                    //text = text.substring(1);
                    text = trimFunc(text,' ');
                    text = trimFunc(text,'-');
                    main.find('.parent_text').val(text).trigger("change");
                    main.find('.child_id').val(id).trigger("change");
                }else{
                    console.log("Cannot select!")
                }
                setTimeout(function () {
                    main.find('.bravo-autocomplete').removeClass('show');
                },100);
            });

            var trimFunc = function (s, c) {
                if (c === "]") c = "\\]";
                if (c === "\\") c = "\\\\";
                return s.replace(new RegExp(
                    "^[" + c + "]+|[" + c + "]+$", "g"
                ), "");
            }
        });
    };
});

jQuery(function ($) {
    function parseErrorMessage(e){
        var html = '';
        if(e.responseJSON){
            if(e.responseJSON.errors){
                return Object.values(e.responseJSON.errors).join('<br>');
            }
        }
        return html;
    }
    $(".g-map-place").each(function () {
        var map = $(this).find('.map').attr('id');
        var searchInput =  $(this).find('input[name=map_place]');
        var latInput = $(this).find('input[name="map_lat"]');
        var lgnInput = $(this).find('input[name="map_lgn"]');
        new BravoMapEngine(map, {
            fitBounds: true,
            center: [ 51.505, -0.09],
            ready: function (engineMap) {
            engineMap.searchBox(searchInput,function (dataLatLng) {
                latInput.attr("value", dataLatLng[0]);
                lgnInput.attr("value", dataLatLng[1]);
            });
        }
    });

    });
    $(".bravo-list-tour").each(function () {
        $(this).find(".owl-carousel").owlCarousel({
            items: 4,
            loop: false,
            margin: 15,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
        })
    });

    $(".bravo-list-space").each(function () {
        $(this).find(".owl-carousel").owlCarousel({
            items: 3,
            loop: false,
            margin: 15,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        })
    });

    $(".bravo-list-hotel").each(function () {
        $(this).find(".owl-carousel").owlCarousel({
            items: 4,
            loop: false,
            margin: 15,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
        })
    });

    $(".bravo-list-car").each(function () {
        $(this).find(".owl-carousel").owlCarousel({
            items: 4,
            loop: false,
            margin: 15,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
        })
    });

    $(".bravo_fullHeight").each(function () {
        var height = $(document).height();
        if ($(document).find(".bravo-admin-bar").length > 0) {
            height = height - $(".bravo-admin-bar").height();
        }
        $(this).css('min-height', height);
    });

    // Date Picker Range
    $('.form-date-search').each(function () {
        var nowDate = new Date();
        var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);
        var parent = $(this),
            date_wrapper = $('.date-wrapper', parent),
            check_in_input = $('.check-in-input', parent),
            check_out_input = $('.check-out-input', parent),
            check_in_out = $('.check-in-out', parent),
            check_in_render = $('.check-in-render', parent),
            check_out_render = $('.check-out-render', parent);
        var options = {
            singleDatePicker: false,
            autoApply: true,
            disabledPast: true,
            customClass: '',
            widthSingle: 300,
            onlyShowCurrentMonth: true,
            minDate: today,
            opens: bookingCore.rtl ? 'right':'left',
            locale: {
                format: "YYYY-MM-DD",
                direction: bookingCore.rtl ? 'rtl':'ltr',
                firstDay:daterangepickerLocale.first_day_of_week
            }
        };
        if (typeof  daterangepickerLocale == 'object') {
            options.locale = _.merge(daterangepickerLocale,options.locale);
        }
        check_in_out.daterangepicker(options,
            function (start, end, label) {
                check_in_input.val(start.format(bookingCore.date_format));
                check_in_render.html(start.format(bookingCore.date_format));
                check_out_input.val(end.format(bookingCore.date_format));
                check_out_render.html(end.format(bookingCore.date_format));
            });
        date_wrapper.click(function (e) {
            check_in_out.trigger('click');
        });
    });

    // Date Picker
    $('.date-picker').each(function () {
        var options = {
            "singleDatePicker": true,
            opens: bookingCore.rtl ? 'right':'left',
            locale: {
                format: bookingCore.date_format,
                direction: bookingCore.rtl ? 'rtl':'ltr',
                firstDay:daterangepickerLocale.first_day_of_week
            }
        };
        if (typeof  daterangepickerLocale == 'object') {
            options.locale = _.merge(daterangepickerLocale,options.locale);
        }
        $(this).daterangepicker(options);
    });

    // Date Picker Range for hotel
    $('.form-date-search-hotel').each(function () {
        var nowDate = new Date();
        var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);
        var parent = $(this),
            date_wrapper = $('.date-wrapper', parent),
            check_in_input = $('.check-in-input', parent),
            check_out_input = $('.check-out-input', parent),
            check_in_out = $('.check-in-out', parent),
            check_in_render = $('.check-in-render', parent),
            check_out_render = $('.check-out-render', parent);
        var options = {
            singleDatePicker: false,
            autoApply: true,
            disabledPast: true,
            customClass: '',
            widthSingle: 300,
            onlyShowCurrentMonth: true,
            minDate: today,
            opens: bookingCore.rtl ? 'right':'left',
            locale: {
                format: "YYYY-MM-DD",
                direction: bookingCore.rtl ? 'rtl':'ltr',
                firstDay:daterangepickerLocale.first_day_of_week
            }
        };

        if (typeof  daterangepickerLocale == 'object') {
            options.locale = _.merge(daterangepickerLocale,options.locale);
        }
        check_in_out.daterangepicker(options).on('apply.daterangepicker',
            function (ev, picker) {
                if (picker.endDate.diff(picker.startDate, 'day') <= 0) {
                    picker.endDate.add(1, 'day');
                }
                check_in_input.val( picker.startDate.format(bookingCore.date_format) );
                check_in_render.html( picker.startDate.format(bookingCore.date_format) );
                check_out_input.val( picker.endDate.format(bookingCore.date_format) );
                check_out_render.html( picker.endDate.format(bookingCore.date_format) );
                check_in_out.val( picker.startDate.format("YYYY-MM-DD") + " - "+  picker.endDate.format("YYYY-MM-DD") )
            });
        date_wrapper.click(function (e) {
            check_in_out.trigger('click');
        });
    });

    //Review
    $('.review-form .review-items .rates .fa').each(function () {
        var list = $(this).parent(),
            listItems = list.children(),
            itemIndex = $(this).index(),
            parentItem = list.parent();
        $(this).hover(function () {
            for (var i = 0; i < listItems.length; i++) {
                if (i <= itemIndex) {
                    $(listItems[i]).addClass('hovered');
                } else {
                    break;
                }
            }
            $(this).click(function () {
                for (var i = 0; i < listItems.length; i++) {
                    if (i <= itemIndex) {
                        $(listItems[i]).addClass('selected');
                    } else {
                        $(listItems[i]).removeClass('selected');
                    }
                }
                parentItem.children('.review_stats').val(itemIndex + 1);
            });
        }, function () {
            listItems.removeClass('hovered');
        });
    });

    //Login
    $('.bravo-form-login [type=submit]').click(function (e) {
        e.preventDefault();
        let form = $(this).closest('.bravo-form-login');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': form.find('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            'url': bookingCore.routes.login,
            'data': {
                'email': form.find('input[name=email]').val(),
                'password': form.find('input[name=password]').val(),
                'remember': form.find('input[name=remember]').is(":checked") ? 1 : '',
                'g-recaptcha-response': form.find('[name=g-recaptcha-response]').val(),
                'redirect':form.find('input[name=redirect]').val()
            },
            'type': 'POST',
            beforeSend: function () {
                form.find('.error').hide();
                form.find('.icon-loading').css("display", 'inline-block');
            },
            success: function (data) {
                form.find('.icon-loading').hide();
                if (data.error === true) {
                    if (data.messages !== undefined) {
                        for(var item in data.messages) {
                            var msg = data.messages[item];
                            form.find('.error-'+item).show().text(msg[0]);
                        }
                    }
                    if (data.messages.message_error !== undefined) {
                        form.find('.message-error').show().html('<div class="alert alert-danger">' + data.messages.message_error[0] + '</div>');
                    }
                }
                if (typeof data.redirect !== 'undefined' && data.redirect) {
                    window.location.href = data.redirect
                }
            }
        });
    })
    $('.bravo-form-register [type=submit]').click(function (e) {
        e.preventDefault();
        let form = $(this).closest('.bravo-form-register');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': form.find('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            'url':  bookingCore.routes.register,
            'data': {
                'email': form.find('input[name=email]').val(),
                'password': form.find('input[name=password]').val(),
                'first_name': form.find('input[name=first_name]').val(),
                'last_name': form.find('input[name=last_name]').val(),
                'phone': form.find('input[name=phone]').val(),
                'term': form.find('input[name=term]').is(":checked") ? 1 : '',
                'g-recaptcha-response': form.find('[name=g-recaptcha-response]').val(),
            },
            'type': 'POST',
            beforeSend: function () {
                form.find('.error').hide();
                form.find('.icon-loading').css("display", 'inline-block');
            },
            success: function (data) {
                form.find('.icon-loading').hide();
                if (data.error === true) {
                    if (data.messages !== undefined) {
                        for(var item in data.messages) {
                            var msg = data.messages[item];
                            form.find('.error-'+item).show().text(msg[0]);
                        }
                    }
                    if (data.messages.message_error !== undefined) {
                        form.find('.message-error').show().html('<div class="alert alert-danger">' + data.messages.message_error[0] + '</div>');
                    }
                }
                if (data.redirect !== undefined) {
                    window.location.href = data.redirect
                }
            },
            error:function (e) {
                form.find('.icon-loading').hide();
                if(typeof e.responseJSON !== "undefined" && typeof e.responseJSON.message !='undefined'){
                    form.find('.message-error').show().html('<div class="alert alert-danger">' + e.responseJSON.message + '</div>');
                }
            }
        });
    })
    $('#register').on('show.bs.modal', function (event) {
        $('#login').modal('hide')
    })
    $('#login').on('show.bs.modal', function (event) {
        $('#register').modal('hide')
    });

    var onSubmitSubscribe = false;
    //Subscribe box
    $('.bravo-subscribe-form').submit(function (e) {
        e.preventDefault();

        if (onSubmitSubscribe) return;

        $(this).addClass('loading');
        var me = $(this);
        me.find('.form-mess').html('');

        $.ajax({
            url: me.attr('action'),
            type: 'post',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (json) {
                onSubmitSubscribe = false;
                me.removeClass('loading');

                if (json.message) {
                    me.find('.form-mess').html('<span class="' + (json.status ? 'text-success' : 'text-danger') + '">' + json.message + '</span>');
                }

                if (json.status) {
                    me.find('input').val('');
                }

            },
            error: function (e) {
                console.log(e);
                onSubmitSubscribe = false;
                me.removeClass('loading');

                if(parseErrorMessage(e)){
                    me.find('.form-mess').html('<span class="text-danger">' + parseErrorMessage(e) + '</span>');
                }else
                if (e.responseText) {
                    me.find('.form-mess').html('<span class="text-danger">' + e.responseText + '</span>');
                }

            }
        });

        return false;
    });

    //Menu
    $(".bravo-more-menu").click(function () {
        $(this).trigger('bravo-trigger-menu-mobile');
    });
    $(".bravo-menu-mobile .b-close").click(function () {
        $(".bravo-more-menu").trigger('bravo-trigger-menu-mobile');
    });
    $(document).on("click",".bravo-effect-bg",function () {
        $(".bravo-more-menu").trigger('bravo-trigger-menu-mobile');
    })
    $(document).on("bravo-trigger-menu-mobile",".bravo-more-menu",function () {
        $(this).toggleClass('active');
        if($(this).hasClass('active')){
            $(".bravo-menu-mobile").addClass("active");
            $('body').css('overflow','hidden').append("<div class='bravo-effect-bg'></div>");
        }else{
            $(".bravo-menu-mobile").removeClass("active");
            $("body").css('overflow','initial').find(".bravo-effect-bg").remove();
        }
    });
    $(".bravo-menu-mobile .g-menu ul li .fa").click(function (e) {
        e.preventDefault();
        $(this).closest('li').toggleClass('active');
    });
    $(".bravo-menu-mobile").each(function () {
        var h_profile = $(this).find(".user-profile").height();
        var h1_main = $(window).height();
        $(this).find(".g-menu").css("max-height", h1_main - h_profile - 15);
    });

    $(".bravo-more-menu-user").click(function () {
        $(".bravo_user_profile > .container-fluid > .row > .col-md-3").addClass("active");
        $("body").css('overflow','hidden').append("<div class='bravo-effect-user-bg'></div>");
    });
    $(document).on("click",".bravo-effect-user-bg,.bravo-close-menu-user",function () {
        $(".bravo_user_profile > .container-fluid > .row > .col-md-3").removeClass("active");
        $('body').css('overflow','initial').find(".bravo-effect-user-bg").remove();
    })

    $('[data-toggle="tooltip"]').tooltip();

    $('.dropdown-toggle').dropdown();

    $('.select-guests-dropdown .btn-minus').click(function(e){
        e.stopPropagation();
        var parent = $(this).closest('.form-select-guests');
        var input = parent.find('.select-guests-dropdown [name='+$(this).data('input')+']');
        var min = parseInt(input.attr('min'));
        var old = parseInt(input.val());

        if(old <= min){
            return;
        }
        input.val(old-1);
        updateGuestCountText(parent);
    });

    $('.select-guests-dropdown .btn-add').click(function(e){
        e.stopPropagation();
        var parent = $(this).closest('.form-select-guests');
        var input = parent.find('.select-guests-dropdown [name='+$(this).data('input')+']');
        var max = parseInt(input.attr('max'));
        var old = parseInt(input.val());

        if(old >= max){
            return;
        }
        input.val(old+1);
        updateGuestCountText(parent);
    });

    $('.select-guests-dropdown input').keyup(function(e){
        var parent = $(this).closest('.form-select-guests');
        updateGuestCountText(parent);
    });
    $('.select-guests-dropdown input').change(function(e){
        var parent = $(this).closest('.form-select-guests');
        updateGuestCountText(parent);
    });

    function updateGuestCountText(parent){
        var adults = parseInt(parent.find('[name=adults]').val());
        var children = parseInt(parent.find('[name=children]').val());

        var adultsHtml = parent.find('.render .adults .multi').data('html');
        console.log(parent,adultsHtml);
        parent.find('.render .adults .multi').html(adultsHtml.replace(':count',adults));

        var childrenHtml = parent.find('.render .children .multi').data('html');
        parent.find('.render .children .multi').html(childrenHtml.replace(':count',children));
        if(adults > 1){
            parent.find('.render .adults .multi').removeClass('d-none');
            parent.find('.render .adults .one').addClass('d-none');
        }else{
            parent.find('.render .adults .multi').addClass('d-none');
            parent.find('.render .adults .one').removeClass('d-none');
        }

        if(children > 1){
            parent.find('.render .children .multi').removeClass('d-none');
            parent.find('.render .children .one').addClass('d-none');
        }else{
            parent.find('.render .children .multi').addClass('d-none');
            parent.find('.render .children .one').removeClass('d-none').html(parent.find('.render .children .one').data('html').replace(':count',children));
        }

    }

    $('.select-guests-dropdown .dropdown-item-row').click(function(e){
        e.stopPropagation();
    });

    $(".smart-search .smart-search-location").each(function () {
        var $this = $(this);
        var string_list = $this.attr('data-default');
        var default_list = [];
        if(string_list.length > 0){
            default_list = JSON.parse(string_list);
        }
        var options = {
            url: bookingCore.url+'/location/search/searchForSelect2',
            dataDefault: default_list,
            textLoading: $this.attr("data-onLoad"),
            iconItem: "icofont-location-pin",
        };
        $this.bravoAutocomplete(options);
    });

    $(".smart-search .smart-select").each(function () {
        var $this = $(this);
        var string_list = $this.attr('data-default');
        var default_list = [];
        if(string_list.length > 0){
            default_list = JSON.parse(string_list);
        }
        var options = {
            dataDefault: default_list,
            iconItem: "",
            textLoading: $this.attr("data-onLoad"),
        };
        $this.bravoAutocomplete(options);
    });

    $(document).on("click",".service-wishlist",function(){
        var $this = $(this);
        $.ajax({
            url:  bookingCore.url+'/user/wishlist',
            data: {
                object_id: $this.attr("data-id"),
                object_model: $this.attr("data-type"),
            },
            dataType: 'json',
            type: 'POST',
            beforeSend: function() {
                $this.addClass("loading");
            },
            success: function (res) {
                $this.attr('class',"service-wishlist "+res.class);
            },
            error:function (e) {
                if(e.status === 401){
                    $('#login').modal('show');
                }
            }
        })
    });

    $('.bravo-video-popup').click(function() {
        let video_url = $(this).data( "src" );
        let target = $(this).data( "target" );
        $(target).find(".bravo_embed_video").attr('src',video_url + "?autoplay=0&amp;modestbranding=1&amp;showinfo=0" );
        $(target).on('hidden.bs.modal', function () {
            $(target).find(".bravo_embed_video").attr('src',"" );
        });
    });


    var onSubmitContact = false;
    //Contact box
    $('.bravo-contact-block-form').submit(function (e) {
        e.preventDefault();
        if (onSubmitContact) return;
        $(this).addClass('loading');
        var me = $(this);
        me.find('.form-mess').html('');
        $.ajax({
            url: me.attr('action'),
            type: 'post',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (json) {
                onSubmitContact = false;
                me.removeClass('loading');
                if (json.message) {
                    me.find('.form-mess').html('<span class="' + (json.status ? 'text-success' : 'text-danger') + '">' + json.message + '</span>');
                }
                if (json.status) {
                    me.find('input').val('');
                    me.find('textarea').val('');
                }
            },
            error: function (e) {
                console.log(e);
                onSubmitContact = false;
                me.removeClass('loading');
                if(parseErrorMessage(e)){
                    me.find('.form-mess').html('<span class="text-danger">' + parseErrorMessage(e) + '</span>');
                }else
                if (e.responseText) {
                    me.find('.form-mess').html('<span class="text-danger">' + e.responseText + '</span>');
                }
            }
        });
        return false;
    });

    $('.btn-submit-enquiry').click(function (e) {

        e.preventDefault();
        let form = $(this).closest('.enquiry_form_modal_form');

        $.ajax({
            url:bookingCore.url+'/booking/addEnquiry',
            data:form.find('textarea,input,select').serialize(),
            dataType:'json',
            type:'post',
            beforeSend: function () {
                form.find('.message_box').html('').hide();
                form.find('.icon-loading').css("display", 'inline-block');
            },
            success:function(res){
                if(res.errors){
                    res.message = '';
                    for(var k in res.errors){
                        res.message += res.errors[k].join('<br>')+'<br>';
                    }
                }
                if(res.message)
                {
                    if(!res.status){
                        form.find('.message_box').append('<div class="text text-danger">'+res.message+'</div>').show();
                    }else{
                        form.find('.message_box').append('<div class="text text-success">'+res.message+'</div>').show();
                    }
                }

                form.find('.icon-loading').hide();

                if(res.status){
                    form.find('textarea,input,select').val('');
                }

                if(typeof BravoReCaptcha != "undefined"){
                    BravoReCaptcha.reset('enquiry_form');
                }
            },
            error:function (e) {
                if(typeof BravoReCaptcha != "undefined"){
                    BravoReCaptcha.reset('enquiry_form');
                }
                form.find('.icon-loading').hide();
            }
        })
    })
});



