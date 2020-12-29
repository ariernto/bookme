@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{ __('Verification Requests')}}</h1>
        </div>
        @include('admin.message')
        <div class="filter-div d-flex justify-content-between ">
            <div class="col-left">

            </div>
            <div class="col-left">
                <form method="get" class="filter-form filter-form-right d-flex justify-content-end flex-column flex-sm-row" role="search">
                    <select class="form-control" name="role">
                        <option value="">{{ __('-- Select --')}}</option>
                        @foreach($roles as $role)
                            <option value="{{$role->name}}" @if(Request()->role == $role->name) selected @endif >{{ucfirst($role->name)}}</option>
                        @endforeach
                    </select>
                    <input type="text" name="s" value="{{ Request()->s }}" placeholder="{{__('Search by name')}}" class="form-control">
                    <button class="btn-info btn btn-icon btn_search" type="submit">{{__('Search User')}}</button>
                </form>
            </div>
        </div>
        <div class="text-right">
            <div class="header-status-control">
                <a href="{{ url("/admin/module/user/verification") }}">{{__("All Verification")}}</a> -
                <a href="{{ url("/admin/module/user/verification?status=pending") }}">{{__("Pending")}}</a> -
                <a href="{{ url("/admin/module/user/verification?status=approved") }}">{{__("Approved")}}</a>
            </div>
            <p><i>{{__('Found :total items',['total'=>$rows->total()])}}</i></p>
        </div>
        <div class="panel">
            <div class="panel-body">
                <form action="" class="bravo-form-item">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th width="60px"><input type="checkbox" class="check-all"></th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Email')}}</th>
                                <th>{{__('Phone')}}</th>
                                <th>{{__('Role')}}</th>
                                <th class="date">{{ __('Date')}}</th>
                                <th class="status">{{__('Status')}}</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($rows->total() > 0)
                                @foreach($rows as $row)
                                    <tr>
                                        <td><input type="checkbox" name="ids[]" value="{{$row->id}}" class="check-item">
                                        </td>
                                        <td class="title">
                                            <a href="{{route('user.admin.verification.detail',['id'=>$row->id])}}">{{$row->getDisplayName()}}</a>
                                        </td>
                                        <td>{{$row->email}}</td>
                                        <td>{{$row->phone}}</td>
                                        <td>
                                            @php $roles = $row->getRoleNames();
                                    if(!empty($roles[0])){
                                        echo e(ucfirst($roles[0]));
                                    }
                                            @endphp
                                        </td>
                                        <td>{{ display_date($row->created_at)}}</td>
                                        <td class="status">{{$row->verify_submit_status}}</td>
                                        <td>
                                            @if($row->verify_submit_status == "completed")
                                                <a class="btn btn-sm btn-info" href="{{route('user.admin.verification.detail',['id'=>$row->id])}}">{{__('View Verification')}}</a>
                                            @else
                                                <a class="btn btn-sm btn-primary" href="{{route('user.admin.verification.detail',['id'=>$row->id])}}">{{__('View request')}}</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8">{{__("No data")}}</td>
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
@endsection
