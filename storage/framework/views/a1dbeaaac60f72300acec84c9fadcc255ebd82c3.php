
<?php $__env->startSection('title',__('Page not found')); ?>
<?php $__env->startSection('message',$exception->getMessage()??__("Sorry, we couldn't find the page you're looking for.")); ?>
<?php $__env->startSection('code',404); ?>

<?php echo $__env->make('errors.illustrated-layout',['title'=>__('Page not found')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Work/works/tjdjoko/Vargha-Booking/codes/booking-core/resources/views/errors/404.blade.php ENDPATH**/ ?>