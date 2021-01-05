<div class="item-list">
    @if($row->discount_percent)
        <div class="sale_info">{{$row->discount_percent}}</div>
    @endif
    <div class="row">
        <div class="col-md-3">
            @if($row->is_featured == "1")
                <div class="featured">
                    {{__("Featured")}}
                </div>
            @endif
            <div class="thumb-image">
                <a href="{{$row->getDetailUrl()}}" target="_blank">
                    @if($row->image_url)
                        <img src="{{$row->image_url}}" class="img-responsive" alt="">
                    @endif
                </a>
                <div class="service-wishlist {{$row->isWishList()}}" data-id="{{$row->id}}" data-type="{{$row->type}}">
                    <i class="fa fa-heart"></i>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="item-title">
                <a href="{{$row->getDetailUrl()}}" target="_blank">
                    {{$row->title}}
                </a>
            </div>
            <div class="location">
                @if(!empty($row->location->name))
                    <i class="icofont-paper-plane"></i>
                    {{__("Location")}}: {{$row->location->name ?? ''}}
                @endif
            </div>
            <div class="location">
                <i class="icofont-money"></i>
                {{__("Price")}}: <span class="sale-price">{{ $row->display_sale_price_admin }}</span> <span class="price">{{ $row->display_price_admin }}</span>
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
                <a href="{{$row->getDetailUrl()}}" target="_blank" class="btn btn-info">{{__("View")}}</a>
                @if(!empty($recovery))
                    <a href="{{ route("car.vendor.restore",[$row->id]) }}" class="btn btn-recovery btn-primary" data-confirm="{{__('"Do you want to recovery?"')}}">{{__("Recovery")}}</a>
                @endif
                @if(Auth::user()->hasPermissionTo('car_update'))
                    <a href="{{ route("car.vendor.edit",[$row->id]) }}" class="btn btn-warning">{{__("Edit")}}</a>
                @endif
                @if(Auth::user()->hasPermissionTo('car_delete'))
                    <a href="{{ route("car.vendor.delete",[$row->id]) }}" class="btn btn-danger" data-confirm="{{__('"Do you want to delete?"')}}">{{__("Del")}}</a>
                @endif
                @if($row->status == 'publish')
                    <a href="{{ route("car.vendor.bulk_edit",[$row->id,'action' => "make-hide"]) }}" class="btn btn-secondary">{{__("Make hide")}}</a>
                @endif
                @if($row->status == 'draft')
                    <a href="{{ route("car.vendor.bulk_edit",[$row->id,'action' => "make-publish"]) }}" class="btn btn-success">{{__("Make publish")}}</a>
                @endif
            </div>
        </div>
    </div>
</div>
