
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar"><?php echo e(__("All Reviews")); ?></h1>
        </div>
        <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="filter-div d-flex justify-content-between ">
            <div class="col-left">
                <?php if(!empty($rows)): ?>
                    <form method="post" action="<?php echo e(url('admin/module/review/bulkEdit')); ?>" class="filter-form filter-form-left d-flex justify-content-start">
                        <?php echo e(csrf_field()); ?>

                        <select name="action" class="form-control">
                            <option value=""><?php echo e(__(" Bulk Actions ")); ?></option>
                            <option value="approved"><?php echo e(__(" Approved ")); ?></option>
                            <option value="pending"><?php echo e(__(" Pending ")); ?></option>
                            <option value="spam"><?php echo e(__(" Spam ")); ?></option>
                            <option value="trash"><?php echo e(__(" Move to Trash ")); ?></option>
                            <option value="delete"><?php echo e(__(" Delete ")); ?></option>
                        </select>
                        <button data-confirm="<?php echo e(__("Do you want to delete?")); ?>" class="btn-info btn btn-icon dungdt-apply-form-btn" type="button"><?php echo e(__('Apply')); ?></button>
                    </form>
                <?php endif; ?>
            </div>
            <div class="col-left">
                <form method="post" action="<?php echo e(url('/admin/module/review/')); ?> " class="filter-form filter-form-right d-flex justify-content-end flex-column flex-sm-row" role="search">
                    <?php echo csrf_field(); ?>
                    <?php if(!empty($rows)): ?>
                        <?php
                        $user = !empty(Request()->vendor_id) ? App\User::find(Request()->vendor_id) : false;
                        \App\Helpers\AdminForm::select2('vendor_id', [
                            'configs' => [
                                'ajax'        => [
                                    'url' => url('/admin/module/user/getForSelect2'),
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
                    <input type="text" name="s" value="<?php echo e(Request()->s); ?>" placeholder="<?php echo e(__('Search by title')); ?>" class="form-control">
                    <button class="btn-info btn btn-icon btn_search" type="submit"><?php echo e(__('Search')); ?></button>
                </form>
            </div>
        </div>
        <div class="text-right">
            <div class="header-status-control">
                <a href="<?php echo e(url("/admin/module/review")); ?>"><?php echo e(__("All Reviews")); ?>

                    <span>(<?php echo e(\Modules\Review\Models\Review::countReviewByStatus()); ?>)</span> </a> -
                <a href="<?php echo e(url("/admin/module/review?status=approved")); ?>"><?php echo e(__("Approved")); ?>

                    <span>(<?php echo e(\Modules\Review\Models\Review::countReviewByStatus("approved")); ?>)</span></a> -
                <a href="<?php echo e(url("/admin/module/review?status=pending")); ?>"><?php echo e(__("Pending")); ?>

                    <span>(<?php echo e(\Modules\Review\Models\Review::countReviewByStatus("pending")); ?>)</span></a> -
                <a href="<?php echo e(url("/admin/module/review?status=spam")); ?>"><?php echo e(__("Spam")); ?>

                    <span>(<?php echo e(\Modules\Review\Models\Review::countReviewByStatus("spam")); ?>)</span></a> -
                <a href="<?php echo e(url("/admin/module/review?status=trash")); ?>"><?php echo e(__("Trash")); ?>

                    <span>(<?php echo e(\Modules\Review\Models\Review::countReviewByStatus("trash")); ?>)</span></a>
            </div>
            <p><i><?php echo e(__('Found :total items',['total'=>$rows->total()])); ?></i></p>
        </div>
        <div class="panel">
            <div class="panel-body">
                <form class="bravo-form-item">
                    <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th width="60px"><input type="checkbox" class="check-all"></th>
                            <th width="150px"> <?php echo e(__('Author')); ?></th>
                            <th> <?php echo e(__('Review Content')); ?></th>
                            <th width="250px"> <?php echo e(__('In Response To')); ?></th>
                            <th width="80px"> <?php echo e(__('Service')); ?></th>
                            <th width="100px"> <?php echo e(__('Status')); ?></th>
                            <th width="140px"> <?php echo e(__('Submitted On')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if($rows->total() > 0): ?>
                            <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $service = $row->getService ?>
                                <tr class="<?php echo e($row->status); ?>">
                                    <td><input type="checkbox" name="ids[]" class="check-item" value="<?php echo e($row->id); ?>">
                                    </td>
                                    <td>
                                        <?php if(!empty( $metaUser =  $row->getUserInfo)): ?>
                                            <a href="<?php echo e(url("/admin/module/review?customer_id=".$metaUser->id)); ?>"><?php echo e($metaUser->email ?? 'Email'); ?></a>
                                            <p>
                                                <a href="<?php echo e(url("/admin/module/review?s=".$row->author_ip)); ?>"><?php echo e($row->author_ip); ?></a>
                                            </p>
                                        <?php else: ?>
                                            <?php echo e(__("[Author Deleted]")); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <strong><?php echo e($row->title); ?></strong>
                                        <p><?php echo e($row->content); ?></p>
                                        <?php if($row->rate_number): ?>
                                            <ul class="review-star left">
                                                <?php for( $i = 0 ; $i < 5 ; $i++ ): ?>
                                                    <?php if($i < $row->rate_number): ?>
                                                        <li><i class="fa fa-star"></i></li>
                                                    <?php else: ?>
                                                        <li><i class="fa fa-star-o"></i></li>
                                                    <?php endif; ?>
                                                <?php endfor; ?>
                                            </ul>
                                        <?php endif; ?>
                                        <?php if(!empty($service) and !empty($allReviewStats = $service->getReviewStats())): ?>
                                            <?php if(!empty($metaReviews = $row->getReviewMeta())): ?>
                                                <a class="btn-show-info-review right" data-toggle="collapse" href="#review-<?php echo e($row->id); ?>">
                                                    <?php echo e(__("More info")); ?>

                                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                                </a>
                                                <div class="collapse" id="review-<?php echo e($row->id); ?>">
                                                    <div class="review-items">
                                                        <div class="row">
                                                            <?php $__currentLoopData = $metaReviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $metaReview): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if( in_array($metaReview->name , $allReviewStats)): ?>
                                                                    <div class="item col-md-12 d-flex">
                                                                        <label style="margin-right: 15px;"><?php echo e($metaReview->name); ?></label>
                                                                        <ul class="review-star">
                                                                            <?php for( $i = 0 ; $i < 5 ; $i++ ): ?>
                                                                                <?php if($i < $metaReview->val): ?>
                                                                                    <li><i class="fa fa-star"></i></li>
                                                                                <?php else: ?>
                                                                                    <li><i class="fa fa-star-o"></i>
                                                                                    </li>
                                                                                <?php endif; ?>
                                                                            <?php endfor; ?>
                                                                        </ul>
                                                                    </div>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if(!empty($service)): ?>
                                            <a href="<?php echo e(url("/admin/module/review?service_id=".$service->id)."&object_model=".$service->type); ?>">
                                                <?php echo e($service->title); ?>

                                            </a>
                                            <p>
                                                <a target="_blank" href="<?php echo e($service->getDetailUrl()); ?>">
                                                    <i class="fa fa-long-arrow-right" aria-hidden="true"></i> <?php echo e(__("View :name",["name"=>$service->getModelName() ])); ?>

                                                </a>
                                            </p>
                                        <?php else: ?>
                                            <?php echo e(__("[Deleted]")); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if(!empty($service)): ?>
                                            <a href="<?php echo e(url("/admin/module/review?service=".$service->getModelName())); ?>" class="badge badge-dark"><?php echo e($service->getModelName()); ?></a>
                                        <?php else: ?>
                                            <?php echo e(__("[Deleted]")); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(url("/admin/module/review?status=".$row->status)); ?>" class="badge badge-<?php echo e($row->status); ?>"><?php echo e($row->status); ?></a>
                                    </td>
                                    <td><?php echo e(display_datetime($row->updated_at)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6"><?php echo e(__("No data")); ?></td>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/cdjofzdd/test.booking.dorica.fi/modules/Review/Views/admin/index.blade.php ENDPATH**/ ?>