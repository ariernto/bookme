<?php
if(!$user->hasPermissionTo('tour_create')) return;
?>
@if(!empty($services) and $services->total())
    <div class="bravo-profile-list-services">
        @include('Tour::frontend.blocks.list-tour.index', ['rows'=>$services,'style_list'=> 'normal','title'=>!empty($view_all) ? __('Tour by :name',['name'=>$user->first_name]) : '','col'=>4])

        <div class="container">
            @if(!empty($view_all))
            <div class="review-pag-wrapper">
                <div class="bravo-pagination">
                    {{$services->appends(request()->query())->links()}}
                </div>
                <div class="review-pag-text text-center">
                    {{ __("Showing :from - :to of :total total",["from"=>$services->firstItem(),"to"=>$services->lastItem(),"total"=>$services->total()]) }}
                </div>
            </div>
            @else
                <div class="text-center mt30"><a class="btn btn-sm btn-primary" href="{{route('user.profile.services',['id'=>$user->user_name ?? $user->id,'type'=>'tour'])}}">{{__('View all (:total)',['total'=>$services->total()])}}</a></div>
            @endif
        </div>
    </div>
@endif
