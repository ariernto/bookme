@extends('admin.layouts.app')
@section('content')
    <form action="{{route('hotel.admin.attribute.store',['id'=>($row->id) ? $row->id : '-1','lang'=>request()->query('lang')])}}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$row->id}}">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-between mb20">
                        <div class="">
                            <h1 class="title-bar">{{$row->id ? __('Edit: ').$row->name : __('Add new attribute')}}</h1>
                        </div>
                    </div>
                    @include('admin.message')
                    @if($row->id)
                        @include('Language::admin.navigation')
                    @endif
                    <div class="lang-content-box">
                        <div class="panel">
                            <div class="panel-title">
                                <strong>{{__("Attribute Content")}}</strong>
                            </div>
                            <div class="panel-body">
                                @include('Hotel::admin/attribute/form')
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <span></span>
                        <button class="btn btn-primary" type="submit">{{__("Save Change")}}</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section ('script.body')
@endsection