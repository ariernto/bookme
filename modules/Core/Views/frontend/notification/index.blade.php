@extends('layouts.app')
@section ('content')
    <div id="bravo_notify">
        <div class="container my-5">
            <div class="d-flex justify-content-between mb20">
                <h1 class="title-bar">{{__('All Notifications')}}</h1>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="panel">
                        <ul class="dropdown-list-items p-0">
                            <li class="notification @if(empty($type)) active @endif">
                                <i class="fa fa-inbox fa-lg mr-2"></i> <a href="{{route('core.notification.loadNotify')}}">&nbsp;{{__('All')}}</a>
                            </li>
                            <li class="notification @if(!empty($type) && $type == 'unread') active @endif">
                                <i class="fa fa-envelope-o fa-lg mr-2"></i> <a href="{{route('core.notification.loadNotify', ['type'=>'unread'])}}">{{__('Unread')}}</a>
                            </li>
                            <li class="notification @if(!empty($type) && $type == 'read') active @endif">
                                <i class="fa fa-envelope-open-o fa-lg mr-2"></i> <a href="{{route('core.notification.loadNotify', ['type'=>'read'])}}">{{__('Read')}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                @include('Core::frontend.notification.list')
            </div>
        </div>
    </div>

@endsection
