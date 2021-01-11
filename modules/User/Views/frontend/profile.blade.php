@extends('layouts.user')
@section('head')

@endsection
@section('content')
    <h2 class="title-bar">
        {{__("Settings")}}
        <a href="{{route('user.change_password')}}" class="btn-change-password">{{__("Change Password")}}</a>
    </h2>
    @include('admin.message')
    <form action="{{route('user.profile.update')}}" method="post" class="input-has-icon">
        @csrf
        <div class="panel p-4 shadow-sm mb-4">
            <div class="form-title">
                <strong>{{__("Personal Information")}}</strong>
            </div>            
            @if($is_vendor_access)
                <div class="form-row">                
                    <div class="form-group col-md-6">
                        <label>{{__("Business ID")}}</label>
                        <input type="text" value="{{old('business_id',$dataUser->business_id)}}" name="business_id" placeholder="{{__("Business ID")}}" class="form-control">
                        <i class="fa fa-user input-icon"></i>
                    </div>
                    <div class="form-group col-md-6">
                        <label>{{__("Business name")}}</label>
                        <input type="text" value="{{old('business_name',$dataUser->business_name)}}" name="business_name" placeholder="{{__("Business name")}}" class="form-control">
                        <i class="fa fa-user input-icon"></i>
                    </div>
                </div>
            @endif
            <div class="form-row">
                <div class="form-group">
                    <label>{{__("E-mail")}}</label>
                    <input type="text" name="email" value="{{old('email',$dataUser->email)}}" placeholder="{{__("E-mail")}}" class="form-control">
                    <i class="fa fa-envelope input-icon"></i>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>{{__("First name")}}</label>
                    <input type="text" value="{{old('first_name',$dataUser->first_name)}}" name="first_name" placeholder="{{__("First name")}}" class="form-control">
                    <i class="fa fa-user input-icon"></i>
                </div>
                <div class="form-group col-md-6">
                    <label>{{__("Last name")}}</label>
                    <input type="text" value="{{old('last_name',$dataUser->last_name)}}" name="last_name" placeholder="{{__("Last name")}}" class="form-control">
                    <i class="fa fa-user input-icon"></i>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>{{__("Phone Number")}}</label>
                    <input type="text" value="{{old('phone',$dataUser->phone)}}" name="phone" placeholder="{{__("Phone Number")}}" class="form-control">
                    <i class="fa fa-phone input-icon"></i>
                </div>
                <div class="form-group col-md-6">
                    <label>{{__("Birthday")}}</label>
                    <input type="text" value="{{ old('birthday',$dataUser->birthday? display_date($dataUser->birthday) :'') }}" name="birthday" placeholder="{{__("Birthday")}}" class="form-control date-picker">
                    <i class="fa fa-birthday-cake input-icon"></i>
                </div>
            </div>
            <div class="form-group">
                <label>{{__("About Yourself")}}</label>
                <textarea name="bio" rows="5" class="form-control">{{old('bio',$dataUser->bio)}}</textarea>
            </div>
            <div class="form-group">
                <label>{{__("Avatar")}}</label>
                <div class="upload-btn-wrapper">
                    <div class="input-group">
                        <span class="input-group-btn">
                            <span class="btn btn-default btn-file">
                                {{__("Browse")}}… <input type="file">
                            </span>
                        </span>
                        <input type="text" data-error="{{__("Error upload...")}}" data-loading="{{__("Loading...")}}" class="form-control text-view" readonly value="{{ $dataUser->getAvatarUrl()?? __("No Image")}}">
                    </div>
                    <input type="hidden" class="form-control" name="avatar_id" value="{{ $dataUser->avatar_id?? ""}}">
                    <img class="image-demo" src="{{ $dataUser->getAvatarUrl()?? ""}}"/>
                </div>
            </div>
        </div>
        <div class="panel p-4 shadow-sm mb-5">
            <div class="form-title">
                <strong>{{__("Location Information")}}</strong>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>{{__("Address Line 1")}}</label>
                    <input type="text" value="{{old('address',$dataUser->address)}}" name="address" placeholder="{{__("Address")}}" class="form-control">
                    <i class="fa fa-location-arrow input-icon"></i>
                </div>
                <div class="form-group col-md-6">
                    <label>{{__("Address Line 2")}}</label>
                    <input type="text" value="{{old('address2',$dataUser->address2)}}" name="address2" placeholder="{{__("Address2")}}" class="form-control">
                    <i class="fa fa-location-arrow input-icon"></i>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>{{__("City")}}</label>
                    <input type="text" value="{{old('city',$dataUser->city)}}" name="city" placeholder="{{__("City")}}" class="form-control">
                    <i class="fa fa-street-view input-icon"></i>
                </div>
                <div class="form-group col-md-6">
                    <label>{{__("State")}}</label>
                    <input type="text" value="{{old('state',$dataUser->state)}}" name="state" placeholder="{{__("State")}}" class="form-control">
                    <i class="fa fa-map-signs input-icon"></i>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>{{__("Country")}}</label>
                    <select name="country" class="form-control">
                        <option value="">{{__('-- Select --')}}</option>
                        @foreach(get_country_lists() as $id=>$name)
                            <option @if((old('country',$dataUser->country ?? '')) == $id) selected @endif value="{{$id}}">{{$name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>{{__("Zip Code")}}</label>
                    <input type="text" value="{{old('zip_code',$dataUser->zip_code)}}" name="zip_code" placeholder="{{__("Zip Code")}}" class="form-control">
                    <i class="fa fa-map-pin input-icon"></i>
                </div>
            </div>
        </div>        
        <div class="form-group">
            <button class="btn btn-danger" type="submit"><i class="fa fa-save"></i> {{__('Save Changes')}}</button>
        </div>
    </form>
@endsection
@section('footer')

@endsection
