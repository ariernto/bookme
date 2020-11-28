<div class="form-group">
    <div class="row">

        <label class="col-md-3 text-right col-form-label" >{{$field['name_'.app()->getLocale()] ?? $field['name'] ?? $field['id']}}

            @if(!empty($field['required']))
                <span class="text-danger">*</span>
            @endif
            :
        </label>
        <div class="col-md-{{$value_col_size ?? 4}} btn-upload-private-wrap">
            <div class="private-file-lists mb-2">
                @php ($old = $field['data'])
                @if(!empty($old) and is_array($old))
                    @foreach($old as $file)
                        <div>
                            <input type="hidden" name="verify_data_{{$field['id']}}[]" value="{{json_encode($file)}}">
                            <a target="_blank" href="{{route('media.private.view',['path'=>$file['path'] ?? '','v'=>uniqid()])}}" class="file-item">{{$file['name']}} <i class="fa fa-download"></i></a>
                        </div>
                    @endforeach
                @endif
            </div>

            @if(empty($only_show_data))
                <span class="btn btn-primary btn-sm "><i class="fa fa-upload"></i> {{__('Select Files')}}
                    <input class="btn-upload-private-file" multiple data-name="verify_data_{{$field['id']}}[]"  data-multiple="true" type="file" >
                </span>
            @else
                @if(empty($field['data']))
                    <div><strong>{{__('N/A')}}</strong></div>
                @endif
                @if(!empty($field['is_verified']))
                    <a class="badge badge-success" href="#" onclick="return false"><i>{{__("Verified")}}</i></a>
                @else
                    <span class="badge badge-secondary"><i>{{__("Not Verified")}}</i></span>
                @endif
            @endif
        </div>
    </div>
</div>
