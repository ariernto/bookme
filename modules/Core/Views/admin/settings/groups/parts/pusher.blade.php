@if(is_default_lang())
    <hr>
    <div class="row">
        <div class="col-sm-4">
            <h3 class="form-group-title">{{__('Config Broadcast')}}</h3>
            <p class="form-group-desc">{{__('Change your config broadcast site')}}</p>
        </div>
        <div class="col-sm-8">
            <div class="panel">
                <div class="panel-title"><strong>{{__("Broadcast Driver")}}</strong></div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-controls">
                            <select name="broadcast_driver" class="form-control">
                                @foreach(\Modules\Core\SettingClass::BROADCAST_DRIVER as $item=>$value)
                                    <option value="{{$value}}" {{($settings['broadcast_driver'] ?? '') == $value ? 'selected' : ''  }}>{{__(strtoupper($value))}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel" data-condition="broadcast_driver:is(pusher)">
                <div class="panel-title"><strong>{{__("Pusher API Information")}}</strong></div>
                <div class="panel-body">
                    <div class="form-group" >
                        <label>{{__('API KEY')}}</label>
                        <div class="form-controls">
                            <input type="text" name="pusher_api_key" value="{{setting_item('pusher_api_key')}}" class="form-control">
                
                        </div>
                    </div>
                    <div class="form-group" >
                        <label>{{__('API Secret')}}</label>
                        <div class="form-controls">
                            <input type="text" name="pusher_api_secret" value="{{setting_item('pusher_api_secret')}}" class="form-control">
                
                        </div>
                    </div>
                    <div class="form-group" >
                        <label>{{__('APP ID')}}</label>
                        <div class="form-controls">
                            <input type="text" name="pusher_app_id" value="{{setting_item('pusher_app_id')}}" class="form-control">
                
                        </div>
                    </div>
                    <div class="form-group" >
                        <label>{{__('Cluster')}}</label>
                        <div class="form-controls">
                            <input type="text" name="pusher_cluster" value="{{setting_item('pusher_cluster')}}" class="form-control">
                
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
@endif
