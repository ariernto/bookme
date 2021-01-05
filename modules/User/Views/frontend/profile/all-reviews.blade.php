@extends('layouts.app')

@section('content')
    @include('Layout::parts.bc')
    <div class="page-profile-content page-template-content">
        <div class="container">
            <div class="">
                <div class="row">
                    <div class="col-md-3">
                        @include('User::frontend.profile.sidebar')
                    </div>
                    <div class="col-md-9">
                        <?php
                        $reviews = \Modules\Review\Models\Review::query()->where([
                            'vendor_id'=>$user->id,
                            'status'=>'approved'
                        ])
                            ->orderBy('id','desc')
                            ->with('author')
                            ->paginate(10);
                        ?>
                        @if($reviews->total())
                            <div class="bravo-reviews">
                                <h3>{{__('Reviews from guests')}}</h3>
                                <div class="review-pag-text">
                                    {{ __("Showing :from - :to of :total total",["from"=>$reviews->firstItem(),"to"=>$reviews->lastItem(),"total"=>$reviews->total()]) }}
                                </div>
                                <div class="review-list">
                                    @if($reviews)
                                        @foreach($reviews as $item)
                                            @php $userInfo = $item->author;
                                                 if(!$userInfo){
                                                    continue;
                                                 }
                                            @endphp
                                            <div class="review-item">
                                                <div class="review-item-head">
                                                    <div class="media">
                                                        <div class="media-left">
                                                            @if($avatar_url = $userInfo->getAvatarUrl())
                                                                <img class="avatar" src="{{$avatar_url}}" alt="{{$userInfo->getDisplayName()}}">
                                                            @else
                                                                <span class="avatar-text">{{ucfirst($userInfo->getDisplayName()[0])}}</span>
                                                            @endif
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="media-heading">{{$userInfo->getDisplayName()}}</h4>
                                                            <div class="date">{{display_datetime($item->created_at)}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="review-item-body">
                                                    <h4 class="title"> {{$item->title}} </h4>
                                                    @if($item->rate_number)
                                                        <ul class="review-star">
                                                            @for( $i = 0 ; $i < 5 ; $i++ )
                                                                @if($i < $item->rate_number)
                                                                    <li><i class="fa fa-star"></i></li>
                                                                @else
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                @endif
                                                            @endfor
                                                        </ul>
                                                    @endif
                                                    <div class="detail">
                                                        {{$item->content}}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="review-pag-wrapper">
                                    <div class="bravo-pagination">
                                        {{$reviews->appends(request()->query())->links()}}
                                    </div>
                                    <div class="review-pag-text">
                                        {{ __("Showing :from - :to of :total total",["from"=>$reviews->firstItem(),"to"=>$reviews->lastItem(),"total"=>$reviews->total()]) }}
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="review-pag-text">{{__("No Review")}}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
