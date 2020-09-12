$('.bravo-form-register-vendor [type=submit]').click(function (e) {
    e.preventDefault();
    let form = $(this).closest('.bravo-form-register-vendor');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': form.find('meta[name="csrf-token"]').attr('content')
        }
    });
    var url = form.attr('action');
    $.ajax({
        'url': url,
        'data': {
            'email': form.find('input[name=email]').val(),
            'password': form.find('input[name=password]').val(),
            'first_name': form.find('input[name=first_name]').val(),
            'last_name': form.find('input[name=last_name]').val(),
            'business_name': form.find('input[name=business_name]').val(),
            'phone': form.find('input[name=phone]').val(),
            'term': form.find('input[name=term]').is(":checked") ? 1 : '',
            'g-recaptcha-response': form.find('[name=g-recaptcha-response]').val(),
        },
        'type': 'POST',
        beforeSend: function () {
            form.find('.error').hide();
            form.find('.icon-loading').css("display", 'inline-block');
            form.find('.message-error').hide();
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
            if(data.status){
                if(data.message){
					form.find('.message-error').show().html('<div class="alert alert-success">' + data.message + '</div>');
				}
				if (typeof data.redirect !== 'undefined') {
					window.setTimeout(function () {
						window.location.href = data.redirect;
					},5000);
					return;
				}
            }

			if(data.redirect){
				window.location.href = data.redirect;
				return;
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
