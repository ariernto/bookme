<div class="panel">
    <div class="panel-title"><strong>{{__("Services ")}}</strong></div>
    <div class="panel-body">
        <div class="table-responsive form-group">
            <table class="table">
                <thead>
                <tr>
                    <th>{{__('Enable?')}}</th>
                    <th>{{__('Post')}}</th>
                    <th>{{__('Maximum create')}}</th>
                    <th>{{__('Auto publish')}}</th>
                    <th>{{__('Commission')}}</th>
                </tr>
                </thead>
                @foreach(config("booking.services") as $item=>$value)
                    <?php
                        $meta = $row->meta->where('post_type',$value)->first();
                    ;?>
                    <tr>
                        <td>
                            <input style="display: inline-block" type="checkbox" name="services_options[{{$item}}][enable]" @if(@$meta->enable==1) checked @endif value="1">
                        </td>
                        <td><input type="hidden" name="services_options[{{$item}}][post_type]" value="{{$item}}">{{call_user_func([$value,'getModelName'])}}</td>
                        <td>
                            <input type="number" value="{{@$meta->maximum_create}}" placeholder="Items" name="services_options[{{$item}}][maximum_create]" class="form-control">
                        </td>
                        <td>
                            <input type="checkbox" name="services_options[{{$item}}][auto_publish]" @if(@$meta->auto_publish==1) checked @endif value="1">
                        </td>
                        <td>
                            <input type="number" value="{{@$meta->commission}}" placeholder="Commission" name="services_options[{{$item}}][commission]" class="form-control">
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
