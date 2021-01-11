
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar"><?php echo e(__("Payout request management")); ?></h1>
        </div>
        <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="filter-div d-flex justify-content-between ">
            <div class="col-left">
                <?php if(!empty($rows)): ?>
                    <label ><?php echo e(__("With selected:")); ?></label>
                    <div  class="filter-form filter-form-left d-flex justify-content-start">
                        <button class="btn-info btn btn-icon dungdt-form-payout-btn" type="button"><?php echo e(__('Bulk action')); ?></button>
                        <button class="has-loading btn-danger btn btn-icon dungdt-form-payout-delete" type="button"><?php echo e(__('Delete')); ?>

                            <i class="fa fa-spinner fa-spin fa-fw"></i>
                        </button>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-left">
                <form method="get" action="<?php echo e(route('vendor.admin.payout.index')); ?> " class="filter-form filter-form-right d-flex justify-content-end flex-column flex-sm-row" role="search">
                    <?php if(!empty($rows)): ?>
                        <?php
                        $user = !empty(Request()->vendor_id) ? App\User::find(Request()->vendor_id) : false;
                        \App\Helpers\AdminForm::select2('vendor_id', [
                            'configs' => [
                                'ajax'        => [
                                    'url'      => url('/admin/module/user/getForSelect2'),
                                    'dataType' => 'json'
                                ],
                                'allowClear'  => true,
                                'placeholder' => __('-- Vendor --')
                            ]
                        ], !empty($user->id) ? [
                            $user->id,
                            $user->name_or_email . ' (#' . $user->id . ')'
                        ] : false)
                        ?>
                    <?php endif; ?>
                    <input type="text" name="s" value="<?php echo e(Request()->s); ?>" placeholder="<?php echo e(__('Search by payout id')); ?>" class="form-control">
                    <button class="btn-info btn btn-icon btn_search" type="submit"><?php echo e(__('Search')); ?></button>
                </form>
            </div>
        </div>
        <div class="text-right">
            <p><i><?php echo e(__('Found :total items',['total'=>$rows->total()])); ?></i></p>
        </div>
        <div class="panel">
            <div class="panel-body">
                <form action="" class="bravo-form-item">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th width="60px"><input type="checkbox" class="check-all"></th>
                                <th  width="80px"> <?php echo e(__('ID')); ?></th>
                                <th> <?php echo e(__('Vendor')); ?></th>
                                <th><?php echo e(__("Note")); ?></th>
                                <th width="200px"> <?php echo e(__('Amount')); ?></th>
                                <th width="230px"> <?php echo e(__('Payout Method')); ?></th>
                                <th width="130px"> <?php echo e(__('Created At')); ?></th>
                                <th width="100px"> <?php echo e(__('Status')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if($rows->total() > 0): ?>
                                <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payout): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="status-<?php echo e($payout->status); ?>">
                                        <td><input type="checkbox" name="ids[]" class="check-item" value="<?php echo e($payout->id); ?>">
                                        </td>
                                        <td>#<?php echo e($payout->id); ?></td>
                                        <td>
                                            <a target="_blank" href="<?php echo e(url("admin/module/user/edit/".$payout->vendor_id)); ?>"><?php echo e($payout->vendor->getDisplayName()); ?></a>
                                        </td>
                                        <td>
                                            <?php if($payout->note_to_admin): ?>
                                                <label ><strong><?php echo e(__("To admin:")); ?></strong></label>
                                                <br>
                                                <div><?php echo e($payout->note_to_admin); ?></div>
                                            <?php endif; ?>
                                            <?php if($payout->note_to_vendor): ?>
                                                <label ><strong><?php echo e(__("To vendor:")); ?></strong></label>
                                                <br>
                                                <div><?php echo e($payout->note_to_vendor); ?></div>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e(format_money($payout->amount)); ?></td>
                                        <td>
                                            <?php echo e(__(':name to :info',['name'=>$payout->payout_method_name,'info'=>$payout->account_info])); ?>

                                        </td>
                                        <td><?php echo e(display_date($payout->created_at)); ?></td>
                                        <td><?php echo e($payout->status_text); ?></td>
                                        <td>
                                            <a class="btn btn-info edit-payout-btn" href="#" onclick="return false"><i class="fa fa-edit"></i> <?php echo e(__("Edit")); ?></a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7"><?php echo e(__("No data")); ?></td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </form>
                <?php echo e($rows->appends(request()->query())->links()); ?>

            </div>
        </div>
    </div>
    <div class="modal bravo-form" tabindex="-1" id="bulkActionModal" role="dialog" data-action="<?php echo e(route('vendor.admin.payout.bulkEdit')); ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__("Payout request bulk action")); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for=""><?php echo e(__('Status')); ?></label>
                        <div>
                            <select name="action" class="custom-select">
                                <?php $__currentLoopData = $all_statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>"><?php echo e($status['title']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for=""><?php echo e(__('Pay date')); ?></label>
                        <div>
                            <input type="text" name="pay_date" class="form-control has-datepicker" placeholder="<?php echo e(__('YYYY/MM/DD')); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for=""><?php echo e(__('Note to vendor')); ?></label>
                        <div>
                            <textarea name="note_to_vendor" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                    <button type="button" class="btn btn-success dungdt-form-payout-save"><?php echo e(__('Save changes')); ?>

                        <i class="fa fa-spinner fa-spin fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script.body'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('libs/daterange/daterangepicker.css')); ?>">
    <script src="<?php echo e(asset('libs/daterange/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('libs/daterange/daterangepicker.min.js')); ?>"></script>
    <script>

        $('.has-datepicker').daterangepicker({
            singleDatePicker: true,
            showCalendar: false,
            autoUpdateInput: false, //disable default date
            sameDate: true,
            autoApply           : true,
            disabledPast        : true,
            enableLoading       : true,
            showEventTooltip    : true,
            classNotAvailable   : ['disabled', 'off'],
            disableHightLight: true,
            locale:{
                format:'YYYY/MM/DD'
            }
        }).on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('YYYY/MM/DD'));
        });

        $('.dungdt-form-payout-btn').click(function () {
            var ids = $('.check-item:checked').map(function(){
                return $(this).val();
            }).get();
            if(!ids || !ids.length){
                bookingCoreApp.showError("<?php echo e(__('Please select at lease one item')); ?>")
                return;
            }
            $('#bulkActionModal').modal('show');
        });

        $('.edit-payout-btn').click(function () {
            $(this).closest('tr').find('.check-item').prop('checked',true);
            $('.dungdt-form-payout-btn').trigger('click');
        })

        $('.dungdt-form-payout-delete').click(function () {

            var btn  = $(this);
            var ids = $('.check-item:checked').map(function(){
                return $(this).val();
            }).get();
            if(!ids || !ids.length){
                bookingCoreApp.showError("<?php echo e(__('Please select at lease one item')); ?>")
                return;
            }
            bookingCoreApp.showConfirm({
                message:'<?php echo e(__('Do you want to delete those items?')); ?>',
                callback:function (result) {
                    if(result){
                        btn.addClass('loading');
                        $.ajax({
                            url:'<?php echo e(route('vendor.admin.payout.bulkEdit')); ?>',
                            data:{
                                action:'delete',
                                ids:ids
                            },
                            method:'post',
                            success:function (json) {
                                btn.removeClass('loading');

                                bookingCoreApp.showAjaxMessage(json);

                                if(json.status){
                                    window.location.reload();
                                }
                            },
                            error:function (e) {
                                btn.removeClass('loading');
                                bookingCoreApp.showAjaxError(e);
                            }
                        })
                    }
                }
            })

        });

        $('.dungdt-form-payout-save').click(function () {
            var form = $(this).closest('.modal');
            var status = form.find('[name=action]').val();
            if(!status){
                bookingCoreApp.showError("<?php echo e(__("Status is empty")); ?>");
                return;
            }
            var ids = $('.check-item:checked').map(function(){
                return $(this).val();
            }).get();
            if(!ids || !ids.length){
                bookingCoreApp.showError("<?php echo e(__('Please select at lease one item')); ?>")
                return;
            }

            var data = {
                ids:ids
            }

            form.find('input,textarea,select').serializeArray().map(function (val) {
                data[val.name] = val.value;
            });

            form.addClass('loading');


            $.ajax({
                url:form.data('action'),
                method:'post',
                data:data,
                success:function (json) {
                    form.removeClass('loading');

                    if(json.status){
                        form.modal('hide');
                    }

                    bookingCoreApp.showAjaxMessage(json);

                    if(json.status){
                        window.setTimeout(function () {
                            window.location.reload();
                        },2500);
                    }
                },
                error:function (e) {
                    form.removeClass('loading');
                    bookingCoreApp.showAjaxError(e);
                }
            })

        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Work/works/tjdjoko/Vargha-Booking/codes/booking-core/modules/Vendor/Views/admin/payouts/index.blade.php ENDPATH**/ ?>