@if(setting_item("tour_enable_review"))
    <div class="bravo-reviews" id="bravo-reviews">
        <h5>{{__("Ratings & Reviews :")}}</h5>
        @if($review_score)
            <div class="review-box myreview">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="review-box-score nobordercla">
                            <div class="d-flex">
                                <i class="fa fa-star starcol"></i>
                                <i class="fa fa-star starcol"></i>
                                <i class="fa fa-star starcol"></i>
                                <i class="fa fa-star starcol"></i>
                                <i class="fa fa-star starcol"></i>
                            </div>
                            <p class="chacla">5.00</p>
                            <p class="chacla">15 reviews</p>
                            <u class="undochacla">Excellent</u>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="review-sumary">
                            <div class="item">
                                <div class="label">
                                    Excellent
                                </div>
                                <div class="progress">
                                    <div class="percent orangebtn" style="width: 85%"></div>
                                </div>
                                <div class="number">31</div>
                            </div>
                            <div class="item">
                                <div class="label">
                                    Very Good
                                </div>
                                <div class="progress">
                                    <div class="percent orangebtn" style="width: 70%"></div>
                                </div>
                                <div class="number">31</div>
                            </div>
                            <div class="item">
                                <div class="label">
                                    Average
                                </div>
                                <div class="progress">
                                    <div class="percent orangebtn" style="width: 45%"></div>
                                </div>
                                <div class="number">31</div>
                            </div>
                            <div class="item">
                                <div class="label">
                                    Poor
                                </div>
                                <div class="progress">
                                    <div class="percent orangebtn" style="width: 25%"></div>
                                </div>
                                <div class="number">31</div>
                            </div>
                            <div class="item">
                                <div class="label">
                                    Very Poor
                                </div>
                                <div class="progress">
                                    <div class="percent orangebtn" style="width: 25%"></div>
                                </div>
                                <div class="number">31</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="review-list">
            <div class="review-item">
                <div class="review-item-head">
                    <div class="media">
                        <div class="media-left">
                                <img class="avatar" src="{{asset('avatar.png')}}" alt="No Image">
                        </div>
                        <div class="media-body">
                            Erika<br/>
                            5 February 2020<br/>
                            The shell house was amazing very artsy! They put effort in every little detail of the entire house we absolutely love it
                        </div>
                    </div>
                </div>
            </div>
            <div class="review-item">
                <div class="review-item-head">
                    <div class="media">
                        <div class="media-left">
                                <img class="avatar" src="{{asset('avatar.png')}}" alt="No Image">
                        </div>
                        <div class="media-body">
                            Tamim anj<br/>
                            5 February 2020<br/>
                            The shell house was amazing very artsy! They put effort in every little detail of the entire house we absolutely love it
                        </div>
                    </div>
                </div>
            </div>
            <div class="review-item">
                <div class="review-item-head">
                    <div class="media">
                        <div class="media-left">
                                <img class="avatar" src="{{asset('avatar.png')}}" alt="No Image">
                        </div>
                        <div class="media-body">
                            Eva toha<br/>
                            5 February 2020<br/>
                            The shell house was amazing very artsy! They put effort in every little detail of the entire house we absolutely love it
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="review-pag-wrapper">
            @if($review_list->total() > 0)
                <div class="bravo-pagination">
                    {{$review_list->appends(request()->query())->fragment('review-list')->links()}}
                </div>
                <div class="review-pag-text">
                    {{ __("Showing :from - :to of :total total",["from"=>$review_list->firstItem(),"to"=>$review_list->lastItem(),"total"=>$review_list->total()]) }}
                </div>
            @else
                <div class="review-pag-text">{{__("No Review")}}</div>
            @endif
        </div>
        @if($row->check_enable_review_after_booking() and Auth::id())
        <div class="review-form">
            <div class="container">
                <div class="row">
                    <h5>{{__("Write a Review")}}</h5>
                </div>
                <div class="row">
                    <p>Your email address will not be published. Required fields are marked *</p>
                </div>
                <div class="row">
                   <div class="d-flex">
                       <p> Rating &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                       <i class="fa fa-star-o starcol"></i>
                       <i class="fa fa-star-o starcol"></i>
                       <i class="fa fa-star-o starcol"></i>
                       <i class="fa fa-star-o starcol"></i>
                       <i class="fa fa-star-o starcol"></i>
                   </div>
                </div>
                <div class="row bottomspace">
                    <div class="col-lg-6 row">
                        <div class="col-lg-2 nametxt">Name</div>
                        <div class="col-lg-8 nameinput"><input type="text" class="form-control goldborder" placeholder="Type Your Name" /></div>
                    </div>
                    <div class="col-lg-6 row">
                        <div class="col-lg-2 nametxt">Email</div>
                        <div class="col-lg-8 nameinput"><input type="text" class="form-control goldborder" placeholder="Type Your Email" /></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 row">
                        <div class="col-lg-1 nametxt">Review</div>
                        <div class="col-lg-11 nameinput"><textarea type="text" class="form-control smarttext" placeholder="Type Your Review"></textarea></div>
                    </div>
                </div>
                <div class="row">
                    <button class="btn orangebtn">Submit Comment</button>
                </div>
            </div>
        </div>
        @endif
        @if(!Auth::id())
            <div class="review-message">
                {!!  __("You must <a href='#login' data-toggle='modal' data-target='#login'>log in</a> to write review") !!}
            </div>
        @endif
    </div>
@endif

