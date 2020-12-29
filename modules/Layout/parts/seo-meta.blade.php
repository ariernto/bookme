@if(!empty($seo_meta))
    @if(isset($seo_meta['seo_index']) and $seo_meta['seo_index'] == 0)
        <meta name="robots" content="noindex">
    @endif
    @php
        $page_title = $seo_meta['seo_title'] ?? $seo_meta['service_title'] ?? $page_title ?? "";
        if(!empty($page_title) and empty($seo_meta['is_homepage'])){
            $page_title .= " - ".setting_item_with_lang('site_title' ,false,'Booking Core');
        }
        if(empty($page_title)){
            $page_title = setting_item_with_lang('site_title' ,false,'Booking Core');
        }
    @endphp
    <title>{{ $page_title }}</title>
    <meta name="description" content="{{$seo_meta['seo_desc'] ?? $seo_meta['service_desc'] ?? setting_item_with_lang("site_desc")}}"/>
    {{-- Facebook share --}}
    <meta property="og:url" content="{{$seo_meta['full_url'] ?? ""}}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="{{$seo_meta['seo_share']['facebook']['title'] ?? $seo_meta['seo_title'] ?? $seo_meta['service_title'] ?? $page_title ?? ""}}"/>
    <meta property="og:description" content="{{$seo_meta['seo_share']['facebook']['desc'] ?? $seo_meta['seo_desc'] ?? $seo_meta['service_desc'] ?? ""}}"/>
    <meta property="og:image" content="{{ get_file_url( $seo_meta['seo_share']['facebook']['image'] ?? $seo_meta['seo_image'] ?? $seo_meta['service_image'] ?? "" , "full") }}"/>
    {{-- Twitter share --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{$seo_meta['seo_share']['twitter']['title'] ?? $seo_meta['seo_title'] ?? $seo_meta['service_title'] ?? $page_title ?? ""}}">
    <meta name="twitter:description" content="{{$seo_meta['seo_share']['twitter']['desc'] ?? $seo_meta['seo_desc'] ?? $seo_meta['service_desc'] ?? ""}}">
    <meta name="twitter:image" content="{{ get_file_url( $seo_meta['seo_share']['twitter']['image'] ?? $seo_meta['seo_image'] ?? $seo_meta['service_image'] ?? "" , "full") }}">
    <link rel="canonical" href="{{$seo_meta['full_url'] ?? ""}}"/>
@else
    @php
        if(!empty($page_title)){
            $page_title .= " - ".setting_item_with_lang('site_title' ,false,'Booking Core');
        }else{
            $page_title = setting_item_with_lang('site_title' ,false,'Booking Core');
        }
    @endphp
    <title>{{ $page_title }}</title>
    <meta name="description" content="{{setting_item_with_lang("site_desc")}}"/>
@endif
