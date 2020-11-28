@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{ __('Edit Field: :name',['name'=>$row['name'] ?? ''])}}</h1>
        </div>
        @include('admin.message')
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <form action="{{route('user.admin.role.verifyFieldsStore')}}" class="needs-validation" novalidate>
                    @csrf
                <div class="panel">
                    <div class="panel-title"><strong>{{ __('Edit verification field')}}</strong></div>
                    <div class="panel-body">
                        @include('User::admin.role.verifyFieldsForm')
                    </div>
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-success">{{__('Save Changes')}}</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
