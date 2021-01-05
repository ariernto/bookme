import BookingCoreAdaterPlugin from './ckeditor/uploadAdapter'

(function ($) {

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

        // ClassicEditor
        //     .create( els[0],{
        //         extraPlugins: [ BookingCoreAdaterPlugin ],
        //     })
        //     .catch( error => {
        //         console.error( error );
        //     } );

        var id = $(this).attr('id');

        if(!id){
            id = makeid(10);
            $(this).attr('id',id);
        }
        var h  = els.data('height');
        if(!h && typeof h =='undefined') h = 300;

        var remove_script_host = true;
        if($(this).attr("data-fullurl") === "true"){
            remove_script_host = false;
        }


        // CKEDITOR.replace( id );
        tinymce.init({
            selector:'#'+id,
            plugins: 'preview searchreplace autolink code fullscreen image link media codesample table charmap hr toc advlist lists wordcount textpattern help pagebreak hr',
            toolbar: 'formatselect | bold italic strikethrough forecolor backcolor permanentpen formatpainter | link image media | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | pagebreak codesample code | removeformat',
            image_advtab: false,
            image_caption: false,
            toolbar_drawer: 'sliding',
            relative_urls : false,
            remove_script_host : remove_script_host,
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
                            console.log(files);
                            if(files.length)
                            callback(files[0].full_size);
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

    $(document).on('click','.dungdt-upload-box-normal .btn-field-upload,.dungdt-upload-box-normal .attach-demo',function () {
        let p = $(this).closest('.dungdt-upload-box');

        uploaderModal.show({
            multiple:false,
            file_type:'image',
            onSelect:function (files) {
                p.addClass('active');
                p.find('.attach-demo').html('<img src="'+files[0].thumb_size+'"/>');
                p.find('input').val(files[0].id);
            },
        });

    });

    $(document).on('click','.dungdt-upload-box-normal .delete',function (e) {
        e.preventDefault();
        let p = $(this).closest('.dungdt-upload-box');
        p.find("input").attr('value','')
        p.removeClass("active");
    });

    $('.dungdt-upload-multiple').find('.btn-field-upload').click(function () {
        let p = $(this).closest('.dungdt-upload-multiple');

        uploaderModal.show({
            multiple:true,
            file_type:'image',
            onSelect:function (files) {
                console.log(files);
                if(typeof files !='undefined' && files.length)
                {
                    var ids = [];
                    var html = '';
                    p.addClass('active');

                    for(var i = 0 ; i < files.length; i++){
                        ids.push(files[i].id);
                        html+='<div class="image-item"><div class="inner"><span class="delete btn btn-sm btn-danger"><i class="fa fa-trash"></i></span><img src="'+files[i].thumb_size+'"/></div></div>'
                    }
                    p.find('.attach-demo').append(html);
                    var old = p.find('input').val().split(',');
                    p.find('input').val(ids.concat(old).join(','));
                }

            },
        });

    });

    $('.dungdt-upload-multiple').on('click','.image-item .delete',function () {
        var i = $(this).closest('.image-item').index();
        let p = $(this).closest('.dungdt-upload-multiple');
        var ids = p.find('input').val().split(',');

        ids.splice(i,1);

        p.find('input').val(ids.join(','));
        $(this).closest('.image-item').remove();

    });

    $('.open-edit-input').click(function () {
        $(this).replaceWith('<input type="text" name="'+$(this).data('name')+'" value="'+$(this).html()+'">');
    })

    $(document).ready(function () {
        $('.dungdt-select2-field').each(function () {
            var configs = $(this).data('options');
            $(this).select2(configs);
        })
    });

    $(".form-group-item").each(function () {
        let container = $(this);
        $(this).on('click','.btn-remove-item',function () {
            $(this).closest(".item").remove();
        });
        $(this).on('press','input,select',function () {
            let value = $(this).val();
            $(this).attr("value",value);
        });
    });
    $(".form-group-item .btn-add-item").click(function () {
        var p = $(this).closest(".form-group-item").find(".g-items");

        let number = $(this).closest(".form-group-item").find(".g-items .item:last-child").data("number");
        if(number === undefined) number = 0;
        else number++;
        let extra_html = $(this).closest(".form-group-item").find(".g-more").html();
        extra_html = extra_html.replace(/__name__=/gi, "name=");
        extra_html = extra_html.replace(/__number__/gi, number);
        p.append(extra_html);

        if(extra_html.indexOf('dungdt-select2-field-lazy') >0 ){

            p.find('.dungdt-select2-field-lazy').each(function () {
                var configs = $(this).data('options');
                $(this).select2(configs);
            });
        }
    });


    $('table .check-all').change(function () {
        if($(this).is(':checked'))
        {
            $(this).closest('table').find('tbody .check-item').prop('checked',true);
        }else{
            $(this).closest('table').find('tbody .check-item').prop('checked',false);

        }
    });

    $('.dungdt-apply-form-btn').click(function (e) {
        var $this = $(this);
        var action = $this.closest('form').find('[name=action]').val();
        var apply_action = function () {
            let ids = '';
            $(".bravo-form-item .check-item").each(function () {
                if($(this).is(":checked")){
                    ids += '<input type="hidden" name="ids[]" value="'+$(this).val()+'">';
                }
            });
            $this.closest('form').append(ids).submit();
        }
        if(action === 'delete')
        {
            bookingCoreApp.showConfirm({
                message: i18n.confirm_delete,
                callback: function(result){
                    if(result){
                        apply_action();
                    }
                }
            })
        }else if(action === 'recovery')
        {
            bookingCoreApp.showConfirm({
                message: i18n.confirm_recovery,
                callback: function(result){
                    if(result){
                        apply_action();
                    }
                }
            })
        }else{
            apply_action();
        }
    });

    $('.dungdt-input-flag-icon').change(function () {
        $(this).closest('.input-group').find('.flag-icon').attr('class','').addClass('flag-icon flag-icon-'+$(this).val());
    });

    $('.dungdt_input_locale').change(function () {

    })

    $('.tag-input').keypress(function (e) {
        // console.log(e);

        if(e.keyCode == 13){
            var val = $(this).val();

            if(val){
                var html = '<span class="tag_item">' + val +
                    '       <span data-role="remove"></span>\n' +
                    '                                                    <input type="hidden" name="tag_name[]" value="'+val+'">\n' +
                    '                                                </span>';

                $(this).parent().find('.show_tags').append(html);
                $(this).val('');
            }
            e.preventDefault();
            return false;
        }
    });

    $(document).on('click','[data-role=remove]',function () {
        $(this).closest('.tag_item').remove();
    });

    // Form validation
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });

})(jQuery);
