@if(!empty($model_tag))
<div class="sidebar-widget widget_tag_cloud">
    <div class="sidebar-title"><h2>{{ $item->title }}</h2></div>
    <div class="tagcloud">
        @php
            $list_tags = \Modules\News\Models\NewsTag::getTags();
        @endphp
        <ul>
            @if($list_tags)
                @foreach($list_tags as $tag)
                    @php $translation = $tag->translateOrOrigin(app()->getLocale()) @endphp
                    <a href="{{ $tag->getDetailUrl(app()->getLocale()) }}" class="tag-cloud-link">{{$translation->name}}</a>
                @endforeach
            @endif
        </ul>
    </div>
</div>
@endif