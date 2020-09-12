<div class="panel border shadow">
    <div class="panel-title"><strong><?php echo e(__('Ical')); ?></strong></div>
    <div class="panel-body">
        <div class="form-group">
            <label><?php echo e(__("Import url")); ?></label>
            <input type="text" value="<?php echo e($row->ical_import_url); ?>"  name="ical_import_url" class="form-control">
        </div>
        <?php if(!empty($row->id)): ?>
        <div class="form-group">
            <label><?php echo e(__("Export url")); ?></label>
            <input type="text" value="<?php echo e(route('booking.admin.export-ical',['type'=>'tour',$row->id])); ?>"   class="form-control">
        </div>
            <?php endif; ?>
    </div>
</div>
<?php /**PATH /home3/cdjofzdd/test.booking.dorica.fi/modules/Tour/Views/admin/tour/ical.blade.php ENDPATH**/ ?>