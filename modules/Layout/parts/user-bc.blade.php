@if(!empty($breadcrumbs))
<div class="breadcrumb-page-bar" aria-label="breadcrumb">
    <ul class="page-breadcrumb">
        <li class="">
            <a href="{{url('/')}}"><i class='fa fa-home'></i> {{__('Home')}}</a>
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
