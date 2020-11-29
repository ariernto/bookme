@extends('layouts.user')
@section('head')

@endsection
@section('content')
    <h2 class="title-bar">
        {{__("Manage Rooms")}}
        <div class="title-action">
            <a href="{{route('hotel.vendor.edit',['id'=>$hotel->id])}}" class="btn btn-info"><i class="fa fa-hand-o-right"></i> {{__("Back to hotel")}}</a>
            <a href="{{route('hotel.vendor.room.availability.index',['hotel_id'=>$hotel->id])}}" class="btn btn-warning"><i class="fa fa-calendar"></i> {{__("Availability Rooms")}}</a>
            <a href="{{ route("hotel.vendor.room.create",['hotel_id'=>$hotel->id]) }}" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> {{__("Add Room")}}</a>
        </div>
    </h2>
    @include('admin.message')
    @if($rows->total() > 0)
        <div class="bravo-list-item">
            <div class="bravo-pagination">
                <span class="count-string">{{ __("Showing :from - :to of :total Rooms",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()]) }}</span>
                {{$rows->appends(request()->query())->links()}}
            </div>
            <div class="list-item">
                <div class="row">
                    @foreach($rows as $row)
                        <div class="col-md-12">
                            @include('Hotel::frontend.vendorHotel.room.loop-list')
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="bravo-pagination">
                <span class="count-string">{{ __("Showing :from - :to of :total Rooms",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()]) }}</span>
                {{$rows->appends(request()->query())->links()}}
            </div>
        </div>
    @else
        {{__("No Room")}}
    @endif
@endsection
@section('footer')

@endsection