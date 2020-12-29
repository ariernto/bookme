<?php
$user = Auth::user();
//$languages = \Modules\Language\Models\Language::getActive();
$locale = App::getLocale();
?>
<div class="header-logo flex-shrink-0">
    <h3 class="logo-text"><a href="{{url('/admin')}}">{{__('Booking Core')}} <span class="app-version">{{config('app.version')}}</span></a></h3>
</div>
<div class="header-widgets d-flex flex-grow-1">
    <div class="widgets-left d-flex flex-grow-1 align-items-center">
        <div class="header-widget">
            <span class="btn-toggle-admin-menu btn btn-sm btn-link"><i class="icon ion-ios-menu"></i></span>
        </div>
        <div class="header-widget search-widget">
            {{--<input type="text" class="input-search form-control">--}}
            <a href="{{url('/')}}" class="btn btn-link" target="_blank"><i class="fa fa-eye"></i> {{__('Home')}}
            </a>
        </div>
    </div>
    <div class="widgets-right flex-shrink-0 d-flex">
        {{--@if(!empty($languages) && setting_item('site_enable_multi_lang'))--}}
        {{--<div class="dropdown header-widget widget-user widget-language">--}}
            {{--<div data-toggle="dropdown" class="user-dropdown d-flex align-items-center" aria-haspopup="true" aria-expanded="false">--}}
                {{--@foreach($languages as $language)--}}
                    {{--@if($locale == $language->locale)--}}
                        {{--<div class="user-info flex-grow-1">--}}
                            {{--@if($language->flag)--}}
                                {{--<span class="flag-icon flag-icon-{{$language->flag}}"></span>--}}
                            {{--@endif--}}
                            {{--{{$language->name}}--}}
                        {{--</div>--}}
                    {{--@endif--}}
                {{--@endforeach--}}
                {{--<i class="fa fa-angle-down"></i>--}}
            {{--</div>--}}
            {{--<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
                {{--@foreach($languages as $language)--}}
                    {{--@php if($language->locale == $locale) continue; @endphp--}}

                    {{--<a class="dropdown-item" href="{{add_query_arg(['lang'=>$language->locale])}}">--}}
                        {{--@if($language->flag)--}}
                            {{--<span class="flag-icon flag-icon-{{$language->flag}}"></span>--}}
                        {{--@endif--}}
                        {{--{{$language->name}}--}}
                    {{--</a>--}}
                {{--@endforeach--}}

            {{--</div>--}}
        {{--</div>--}}
        {{--@endif--}}
        <div class="dropdown header-widget widget-user">
            <div data-toggle="dropdown" class="user-dropdown d-flex align-items-center" aria-haspopup="true" aria-expanded="false">
                <span class="user-avatar flex-shrink-0">
                    @if($user->avatar_url):
                    <img class="image-responsive" src="{{$user->avatar_url}}" alt="{{$user->getDisplayName()}}">
                    @else
                        <span class="avatar-text">{{ucfirst($user->getDisplayName()[0])}}</span>
                    @endif
                </span>
                <div class="user-info flex-grow-1">
                    <div class="user-name">{{$user->getDisplayName()}}</div>
                    <div class="user-role">{{ucfirst($user->roles[0]->name ?? '')}}</div>
                </div>
                <i class="fa fa-angle-down"></i>
            </div>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{url('admin/module/user/edit/'.$user->id)}}">{{__('Edit Profile')}}</a>
                <a class="dropdown-item" href="{{url('admin/module/user/password/'.$user->id)}}">{{__('Change Password')}}</a>
                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> {{__('Logout')}}
                </a>
            </div>
            <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </div>
</div>
