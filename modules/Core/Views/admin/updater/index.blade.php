@extends ('admin.layouts.app')
@section ('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="d-flex justify-content-between mb20">
                    <h1 class="title-bar">{{__('System Updater')}}</h1>
                </div>
                @include('admin.message')

                @if($ready_for_update)
                <div class="panel">
                    <div class="panel-title"><strong>{{__('Update booking core')}}</strong></div>
                    <div class="panel-body">

                            @if($updater_latest_version = setting_item('updater_latest_version') and version_compare(config('app.version'),$updater_latest_version,'='))
                                <p class="alert-success alert"><strong>{{__("You are using newest version of Booking Core: :version",['version'=>$updater_latest_version])}}</strong></p>
                            @endif

                            <p><strong>{{__("Your license key: :key",['key'=>setting_item('envato_license_key')])}}</strong></p>
                            @if($last_check_update = setting_item('last_check_update'))
                                <p>{{__("Last check for update: :date",['date'=>display_datetime((int)$last_check_update)])}}</p>
                            @endif

                            @if($updater_last_success = setting_item('updater_last_success'))
                                <p>{{__("Last update success: :date",['date'=>display_datetime((int)$updater_last_success)])}}</p>
                            @endif
                            <form action="{{route('core.admin.updater.check_update')}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-info ">{{__("Check for update")}}
                                </button>
                            </form>

                            @if($updater_latest_version = setting_item('updater_latest_version') and version_compare(config('app.version'),$updater_latest_version,'<'))
                                <hr>
                                <p class="text-success"><strong>{{__("Your current version: :version",['version'=>config('app.version')])}}</strong></p>
                                <p class="text-primary"><strong>{{__("Latest version available: :version",['version'=>$updater_latest_version])}}</strong></p>
                                <p><label ><input type="checkbox" class="check_installation_term"> {{__("I already back up all files and database")}}</label></p>
                                <button type="submit" class="btn btn-primary btn-do-update-now bravo-form ">{{__("Update now")}}
                                    <i class="fa fa-spinner fa-spin fa-fw"></i>
                                </button>
                            @endif

                            <hr>

                            <span>{{__('or')}} <a href="#" class="show-license-form">{{__("change license info")}}</a></span>

                    </div>
                </div>
                @endif
                <div class="panel @if($ready_for_update) d-none @endif" id="license_key_form">
                    <div class="panel-title"><strong>{{__('License Key Information')}}</strong></div>
                    <div class="panel-body">
                        <div class="alert alert-info">
                            {{__("Please enter envato username and license key (purchase code) to get autoupdate")}}
                        </div>
                        <form action="{{route('core.admin.updater.store_license')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label ><strong>{{__("Envato username")}}</strong></label>
                                        <div>
                                            <input type="text" name="envato_username" value="{{setting_item('envato_username')}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label ><strong>{{__("Your license key (Purchase code)")}}</strong></label>
                                        <div>
                                            <input type="text" name="envato_license_key" value="{{setting_item('envato_license_key')}}" class="form-control">
                                        </div>
                                        <span><i><a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-" target="_blank">{{__("How can I get my license key?")}}</a></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> {{__("Save changes")}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script.body')
    <script>
        (function ($) {
            $('.btn-do-update-now').click(function (e) {
                e.preventDefault();
                var me = $(this);

                if(!$('.check_installation_term').prop('checked')){
                    bootbox.alert(
                        {
                            title:'{{__("Warning")}}',
                            message:'{{__('Please make sure you back up data before updating')}}'
                        }
                    );
                    return;
                }

                bootbox.confirm({
                    title:'{{__("Confirmation")}}',
                    message:'{{__('Are you want to update now?. Please make sure you backup all your files and database first')}}',
                    callback:function (res) {
                        if(!res) return;
                        me.addClass('loading');

                        $.ajax({
                            url:'{{route('core.admin.updater.do_update')}}',
                            method:'post',
                            success:function (json) {
                                me.removeClass('loading');
                                if(json.message)
                                {
                                    bootbox.alert(
                                        {
                                            title:json.status ? '{{__("Warning")}}' : '{{__('Notice')}}',
                                            message:json.message
                                        }
                                    );
                                }

                                // if(json.status){
                                //     window.location.reload();
                                // }
                            },
                            error:function (e) {
                                me.removeClass('loading');
                            }
                        });

                    }
                });

            });
            $('.show-license-form').click(function (e) {

                e.preventDefault();

                $('#license_key_form').removeClass('d-none');
            })
        })(jQuery)
    </script>
@endsection