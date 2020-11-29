<div class="form-group">
    <label>{{__("Room Name")}} <span class="text-danger">*</span></label>
    <input type="text" required value="{{$translation->title}}" placeholder="{{__("Room name")}}" name="title" class="form-control">
</div>
<div class="form-group d-none">
    <label>{{__("Room Description")}}</label>
    <textarea name="content" cols="30" rows="5" class="form-control">{{$translation->content}}</textarea>
</div>
@if(is_default_lang())
    <div class="form-group">
        <label >{{__('Feature Image')}} </label>
        {!! \Modules\Media\Helpers\FileHelper::fieldUpload('image_id',$row->image_id) !!}
    </div>

    <div class="form-group">
        <label >{{__('Gallery')}}</label>
        {!! \Modules\Media\Helpers\FileHelper::fieldGalleryUpload('gallery',$row->gallery) !!}
    </div>
    <hr>
@endif