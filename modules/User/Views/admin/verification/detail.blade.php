@extends('admin.layouts.app')

@section('content')
    <form action="{{route('user.admin.verification.store',['id'=>$row->id])}}" method="post" class="needs-validation" novalidate>
        @csrf
        <div class="container">
            <div class="d-flex justify-content-between mb20">
                <div class="">
                    <h1 class="title-bar">{{$row->id ? 'Verify Request: '.$row->getDisplayName() : 'Add new user'}}</h1>
                </div>
            </div>
            @include('admin.message')
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="panel">
                        <div class="panel-title"><strong>{{ __('Data')}}</strong></div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>{{__('No')}}</th>
                                            <th>{{__("Information")}}</th>
                                            <th width="200px">{{__("Mark as verified")}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php($only_show_data = true)
                                    @php($value_col_size = 9)
                                    @php($i = 0)
                                    @foreach($row->verification_fields as $field)
                                        <tr>
                                            <td>{{$i+1}}</td>
                                            <td>
                                                @switch($field['type'])
                                                    @case("email")
                                                    @include('User::frontend.verification.fields.email')
                                                    @break
                                                    @case("phone")
                                                    @include('User::frontend.verification.fields.phone')
                                                    @break
                                                    @case("file")
                                                    @include('User::frontend.verification.fields.file')
                                                    @break
                                                    @case("multi_files")
                                                    @include('User::frontend.verification.fields.multi_files')
                                                    @break
                                                    @case('text')
                                                    @default
                                                    @include('User::frontend.verification.fields.text')
                                                    @break
                                                @endswitch
                                            </td>
                                            <td>
                                                <input @if($row->isVerifiedField($field['id'])) checked @endif type="checkbox" name="fields[]" value="{{$field['id']}}" >
                                            </td>
                                        </tr>
                                        @php($i ++)
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="d-flex justify-content-between">
                <span></span>
                <button class="btn btn-primary" type="submit">{{ __('Save Change')}}</button>
            </div>
        </div>
    </form>

@endsection
@section ('script.body')
@endsection
