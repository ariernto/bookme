@foreach($rows as $row)
    @php
        $translation = $row->translateOrOrigin(app()->getLocale()); @endphp
    <div class="post_item ">
        <div class="header">
            @if($image_tag = get_image_tag($row->image_id,'full',['alt'=>$translation->title]))
                <header class="post-header">
                    <a href="{{$row->getDetailUrl()}}">
                        {!! $image_tag !!}
                    </a>
                </header>
                <div class="cate">
                    @php $category = $row->getCategory; @endphp
                    @if(!empty($category))
                        @php $t = $category->translateOrOrigin(app()->getLocale()); @endphp
                        <ul>
                            <li>
                                <a href="{{$category->getDetailUrl(app()->getLocale())}}">
                                    {{$t->name ?? ''}}
                                </a>
                            </li>
                        </ul>
                    @endif
                </div>
            @endif
            <div class="post-inner">
                <h3 class="post-title">
                    <a class="text-darken" href="{{$row->getDetailUrl()}}"> {!! clean($translation->title) !!}</a>
                </h3>
                <div class="post-info">
                    <ul>
                        @if(!empty($row->getAuthor))
                            <li>
                                @if($avatar_url = $row->getAuthor->getAvatarUrl())
                                    <img class="avatar" src="{{$avatar_url}}" alt="{{$row->getAuthor->getDisplayName()}}">
                                @else
                                    <span class="avatar-text">{{ucfirst($row->getAuthor->getDisplayName()[0])}}</span>
                                @endif
                                <span> {{ __('BY ')}} </span>
                                {{$row->getAuthor->getDisplayName() ?? ''}}
                            </li>
                        @endif
                        <li> {{__('DATE ')}}  {{ display_date($row->updated_at)}}  </li>
                    </ul>
                </div>
                <div class="post-desciption">
                    {!! get_exceprt($translation->content) !!}
                </div>
                <a class="btn-readmore" href="{{$row->getDetailUrl()}}">{{ __('Read More')}}</a>
            </div>
        </div>
    </div>
@endforeach
