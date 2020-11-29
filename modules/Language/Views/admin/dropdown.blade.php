@php
    $user = Auth::user();
    $languages = \Modules\Language\Models\Language::getActive();
@endphp

@if(!empty($languages) && setting_item('site_enable_multi_lang') && setting_item('site_locale'))
    <div class="language-dropdown mb-4" id="language-dropdown" >
        <div class="dropdown">
            @foreach($languages as $language)
                @if(request()->lang == $language->locale or (!request()->lang && $language->locale == setting_item('site_locale')))
                    <button class="btn btn-default border dropdown-toggle" type="button" id="dropdownLangButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if($language->flag)
                            <span class="flag-icon flag-icon-{{$language->flag}}"></span>
                        @endif
                        {{$language->name}}
                    </button>
                @endif            
            @endforeach
            <div class="dropdown-menu" aria-labelledby="dropdownLangButton">
                @foreach($languages as $language)
                    <a class="dropdown-item" href="{{add_query_arg(['lang'=>$language->locale])}}">
                        @if($language->flag)
                            <span class="flag-icon flag-icon-{{$language->flag}}"></span>
                        @endif
                        {{$language->name}}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    @if(request()->query('lang'))
        <input type="hidden" name="lang" value="{{request()->query('lang')}}">
    @endif
@endif