@extends('layouts.user')
@section('head')

@endsection
@section('content')
    <h2 class="title-bar">
        {{!empty($recovery) ?__('Recovery Hotels') : __("Manage Hotels")}}
        @if(Auth::user()->hasPermissionTo('job_create') && empty($recovery))
            <a href="{{ route("job.vendor.create") }}" class="btn-change-password">{{__("Add Job")}}</a>
        @endif
    </h2>
    @include('admin.message')
    @if($rows->total() > 0)
        <div class="bravo-list-item">
            <div class="bravo-pagination">
                <span class="count-string">{{ __("Showing :from - :to of :total Hotels",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()]) }}</span>
                {{$rows->appends(request()->query())->links()}}
            </div>
            <div class="list-item">
                <div class="row">
                    @foreach($rows as $row)
                        <div class="col-md-12">
                            @include('Job::frontend.vendorHotel.loop-list')
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="bravo-pagination">
                <span class="count-string">{{ __("Showing :from - :to of :total Hotels",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()]) }}</span>
                {{$rows->appends(request()->query())->links()}}
            </div>
        </div>
    @else
        {{__("No Job")}}
    @endif
@endsection
@section('footer')

@endsection
