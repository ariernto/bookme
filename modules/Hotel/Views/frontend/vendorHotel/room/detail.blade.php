@extends('layouts.user')
@section('head')

@endsection
@section('content')
    <h2 class="title-bar no-border-bottom">
        {{$row->id ? __('Edit: ').$row->title : __('Add new room')}}
        <div class="title-action">
            <a class="btn btn-info" href="{{route('hotel.vendor.room.index',['hotel_id'=>$hotel->id])}}">
                <i class="fa fa-hand-o-right"></i> {{__("Manage Rooms")}}
            </a>
        </div>
    </h2>
    @include('admin.message')
    @if($row->id)
        @include('Language::admin.navigation')
    @endif
    <div class="lang-content-box">
        <form novalidate action="{{route('hotel.vendor.room.store',['hotel_id'=>$hotel->id,'id'=>($row->id) ? $row->id : '-1','lang'=>request()->query('lang')])}}" class="needs-validation" method="post">
            @csrf
            <div class="form-add-service">
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <a data-toggle="tab" href="#nav-tour-content" aria-selected="true" class="active">{{__("1. Room Content")}}</a>
                    @if(is_default_lang())
                        <a data-toggle="tab" href="#nav-tour-pricing" aria-selected="false">{{__("2. Pricing")}}</a>
                        <a data-toggle="tab" href="#nav-attribute" aria-selected="false">{{__("3. Attributes")}}</a>
                        <a data-toggle="tab" href="#nav-ical" aria-selected="false">{{__("4. Ical")}}</a>
    
                    @endif
                </div>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-tour-content">
                        @include('Hotel::admin.room.form-detail.content')
                    </div>
                    @if(is_default_lang())
                        <div class="tab-pane fade" id="nav-tour-pricing">
                            @include('Hotel::admin.room.form-detail.pricing')
                        </div>
                        <div class="tab-pane fade" id="nav-attribute">
                            @include('Hotel::admin.room.form-detail.attributes')
                        </div>
                        <div class="tab-pane fade" id="nav-ical">
                            @include('Hotel::admin.room.form-detail.ical')
                        </div>
                    @endif
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <button class="btn btn-primary btn_submit" type="submit"><i class="fa fa-save"></i> {{__('Save Changes')}}</button>
            </div>
        </form>
    </div>
@endsection
@section('footer')
    <script type="text/javascript" src="{{ asset('libs/tinymce/js/tinymce/tinymce.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('js/condition.js?_ver='.config('app.version')) }}"></script>
    <script type="text/javascript" >
        jQuery(function ($) {
            $(".btn_submit").click(function () {
                $(this).closest("form").submit();
            });
        });
    </script>
@endsection