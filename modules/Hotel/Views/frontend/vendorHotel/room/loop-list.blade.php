<div class="item-list">
    <div class="row">
        <div class="col-md-3">
            <div class="thumb-image">
                <a href="{{$row->getDetailUrl()}}" target="_blank">
                    @if($row->image_url)
                        <img src="{{$row->image_url}}" class="img-responsive" alt="">
                    @endif
                </a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="item-title">
                <a href="{{$row->getDetailUrl()}}" target="_blank">
                    {{$row->title}}
                </a>
            </div>
            <div class="location">
                <i class="icofont-ui-settings"></i>
                {{__("Number")}}: {{$row->number}}
            </div>
            <div class="location">
                <i class="icofont-money"></i>
                {{__("Price")}}: <span class="price">{{ $row->display_price }}</span>
            </div>
            <div class="location">
                <i class="icofont-ui-settings"></i>
                {{__("Status")}}: <span class="badge badge-{{ $row->status }}">{{ $row->status }}</span>
            </div>
            <div class="location">
                <i class="icofont-wall-clock"></i>
                {{__("Last Updated")}}: {{ display_datetime($row->updated_at ?? $row->created_at) }}
            </div>
            <div class="control-action">
                @if(Auth::user()->hasPermissionTo('hotel_update'))
                    <a href="{{route('hotel.vendor.room.edit',['hotel_id'=>$hotel->id,'id'=>$row->id])}}" class="btn btn-warning">{{__("Edit")}}</a>
                @endif
                @if(Auth::user()->hasPermissionTo('hotel_update'))
                    <a href="{{route('hotel.vendor.room.delete',['hotel_id'=>$hotel->id,'id'=>$row->id])}}" class="btn btn-danger" data-confirm="<?php echo e(__("Do you want to delete?")); ?>">{{__("Del")}}</a>
                @endif
                @if($row->status == 'publish')
                    <a href="{{route('hotel.vendor.room.bulk_edit',['hotel_id'=>$hotel->id,'id'=>$row->id,'action' => "make-hide"])}}" class="btn btn-secondary">{{__("Make hide")}}</a>
                @endif
                @if($row->status == 'draft')
                    <a href="{{route('hotel.vendor.room.bulk_edit',['hotel_id'=>$hotel->id,'id'=>$row->id,'action' => "make-publish"])}}" class="btn btn-success">{{__("Make publish")}}</a>
                @endif
            </div>
        </div>
    </div>
</div>