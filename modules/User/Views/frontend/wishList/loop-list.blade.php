<?php
$service = $row->service;
?>
@if(!empty($service))
    <div class="item-list">
        @if($service->discount_percent)
            <div class="sale_info">{{$service->discount_percent}}</div>
        @endif
        <div class="row">
            <div class="col-md-3">
                @if($service->is_featured == "1")
                    <div class="featured">
                        {{__("Featured")}}
                    </div>
                @endif
                <div class="thumb-image">
                    <a href="{{$service->getDetailUrl()}}" target="_blank">
                        @if($service->image_url)
                            <img src="{{$service->image_url}}" class="img-responsive" alt="">
                        @endif
                    </a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="item-title">
                    <a href="{{$service->getDetailUrl()}}" target="_blank">
                        {{$service->title}}
                    </a>
                </div>
                <div class="location">
                    <i class="icofont-license"></i>
                    {{__("Service Type")}}: <span class="badge badge-info">{{$service->getModelName() ?? ''}}</span>
                </div>
                <div class="location">
                    @if(!empty($service->location->name))
                        <i class="icofont-paper-plane"></i>
                        {{__("Location")}}: {{$service->location->name ?? ''}}
                    @endif
                </div>
                <div class="location">
                    <i class="icofont-money"></i>
                    {{__("Price")}}: <span class="sale-price">{{ $service->display_sale_price }}</span> <span class="price">{{ $service->display_price }}</span>
                </div>
                @if($service->getReviewEnable())
                    <div class="rate">
                        <i class="icofont-badge"></i>
                        <?php
                        $reviewData = $service->getScoreReview();
                        $score_total = $reviewData['score_total'];
                        ?>
                        <div class="service-review tour-review-{{$score_total}}">
                    <span class="review">
                        @if($reviewData['total_review'] > 1)
                            {{ __(":number Reviews",["number"=>$reviewData['total_review'] ]) }}
                        @else
                            {{ __(":number Review",["number"=>$reviewData['total_review'] ]) }}
                        @endif
                    </span>
                            <div class="list-star">
                                <ul class="booking-item-rating-stars">
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                </ul>
                                <div class="booking-item-rating-stars-active" style="width: {{  $score_total * 2 * 10 ?? 0  }}%">
                                    <ul class="booking-item-rating-stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                @endif
                <div class="control-action">
                    <a href="{{$service->getDetailUrl()}}" target="_blank" class="btn btn-info">{{__("View")}}</a>
                    <a href="{{ route('user.wishList.remove',['id'=>$service->id , 'type' => $service->type]) }}" class="btn btn-warning">{{__("Remove")}}</a>
                </div>
            </div>
        </div>
    </div>
@endif