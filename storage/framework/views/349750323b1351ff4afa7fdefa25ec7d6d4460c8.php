<?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
        $translation = $row->translateOrOrigin(app()->getLocale()); ?>
    <div class="post_item ">
        <div class="header">
            <?php if($image_tag = get_image_tag($row->image_id,'full',['alt'=>$translation->title])): ?>
                <header class="post-header">
                    <a href="<?php echo e($row->getDetailUrl()); ?>">
                        <?php echo $image_tag; ?>

                    </a>
                </header>
                <div class="cate">
                    <?php $category = $row->getCategory; ?>
                    <?php if(!empty($category)): ?>
                        <?php $t = $category->translateOrOrigin(app()->getLocale()); ?>
                        <ul>
                            <li>
                                <a href="<?php echo e($category->getDetailUrl(app()->getLocale())); ?>">
                                    <?php echo e($t->name ?? ''); ?>

                                </a>
                            </li>
                        </ul>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <div class="post-inner">
                <h3 class="post-title">
                    <a class="text-darken" href="<?php echo e($row->getDetailUrl()); ?>"> <?php echo clean($translation->title); ?></a>
                </h3>
                <div class="post-info">
                    <ul>
                        <?php if(!empty($row->getAuthor)): ?>
                            <li>
                                <?php if($avatar_url = $row->getAuthor->getAvatarUrl()): ?>
                                    <img class="avatar" src="<?php echo e($avatar_url); ?>" alt="<?php echo e($row->getAuthor->getDisplayName()); ?>">
                                <?php else: ?>
                                    <span class="avatar-text"><?php echo e(ucfirst($row->getAuthor->getDisplayName()[0])); ?></span>
                                <?php endif; ?>
                                <span> <?php echo e(__('BY ')); ?> </span>
                                <?php echo e($row->getAuthor->getDisplayName() ?? ''); ?>

                            </li>
                        <?php endif; ?>
                        <li> <?php echo e(__('DATE ')); ?>  <?php echo e(display_date($row->updated_at)); ?>  </li>
                    </ul>
                </div>
                <div class="post-desciption">
                    <?php echo get_exceprt($translation->content); ?>

                </div>
                <a class="btn-readmore" href="<?php echo e($row->getDetailUrl()); ?>"><?php echo e(__('Read More')); ?></a>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH D:\Web\Laravel\newpro\package\modules/News/Views/frontend/layouts/details/news-loop.blade.php ENDPATH**/ ?>