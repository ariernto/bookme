<div class="sidebar-widget widget_bloglist">
    <div class="sidebar-title">
        <h2><?php echo e($item->title); ?></h2>
    </div>
    <ul class="thumb-list">
        <?php $list_blog = $model_news->with(['getCategory','translations'])->orderBy('id','desc')->paginate(5) ?>
        <?php if($list_blog): ?>
            <?php $__currentLoopData = $list_blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $translation = $blog->translateOrOrigin(app()->getLocale()) ?>
                <li>
                    <?php if($image_url = get_file_url($blog->image_id, 'thumb')): ?>
                        <div class="thumb">
                            <a href="<?php echo e($blog->getDetailUrl(app()->getLocale())); ?>">
                                <?php echo get_image_tag($blog->image_id,'thumb',['class'=>'','alt'=>$blog->title]); ?>

                            </a>
                        </div>
                    <?php endif; ?>
                    <div class="content">
                        <?php if(!empty($blog->getCategory->name)): ?>
                            <div class="cate">
                                <a href="<?php echo e($blog->getCategory->getDetailUrl()); ?>">
                                    <?php $translation_cat = $blog->getCategory->translateOrOrigin(app()->getLocale()); ?>
                                    <?php echo e($translation_cat->name ?? ''); ?>

                                </a>
                            </div>
                        <?php endif; ?>
                        <h3 class="thumb-list-item-title">
                            <a href="<?php echo e($blog->getDetailUrl(app()->getLocale())); ?>"><?php echo clean($translation->title); ?></a>
                        </h3>
                    </div>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </ul>
</div>
<?php /**PATH D:\Web\Laravel\newpro\package\modules/News/Views/frontend/layouts/sidebars/recent_news.blade.php ENDPATH**/ ?>