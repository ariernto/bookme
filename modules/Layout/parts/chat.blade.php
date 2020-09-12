@php
if(!setting_item('inbox_enable')) return;
@endphp
<div id="bc-chat-box" class="bc-chat-box" v-cloak="" v-show="ready" @click-outside="isWindowFocus = false" @click="isWindowFocus = true">
    <div v-if="!maximum" class="chat-minimize" @click="setChatWindow(true)">
        <i class="icon ion-ios-chatboxes"></i> {{__('Messages')}}
        <span v-show="unread_count" class="unread-count">@{{unread_count}}</span>
    </div>
    <div v-else class="chat-maximum">
        <div class="chat-header">
            <span>
                <i class="icon ion-ios-chatboxes"></i>
                <span v-if="currentConversation.id">{{__('Chat with: ')}} @{{currentConversation.display_name}}</span>
            </span>
            <div class="header-actions">
                <span class="btn-minimize" title="{{__('Minimum window')}}" @click="setChatWindow(false)"><i class="icon ion-ios-remove"></i></span>
            </div>
        </div>
        <div class="chat-content">
            <div class="chat-navs" v-if="conversations.length && conversations.length >1">
                <div class="chat-conversation-nav" v-for="chat in conversationsOrdered" @click="openConversation(chat)" :class="{'active':currentConversation.id == chat.id }">
                    <div class="media">
                        <div class="media-left">
                            <img v-if="chat.avatar_url" :src="chat.avatar_url">
                            <span v-else class="avatar-text">@{{chat.display_name ? chat.display_name[0] : ''}}</span>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><a class="author-link">@{{chat.display_name}}</a></h4>
                            <p v-if="chat.last_message.id">
                                <span v-if="chat.last_message.me">{{__('You: ')}}</span>
                                @{{chat.last_message.content}}</p>
                            <span class="unread_count" v-if="chat.unread_count">@{{chat.unread_count }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="chat-box-content" v-show="currentConversation.id">
                <bravo-messages-box :key="currentConversation.id" @click-load-more="doLoadMore" :messages="currentConversation.messages" :current="currentConversation" ref="messageDisplay"></bravo-messages-box>

                <div class="chat-add-new">
                    {{--<div class="chat-actions-left">--}}
                        {{--<div class="chat-form-action">--}}
                            {{--<i class="icon ion-ios-attach"></i>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="chat-input">
                        <textarea ref="inputMessage" v-on:keyup.enter="sendMessage($event)" :style="inputMessageStyle" rows="1" v-model="content" class="form-control"></textarea>
                    </div>
                    <div class="chat-actions-right">
                        <div @click="sendMessage" class="chat-form-action chat-sends" ><i class="icon ion-md-send"></i></div>
                    </div>
                </div>
                <div class="hidden">
                    <textarea rows="1" ref="inputMessageHidden" v-model="content" class="form-control" style="visibility: hidden;opacity: 0"></textarea>
                </div>

            </div>
        </div>
    </div>
</div>
<script type="text/x-template" id="bravo-messages-box">
    <div class="chat-messages" ref="messageDisplay">
        <div class="load-more-text text-center" style="cursor: pointer" v-if="messages.length < current.total" @click="$emit('click-load-more')"  >
            <a>{{__('Load more')}}</a>
        </div>
        <div v-for="m in messagesOrdered" :class="{'m-me':m.me}" class="message-item">
            <div class="m-content"  v-html="m.content">
            </div>
            <span class="m-date"><i>@{{m.last_updated_text}}</i></span>
        </div>
    </div>
</script>
<script>
    var bravo_chat_config  = {
        enable:true,
    	routes:{
    		send:'{{route('inbox.send')}}',
			notifications:'{{route('inbox.notifications')}}',
			init:'{{route('inbox.init')}}',
            reload:'{{route('inbox.reload')}}',
            read:'{{route('inbox.read')}}',
        }
    };
</script>
