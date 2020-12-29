<div class="form-group-item">
    <label class="control-label">{{__('Itinerary')}}</label>
    <div class="g-items-header">
        <div class="row">
            <div class="col-md-2 text-left">{{__("Image")}}</div>
            <div class="col-md-4 text-left">{{__("Title - Desc")}}</div>
            <div class="col-md-5">{{__('Content')}}</div>
            <div class="col-md-1"></div>
        </div>
    </div>
    <div class="g-items">
        @if(!empty($translation->itinerary))
            @php if(!is_array($translation->itinerary)) $translation->itinerary = json_decode($translation->itinerary); @endphp
            @foreach($translation->itinerary as $key=>$itinerary)
                <div class="item" data-number="{{$key}}">
                    <div class="row">
                        <div class="col-md-2">
                            {!! \Modules\Media\Helpers\FileHelper::fieldUpload('itinerary['.$key.'][image_id]',$itinerary['image_id'] ?? '') !!}
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="itinerary[{{$key}}][title]" class="form-control" value="{{$itinerary['title'] ?? ""}}" placeholder="{{__('Title: Day 1')}}">
                            <input type="text" name="itinerary[{{$key}}][desc]" class="form-control" value="{{$itinerary['desc'] ?? ""}}" placeholder="{{__('Desc: TP. HCM City')}}">
                        </div>
                        <div class="col-md-5">
                            <textarea name="itinerary[{{$key}}][content]" class="form-control full-h" placeholder="...">{{$itinerary['content']}}</textarea>
                        </div>
                        <div class="col-md-1">
                                <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div class="text-right">
            <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> {{__('Add item')}}</span>
    </div>
    <div class="g-more hide">
        <div class="item" data-number="__number__">
            <div class="row">
                <div class="col-md-2">
                    {!! \Modules\Media\Helpers\FileHelper::fieldUpload('itinerary[__number__][image_id]','','__name__') !!}
                </div>
                <div class="col-md-4">
                    <input type="text" __name__="itinerary[__number__][title]" class="form-control" placeholder="{{__('Title: Day 1')}}">
                    <input type="text" __name__="itinerary[__number__][desc]" class="form-control" placeholder="{{__('Desc: TP. HCM City')}}">
                </div>
                <div class="col-md-5">
                    <textarea __name__="itinerary[__number__][content]" class="form-control full-h" placeholder="..."></textarea>
                </div>
                <div class="col-md-1">
                    <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>