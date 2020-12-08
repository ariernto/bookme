@php
    $user = Auth::user();
    $languages = \Modules\Language\Models\Language::getActive();
@endphp

@if(!empty($languages) && setting_item('site_enable_multi_lang') && setting_item('site_locale'))
    <div class="language-navigation" id="language-navs" >
        <ul class="nav nav-tabs" role="tablist" >
            @foreach($languages as $language)
                <li class="nav-item">
                    <a class="nav-link @if(request()->lang == $language->locale or (!request()->lang && $language->locale == setting_item('site_locale'))) active @endif" href="{{add_query_arg(['lang'=>$language->locale])}}">
                        @if($language->flag)
                            <span class="flag-icon flag-icon-{{$language->flag}}"></span>
                        @endif
                        {{$language->name}}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    @if(request()->query('lang'))
        <input type="hidden" name="lang" value="{{request()->query('lang')}}">
    @endif
@endif