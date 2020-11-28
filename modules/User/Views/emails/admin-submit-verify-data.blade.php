@extends('Email::layout')
@section('content')
    <div class="b-container">
        <div class="b-panel">
            <h1>{{__("Hello :name",['name'=>$user->business_name ? $user->business_name : $user->first_name])}}</h1>

            <p>{{__('You are receiving this email because we updated your vendor verification data.')}}</p>
            <ul>
                @if(!empty($user->verification_fields))
                    @foreach($user->verification_fields as $field)
                        <li>
                            <strong>{{$field['name']}}:</strong>
                            <i>@if(!empty($field['is_verified'])) {{__("Verified")}} @else {{__("Not verified")}} @endif</i>
                        </li>
                    @endforeach
                @endif
            </ul>
            <p>{{__('You can check your information here:')}} <a href="{{route('user.verification.index')}}">{{__('View verification data')}}</a></p>

            <br>
            <p>{{__('Regards')}},<br>{{setting_item('site_title')}}</p>
        </div>
    </div>
@endsection
