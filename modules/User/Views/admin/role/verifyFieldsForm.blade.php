@if(empty($row['id']))
<div class="form-group">
    <label>{{__("Field ID")}} <span class="text-danger">*</span></label>
    <input type="text" value="{{$row['id'] ?? ''}}" placeholder="{{__("Field ID ")}}" name="id" class="form-control" required>
    <i>{{__('Must be unique. Only accept letter and number, dash, underscore, without space')}}</i>
    <div class="invalid-feedback">
        {{__('Please enter field id and make sure it unique')}}
    </div>
</div>
@else
    <input type="hidden" name="id" value="{{$row['id']}}">
@endif
@php  $languages = \Modules\Language\Models\Language::getActive(); @endphp
<div class="form-group form-group-item">
    <label>{{__("Field Name")}} <span class="text-danger">*</span></label>
    <div class="border p-2 rounded">
        @if(!empty($languages) && setting_item('site_enable_multi_lang') && setting_item('site_locale'))
            @foreach($languages as $language)
                @php $key_lang = setting_item('site_locale') != $language->locale ? "_".$language->locale : ""  @endphp
                <div class="g-lang">
                    <div class="title-lang">{{$language->name}}</div>
                    <input type="text" value="{{$row['name'.$key_lang] ?? ''}}" placeholder="" name="name{{$key_lang}}" class="form-control" required>
                </div>
            @endforeach
        @else
            <input type="text" value="{{$row['name'] ?? ''}}" placeholder="" name="name" class="form-control" required>
        @endif
    </div>
    <div class="invalid-feedback">
        {{__('Please enter field name')}}
    </div>
</div>
<div class="form-group">
    <label>{{__("Type")}} <span class="text-danger">*</span></label>
    <select class="custom-select" name="type" required>
        <option value="text">{{__("Text")}}</option>
        <option {{($row['type'] ?? '') == 'phone' ? 'selected':''}} value="phone">{{__("Phone")}}</option>
        <option {{($row['type'] ?? '') == 'number' ? 'selected':''}} value="number">{{__("Number")}}</option>
        <option {{($row['type'] ?? '') == 'file' ? 'selected':''}} value="file">{{__("File attachment")}}</option>
        <option {{($row['type'] ?? '') == 'multi_files' ? 'selected':''}} value="multi_files">{{__("Multi files attachment")}}</option>
    </select>
    <div class="invalid-feedback">
        {{__('Please enter field type')}}
    </div>
</div>
<div class="form-group">
    <label>{{__("For Roles?")}} <span class="text-danger">*</span></label>
    <div class=" terms-scrollable">
        @foreach($roles as $role)
            <div>
                <label >
                     <input type="checkbox" name="roles[]" value="{{$role->id}}" @if(!empty($row['roles'] ?? []) and in_array($role->id,$row['roles'] ?? [])) checked @endif />{{ucfirst($role->name)}}
                </label>
            </div>
        @endforeach
    </div>
    <div class="invalid-feedback">
        {{__('Please enter roles')}}
    </div>
</div>
<div class="form-group">
    <label>{{__("Is Required?")}}</label>
    <select class="custom-select" name="required">
        <option value="">{{__("No")}}</option>
        <option {{($row['required'] ?? '') == 1 ? 'selected':''}} value="1">{{__("Yes")}}</option>
    </select>
</div>
<div class="form-group">
    <label>{{__("Order")}}</label>
    <input type="text" value="{{$row['order'] ?? 0}}" placeholder="" name="order" class="form-control">
</div>
<div class="form-group">
    <label>{{__("Icon code")}}</label>
    <input type="text" value="{{$row['icon'] ?? ''}}" placeholder="{{__("Eg: fa fa-phone")}}" name="icon" class="form-control">
</div>
