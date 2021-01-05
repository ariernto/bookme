<?php
/**
 * Created by PhpStorm.
 * User: h2 gaming
 * Date: 8/17/2019
 * Time: 3:39 PM
 */
$reviews = \Modules\Review\Models\Review::query()->where([
    'vendor_id'=>$user->id,
    'status'=>'approved'
])
    ->orderBy('id','desc')
    ->with('author')
    ->paginate(3);
?>
<?php if($reviews->total()): ?>
    <div class="bravo-reviews">
        <h3><?php echo e(__('Reviews from guests')); ?></h3>
        <div class="review-list">
            <?php if($reviews): ?>
                <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $userInfo = $item->author;
                         if(!$userInfo){
                            continue;
                         }
                    ?>
                    <div class="review-item">
                        <div class="review-item-head">
                            <div class="media">
                                <div class="media-left">
                                    <?php if($avatar_url = $userInfo->getAvatarUrl()): ?>
                                        <img class="avatar" src="<?php echo e($avatar_url); ?>" alt="<?php echo e($userInfo->getDisplayName()); ?>">
                                    <?php else: ?>
                                        <span class="avatar-text"><?php echo e(ucfirst($userInfo->getDisplayName()[0])); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading"><?php echo e($userInfo->getDisplayName()); ?></h4>
                                    <div class="date"><?php echo e(display_datetime($item->created_at)); ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="review-item-body">
                            <h4 class="title"> <?php echo e($item->title); ?> </h4>
                            <?php if($item->rate_number): ?>
                                <ul class="review-star">
                                    <?php for( $i = 0 ; $i < 5 ; $i++ ): ?>
                                        <?php if($i < $item->rate_number): ?>
                                            <li><i class="fa fa-star"></i></li>
                                        <?php else: ?>
                                            <li><i class="fa fa-star-o"></i></li>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                </ul>
                            <?php endif; ?>
                            <div class="detail">
                                <?php echo e($item->content); ?>

                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
        <div class="text-center mt30"><a class="btn btn-sm btn-primary" href="<?php echo e(route('user.profile.reviews',['id'=> $user->user_name ?? $user->id])); ?>"><?php echo e(__('View all reviews (:total)',['total'=>$reviews->total()])); ?></a></div>
    </div>
<?php endif; ?>
<?php /**PATH D:\Web\Laravel\newpro\package\modules/User/Views/frontend/profile/reviews.blade.php ENDPATH**/ ?>