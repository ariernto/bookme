<aside class="sidebar-right">
    <?php
        $list_sidebars = setting_item_with_lang("news_sidebar");
    ?>
    <?php if($list_sidebars): ?>
        <?php
            $list_sidebars = json_decode($list_sidebars);
        ?>
        <?php $__currentLoopData = $list_sidebars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('News::frontend.layouts.sidebars.'.$item->type, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</aside><?php /**PATH D:\Web\Laravel\newpro\package\modules/News/Views/frontend/layouts/details/news-sidebar.blade.php ENDPATH**/ ?>