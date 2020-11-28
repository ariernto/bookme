export default function(){
    window.mediaManagement = new Vue({
        el: '#media-management',
        data:{
            files:[],
            viewType:'grid',
            total:0,
            totalPage:0,
            fileTypes:[],
            selected:[],
            selectedLists:[],
            showUploader:false,
            apiFinished:false,
            modalEl:false,
            multiple:true,
            isLoading:false,
            filter:{
                page:1
            },
            onSelect:function () {

            },
            uploadConfigs:{

            }
        },
        mounted(){
            let me = this;
            me.reloadLists();

            this.$nextTick(function () {
                $(this.$refs.files).change(function () {
                    me.upload(this.files)
                })
            })

        },
        watch:{
            uploadConfigs(val){
                this.multiple = val.multiple;
                this.onSelect = val.onSelect;
            }
        },
        methods:{
            show(configs){
                this.files = [];
                this.resetSelected();
                this.uploadConfigs = configs;
                this.modalEl.modal('show');
            },
            hide(){
                this.modalEl.modal('hide');
            },
            changePage(p,e){
                e.preventDefault();
                this.filter.page = p;
                this.reloadLists();
            },
            selectFile(file){
                var index = this.selected.indexOf(file.id);
                if (index > -1) {
                    this.selected.splice(index, 1);
                    this.selectedLists.splice(index,1);
                }else{
                    if(!this.multiple){
                        this.selected = [];
                        this.selectedLists = [];
                    }
                    this.selected.push(file.id);
                    this.selectedLists.push(file);
                }
            },
            removeFiles() {
                var me = this;
                bookingCoreApp.showConfirm({
                    message: i18n.confirm_delete,
                    callback: function(result){
                        if(result){
                            me.isLoading = true;
                            $.ajax({
                                url:bookingCore.url+'/admin/module/media/removeFiles',
                                type:'POST',
                                data:{
                                    file_ids : me.selected
                                },
                                dataType:'json',
                                success:function (data) {
                                    if(data.status === 1){
                                        //bookingCoreApp.showSuccess(data);
                                    }
                                    if(data.status === 0){
                                        bookingCoreApp.showError(data);
                                    }
                                    me.isLoading = false;
                                    me.reloadLists();
                                },
                                error:function (e) {
                                    me.isLoading = false;
                                    bookingCoreApp.showAjaxError(e);
                                    me.resetSelected();
                                }
                            });
                        }
                    }
                })
            },
            sendFiles(){
                if(typeof this.onSelect == 'function'){
                    let f = this.onSelect;
                    f(this.selectedLists)
                }
                this.hide();
            },
            init(){
                var me = this;
                this.reloadLists();
            },
            reloadLists(){
                var me = this;
                $("#cdn-browser .icon-loading").addClass("active");
                me.isLoading = true;
                $.ajax({
                    url:bookingCore.url+'/admin/module/media/getLists',
                    type:'POST',
                    data:{
                        file_type:this.uploadConfigs.file_type,
                        page:this.filter.page,
                        s:this.filter.s
                    },
                    dataType:'json',
                    success:function (json) {
                        me.resetSelected();
                        me.files = json.data;
                        me.total = json.total;
                        me.totalPage = json.totalPage;
                        me.isLoading = false;
                        me.apiFinished = true;
                    }
                });
            },
            upload(files){
                var me = this;
                if(!files.length) return ;
                console.log(files);
                for(var i = 0; i < files.length ; i++){
                    var d = new FormData();
                    d.append('file',files[i]);
                    d.append('type',this.uploadConfigs.file_type);
                    me.isLoading = true;
                    $.ajax({
                        url:bookingCore.url+'/admin/module/media/store',
                        data:d,
                        dataType:'json',
                        type:'post',
                        contentType: false,
                        processData: false,
                        success:function (res) {
                            me.isLoading = false;
                            if(res.status)
                            {
                                me.reloadLists();
                            }
                            if(res.status === 0){
                                bookingCoreApp.showError(res);
                            }
                            $(me.$refs.files).val('');
                        },
                        error:function(e){
                            bookingCoreApp.showAjaxError(e);
                            $(me.$refs.files).val('');
                            me.isLoading = false;
                        }
                    })
                }
            },
            initUploader(){

            },
            resetSelected(){
                this.selectedLists = [];
                this.selected = [];
                this.total = 0;
                this.totalPage = 0;
                this.apiFinished = false;
            }
        }
    });
}
