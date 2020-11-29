/*import BookingCoreAdaterPlugin from "../../../../resources/admin/js/ckeditor/uploadAdapter";*/

jQuery(function ($) {
    //Input group image select
    $('.upload-btn-wrapper').each(function () {
        var container = $(this);
        $(document).on('change', '.btn-file :file', function (event) {
            var files = event.target.files;
            var input = $(this);
            var formData = new FormData();
            $.each(files, function (key, value) {
                formData.append('file', value);
            });
            formData.append('type', "image");
            $.ajax({
                url: '/admin/module/media/store',
                type: 'POST',
                data: formData,
                enctype: 'multipart/form-data',
                beforeSend: function () {
                    input.trigger("bravo-file-before-update")
                },
                success: function (data) {
                    if (data.status === 1) {
                        input.trigger("bravo-file-update-success", data)
                    } else {
                        input.trigger("bravo-file-update-error", data.message)
                    }
                },
                error: function (xhr) {
                    input.trigger("bravo-file-update-error")
                },
                complete: function () {
                    input.trigger("bravo-file-update-complete")
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
        container.find('.btn-file :file').on('bravo-file-update-success', function (event, data) {
            console.log(data);
            container.find("input[type=hidden]").attr('value', data.data.id);
            container.find(".image-demo").attr('src', data.data.sizes.default);
            container.find(".text-view").attr('value', data.data.sizes.default);
        });
        container.find('.btn-file :file').on('bravo-file-before-update', function () {
            container.find(".text-view").attr('value', container.find(".text-view").data("loading"));
        });
        container.find('.btn-file :file').on('bravo-file-update-error', function (event, message) {
            if (message.length > 0) {
                container.find(".text-view").attr('value', message);
            } else {
                container.find(".text-view").attr('value', container.find(".text-view").data("error"));
            }
        });
    });
    $(".form-group-item").each(function () {
        let container = $(this);
        $(this).on('click', '.btn-remove-item', function () {
            $(this).closest(".item").remove();
        });
        $(this).on('press', 'input,select', function () {
            let value = $(this).val();
            $(this).attr("value", value);
        });
    });
    $(".form-group-item .btn-add-item").click(function () {
        let number = $(this).closest(".form-group-item").find(".g-items .item:last-child").data("number");
        if (number === undefined) number = 0;
        else number++;
        let extra_html = $(this).closest(".form-group-item").find(".g-more").html();
        extra_html = extra_html.replace(/__name__=/gi, "name=");
        extra_html = extra_html.replace(/__number__/gi, number);
        $(this).closest(".form-group-item").find(".g-items").append(extra_html);
    });

    $(document).on('click','.dungdt-upload-box-normal .btn-field-upload,.dungdt-upload-box-normal .attach-demo',function () {
        let p = $(this).closest('.dungdt-upload-box');

        uploaderModal.show({
            multiple: false,
            file_type: 'image',
            onSelect: function (files) {
                p.addClass('active');
                p.find('.attach-demo').html('<img src="' + files[0].thumb_size + '"/>');
                p.find('input').val(files[0].id);
            },
        });

    });
    $('.dungdt-upload-box-normal .delete').click(function (e) {
        e.preventDefault();
        let p = $(this).closest('.dungdt-upload-box');
        p.find("input").attr('value','')
        p.removeClass("active");
    });
    $('.dungdt-upload-multiple').find('.btn-field-upload').click(function () {
        let p = $(this).closest('.dungdt-upload-multiple');
        uploaderModal.show({
            multiple: true,
            file_type: 'image',
            onSelect: function (files) {
                console.log(files);
                if (typeof files != 'undefined' && files.length) {
                    var ids = [];
                    var html = '';
                    p.addClass('active');

                    for (var i = 0; i < files.length; i++) {
                        ids.push(files[i].id);
                        html += '<div class="image-item"><div class="inner"><span class="delete btn btn-sm btn-danger"><i class="fa fa-trash"></i></span><img src="' + files[i].thumb_size + '"/></div></div>'
                    }
                    p.find('.attach-demo').append(html);
                    var old = p.find('input').val().split(',');
                    p.find('input').val(ids.concat(old).join(','));
                }

            },
        });
    });
    $('.dungdt-upload-multiple').on('click', '.image-item .delete', function () {
        var i = $(this).closest('.image-item').index();
        let p = $(this).closest('.dungdt-upload-multiple');
        var ids = p.find('input').val().split(',');
        ids.splice(i, 1);
        p.find('input').val(ids.join(','));
        $(this).closest('.image-item').remove();
    });
    $(".bravo_user_profile .sidebar-menu .caret").click(function () {
        $(this).closest("li").toggleClass("active_child");
    });

    $(".bravo_user_profile .bravo-list-item .control-action .btn-danger").click(function () {
        var c = confirm($(this).data('confirm'));
        if(!c){
            return false;
        }
    });

    $(".bravo_user_profile .bravo-list-item .control-action .btn-recovery").click(function () {
        var c = confirm($(this).data('confirm'));
        if(!c){
            return false;
        }
    });

    function makeid(length) {
        var result           = '';
        var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for ( var i = 0; i < length; i++ ) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
        return result;
    }
    // Form Configs
    $('.has-ckeditor').each(function () {
        var els  = $(this);

        var id = $(this).attr('id');

        if(!id){
            id = makeid(10);
            $(this).attr('id',id);
        }
        var h  = els.data('height');
        if(!h && typeof h =='undefined') h = 300;

        // CKEDITOR.replace( id );
        tinymce.init({
            selector:'#'+id,
            plugins: 'preview searchreplace autolink code fullscreen image link media codesample table charmap hr toc advlist lists wordcount imagetools textpattern help pagebreak hr',
            toolbar: 'formatselect | bold italic strikethrough forecolor backcolor permanentpen formatpainter | link image media | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | pagebreak codesample code| removeformat',
            image_advtab: true,
            image_caption: true,
            toolbar_drawer: 'sliding',
            relative_urls : false,
            height:h,
            file_picker_callback: function (callback, value, meta) {
                /* Provide file and text for the link dialog */
                if (meta.filetype === 'file') {
                    uploaderModal.show({
                        multiple:false,
                        file_type:'video',
                        onSelect:function (files) {
                            if(files.length)
                                callback(bookingCore.url+'/media/preview/'+files[0].id);
                        },
                    });
                }

                /* Provide image and alt text for the image dialog */
                if (meta.filetype === 'image') {
                    uploaderModal.show({
                        multiple:false,
                        file_type:'image',
                        onSelect:function (files) {
                            if(files.length)
                                callback(files[0].thumb_size);
                        },
                    });
                }

                /* Provide alternative source and posted for the media dialog */
                if (meta.filetype === 'media') {
                    uploaderModal.show({
                        multiple:false,
                        file_type:'video',
                        onSelect:function (files) {
                            if(files.length)
                                callback(bookingCore.url+'/media/preview/'+files[0].id);
                        },
                    });
                }
            },
        });

    });


    $(".bravo_user_profile .sidebar-menu .active_child").each(function () {
        $(this).closest('.has-children').addClass('active_child').addClass('active');
    });

    $('.form-add-service .nav-tabs a').click(function () {
        setTimeout(function () {
            window.dispatchEvent(new Event('resize'));
        },200)
    });

    $('.btn-upload-private-file').change(function () {
        var me = $(this);
        var p = $(this).closest('.btn-upload-private-wrap');
        var lists = p.find('.private-file-lists');

        me.isLoading = true;
        for(var i = 0 ;i < me.get(0).files.length ; i++) {
            var d = new FormData();
            d.append('file',me.get(0).files[i]);
            $.ajax({
                url: bookingCore.url + '/media/private/store',
                data: d,
                dataType: 'json',
                type: 'post',
                contentType: false,
                processData: false,
                success: function (res) {
                    me.val('');
                    if (res.status === 0) {
                        bookingCoreApp.showError(res);
                    }
                    if (res.data) {
                        var div = $('<div/>');
                        var input = $("<input/>");
                        input.attr('type', 'hidden');
                        input.attr('name', me.data('name'));
                        input.val(JSON.stringify(res.data));

                        div.append(input);
                        div.append("<a target='_blank' href='" + res.data.download + "'> " + res.data.name + '.' + res.data.file_extension + " <i class=\"fa fa-download\"></i> </a>");

                        if (me.data('multiple')) {
                            lists.append(div);
                        } else {
                            lists.html(div);
                        }
                    }
                },
                error: function (e) {
                    bookingCoreApp.showAjaxError(e);
                    me.val('');
                }
            })
        }
    })
});

var vendorPayout = {
    saveAccounts:function (btn) {
        var parent = $(btn).closest('.bravo-form');
        parent.addClass('loading');

        $.ajax({
            url:bookingCore.url+'/vendor/storePayoutAccounts',
            method:"post",
            data:parent.find('input,select,textarea').serialize(),
            dataType:'json',
            success:function (json) {
                parent.removeClass('loading');
                if(json.message){
                    bookingCoreApp.showSuccess(json.message);
                }
                if(json.status){
                    window.setTimeout(function () {
                        window.location.reload();
                    },2000);
                }
            },
            error:function (e) {
                console.log(e);
                parent.removeClass('loading');
                bookingCoreApp.showAjaxError(e);
            }
        })
    },
    sendRequest:function (btn) {
        var parent = $(btn).closest('.modal');
        var form = parent.find('form');
        form.removeClass('was-validated');

        if(form[0].checkValidity() === false){
            form.addClass('was-validated');
            return false;
        }

        parent.addClass('loading');

        $.ajax({
            url:bookingCore.url+'/vendor/createPayoutRequest',
            method:"post",
            data:form.find('input,select,textarea').serialize(),
            dataType:'json',
            success:function (json) {
                parent.removeClass('loading');
                if(json.message){
                    bookingCoreApp.showSuccess(json.message);
                }
                if(json.status){
                    window.setTimeout(function () {
                        window.location.reload();
                    },3000);
                }
            },
            error:function (e) {
                console.log(e);
                parent.removeClass('loading');
                bookingCoreApp.showAjaxError(e);
            }
        })
    }


};
