/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */
try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    window.Vue = require('vue');

    require('bootstrap');
    window.bootbox = require('bootbox');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

} catch (e) {
    console.log(e);
}

//window.ClassicEditor = require('../../ckeditor');
// window.ClassicEditor = require('@ckeditor/ckeditor5-build-classic');
// console.log(ClassicEditor);
// console.log(ClassicEditor);
require('../../module/media/admin/js/browser');
require('./_condition');
require('./_base');
require('./_form');
require('./_menu');
require('./_notification');


import TemplateDetail from '../../module/template/admin/detail.js';
import MediaManagement from '../../module/media/admin/js/media-management';

// Template
if(document.getElementById('media-management')){
    MediaManagement();
}

// Template
if(document.getElementById('booking-core-template-detail')){
    TemplateDetail();
}

$(document).on('hidden.bs.modal', '.modal', function () {
    $('.modal:visible').length && $(document.body).addClass('modal-open');
});

window.bookingCoreApp ={
    showSuccess:function (configs){
        var args = {};
        if(typeof configs == 'object')
        {
            args = configs;
        }else{
            args.message = configs;
        }
        if(!args.title){
            args.title = i18n.success;
        }
        args.centerVertical = true;
        bootbox.alert(args);
    },
    showError:function (configs) {
        var args = {};
        if(typeof configs == 'object')
        {
            args = configs;
        }else{
            args.message = configs;
        }
        if(!args.title){
            args.title = i18n.warning;
        }
        args.centerVertical = true;
        bootbox.alert(args);
    },
    showAjaxError:function (e) {
        if(typeof e.responseJSON !='undefined' && e.responseJSON.message){
            return this.showError(e.responseJSON.message);
        }
        if(e.responseText){
            return this.showError(e.responseText);
        }
    },
    showAjaxMessage:function (json) {
       if(json.message)
       {
           if(json.status){
               this.showSuccess(json);
           }else{
               this.showError(json);
           }
       }
    },
    showConfirm:function (configs) {
        var args = {};
        if(typeof configs == 'object')
        {
            args = configs;
        }
        args.buttons = {
            confirm: {
                label: '<i class="fa fa-check"></i> '+i18n.confirm,
            },
            cancel: {
                label: '<i class="fa fa-times"></i> '+i18n.cancel,
            }
        }
        args.centerVertical = true;
        bootbox.confirm(args);
    },
};
