<div class="bravo_topbar">
    <div class="container">
        <div class="content">
            <div class="topbar-left">

                {!! setting_item_with_lang("topbar_left_text") !!}


            </div>
            <div class="topbar-right">
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
                            <a href="#" data-toggle="dropdown" class="login">{{__("Hi, :name",['name'=>Auth::user()->getDisplayName()])}}
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu text-left">
                                <li class="credit_amount">
                                    <a href="{{route('user.wallet')}}"><i class="fa fa-money"></i> {{__("Credit: :amount",['amount'=>auth()->user()->balance])}}</a>
                                </li>
                                @if(Auth::user()->hasPermissionTo('dashboard_vendor_access'))
                                <li><a href="{{route('vendor.dashboard')}}"><i class="icon ion-md-analytics"></i> {{__("Vendor Dashboard")}}</a></li>
                                @endif
                                <li class="@if(Auth::user()->hasPermissionTo('dashboard_vendor_access')) menu-hr @endif">
                                    <a href="{{route('user.profile.index')}}"><i class="icon ion-md-construct"></i> {{__("My profile")}}</a>
                                </li>
                                <li class="menu-hr"><a href="{{route('user.booking_history')}}"><i class="fa fa-clock-o"></i> {{__("Booking History")}}</a></li>
                                <li class="menu-hr"><a href="{{route('user.change_password')}}"><i class="fa fa-lock"></i> {{__("Change password")}}</a></li>
                                @if(Auth::user()->hasPermissionTo('dashboard_access'))
                                    <li class="menu-hr"><a href="{{url('/admin')}}"><i class="icon ion-ios-ribbon"></i> {{__("Admin Dashboard")}}</a></li>
                                @endif
                                <li class="menu-hr">
                                    <a  href="#" onclick="event.preventDefault(); document.getElementById('logout-form-topbar').submit();"><i class="fa fa-sign-out"></i> {{__('Logout')}}</a>
                                </li>
                            </ul>
                            <form id="logout-form-topbar" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
