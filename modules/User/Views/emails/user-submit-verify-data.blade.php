@extends('Email::layout')
@section('content')
    <div class="b-container">
        <div class="b-panel">
            <h1>{{__("Hello Administrator")}}</h1>

            <p>{{__('An user has been submit their verification data.')}}</p>
            <p>{{__('Name: :name',['name'=>$user->business_name ? $user->business_name : $user->first_name])}}</p>

            <p>{{__('You can approved the request here:')}} <a href="{{route('user.admin.verification.detail',['id'=>$user->id])}}">{{__('View request')}}</a></p>

            <br>
            <p>{{__('Regards')}},<br>{{setting_item('site_title')}}</p>
        </div>
    </div>
@endsection
