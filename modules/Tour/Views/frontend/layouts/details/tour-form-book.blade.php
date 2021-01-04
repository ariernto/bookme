<div class="bravo_single_book_wrap @if(setting_item('tour_enable_inbox')) has-vendor-box @endif">
    <div class="bravo_single_book">
        <div id="bravo_tour_book_app" v-cloak>
            <div class="form-book" :class="{'d-none':enquiry_type!='book'}">
                <div class="form-content">
                    <div class="form-group fullwidth">
                        <div class="date-wrapper">
                            <p class="bookcha">BOOK THIS TOUR</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 datefield">
                            <label>{{ __('Start to date')}}</label>
                            <input type="date" id="start" class="form-control" name="trip-start" value="2021-01-01" min="2021-01-01" max="2121-12-31">
                        </div>
                        <div class="col-lg-6 timefield">
                            <label>{{ __('Time')}}</label>
                            <input type="time" class="form-control" id="appt" name="appt"  min="00:00" max="23:59" required>
                        </div>
                    </div>
                    <div class="row" v-if="person_types">
                        <div class="form-guest-search col-lg-6" v-for="(type,index) in person_types">
                            <div class="guest-wrapper d-flex justify-content-between align-items-center flexblock">
                                <div class="flex-grow-1 col-lg-12">
                                    <label>@{{type.name}}</label>
                                </div>
                                <div class="flex-shrink-0 col-lg-8">
                                    <div class="input-number-group">
                                        <i class="icon ion-ios-remove card" @click="minusPersonType(type)"></i>
                                        <span class="input spancla card"><input type="number" v-model="type.number" min="1" @change="changePersonType(type)"/></span>
                                        <i class="icon ion-ios-add card" @click="addPersonType(type)"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-guest-search" v-else>
                        <div class="guest-wrapper d-flex justify-content-between align-items-center">
                            <div class="flex-grow-1">
                                <label>{{__("Guests")}}</label>
                            </div>
                            <div class="flex-shrink-0">
                                <div class="input-number-group">
                                    <i class="icon ion-ios-remove-circle-outline" @click="minusGuestsType()"></i>
                                    <span class="input"><input type="number" v-model="guests" min="1"/></span>
                                    <i class="icon ion-ios-add-circle-outline" @click="addGuestsType()"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-section-group form-group noborder" v-if="extra_price.length">
                        <div v-for="(type,index) in extra_price">
                            <div class="extra-price-wrap justify-content-between">
                                <div class="flex-grow-1 topline">
                                   <label>Adults</label>
                                    <p>1</p>
                                </div>
                                <div class="flex-grow-1 topline">
                                    <label> Children</label>
                                    <p>0</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-section-group form-group-padding" v-if="buyer_fees.length">
                        <div class="extra-price-wrap d-flex justify-content-between totalcost" v-for="(type,index) in buyer_fees">
                            <div class="flex-grow-1">
                                <label class="orangefont">Total Cost</label>
                            </div>
                            <div class="flex-shrink-0">
                                <div class="unit" v-if='type.unit == "percent"'>
                                    @{{ type.price }}%
                                </div>
                                <div class="unit" v-else >
                                    @{{ formatMoney(type.price) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-html="html"></div>
                <div class="submit-group notop">
                    <a class="btn btn-large orangebtn" name="submit">
                        <span>{{__("BOOK NOW")}}</span>
                        <i v-show="onSubmit" class="fa fa-spinner fa-spin"></i>
                    </a>
                    <button class="btn addbtn"><i class="fa fa-heart"></i> &nbsp;ADD TO WISHLIST</button>
                    <div class="alert-text mt10" v-show="message.content" v-html="message.content" :class="{'danger':!message.type,'success':message.type}"></div>
                </div>
            </div>
            <div class="form-send-enquiry" v-show="enquiry_type=='enquiry'">
                <button class="btn btn-primary" data-toggle="modal" data-target="#enquiry_form_modal">
                    {{ __("Contact Now") }}
                </button>
            </div>
        </div>
    </div>
</div>

@include("Booking::frontend.global.enquiry-form",['service_type'=>'tour'])

