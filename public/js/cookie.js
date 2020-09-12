jQuery(function ($) {

    $(document).on('click','.save-cookie',function () {
        var button = $(this);
        if(typeof save_cookie_url !='undefined'){
            $.ajax({
                'url': save_cookie_url,
                'type': 'GET',
                success: function (data) {
                    button.closest('.booking_cookie_agreement').remove();
                },
                error:function (e) {
                }
            });

        }

    })
});
