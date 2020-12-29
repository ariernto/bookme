@extends('layouts.app')

@section('content')
    @include('Layout::parts.bc')
    <div class="page-profile-content page-template-content page-all-services">
        <div class="container">
            <div class="">
                <div class="row">
                    <div class="col-md-3">
                        @include('User::frontend.profile.sidebar')
                    </div>
                    <div class="col-md-9">
                        @if(view()->exists(ucfirst($type).'::frontend.profile.service'))
                            @include(ucfirst($type).'::frontend.profile.service',['view_all'=>1])
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection