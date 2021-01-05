@if(!empty($attr))
    <input type="hidden" name="attr_id" value="{{$attr->id}}">
@endif
<div class="form-group">
    <label>{{__("Name")}}</label>
    <input type="text" value="{{$translation->name}}" placeholder="{{__("Term name")}}" name="name" class="form-control">
</div>
@if(is_default_lang())
    <div class="form-group d-none">
        <label>{{__('Class Icon')}} - {!!  __("get icon in <a href=':link_1' target='_blank'>fontawesome.com</a> or <a href=':link_2' target='_blank'>icofont.com</a>",['link_1'=>'https://fontawesome.com/v4.7.0/icons/','link_2'=>'https://icofont.com/icons'])  !!}</label>
        <input type="text" value="{{$row->icon}}" placeholder="{{__("Ex: fa fa-facebook")}}" name="icon" class="form-control">
    </div>
    <div class="form-group">
        <label >{{__('Upload image size 30px')}}</label>
        {!! \Modules\Media\Helpers\FileHelper::fieldUpload('image_id',$row->image_id) !!}
        <i>
            {{ __("All the Term's image are same size") }}
        </i>
    </div>
@endif