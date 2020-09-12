@php $main_color = setting_item('style_main_color','#5191fa');
$style_typo = json_decode(setting_item_with_lang('style_typo',false,"{}"),true);
@endphp
    a,
    .bravo-news .btn-readmore,
    .bravo_wrap .bravo_header .content .header-left .bravo-menu ul li:hover > a,
    .bravo_wrap .bravo_search_tour .bravo_form_search .bravo_form .field-icon,
    .bravo_wrap .bravo_search_tour .bravo_form_search .bravo_form .render,
    .bravo_wrap .bravo_search_tour .bravo_form_search .bravo_form .field-detination #dropdown-destination .form-control,
    .bravo_wrap .bravo_search_tour .bravo_filter .g-filter-item .item-content .btn-apply-price-range,
    .bravo_wrap .bravo_search_tour .bravo_filter .g-filter-item .item-content .btn-more-item,
    .input-number-group i,
    .bravo_wrap .page-template-content .bravo-form-search-tour .bravo_form_search_tour .field-icon,
    .bravo_wrap .page-template-content .bravo-form-search-tour .bravo_form_search_tour .field-detination #dropdown-destination .form-control,
    .bravo_wrap .page-template-content .bravo-form-search-tour .bravo_form_search_tour .render,
    .hotel_rooms_form .form-search-rooms .form-search-row>div .form-group .render,
    .bravo_wrap .bravo_form .form-content .render,
    a:hover {
        color: {{$main_color}};
    }
    .bravo-pagination ul li.active a, .bravo-pagination ul li.active span
    {
        color:{{$main_color}}!important;
    }
    .bravo-news .widget_category ul li span,
    .bravo_wrap .bravo_search_tour .bravo_form_search .bravo_form .g-button-submit button,
    .bravo_wrap .bravo_search_tour .bravo_filter .filter-title:before,
    .bravo_wrap .bravo_search_tour .bravo_filter .g-filter-item .item-content .bravo-filter-price .irs--flat .irs-bar,
    .bravo_wrap .bravo_search_tour .bravo_filter .g-filter-item .item-content .bravo-filter-price .irs--flat .irs-from, .bravo_wrap .bravo_search_tour .bravo_filter .g-filter-item .item-content .bravo-filter-price .irs--flat .irs-to, .bravo_wrap .bravo_search_tour .bravo_filter .g-filter-item .item-content .bravo-filter-price .irs--flat .irs-single,
    .bravo_wrap .bravo_search_tour .bravo_filter .g-filter-item .item-content .bravo-filter-price .irs--flat .irs-handle>i:first-child,
    .bravo-news .header .cate ul li,
    .bravo_wrap .page-template-content .bravo-form-search-tour .bravo_form_search_tour .g-button-submit button,
    .bravo_wrap .page-template-content .bravo-list-locations .list-item .destination-item .image .content .desc,
    .bravo_wrap .bravo_detail_space .bravo_content .g-attributes h3:after,
    .bravo_wrap .bravo_form .g-button-submit button,
    .btn.btn-primary,
    .bravo_wrap .bravo_form .g-button-submit button:active,
    .btn.btn-primary:active,
    .bravo_wrap .bravo_detail_space .bravo-list-hotel-related-widget .heading:after,
    .btn-primary:not(:disabled):not(.disabled):active
    {
        background: {{$main_color}};
    }

    .bravo-pagination ul li.active a, .bravo-pagination ul li.active span
    {
        border-color:{{$main_color}}!important;
    }
    .bravo_wrap .bravo_search_tour .bravo_filter .g-filter-item .item-content .bravo-filter-price .irs--flat .irs-from:before, .bravo_wrap .bravo_search_tour .bravo_filter .g-filter-item .item-content .bravo-filter-price .irs--flat .irs-to:before, .bravo_wrap .bravo_search_tour .bravo_filter .g-filter-item .item-content .bravo-filter-price .irs--flat .irs-single:before,
    .bravo-reviews .review-form .form-wrapper,
    .bravo_wrap .bravo_detail_tour .bravo_content .bravo_tour_book
    {
        border-top-color:{{$main_color}};
    }

    .bravo_wrap .bravo_footer .main-footer .nav-footer .context .contact{
        border-left-color:{{$main_color}};
    }
    .hotel_rooms_form .form-search-rooms{
        border-bottom-color:{{$main_color}};
    }

    .bravo_wrap .bravo_form .field-icon,
    .bravo_wrap .bravo_form .smart-search .parent_text,
    .bravo_wrap .bravo_form .smart-search:after,
    .bravo_wrap .bravo_form .dropdown-toggle:after,
    .bravo_wrap .page-template-content .bravo-list-space .item-loop .service-review .rate,
    .bravo_wrap .bravo_search_space .bravo_filter .g-filter-item .item-content .btn-more-item,
    .bravo_wrap .bravo_detail_space .bravo_content .g-header .review-score .head .left .text-rating,
    .bravo-reviews .review-box .review-box-score .review-score,
    .bravo-reviews .review-box .review-box-score .review-score-base span,
    .bravo_wrap .bravo_detail_tour .bravo_content .g-header .review-score .head .left .text-rating
    {
        color: {{$main_color}};
    }

    .bravo_wrap .bravo_form .smart-search .parent_text::-webkit-input-placeholder{

        color: {{$main_color}};
    }
    .bravo_wrap .bravo_form .smart-search .parent_text::-moz-placeholder{

        color: {{$main_color}};
    }
    .bravo_wrap .bravo_form .smart-search .parent_text::-ms-input-placeholder{

        color: {{$main_color}};
    }
    .bravo_wrap .bravo_form .smart-search .parent_text::-moz-placeholder{

        color: {{$main_color}};
    }
    .bravo_wrap .bravo_form .smart-search .parent_text::placeholder{

        color: {{$main_color}};
    }


    .bravo_wrap .bravo_search_space .bravo-list-item .list-item .item-loop .service-review .rate,
    .bravo_wrap .bravo_search_space .bravo_filter .g-filter-item .item-content .btn-apply-price-range{

        color: {{$main_color}};
    }
    .bravo_wrap .page-template-content .bravo-list-locations.style_2 .list-item .destination-item:hover .title,
    .bravo_wrap .page-template-content .bravo-list-space .item-loop .sale_info,
    .bravo_wrap .bravo_search_space .bravo-list-item .list-item .item-loop .sale_info,
    .bravo_wrap .bravo_search_space .bravo_filter .filter-title:before,
    .bravo_wrap .bravo_detail_space .bravo_content .g-header .review-score .head .score,
    .bravo-reviews .review-form .btn,
    .bravo_wrap .bravo_search_space .bravo_filter .g-filter-item .item-content .bravo-filter-price .irs--flat .irs-bar,
    .bravo_wrap .bravo_search_space .bravo_filter .g-filter-item .item-content .bravo-filter-price .irs--flat .irs-from,
    .bravo_wrap .bravo_search_space .bravo_filter .g-filter-item .item-content .bravo-filter-price .irs--flat .irs-to,
    .bravo_wrap .bravo_search_space .bravo_filter .g-filter-item .item-content .bravo-filter-price .irs--flat .irs-single,
    .bravo_wrap .bravo_search_space .bravo_filter .g-filter-item .item-content .bravo-filter-price .irs--flat .irs-from,
    .bravo_wrap .bravo_search_space .bravo_filter .g-filter-item .item-content .bravo-filter-price .irs--flat .irs-to,
    .bravo_wrap .bravo_search_space .bravo_filter .g-filter-item .item-content .bravo-filter-price .irs--flat .irs-single,
    .bravo_wrap .bravo_search_space .bravo_filter .g-filter-item .item-content .bravo-filter-price .irs--flat .irs-handle>i:first-child
    {
        background: {{$main_color}};
    }
    .bravo_wrap .bravo_search_space .bravo_filter .g-filter-item .item-content .bravo-filter-price .irs--flat .irs-from:before, .bravo_wrap .bravo_search_space .bravo_filter .g-filter-item .item-content .bravo-filter-price .irs--flat .irs-to:before, .bravo_wrap .bravo_search_space .bravo_filter .g-filter-item .item-content .bravo-filter-price .irs--flat .irs-single:before {
        border-top-color: {{$main_color}};
    }

    .bravo_wrap .bravo_detail_space .bravo_content .g-overview ul li:before {
        border: 1px solid {{$main_color}};
    }

    .bravo_wrap .bravo_detail_space .bravo-list-space-related .item-loop .sale_info {
        background-color: {{$main_color}};
    }

    .bravo_wrap .bravo_detail_space .bravo_content .g-header .review-score .head .score::after {
        border-bottom: 25px solid {{$main_color}};
    }

    .bravo_wrap .bravo_detail_space .bravo_content .bravo_space_book {
        border-top: 5px solid {{$main_color}};
    }

    body .daterangepicker.loading:after {
        color: {{$main_color}};
    }

    body .daterangepicker .drp-calendar .calendar-table tbody tr td.end-date {
        border-right: solid 2px {{$main_color}};
    }
    body .daterangepicker .drp-calendar .calendar-table tbody tr td.start-date {
        border-left: solid 2px {{$main_color}};
    }
    .bravo_wrap .bravo_detail_space .bravo-list-space-related .item-loop .service-review .rate {
        color: {{$main_color}};
    }

    .has-search-map .bravo-filter-price .irs--flat .irs-bar,
    .has-search-map .bravo-filter-price .irs--flat .irs-handle>i:first-child,
    .has-search-map .bravo-filter-price .irs--flat .irs-from, .has-search-map .bravo-filter-price .irs--flat .irs-to, .has-search-map .bravo-filter-price .irs--flat .irs-single {
        background-color: {{$main_color}};
    }

    .has-search-map .bravo-filter-price .irs--flat .irs-from:before, .has-search-map .bravo-filter-price .irs--flat .irs-to:before, .has-search-map .bravo-filter-price .irs--flat .irs-single:before {
        border-top-color: {{$main_color}};
    }

    .bravo_wrap .bravo_detail_tour .bravo_content .g-header .review-score .head .score {
        background: {{$main_color}};
    }
    .bravo_wrap .bravo_detail_tour .bravo_content .g-header .review-score .head .score::after {
        border-bottom: 25px solid {{$main_color}};
    }

    .bravo_wrap .bravo_detail_tour .bravo_content .g-overview ul li:before {
        border: 1px solid {{$main_color}};
    }

    .bravo_wrap .bravo_detail_location .bravo_content .g-location-module .location-module-nav li a.active {
        border-bottom: 1px solid {{$main_color}};
        color: {{$main_color}};
    }

    .bravo_wrap .bravo_detail_location .bravo_content .g-location-module .item-loop .sale_info {
        background-color: {{$main_color}};
    }
    .bravo_wrap .page-template-content .bravo-featured-item.style2 .number-circle {
        border: 2px solid {{$main_color}};
        color: {{$main_color}};
    }
    .bravo_wrap .page-template-content .bravo-featured-item.style3 .featured-item:hover {
        border-color: {{$main_color}};
    }

    .booking-success-notice .booking-info-detail {
        border-left: 3px solid {{$main_color}};
    }
    .bravo_wrap .bravo_detail_tour .bravo_single_book,
    .bravo_wrap .bravo_detail_space .bravo_single_book {
        border-top: 5px solid{{$main_color}};
    }
    .bravo_wrap .page-template-content .bravo-form-search-all .g-form-control .nav-tabs li a.active {
        background-color: {{$main_color}};
        border-color: {{$main_color}};
    }

    .bravo_wrap .bravo_detail_location .bravo_content .g-location-module .item-loop .service-review .rate,
    .bravo_wrap .bravo_detail_location .bravo_content .g-trip-ideas .trip-idea .trip-idea-category,
    .bravo_wrap .bravo_footer .main-footer .nav-footer .context ul li a:hover,
    .bravo_wrap .bravo_detail_tour .bravo_content .g-attributes .list-attributes .item i.icon-default,
    .bravo_wrap .bravo_detail_space .bravo_content .g-attributes .list-attributes .item i.icon-default,
    .bravo_wrap .page-template-content .bravo-list-hotel .item-loop .service-review .rate,
    .bravo_wrap .page-template-content .bravo-list-tour.box_shadow .list-item .item .caption .title-address .title a:hover,
    .bravo_wrap .bravo_search_hotel .bravo-list-item .list-item .item-loop .service-review .rate,
    .bravo_wrap .bravo_search_hotel .bravo_filter .g-filter-item .item-content .btn-apply-price-range {
        color: {{$main_color}};
    }

    .bravo_wrap .bravo_detail_tour .bravo-list-tour-related .item-tour .featured ,
    .bravo_wrap .bravo_search_tour .bravo-list-item .list-item .item-tour .featured,
    .bravo_wrap .page-template-content .bravo-list-tour .item-tour .featured,
    .bravo_wrap .bravo_search_hotel .bravo_filter .filter-title:before {
        background: {{$main_color}};
    }
    .bravo_wrap .page-template-content .bravo-list-tour.box_shadow .list-item .item .header-thumb .tour-book-now,
    .bravo_wrap .bravo_search_hotel .bravo-list-item .list-item .item-loop .sale_info,
    .bravo_wrap .bravo_search_hotel .bravo_filter .g-filter-item .item-content .bravo-filter-price .irs--flat .irs-bar,
    .bravo_wrap .bravo_search_hotel .bravo_filter .g-filter-item .item-content .bravo-filter-price .irs--flat .irs-from,
    .bravo_wrap .bravo_search_hotel .bravo_filter .g-filter-item .item-content .bravo-filter-price .irs--flat .irs-to,
    .bravo_wrap .bravo_search_hotel .bravo_filter .g-filter-item .item-content .bravo-filter-price .irs--flat .irs-single,
    .bravo_wrap .bravo_search_hotel .bravo_filter .g-filter-item .item-content .bravo-filter-price .irs--flat .irs-from,
    .bravo_wrap .bravo_search_hotel .bravo_filter .g-filter-item .item-content .bravo-filter-price .irs--flat .irs-to,
    .bravo_wrap .bravo_search_hotel .bravo_filter .g-filter-item .item-content .bravo-filter-price .irs--flat .irs-single,
    .bravo_wrap .bravo_search_hotel .bravo_filter .g-filter-item .item-content .bravo-filter-price .irs--flat .irs-handle>i:first-child {
        background-color: {{$main_color}};
    }
    .bravo_wrap .bravo_search_hotel .bravo_filter .g-filter-item .item-content .bravo-filter-price .irs--flat .irs-from:before,
    .bravo_wrap .bravo_search_hotel .bravo_filter .g-filter-item .item-content .bravo-filter-price .irs--flat .irs-to:before,
    .bravo_wrap .bravo_search_hotel .bravo_filter .g-filter-item .item-content .bravo-filter-price .irs--flat .irs-single:before {
        border-top-color: {{$main_color}};
    }

    .bravo_wrap .bravo_search_hotel .bravo-list-item .list-item .item-loop-list .service-review-pc .head .score,
    .bravo_wrap .bravo_search_hotel .bravo_content .g-header .review-score .head .score {
        background: {{$main_color}};
    }

    .bravo_wrap .bravo_search_hotel .bravo_content .g-overview ul li:before {
        border: 1px solid {{$main_color}};
    }
    .bravo_wrap .bravo_search_hotel .bravo_filter .g-filter-item .item-content .btn-more-item,
    .bravo_wrap .bravo_search_hotel .bravo_content .g-header .review-score .head .left .text-rating,
    .bravo_wrap .bravo_search_hotel .bravo-list-item .list-item .item-loop-list .service-review-pc .head .left .text-rating,
    .bravo_wrap .bravo_detail_hotel  .btn-show-all,
    .bravo_wrap .bravo_detail_hotel  .bravo-list-hotel-related .item-loop .service-review .rate,
    .bravo_wrap .bravo_form .select-guests-dropdown .dropdown-item-row .count-display{
        color: {{$main_color}};
    }

    .bravo_wrap .bravo_search_hotel .bravo-list-item .list-item .item-loop-list .service-review-pc .head .score::after {
        border-bottom: 15px solid {{$main_color}};
    }
    .bravo_wrap .bravo_detail_hotel .bravo_content .g-header .review-score .head .score:after {
        border-bottom: 25px solid {{$main_color}};
    }
    .bravo_wrap .bravo_detail_hotel .bravo_content .g-header .review-score .head .score {
        background: {{$main_color}};
    }

    .bravo_wrap .bravo_detail_hotel .bravo-list-hotel-related-widget .heading:after {
        background: {{$main_color}};
    }
    .bravo_wrap .bravo_detail_hotel .bravo_content .g-attributes h3:after {
        background: {{$main_color}};
    }
    .bravo_wrap .bravo_detail_hotel .bravo_content .g-header .review-score .head .left .text-rating {
        color: {{$main_color}};
    }
    .bravo_wrap .select-guests-dropdown .dropdown-item-row .count-display {
        color: {{$main_color}};
    }

    .bravo_wrap .bravo-checkbox input[type=checkbox]:checked+.checkmark:after {
        border: solid {{$main_color}};
        border-width: 0 2px 2px 0;
    }
    .bravo_wrap .bravo_form .input-search .form-control::-webkit-input-placeholder {
        color: {{$main_color}};
    }
    .bravo_wrap .bravo_form .input-search .form-control:-ms-input-placeholder {
        color: {{$main_color}};
    }
    .brav_wrap .bravo_form .input-search .form-control::placeholder {
        color: {{$main_color}};
    }

    .bravo_wrap .bravo_search_event .bravo_filter .g-filter-item .item-content .btn-apply-price-range{
        color: {{$main_color}};
    }
    .bravo_wrap .bravo_search_event .bravo_filter .filter-title:before,
    .bravo_wrap .bravo_search_event .bravo_filter .g-filter-item .item-content .bravo-filter-price .irs--flat .irs-bar,
    .bravo_wrap .bravo_search_event .bravo_filter .g-filter-item .item-content .bravo-filter-price .irs--flat .irs-from,
    .bravo_wrap .bravo_search_event .bravo_filter .g-filter-item .item-content .bravo-filter-price .irs--flat .irs-to,
    .bravo_wrap .bravo_search_event .bravo_filter .g-filter-item .item-content .bravo-filter-price .irs--flat .irs-single,
    .bravo_wrap .bravo_search_event .bravo_filter .g-filter-item .item-content .bravo-filter-price .irs--flat .irs-from,
    .bravo_wrap .bravo_search_event .bravo_filter .g-filter-item .item-content .bravo-filter-price .irs--flat .irs-to,
    .bravo_wrap .bravo_search_event .bravo_filter .g-filter-item .item-content .bravo-filter-price .irs--flat .irs-single,
    .bravo_wrap .bravo_search_event .bravo_filter .g-filter-item .item-content .bravo-filter-price .irs--flat .irs-handle>i:first-child
    {
        background: {{$main_color}};
    }

    .bravo_wrap .bravo_search_event .bravo_filter .g-filter-item .item-content .bravo-filter-price .irs--flat .irs-from:before,
    .bravo_wrap .bravo_search_event .bravo_filter .g-filter-item .item-content .bravo-filter-price .irs--flat .irs-to:before,
    .bravo_wrap .bravo_search_event .bravo_filter .g-filter-item .item-content .bravo-filter-price .irs--flat .irs-single:before {
        border-top-color: {{$main_color}};
    }

    .bravo_wrap .bravo_search_event .bravo_filter .g-filter-item .item-content .btn-more-item {
        color: {{$main_color}};
    }

    .bravo_wrap .bravo_detail_event .bravo_content .g-header .review-score .head .score:after {
        border-bottom: 25px solid {{$main_color}};
    }
    .bravo_wrap .bravo_detail_event .bravo_content .g-header .review-score .head .score {
        background: {{$main_color}};
    }
    .bravo_wrap .bravo_detail_event .bravo_content .g-header .review-score .head .left .text-rating {
        color: {{$main_color}};
    }
    .bravo_wrap .bravo_single_book .nav-enquiry .enquiry-item.active span {
        border-bottom: solid 1px {{$main_color}} !important;
        color: {{$main_color}} !important;
    }
    .bravo_wrap .bravo_detail_event .bravo_content .g-overview ul li:before {
        border: 1px solid {{$main_color}};
    }
    .bravo_wrap .bravo_detail_event .bravo_content .g-attributes .list-attributes .item i.icon-default {
        color: {{$main_color}};
    }
    .bravo_wrap .bravo_detail_event .bravo_single_book {
        border-top: 5px solid {{$main_color}};
    }

    .bravo_wrap .bravo_detail_hotel .bravo_single_book {
        border-top: 5px solid {{$main_color}};
    }
    .bravo_wrap .bravo_detail_car  .bravo_single_book {
        border-top: 5px solid {{$main_color}};
    }
    .bravo_wrap .bravo_detail_car .bravo_content .g-header .review-score .head .score:after {
        border-bottom: 25px solid {{$main_color}};
    }
    .bravo_wrap .bravo_detail_car .bravo_content .g-header .review-score .head .score {
        background: {{$main_color}};
    }
    .bravo_wrap .bravo_detail_car .bravo_content .g-header .review-score .head .left .text-rating {
        color: {{$main_color}};
    }

    body{
    @if(!empty($style_typo) && is_array($style_typo))
        @foreach($style_typo as $k=>$v)
            @if($v)
                {{str_replace('_','-',$k)}}:{!! $v !!};
            @endif
        @endforeach
    @endif
    }

    {!! (setting_item('style_custom_css')) !!}
    {!! (setting_item_with_lang_raw('style_custom_css')) !!}