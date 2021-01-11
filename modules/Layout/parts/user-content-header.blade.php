<div class="user-content-header d-flex align-items-center py-3 border-bottom">
    <button type="button" class="btn btn-sm btn-toggle-sidebar-menu">
        <i class="icon ion-ios-menu"></i>
    </button>
    @if(!empty($breadcrumbs))
    <div class="breadcrumb-page-bar" aria-label="breadcrumb">
        <ul class="page-breadcrumb">
            <li class="">
                <a href="{{url('/')}}">{{-- <i class='fa fa-home'></i>  --}}{{__('Home')}}</a>
                <i class="fa fa-angle-right"></i>
            </li>
            @foreach($breadcrumbs as $breadcrumb)
                <li class=" {{$breadcrumb['class'] ?? ''}}">
                    @if(!empty($breadcrumb['url']))
                        <a href="{{ $breadcrumb['url'] }}">{{$breadcrumb['name']}}</a>
                        <i class="fa fa-angle-right"></i>
                    @else
                        {{$breadcrumb['name']}}
                    @endif
                </li>
            @endforeach
        </ul>
        <div class="bravo-more-menu-user">
            <i class="icofont-settings"></i>
        </div>
    </div>
    @endif
    <div class="ml-auto">
        <ul class="topbar-items">
            @include('Language::frontend.switcher')
        </ul>
        <form id="content-logout-form-vendor" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
        <a class="btn" href="#" onclick="event.preventDefault(); document.getElementById('content-logout-form-vendor').submit();"><i class="fa fa-lock"></i> {{__("Log Out")}}
        </a>
    </div>
</div>
