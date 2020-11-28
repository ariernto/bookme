<div class="form-group">
    <div class="row align-items-center">

        <label class="col-md-3 text-right col-form-label" >{{$field['name_'.app()->getLocale()] ?? $field['name'] ?? $field['id']}}

            @if(!empty($field['required']))
                <span class="text-danger">*</span>
            @endif
            :
        </label>
        <div class="col-md-{{$value_col_size ?? 4}} btn-upload-private-wrap">
            <div class="private-file-lists mb-2">
                @php ($old = json_decode($field['data'],true))
                @if(!empty($old))
                    <input type="hidden" name="verify_data_{{$field['id']}}" value="{{($field['data'])}}">
                    <a target="_blank" href="{{route('media.private.view',['path'=>$old['path'] ?? '','v'=>uniqid()])}}" class="file-item">{{$old['name']}} <i class="fa fa-download"></i></a>
                @endif
            </div>
            @if(empty($only_show_data))
                <span class="btn btn-primary btn-sm "><i class="fa fa-upload"></i> {{__('Select File')}}
                    <input class="btn-upload-private-file" data-name="verify_data_{{$field['id']}}"  data-multiple="" type="file" >
                </span>
            @else
                @if(empty($field['data']))
                    <div><strong>{{__('N/A')}}</strong></div>
                @endif
                @if(!empty($field['is_verified']))
                    <span class="badge badge-success"><i>{{__("Verified")}}</i></span>
                @else
                    <span class="badge badge-secondary"><i>{{__("Not Verified")}}</i></span>
                @endif
            @endif
        </div>
    </div>
</div>
