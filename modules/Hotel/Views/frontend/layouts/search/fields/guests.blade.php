<div class="form-select-guests">
    <div class="form-group">
        <i class="field-icon icofont-travelling"></i>
        <div class="form-content dropdown-toggle" data-toggle="dropdown">
            <div class="wrapper-more">
                <label> {{ $field['title'] }} </label>
                @php
                    $adults = request()->query('adults',1);
                    $children = request()->query('children',0);
                @endphp
                <div class="render">
                    <span class="adults" ><span class="one @if($adults >1) d-none @endif">{{__('1 Adult')}}</span> <span class="@if($adults <= 1) d-none @endif multi" data-html="{{__(':count Adults')}}">{{__(':count Adults',['count'=>request()->query('adults',1)])}}</span></span>
                    -
                    <span class="children" >
                            <span class="one @if($children >1) d-none @endif" data-html="{{__(':count Child')}}">{{__(':count Child',['count'=>request()->query('children',0)])}}</span>
                            <span class="multi @if($children <=1) d-none @endif" data-html="{{__(':count Children')}}">{{__(':count Children',['count'=>request()->query('children',0)])}}</span>
                        </span>
                </div>
            </div>
        </div>
        <div class="dropdown-menu select-guests-dropdown" >
            <div class="dropdown-item-row">
                <div class="label">{{__('Rooms')}}</div>
                <div class="val">
                    <span class="btn-minus" data-input="room"><i class="icon ion-md-remove"></i></span>
                    <span class="count-display"><input type="number" name="room" value="{{request()->query('room',1)}}" min="1"></span>
                    <span class="btn-add" data-input="room"><i class="icon ion-ios-add"></i></span>
                </div>
            </div>
            <div class="dropdown-item-row">
                <div class="label">{{__('Adults')}}</div>
                <div class="val">
                    <span class="btn-minus" data-input="adults"><i class="icon ion-md-remove"></i></span>
                    <span class="count-display"><input type="number" name="adults" value="{{request()->query('adults',1)}}" min="1"></span>
                    <span class="btn-add" data-input="adults"><i class="icon ion-ios-add"></i></span>
                </div>
            </div>
            <div class="dropdown-item-row">
                <div class="label">{{__('Children')}}</div>
                <div class="val">
                    <span class="btn-minus" data-input="children"><i class="icon ion-md-remove"></i></span>
                    <span class="count-display"><input type="number" name="children" value="{{request()->query('children',0)}}" min="0"></span>
                    <span class="btn-add" data-input="children"><i class="icon ion-ios-add"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>
