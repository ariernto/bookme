@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{ __('Manage Fields')}}</h1>
        </div>
        @include('admin.message')
        <div class="filter-div d-flex justify-content-end ">
            <div class="col-left">
                @if(!empty($fields))
                    <form method="post" action="{{route('user.admin.role.bulkEdit')}}" class="filter-form filter-form-left d-flex justify-content-end">
                        {{csrf_field()}}
                        <select name="action" class="form-control">
                            <option value="">{{__(" Bulk Actions ")}}</option>
                            {{--<option value="publish">{{__(" Publish ")}}</option>--}}
                            {{--<option value="draft">{{__(" Move to Draft ")}}</option>--}}
                            <option value="delete">{{__(" Delete ")}}</option>
                        </select>
                        <button data-confirm="{{__("Do you want to delete?")}}" class="btn-info btn btn-icon dungdt-apply-form-btn" type="button">{{__('Apply')}}</button>
                    </form>
                @endif
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                <form action="{{route('user.admin.role.verifyFieldsStore')}}" class="needs-validation" novalidate>
                    @csrf
                <div class="panel">
                    <div class="panel-title"><strong>{{__("Add new field")}}</strong></div>
                    <div class="panel-body">
                        @include('User::admin.role.verifyFieldsForm')
                    </div>
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-success">{{__('Add new')}}</button>
                    </div>
                </div>
                </form>
            </div>
            <div class="col-md-8">
                <div class="panel">
                    <div class="panel-title">{{ __('All Fields')}}</div>
                    <div class="panel-body">
                        <form action="" class="bravo-form-item">
                            <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th width="60px"><input type="checkbox" class="check-all"></th>
                                <th>{{ __('ID')}}</th>
                                <th>{{ __('Icon')}}</th>
                                <th>{{ __('Name')}}</th>
                                <th>{{ __('Type')}}</th>
                                <th>{{ __('For roles')}}</th>
                                <th>{{ __('Order')}}</th>
                                <th>{{ __('Required')}}</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($fields as $id=>$row)
                                <tr>
                                    <td><input type="checkbox" name="ids[]" value="{{$id}}" class="check-item"></td>
                                    <td>{{$id}}</td>
                                    <td><i class="{{$row['icon'] ??''}}"></i></td>
                                    <td>{{$row['name']}}</td>
                                    <td>{{verify_type_to($row['type'],'name')}}</td>
                                    <td>@php
                                        if(!empty($row['roles'])){
                                            $roles = \Spatie\Permission\Models\Role::query()->whereIn('id',$row['roles'])->get();
                                            if(!empty($roles))
                                            {
                                                echo implode(", ",$roles->pluck('name')->toArray());
                                            }
                                        }
                                        @endphp
                                    </td>
                                    <th>{{$row['order'] ?? 0}}</th>
                                    <td>{{$row['required'] ? __("Yes") : 'No'}}</td>
                                    <th><a href="{{route('user.admin.role.verifyFieldsEdit',['id'=>$id])}}" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i>  {{__('Edit')}}</a></th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
