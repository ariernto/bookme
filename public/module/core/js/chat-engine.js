Vue.component('bravo-messages-box', {
    template: '#bravo-messages-box',
    data() {
        return {
        }
    },
    props:{
        messages:{
            type:Array,
            default:[]
        },
        current:{
            type:Object,
            default:{
                total:0
            }
        },
    },
    watch:{
        messages:function(){
            var me = this;
            window.setTimeout(function () {
                me.scrollToEnd();
            },40)
        }
    },
    computed:{
        messagesOrdered:function () {
            return _.orderBy(this.messages,['id','asc'])
        }
    },
    methods: {
        scrollToEnd:function(initial){
            var messageDisplay = this.$refs.messageDisplay;
            if(messageDisplay) {
                var t = messageDisplay.scrollTop + $(messageDisplay).outerHeight();

                if (typeof initial == 'undefined') initial = false;
                if (t >= messageDisplay.scrollHeight - 100 || initial) {
                    messageDisplay.scrollTop = messageDisplay.scrollHeight;
                }
            }
        },
    },
    created:function () {
        var me = this;
        window.setTimeout(function () {
            me.scrollToEnd(true);
        },40)
    }
});
Vue.directive('click-outside', {
    bind: function(el, binding, vNode) {
        // Provided expression must evaluate to a function.
        if (typeof binding.value !== 'function') {
            const compName = vNode.context.name
            let warn = `[Vue-click-outside:] provided expression '${binding.expression}' is not a function, but has to be`
            if (compName) { warn += `Found in component '${compName}'` }

            console.warn(warn)
        }
        // Define Handler and cache it on the element
        const bubble = binding.modifiers.bubble
        const handler = (e) => {
            if (bubble || (!el.contains(e.target) && el !== e.target)) {
                binding.value(e)
            }
        }
        el.__vueClickOutside__ = handler

        // add Event Listeners
        document.addEventListener('click', handler)
    },

    unbind: function(el, binding) {
        // Remove Event Listeners
        document.removeEventListener('click', el.__vueClickOutside__)
        el.__vueClickOutside__ = null

    }
});

