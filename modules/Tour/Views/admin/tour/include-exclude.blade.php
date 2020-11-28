<div class="form-group-item">
    <label class="control-label">{{__('Include')}}</label>
    <div class="g-items-header">
        <div class="row">
            <div class="col-md-11 text-left">{{__("Title")}}</div>
            <div class="col-md-1"></div>
        </div>
    </div>
    <div class="g-items">
        @if(!empty($translation->include))
            @php if(!is_array($translation->include)) $translation->include = json_decode($translation->include); @endphp
            @foreach($translation->include as $key=>$include)
                <div class="item" data-number="{{$key}}">
                    <div class="row">
                        <div class="col-md-11">
                            <input type="text" name="include[{{$key}}][title]" class="form-control" value="{{$include['title'] ?? ""}}" placeholder="{{__('Eg: Specialized bilingual guide')}}">
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
                <div class="col-md-11">
                    <input type="text" __name__="include[__number__][title]" class="form-control" placeholder="{{__('Eg: Specialized bilingual guide')}}">
                </div>
                <div class="col-md-1">
                    <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group-item">
    <label class="control-label">{{__('Exclude')}}</label>
    <div class="g-items-header">
        <div class="row">
            <div class="col-md-11 text-left">{{__("Title")}}</div>
            <div class="col-md-1"></div>
        </div>
    </div>
    <div class="g-items">
        @if(!empty($translation->exclude))
            @php if(!is_array($translation->exclude)) $translation->exclude = json_decode($translation->exclude); @endphp
            @foreach($translation->exclude as $key=>$exclude)
                <div class="item" data-number="{{$key}}">
                    <div class="row">
                        <div class="col-md-11">
                            <input type="text" name="exclude[{{$key}}][title]" class="form-control" value="{{$exclude['title'] ?? ""}}" placeholder="{{__('Eg: Specialized bilingual guide')}}">
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
                <div class="col-md-11">
                    <input type="text" __name__="exclude[__number__][title]" class="form-control" placeholder="{{__('Eg: Additional Services')}}">
                </div>
                <div class="col-md-1">
                    <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>