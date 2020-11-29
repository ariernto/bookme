<?php
$checkNotify = \Modules\Core\Models\NotificationPush::query();
if(is_admin()){
    $checkNotify->where(function($query){
        $query->where('data', 'LIKE', '%"for_admin":1%');
        $query->orWhere('notifiable_id', \Auth::id());
    });
}else{
    $checkNotify->where('data', 'LIKE', '%"for_admin":0%');
    $checkNotify->where('notifiable_id', \Auth::id());
}
$notifications = $checkNotify->orderBy('created_at', 'desc')->limit(5)->get();
$countUnread = $checkNotify->where('read_at', null)->count();
?>
<?php if(!empty($breadcrumbs)): ?>
<div class="breadcrumb-page-bar" aria-label="breadcrumb">
    <ul class="page-breadcrumb">
        <li class="">
            <a href="<?php echo e(url('/')); ?>"><i class='fa fa-home'></i> <?php echo e(__('Home')); ?></a>
            <i class="fa fa-angle-right"></i>
        </li>
        <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class=" <?php echo e($breadcrumb['class'] ?? ''); ?>">
                <?php if(!empty($breadcrumb['url'])): ?>
                    <a href="<?php echo e($breadcrumb['url']); ?>"><?php echo e($breadcrumb['name']); ?></a>
                    <i class="fa fa-angle-right"></i>
                <?php else: ?>
                    <?php echo e($breadcrumb['name']); ?>

                <?php endif; ?>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <div class="dropdown dropdown-notifications float-right" style="min-width: 0">
        <a data-toggle="dropdown" class="user-dropdown d-flex align-items-center" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-bell m-1 p-1"></i>
            <span class="badge badge-danger notification-icon"><?php echo e($countUnread); ?></span>
        </a>
        <div class="dropdown-menu overflow-auto notify-items dropdown-container dropdown-menu-right dropdown-large" aria-labelledby="dropdownMenuButton">
            <div class="dropdown-toolbar">
                <div class="dropdown-toolbar-actions">
                    <a href="#" class="markAllAsRead"><?php echo e(__('Mark all as read')); ?></a>
                </div>
                <h3 class="dropdown-toolbar-title"><?php echo e(__('Notifications')); ?> (<span class="notif-count"><?php echo e($countUnread); ?></span>)</h3>
            </div>
            <ul class="dropdown-list-items p-0">
                <?php if(count($notifications)> 0): ?>
                    <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oneNotification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $active = $class = '';
                            $data = json_decode($oneNotification['data']);

                            $idNotification = @$data->id;
                            $forAdmin = @$data->for_admin;
                            $usingData = @$data->notification;

                            $services = @$usingData->type;
                            $idServices = @$usingData->id;
                            $title = @$usingData->message;
                            $name = @$usingData->name;
                            $avatar = @$usingData->avatar;
                            $link = @$usingData->link;

                            if(empty($oneNotification->read_at)){
                                $class = 'markAsRead';
                                $active = 'active';
                            }

                        ?>
                        <li class="notification <?php echo e($active); ?>">
                            <div class="media">
                                <div class="media-left">
                                    <div class="media-object">
                                        <?php if($avatar): ?>
                                            <img class="image-responsive" src="<?php echo e($avatar); ?>" alt="<?php echo e($name); ?>">
                                        <?php else: ?>
                                            <span class="avatar-text"><?php echo e(ucfirst($name[0])); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <a class="<?php echo e($class); ?>" data-id="<?php echo e($idNotification); ?>" href="<?php echo e($link); ?>"><?php echo $title; ?></a>
                                    <div class="notification-meta">
                                        <small class="timestamp"><?php echo e(format_interval($oneNotification->created_at)); ?></small>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </ul>
            <div class="dropdown-footer text-center">
                <a href="<?php echo e(route('core.notification.loadNotify')); ?>"><?php echo e(__('View More')); ?></a>
            </div>
        </div>
    </div>
    <div class="bravo-more-menu-user">
        <i class="icofont-settings"></i>
    </div>
</div>
<?php endif; ?>
<?php /**PATH D:\Web\Laravel\newpro\package\modules/Layout/parts/user-bc.blade.php ENDPATH**/ ?>