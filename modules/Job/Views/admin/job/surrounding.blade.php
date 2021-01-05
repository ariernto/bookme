@if(!empty($location_category) and $location_category->count() > 0)
    <div class="panel">
        <div class="panel-title"><strong>{{__("Surroundings")}}</strong></div>
        <div class="panel-body">
            @if(!empty($location_category))
                @foreach($location_category as $category)
                    <div class="form-group-item">
                        <label class="control-label">{{$category->name}}</label>
                        <div class="g-items-header">
                            <div class="row">
                                <div class="col-md-3">{{__("Name")}}</div>
                                <div class="col-md-3">{{__('Content')}}</div>
                                <div class="col-md-3">{{__('Distance')}}</div>
                                <div class="col-md-2"></div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>
                        <div class="g-items">
                            @if(!empty($translation->surrounding[$category->id]))
                                @php
                                    $surroundingItem = $translation->surrounding[$category->id];
                                   if(!is_array($surroundingItem)) $surroundingItem = json_decode($surroundingItem); @endphp
                                @foreach($surroundingItem as $key=>$item)
                                    <div class="item" data-number="{{$key}}">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input type="text" name="surrounding[{{$category->id}}][{{$key}}][name]"
                                                       class="form-control" value="{{@$item['name']}}"
                                                       placeholder="{{__('Sunny Beach')}}">
                                            </div>
                                            <div class="col-md-3">
                                                <textarea name="surrounding[{{$category->id}}][{{$key}}][content]"
                                                          class="form-control">{{@$item['content']}}</textarea>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="number"
                                                       name="surrounding[{{$category->id}}][{{$key}}][value]"
                                                       class="form-control" value="{{@$item['value']}}"
                                                       placeholder="...">
                                            </div>
                                            <div class="col-md-2">
                                                <select name="surrounding[{{$category->id}}][{{$key}}][type]"
                                                        class="form-control">
                                                    <option @if($item['type']=='m') selected
                                                            @endif value="m">{{__('m')}}</option>
                                                    <option @if($item['type']=='km') selected
                                                            @endif value="km">{{__('Km')}}</option>
                                                </select>
                                            </div>
                                            <div class="col-md-1">
                                                <span class="btn btn-danger btn-sm btn-remove-item"><i
                                                        class="fa fa-trash"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="text-right">
                            <span class="btn btn-info btn-sm btn-add-item"><i
                                    class="icon ion-ios-add-circle-outline"></i> {{__('Add item')}}</span>
                        </div>
                        <div class="g-more hide">
                            <div class="item" data-number="__number__">
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="text" __name__="surrounding[{{$category->id}}][__number__][name]"
                                               class="form-control" placeholder="{{__("Sunny Beach")}}">
                                    </div>
                                    <div class="col-md-3">
                                        <textarea __name__="surrounding[{{$category->id}}][__number__][content]"
                                                  class="form-control" placeholder=""></textarea>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number"
                                               __name__="surrounding[{{$category->id}}][__number__][value]"
                                               class="form-control" placeholder="">
                                    </div>
                                    <div class="col-md-2">
                                        <select __name__="surrounding[{{$category->id}}][__number__][type]"
                                                class="form-control">
                                            <option value="m">{{__('m')}}</option>
                                            <option value="km">{{__('km')}}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endif
