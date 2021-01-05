<?php
$types = get_bookable_services();
if (empty($types)) return;
$list_service = [];
?>
<div class="profile-service-tabs">
    <div class="service-nav-tabs">
        <ul class="nav nav-tabs">
            <?php $i = 0; ?>
            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type=>$moduleClass): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    if(!$moduleClass::isEnable()) continue;
                    if(!$user->hasPermissionTo($type.'_create')) continue;
                    $services = $moduleClass::getVendorServicesQuery($user->id)->orderBy('id','desc')->paginate(6);
                    if(empty($services->total())) continue;
                    $list_service[$type] = $services;
                ?>
                    <li class="nav-item">
                        <a href="#" class="nav-link <?php if(!$i): ?> active <?php endif; ?>" data-toggle="tab" data-target="#type_<?php echo e($type); ?>"><?php echo e($moduleClass::getModelName()); ?></a>
                    </li>
                <?php $i++; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <div class="tab-content">
        <?php $i = 0; ?>
        <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type=>$moduleClass): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                if(!$moduleClass::isEnable()) continue;
                if(empty($list_service[$type])) continue;
            ?>
                <?php if(view()->exists(ucfirst($type).'::frontend.profile.service') && $user->hasPermissionTo($type.'_create')): ?>
                    <div class="tab-pane fade <?php if(!$i): ?> show active <?php endif; ?>" id="type_<?php echo e($type); ?>" role="tabpanel" aria-labelledby="pills-home-tab">
                        <?php echo $__env->make(ucfirst($type).'::frontend.profile.service',['services'=>$list_service[$type]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <?php $i++; ?>
                <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div><?php /**PATH D:\Web\Laravel\newpro\package\modules/User/Views/frontend/profile/services.blade.php ENDPATH**/ ?>