window.bookingCoreChatBox = new Vue({
    el:'#bc-chat-box',
    data:{
        config:typeof bravo_chat_config !='undefined' ? bravo_chat_config : {

        },
        maximum:false,
        unread_count:0,
		content:'',
        currentConversation:{
            id:0,
            initial:false,
            messages:[
            ]
        },
        initialDocumentTitle:'',
        documentTitleInterval:null,
        conversations:[
        ],
        ready:false,
        loadMessageInterval:null,
        isWindowFocus:true,
    },
    components:{
        //'bravo-messages-box':
    },
    watch:{
        isWindowFocus:function(val){
            console.log('isWindowFocus: '+val);
        },
        unread_count:function (val) {
            if(val){
                document.title = '('+val+') '+this.initialDocumentTitle;
                this.ready = true;
            }else{
                document.title = this.initialDocumentTitle;
            }
        },
        message:function (val) {
            var me = this;

            var t = window.setInterval(function () {
                var input = $(me.$refs.inputMessageHidden);
                if(input.length){
                    window.clearInterval(t);
                    var h = t.scrollHeight + 2;
                    var r = Math.floor(h / 21);
                    if(r<=5){
                        $(me.$refs.inputMessage).css('height',h);
                    }
                }
            },70);

        }
    },
    computed:{
        inputMessageStyle:function () {
            var s = {};

            return s;
        },
        conversationsOrdered:function () {
            return _.orderBy(this.conversations, ['last_updated','desc'])
        },
    },
    methods:{
        setChatWindow:function(open){
            this.maximum = open;
            if(open && !this.currentConversation.id && this.conversations.length){
                this.openConversation(this.conversations[0]);
            }

            if(window.localStorage){
                window.localStorage.setItem('bravo_inbox_maximum',open ? 1 : 0);
            }
        },
        openConversation:function(chat){
            var me = this;
            this.currentConversation = chat;
            if(open && window.localStorage){
                window.localStorage.setItem('bravo_inbox_last',chat.id);
            }

            // if(!this.loadMessageInterval){
            //     this.loadMessageInterval = window.setInterval(function () {
            //
            //         this.reloadMessages();
            //
            //     },5000);
            // }

        },
        getChatNofitications:function(cb){
            var me = this;
            var isIntial = typeof this.currentConversation.initial !='undefined' ? 1 : '';
            $.ajax({
                url:this.config.routes.notifications,
                type:'post',
                data:{
                    inbox_id:this.currentConversation.id,
                    initial:isIntial,
                    ids:_.map(this.conversations,'id').join(',')
                },
                success:function (json) {
                    if(json.status){
                        me.unread_count = json.unread_count;
                        if(json.unread_count){
                            me.ready = true;
                        }
                        if(json.unread_conversations){
                            for(var i = 0 ; i< json.unread_conversations.length;i++){
                                var item = json.unread_conversations[i];
                                var f = _.find(me.conversations,{id:item.id});
                                if(typeof f !='undefined' && f){
                                    f.last_message  = item.last_message;
                                    f.last_updated  = item.last_updated;
                                    f.unread_count  = item.unread_count;
                                    f.messages  = _.unionBy(f.messages,item.messages,'id')
                                }else{
                                    me.conversations.push(item);
                                    if(!isIntial){
                                        me.setChatWindow(true);
                                    }
                                }

                            }
                        }

                        if(json.inbox){
                            me.currentConversation = json.inbox;
                        }
                        if(json.messages){
                            me.currentConversation.messages = _.unionBy(me.currentConversation.messages,json.messages,'id');
                            me.markRead(_.map(_.filter(json.messages,{me:false}),'id'));

                            var f = _.find(me.conversations,{id:me.currentConversation.id});
                            if(typeof f !== 'undefined'){
                                f.messages = _.unionBy(f.messages,json.messages,'id');
                            }
                        }

                        if(typeof cb == 'function'){
                            cb(json);
                        }
                    }
                },
                error:function (e) {
                    bravo_handle_error_response(e);
                }
            });
        },
        sendMessage(e){
            var me = this;
            if(typeof e !='undefined'){
                e.preventDefault();
            }
            if(!this.checkUser()) return;

            if(!this.content) return;

            // var message = {
            //     content:this.content,
            //     me:true
            // };
            // this.currentConversation.messages.push(message);

            $.ajax({
                url:this.config.routes.send,
                type:'post',
                dataType:'json',
                data:{
                    inbox_id:this.currentConversation.id,
					content:this.content
                },
                success:function (json) {
                    if(json.row){
                        me.currentConversation.messages = _.unionBy(me.currentConversation.messages,[json.row],'id');
                    }
				},
                error:function (e) {
                    bravo_handle_error_response(e);
				}
            });

            this.content = '';
            this.scrollToEnd();

        },
        doLoadMore(){
            var me = this;
            $.ajax({
                url:this.config.routes.reload,
                type:'post',
                dataType:'json',
                data:{
                    inbox_id:this.currentConversation.id,
                    offset:this.currentConversation.messages.length
                },
                success:function (json) {
                    if(json.messages){
                        me.currentConversation.messages = _.unionBy(me.currentConversation.messages,json.messages,'id');
                    }

                    window.setTimeout(function () {
                        me.scrollToEnd();
                    },70);

                },
                error:function (e) {
                    bravo_handle_error_response(e);
                }
            });
        },
        reloadMessages: function(){
            return;
            var me = this;
            $.ajax({
                url:this.config.routes.reload,
                type:'post',
                dataType:'json',
                data:{
                    inbox_id:this.currentConversation.id,
                    offset:this.currentConversation.messages.length
                },
                success:function (json) {
                    if(json.messages){
                        me.currentConversation.messages = _.unionBy(me.currentConversation.messages,json.messages,'id');
                    }

                    window.setTimeout(function () {
                        me.scrollToEnd();
                    },70);

                },
                error:function (e) {
                    bravo_handle_error_response(e);
                }
            });
        },
        scrollToEnd:function(){
            var messageDisplay = this.$refs.messageDisplay;
            messageDisplay.scrollTop = messageDisplay.scrollHeight;
        },
        initConversation:function(id,type){
            var me = this;
            if(!this.checkUser()) return;

			$.ajax({
				url:this.config.routes.init,
				type:'post',
				dataType:'json',
				data:{
					service_type:type,
					service_id:id,
				},
				success:function (json) {
                    if(json.status){
                        me.ready = true;

                        var f = _.find(me.conversations,['id',json.id]);

                        if(!f){
                            me.conversations.push(json);
                            me.currentConversation = json;

                        }else{

                            f.unread_count = json.unread_count;
                            f.last_updated = json.last_updated;
                            f.last_updated_text = json.last_updated_text;
                            f.last_message = json.last_message;
                            f.messages = _.unionBy(f.messages,json.messages,'id');
                            me.currentConversation = f;
                        }

                        me.reloadMessages();

                        me.maximum = true;
                    }
				},
				error:function (e) {
					bravo_handle_error_response(e);
					if(e.responseData && e.responseData.errors)
                    {
                    }
				}
			});
        },
        checkUser:function(){
            if(!bookingCore.currentUser){
                $('#login').modal('show');
                return false;
            }
            return true;
        },
        markRead:function (ids) {

            if(typeof ids !='object' || !ids.length || !this.isWindowFocus || !this.maximum) return;
            var me = this;

            window.setTimeout(function () {
                $.ajax({
                    url: me.config.routes.read,
                    type: 'post',
                    dataType: 'json',
                    data: {
                        ids: ids.join(','),
                    },
                    success: function (json) {
                    },
                    error: function (e) {
                        bravo_handle_error_response(e);
                    }
                });

            },3000);
        }

    },
    created:function () {
        var me = this;
        this.$nextTick(function () {
            // $('.bc_start_chat').click(function () {
            //     me.initConversation($(this).data('id'),$(this).data('type'));
			// });

        });

        this.initialDocumentTitle = document.title;

        if(this.config.enable &&  bookingCore.currentUser){

            if(window.localStorage){
                var bravo_inbox_last = window.localStorage.getItem('bravo_inbox_last');
                if(bravo_inbox_last && bravo_inbox_last != 'undefined'){
                    me.currentConversation.id = bravo_inbox_last;
                    me.currentConversation.initial = true;
                    this.ready = true;
                }
            }
            me.getChatNofitications(function (json) {
                if(window.localStorage){
                    var bravo_inbox_maximum = window.localStorage.getItem('bravo_inbox_maximum');
                    if(bravo_inbox_maximum > 0){
                        me.setChatWindow(true);
                    }
                }
                if(json.unread_conversations && json.unread_conversations.length && !me.ready){
                    me.ready = true;
                }
            });

            window.setInterval(function () {
                me.getChatNofitications();
            },5000);
        }
    }
});
