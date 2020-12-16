<div class="bravo_header">
    <div class="{{$container_class ?? 'container'}}">
        <div class="content">
            <div class="header-left">
                <a href="{{url(app_get_locale(false,'/'))}}" class="bravo-logo">
                    @if($logo_id = setting_item("logo_id"))
                        <?php $logo = get_file_url($logo_id,'full') ?>
                        <img src="{{$logo}}" alt="{{setting_item("site_title")}}">
                    @endif
                </a>
                <div class="bravo-menu">
                    <?php generate_menu('primary') ?>
                </div>
            </div>
            <div class="header-right">
                @if(!empty($header_right_menu))
                    <ul class="topbar-items">
                        @include('Core::frontend.currency-switcher')
                        @include('Language::frontend.switcher')
                        @if(!Auth::id())
                            <li class="login-item">
                                <a href="#login" data-toggle="modal" data-target="#login" class="login">{{__('Login')}}</a>
                            </li>
                            <li class="signup-item">
                                <a href="#register" data-toggle="modal" data-target="#register" class="signup">{{__('Sign Up')}}</a>
                            </li>
                        @else
                            <li class="login-item dropdown">
                                <a href="#" data-toggle="dropdown" class="is_login">
                                    @if($avatar_url = Auth::user()->getAvatarUrl())
                                        <img class="avatar" src="{{$avatar_url}}" alt="{{ Auth::user()->getDisplayName()}}">
                                    @else
                                        <span class="avatar-text">{{ucfirst( Auth::user()->getDisplayName()[0])}}</span>
                                    @endif
                                    {{__("Hi, :Name",['name'=>Auth::user()->getDisplayName()])}}
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu text-left">

                                    @if(Auth::user()->hasPermissionTo('dashboard_vendor_access'))
                                        <li><a href="{{route('vendor.dashboard')}}"><i class="icon ion-md-analytics"></i> {{__("Vendor Dashboard")}}</a></li>
                                    @endif
                                    <li class="@if(Auth::user()->hasPermissionTo('dashboard_vendor_access')) menu-hr @endif">
                                        <a href="{{route('user.profile.index')}}"><i class="icon ion-md-construct"></i> {{__("My profile")}}</a>
                                    </li>
                                    @if(setting_item('inbox_enable'))
                                    <li class="menu-hr"><a href="{{route('user.chat')}}"><i class="fa fa-comments"></i> {{__("Messages")}}</a></li>
                                    @endif
                                    <li class="menu-hr"><a href="{{route('user.booking_history')}}"><i class="fa fa-clock-o"></i> {{__("Booking History")}}</a></li>
                                    <li class="menu-hr"><a href="{{route('user.change_password')}}"><i class="fa fa-lock"></i> {{__("Change password")}}</a></li>
                                    @if(Auth::user()->hasPermissionTo('dashboard_access'))
                                        <li class="menu-hr"><a href="{{url('/admin')}}"><i class="icon ion-ios-ribbon"></i> {{__("Admin Dashboard")}}</a></li>
                                    @endif
                                    <li class="menu-hr">
                                        <a  href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> {{__('Logout')}}</a>
                                    </li>
                                </ul>
                                <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        @endif
                    </ul>
                @endif
                <button class="bravo-more-menu">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="bravo-menu-mobile" style="display:none;">
        <div class="user-profile">
            <div class="b-close"><i class="icofont-scroll-left"></i></div>
            <div class="avatar"></div>
            <ul>
                @if(!Auth::id())
                    <li>
                        <a href="#login" data-toggle="modal" data-target="#login" class="login">{{__('Login')}}</a>
                    </li>
                    <li>
                        <a href="#register" data-toggle="modal" data-target="#register" class="signup">{{__('Sign Up')}}</a>
                    </li>
                @else
                    <li>
                        <a href="{{route('user.profile.index')}}">
                            <i class="icofont-user-suited"></i> {{__("Hi, :Name",['name'=>Auth::user()->getDisplayName()])}}
                        </a>
                    </li>
                    <li>
                        <a href="{{route('user.profile.index')}}">
                            <i class="icon ion-md-construct"></i> {{__("My profile")}}
                        </a>
                    </li>
                    @if(Auth::user()->hasPermissionTo('dashboard_access'))
                        <li>
                            <a href="{{url('/admin')}}"><i class="icon ion-ios-ribbon"></i> {{__("Dashboard")}}</a>
                        </li>
                    @endif
                    <li>
                        <a  href="#" onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();">
                            <i class="fa fa-sign-out"></i> {{__('Logout')}}
                        </a>
                        <form id="logout-form-mobile" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>

                @endif
            </ul>
            <ul class="multi-lang">
                @include('Core::frontend.currency-switcher')
            </ul>
            <ul class="multi-lang">
                @include('Language::frontend.switcher')
            </ul>
        </div>
        <div class="g-menu">
            <?php generate_menu('primary') ?>
        </div>
    </div>
</div>
