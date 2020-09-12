@php $userInfo = Auth::user() @endphp
<form action="{{route('social.post.store')}}" method="post">
    @csrf
<div class="bravo-post-item create-post">
    <div class="post-header">{{__("Add new post")}}</div>
    <div class="post-body">
        <div class="post-author">
            <div class="media mb-2">
                <div class="media-left mr-3">
                    <a class="s-user-avatar">
                        @if($avatar_url = $userInfo->getAvatarUrl())
                            <img class="avatar" src="{{$avatar_url}}" alt="{{$userInfo->getDisplayName()}}">
                        @else
                            <span class="s-avatar-text">{{ucfirst($userInfo->getDisplayName()[0])}}</span>
                        @endif
                    </a>
                </div>
                <div class="media-body">
                    <textarea name="content" placeholder="{{__("How are you feeling today?")}}" class="form-control mb-1"  cols="30" rows="2"></textarea>
                    <div class="list-files-uploaded mb-1">

                    </div>
                    <ul class="list-unstyled post-add-files">
                        <li><a href="#" class="btn text-center btn-light btn-sm"><i class="svg-icon picture-icon"></i></a></li>
                    </ul>
                </div>
            </div>
            <button type="submit" class="btn btn-success btn-block">{{__("Share")}}</button>
        </div>
    </div>
</div>
</form>
