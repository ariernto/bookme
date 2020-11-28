@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{__("Room Management")}}</h1>
            <div class="title-actions">
                <a href="{{route('hotel.admin.room.availability.index',['hotel_id'=>$hotel->id])}}" class="btn btn-warning btn-xs"><i class="fa fa-calendar"></i> {{__("Room Availability")}}</a>
                <a href="{{route('hotel.admin.edit',['id'=>$hotel->id])}}" class="btn btn-info btn-xs"><i class="fa fa-hand-o-right"></i> {{__("Back to hotel")}}</a>
            </div>
        </div>
        @include('admin.message')
        <div class="row">
            <div class="col-md-4">
                <form novalidate class="needs-validation" action="{{route('hotel.admin.room.store',['hotel_id'=>$hotel->id,'id'=>($row->id) ? $row->id : '-1','lang'=>request()->query('lang')])}}" method="post">
                    <div class="panel">
                        <div class="panel-title"><strong>{{__("Add Room")}}</strong></div>
                        <div class="panel-body">
                            @csrf
                            @include('Hotel::admin.room.form')
                        </div>
                        <div class="panel-footer">
                            <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> {{__("Add Room")}}</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-8">
                <div class="filter-div d-flex justify-content-between ">
                    <div class="col-left">
                        @if(!empty($rows))
                            <form method="post" action="{{route('hotel.admin.room.bulkEdit')}}" class="filter-form filter-form-left d-flex justify-content-start">
                                {{csrf_field()}}
                                <select name="action" class="form-control">
                                    <option value="">{{__(" Bulk Actions ")}}</option>
                                    <option value="publish">{{__(" Publish ")}}</option>
                                    <option value="draft">{{__(" Move to Draft ")}}</option>
                                    <option value="pending">{{__("Move to Pending")}}</option>
                                    {{--<option value="clone">{{__(" Clone ")}}</option>--}}
                                    <option value="delete">{{__(" Delete ")}}</option>
                                </select>
                                <button data-confirm="{{__("Do you want to delete?")}}" class="btn-info btn btn-icon dungdt-apply-form-btn" type="button">{{__('Apply')}}</button>
                            </form>
                        @endif
                    </div>
                    <div class="col-right">
                        <p><i>{{__('Found :total items',['total'=>$rows->total()])}}</i></p>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-body">
                        <form action="" class="bravo-form-item">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th width="45px"><input type="checkbox" class="check-all"></th>
                                        <th> {{ __('Room name')}}</th>
                                        <th width="100px"> {{ __('Number')}}</th>
                                        <th width="100px"> {{ __('Price')}}</th>
                                        <th width="100px"> {{ __('Status')}}</th>
                                        <th width="100px"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($rows->total() > 0)
                                        @foreach($rows as $row)
                                            <tr class="{{$row->status}}">
                                                <td><input type="checkbox" name="ids[]" class="check-item" value="{{$row->id}}">
                                                </td>
                                                <td class="title">
                                                    <a href="{{route('hotel.admin.room.edit',['hotel_id'=>$hotel->id,'id'=>$row->id])}}">{{$row->title}}</a>
                                                </td>
                                                <td>{{$row->number}}</td>
                                                <td>{{format_money($row->price)}}</td>
                                                <td><span class="badge badge-{{ $row->status }}">{{ $row->status }}</span></td>
                                                <td>
                                                    <a href="{{route('hotel.admin.room.edit',['id'=>$row->id,'hotel_id'=>$hotel->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> {{__('Edit')}}
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7">{{__("No room found")}}</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </form>
                        {{$rows->appends(request()->query())->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
