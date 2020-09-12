@extends('layouts.user')
@section('content')
    <h2 class="title-bar">
        {{__("Update verification data")}}
    </h2>
    @include('admin.message')
    <div class="booking-history-manager">
        <form action="{{route("user.verification.store")}}" method="post">
            @csrf
            @foreach($fields as $field)
                @switch($field['type'])
                    @case("email")
                    @include('User::frontend.verification.fields.email')
                    @break
                    @case("phone")
                    @include('User::frontend.verification.fields.phone')
                    @break
                    @case("file")
                    @include('User::frontend.verification.fields.file')
                    @break
                    @case("multi_files")
                    @include('User::frontend.verification.fields.multi_files')
                    @break
                    @case('text')
                    @default
                    @include('User::frontend.verification.fields.text')
                    @break
                @endswitch
            @endforeach
            <hr>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-4">
                    <button class="btn btn-success"> <i class="fa fa-save"></i> {{__("Save changes")}} </button>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('footer')
    <!-- Modal -->
    <div class="modal fade" id="modalVerifyPhone" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Verify Phone')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" name="verified_phone_code" class="form-control" id="verified_phone_code">
                    <input type="hidden" name="verified_phone" class="form-control" id="verified_phone">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                    <button type="button" onclick="verifyPhone()" class="btn btn-primary">{{__('Verify')}}</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        var ajaxReady = 1;
        var phone ='';
        function sendCodeVerifyPhone(inputName,inputLabel) {
            if(ajaxReady==1){
                phone = $("input[name='"+inputName+"']").val();
    
                $.ajax({
                    url: '{{route('user.verification.phone.sendCode')}}',
                    data: {
                        phone: phone,
                        inputName: inputName,
                        inputLabel: inputLabel,
                        _token: "{{csrf_token()}}",
                    },
                    dataType: 'json',
                    type: 'post',
                    beforeSend: function (xhr) {
                        ajaxReady = 0;
                    },
                    success: function (res) {
                        if(res.status==1){
                            if(res.verified==1){
                                alert(res.message)
                            }
                            if(res.action=='openModalVerify'){
                                $("#modalVerifyPhone").modal('toggle');
    
                            }
                        }else{
                            alert(res.message)
    
                        }
                        ajaxReady = 1;
    
                    },
                    error:function () {
                        ajaxReady = 1;
                    }
                })
            }
        }
        
        function verifyPhone() {
                var code = $("#verified_phone_code").val();
                $.ajax({
                    url: '{{route('user.verification.phone.field')}}',
                    data: {
                        code: code,
                        _token: "{{csrf_token()}}",
                    },
                    dataType: 'json',
                    type: 'post',
                    success: function (res) {
                        if(res.status==1){
                            $("#modalVerifyPhone").modal('toggle');
                            window.location.reload();
                        }else{
                            alert(res.message)
                        }
                    }
                })
    
        }
    </script>

    

@endsection
