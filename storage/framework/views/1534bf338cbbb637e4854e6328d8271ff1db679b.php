

<?php $__env->startSection('content'); ?>
    <h2 class="title-bar no-border-bottom">
        <?php echo e(__("Availability Activities")); ?>

    </h2>
    <div class="language-navigation">
        <div class="panel-body">
            <div class="filter-div d-flex justify-content-between ">
                <div class="col-left">
                    <form method="get" action="" class="filter-form filter-form-left d-flex flex-column flex-sm-row" role="search">
                        <input type="text" name="s" value="<?php echo e(Request()->s); ?>" placeholder="<?php echo e(__('Search by name')); ?>" class="form-control">&nbsp;&nbsp;
                        <button class="btn-info btn btn-icon btn_search btn-sm" type="submit"><?php echo e(__('Search')); ?></button>
                    </form>
                </div>
                <div class="col-right">
                    <?php if($rows->total() > 0): ?>
                        <span class="count-string"><?php echo e(__("Showing :from - :to of :total activities",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()])); ?></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php if(count($rows)): ?>
    <div class="user-panel">
        <div class="panel-title"><strong><?php echo e(__('Availability')); ?></strong></div>
        <div class="panel-body no-padding" style="background: #f4f6f8;padding: 0px 15px;">
            <div class="row">
                <div class="col-md-3" style="border-right: 1px solid #dee2e6;">
                    <ul class="nav nav-tabs  flex-column vertical-nav" id="items_tab"  role="tablist">
                        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="nav-item event-name ">
                                <a class="nav-link" data-id="<?php echo e($item->id); ?>" data-toggle="tab" href="#calendar-<?php echo e($item->id); ?>" title="<?php echo e($item->title); ?>" >#<?php echo e($item->id); ?> - <?php echo e($item->title); ?></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <div class="col-md-9" style="background: white;padding: 15px;">
                    <div id="dates-calendar" class="dates-calendar"></div>
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>
        <div class="alert alert-warning"><?php echo e(__("No activities found")); ?></div>
    <?php endif; ?>
    <div class="d-flex justify-content-center">
        <?php echo e($rows->appends($request->query())->links()); ?>

    </div>
    <div id="bravo_modal_calendar" class="modal fade">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Date Information')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="row form_modal_calendar form-horizontal" novalidate onsubmit="return false">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label ><?php echo e(__('Date Ranges')); ?></label>
                                <input readonly type="text" class="form-control has-daterangepicker">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label ><?php echo e(__('Status')); ?></label>
                                <br>
                                <label ><input true-value=1 false-value=0 type="checkbox" v-model="form.active"> <?php echo e(__('Available for booking?')); ?></label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label ><?php echo e(__('Max Guest')); ?></label>
                                <input type="number"  v-model="form.max_guests" class="form-control">
                            </div>
                        </div>
                        <div class="" v-if="person_types">
                            <div class="col-md-12" v-for="(type,index) in person_types">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label><?php echo e(__("Name")); ?></label>
                                            <input type="text" readonly class="form-control" v-model="person_types[index].name">
                                        </div>
                                        <div class="col-md-4">
                                            <label><?php echo e(__("Min")); ?></label>
                                            <input type="text" v-model="person_types[index].min" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <label><?php echo e(__("Max")); ?></label>
                                            <input type="text" v-model="person_types[index].max" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <label><?php echo e(__("Price")); ?></label>
                                            <input type="text" v-model="person_types[index].price" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" v-else>
                            <div class="form-group">
                                <label ><?php echo e(__('Price')); ?></label>
                                <input type="text" v-model="form.price" class="form-control">
                            </div>
                        </div>
                    </form>
                    <div v-if="lastResponse.message">
                        <br>
                        <div  class="alert" :class="!lastResponse.status ? 'alert-danger':'alert-success'">{{ lastResponse.message }}</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                    <button type="button" class="btn btn-primary" @click="saveForm"><?php echo e(__('Save changes')); ?></button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('head'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('libs/fullcalendar-4.2.0/core/main.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('libs/fullcalendar-4.2.0/daygrid/main.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('libs/daterange/daterangepicker.css')); ?>">

    <style>
        .event-name{
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
        }
        #dates-calendar .loading{

        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script src="<?php echo e(asset('libs/daterange/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('libs/daterange/daterangepicker.min.js?_ver='.config('app.version'))); ?>"></script>
    <script src="<?php echo e(asset('libs/fullcalendar-4.2.0/core/main.js')); ?>"></script>
    <script src="<?php echo e(asset('libs/fullcalendar-4.2.0/interaction/main.js')); ?>"></script>
    <script src="<?php echo e(asset('libs/fullcalendar-4.2.0/daygrid/main.js')); ?>"></script>

    <script>
        var calendarEl,calendar,lastId,formModal;
        $('#items_tab').on('show.bs.tab',function (e) {
            calendarEl = document.getElementById('dates-calendar');
            lastId = $(e.target).data('id');
            if(calendar){
                calendar.destroy();
            }
            calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: [ 'dayGrid' ,'interaction'],
                header: {},
                selectable: true,
                selectMirror: false,
                allDay:false,
                editable: false,
                eventLimit: true,
                defaultView: 'dayGridMonth',
                firstDay: daterangepickerLocale.first_day_of_week,
                events:{
                    url:"<?php echo e(route('activity.vendor.availability.loadDates')); ?>",
                    extraParams:{
                        id:lastId,
                    }
                },
                loading:function (isLoading) {
                    if(!isLoading){
                        $(calendarEl).removeClass('loading');
                    }else{
                        $(calendarEl).addClass('loading');
                    }
                },
                select: function(arg) {
                    formModal.show({
                        start_date:moment(arg.start).format('YYYY-MM-DD'),
                        end_date:moment(arg.end).format('YYYY-MM-DD'),
                    });
                },
                eventClick:function (info) {
                    var form = Object.assign({},info.event.extendedProps);
                    form.start_date = moment(info.event.start).format('YYYY-MM-DD');
                    form.end_date = moment(info.event.start).format('YYYY-MM-DD');
                    console.log(form);
                    formModal.show(form);
                },
                eventRender: function (info) {
                    $(info.el).find('.fc-title').html(info.event.title);
                    $(info.el).find('.fc-content').attr("data-html","true").attr("title",info.event.title).tooltip({ boundary: 'window' })
                }
            });
            calendar.render();
        });

        $('.event-name:first-child a').trigger('click');

        formModal = new Vue({
            el:'#bravo_modal_calendar',
            data:{
                lastResponse:{
                    status:null,
                    message:''
                },
                form:{
                    id:'',
                    price:'',
                    start_date:'',
                    end_date:'',
                    min_guests:0,
                    max_guests:0,
                    active:0
                },
                formDefault:{
                    id:'',
                    price:'',
                    start_date:'',
                    end_date:'',
                    min_guests:0,
                    max_guests:0,
                    active:0
                },
                person_types:[

                ],
                person_type_item:{
                    name:'',
                    desc:'',
                    min:'',
                    max:'',
                    price:'',
                },
                onSubmit:false
            },
            methods:{
                show:function (form) {
                    $(this.$el).modal('show');
                    this.lastResponse.message = '';
                    this.onSubmit = false;

                    if(typeof form !='undefined'){
                        this.form = Object.assign({},form);
                        if(typeof this.form.person_types == 'object'){
                            this.person_types = this.form.person_types;
                        }else{
                            this.person_types = false;
                        }
                        if(form.start_date){
                            var drp = $('.has-daterangepicker').data('daterangepicker');
                            drp.setStartDate(moment(form.start_date).format(bookingCore.date_format));
                            drp.setEndDate(moment(form.end_date).format(bookingCore.date_format));
                        }
                    }
                },
                hide:function () {
                    $(this.$el).modal('hide');
                    this.form = Object.assign({},this.formDefault);
                    this.person_types = false;
                },
                saveForm:function () {
                    this.form.target_id = lastId;
                    var me = this;
                    me.lastResponse.message = '';
                    if(this.onSubmit) return;

                    if(!this.validateForm()) return;

                    this.onSubmit = true;
                    this.form.person_types = this.person_types;
                    $.ajax({
                        url:'<?php echo e(route('activity.vendor.availability.store')); ?>',
                        data:this.form,
                        dataType:'json',
                        method:'post',
                        success:function (json) {
                            if(json.status){
                                if(calendar)
                                    calendar.refetchEvents();
                                me.hide();
                            }
                            me.lastResponse = json;
                            me.onSubmit = false;
                        },
                        error:function (e) {
                            me.onSubmit = false;
                        }
                    });
                },
                validateForm:function(){
                    if(!this.form.start_date) return false;
                    if(!this.form.end_date) return false;

                    return true;
                },
            },
            created:function () {
                var me = this;
                this.$nextTick(function () {
                    $('.has-daterangepicker').daterangepicker({ "locale": {"format": bookingCore.date_format}})
                        .on('apply.daterangepicker',function (e,picker) {
                            me.form.start_date = picker.startDate.format('YYYY-MM-DD');
                            me.form.end_date = picker.endDate.format('YYYY-MM-DD');
                        });

                    $(me.$el).on('hide.bs.modal',function () {

                        this.form = Object.assign({},this.formDefault);
                        this.person_types = [];

                    });

                })
            },
            mounted:function () {
                // $(this.$el).modal();
            }
        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/cdjofzdd/test.booking.dorica.fi/modules/Activity/Views/frontend/user/availability.blade.php ENDPATH**/ ?>