
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar"><?php echo e(__("Languages")); ?></h1>
        </div>
        <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-md-4 mb40">
                <div class="panel">
                    <div class="panel-title"><?php echo e(__("Add Language")); ?></div>
                    <div class="panel-body">
                        <form action="" class="needs-validation" novalidate method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo $__env->make('Language::admin.language.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="">
                                <button class="btn btn-primary" type="submit"><?php echo e(__("Add new")); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="filter-div d-flex justify-content-between ">
                    <div class="col-left">
                        <?php if(!empty($rows)): ?>
                            <form method="post" action="<?php echo e(url('admin/module/language/editBulk')); ?>" class="filter-form filter-form-left d-flex justify-content-start">
                                <?php echo e(csrf_field()); ?>


                                <select name="action" class="form-control">
                                    <option value=""><?php echo e(__(" Bulk Action ")); ?></option>
                                    <option value="publish"><?php echo e(__(" Publish ")); ?></option>
                                    <option value="draft"><?php echo e(__(" Move to Draft ")); ?></option>
                                    <option value="delete"><?php echo e(__(" Delete ")); ?></option>
                                </select>
                                <button data-confirm="<?php echo e(__("Do you want to delete?")); ?>" class="btn-info btn btn-icon dungdt-apply-form-btn" type="button"><?php echo e(__('Apply')); ?></button>
                            </form>
                        <?php endif; ?>
                    </div>
                    <div class="col-left">
                        <form method="get" action="<?php echo e(url('/admin/module/language')); ?>" class="filter-form filter-form-right d-flex justify-content-end" role="search">
                            <input type="text" name="s" value="<?php echo e(Request()->s); ?>" class="form-control" placeholder="<?php echo e(__("Search by name")); ?>">
                            <button class="btn-info btn btn-icon btn_search" id="search-submit" type="submit"><?php echo e(__('Search')); ?></button>
                        </form>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-title"><?php echo e(__("All Languages")); ?></div>
                    <div class="panel-body">
                        <form action="" class="bravo-form-item">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th width="60px"><input type="checkbox" class="check-all"></th>
                                        <th><?php echo e(__("Name")); ?></th>
                                        <th><?php echo e(__("Locale")); ?></th>
                                        <th><?php echo e(__("Status")); ?></th>
                                        <th><?php echo e(__("Date")); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(count($rows) > 0): ?>
                                        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><input type="checkbox" class="check-item" name="ids[]" value="<?php echo e($row->id); ?>">
                                                </td>
                                                <td class="title">
                                                    <a href="<?php echo e(url('/admin/module/language/edit/'.$row->id)); ?>">
                                                        <?php if($row->flag): ?>
                                                            <span class="flag-icon flag-icon-<?php echo e($row->flag); ?>"></span>
                                                        <?php endif; ?>
                                                        <?php echo e($row->name); ?>

                                                    </a>
                                                </td>
                                                <td><?php echo e($row->locale); ?></td>
                                                <td><span class="badge badge-<?php echo e($row->status); ?>"><?php echo e($row->status); ?></span></td>
                                                <td><?php echo e(display_date($row->updated_at)); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="4"><?php echo e(__("No data")); ?></td>
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
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/cdjofzdd/test.booking.dorica.fi/modules/Language/Views/admin/language/index.blade.php ENDPATH**/ ?>