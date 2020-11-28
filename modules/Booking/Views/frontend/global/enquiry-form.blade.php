<div class="modal fade" tabindex="-1" role="dialog" id="enquiry_form_modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content enquiry_form_modal_form">
            <div class="modal-header">
                <h5 class="modal-title">{{__("Enquiry")}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="service_id" value="{{$row->id}}">
                <input type="hidden" name="service_type" value="{{$service_type ?? ''}}">
                <div class="form-group" >
                    <input type="text" class="form-control" name="enquiry_name" placeholder="{{ __("Name *") }}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="enquiry_email" placeholder="{{ __("Email *") }}">
                </div>
                <div class="form-group" v-if="!enquiry_is_submit">
                    <input type="text" class="form-control" name="enquiry_phone" placeholder="{{ __("Phone") }}">
                </div>
                <div class="form-group" v-if="!enquiry_is_submit">
                    <textarea class="form-control" placeholder="{{ __("Note") }}" name="enquiry_note"></textarea>
                </div>
                @if(setting_item("booking_enquiry_enable_recaptcha"))
                    <div class="form-group">
                        {{recaptcha_field('enquiry_form')}}
                    </div>
                @endif
                <div class="message_box"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                <button type="button" class="btn btn-primary btn-submit-enquiry">{{__("Send now")}}
                <i class="fa icon-loading fa-spinner fa-spin fa-fw" style="display: none"></i>
                </button>
            </div>
        </div>
    </div>
</div>
