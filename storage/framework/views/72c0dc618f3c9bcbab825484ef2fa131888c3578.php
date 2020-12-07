<?php
    $translation = $row->translateOrOrigin(app()->getLocale());
?>
<div class="item-news">
    <div class="thumb-image">
        <a href="<?php echo e($row->getDetailUrl()); ?>">
            <?php if($row->image_id): ?>
                <?php if(!empty($disable_lazyload)): ?>
                    <img src="<?php echo e(get_file_url($row->image_id,'medium')); ?>" class="img-responsive" alt="<?php echo e($translation->name ?? ''); ?>">
                <?php else: ?>
                    <?php echo get_image_tag($row->image_id,'medium',['class'=>'img-responsive','alt'=>$row->title]); ?>
                <?php endif; ?>
            <?php endif; ?>
        </a>
    </div>
    <div class="caption">
        <div class="item-date">
            <ul>
                <?php $category = $row->getCategory; ?>
                <?php if(!empty($category)): ?>
                    <?php $t = $category->translateOrOrigin(app()->getLocale()); ?>
                    <li>
                        <a href="<?php echo e($category->getDetailUrl(app()->getLocale())); ?>">
                            <?php echo e($t->name ?? ''); ?>
                        </a>
                    </li>
                <?php endif; ?>
                <li class="dot"> <?php echo e(display_date($row->updated_at)); ?>  </li>
            </ul>
        </div>
        <h3 class="item-title"><a href="<?php echo e($row->getDetailUrl()); ?>"> <?php echo e($translation->title); ?> </a></h3>
        <div class="item-desc">
            <?php echo get_exceprt($translation->content,70,"..."); ?>
        </div>
        <div class="item-more">
            <a class="btn-readmore" href="<?php echo e($row->getDetailUrl()); ?>"><?php echo e(__('Read More')); ?></a>
        </div>
    </div>
</div><?php /**PATH D:\Web\Laravel\newpro\package\modules/News/Views/frontend/blocks/list-news/loop.blade.php ENDPATH**/ ?>