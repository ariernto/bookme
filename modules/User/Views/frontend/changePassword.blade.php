@extends('layouts.user')
@section('head')
@endsection
@section('content')
    <h2 class="title-bar">
        {{__("Change Password")}}
    </h2>
    @include('admin.message')
    <form action="{{ route("user.change_password.update") }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="panel p-4 shadow-sm mb-5">
                    <div class="form-group">
                        <label>{{__("Current Password")}}</label>
                        <input type="password" name="current-password" placeholder="{{__("Current Password")}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>{{__("New Password")}}</label>
                        <input type="password" name="new-password" placeholder="{{__("New Password")}}" class="form-control">
                                       </div>
                    <div class="form-group">
                        <label>{{__("New Password Again")}}</label>
                        <input type="password" name="new-password_confirmation" placeholder="{{__("New Password Again")}}" class="form-control">
                    </div>
                    
                    <div class="d-flex mt-5">
                        <input type="submit" class="btn btn-danger" value="{{__("Change Password")}}">
                        <a href="{{ route("user.profile.index") }}" class="btn btn-light border ml-auto">{{__("Cancel")}}</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('footer')

@endsection
