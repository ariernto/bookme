<div class="container">
    <div class="bravo_gallery">
        <div class="btn-group">
            <span class="btn-transparent has-icon bravo-video-popup" <?php if($youtube): ?> data-toggle="modal" <?php endif; ?> data-src="<?php echo e(str_ireplace("watch?v=","embed/",$youtube)); ?>" data-target="#video-<?php echo e($id); ?>">
                <?php if($bg_image): ?>
                    <img src="<?php echo e(get_file_url($bg_image,'full')); ?>" class="img-fluid" alt="Youtube">
                <?php endif; ?>
                <?php if($youtube): ?>
                    <div class="play-icon">
                        <img src="<?php echo e(asset('module/vendor/img/ico-play.svg')); ?>" alt="Play background" class="img-fluid play-image">
                    </div>
                <?php endif; ?>
            </span>
        </div>
        <?php if($youtube): ?>
            <div class="modal fade" id="video-<?php echo e($id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content p-0">
                        <div class="modal-body">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item bravo_embed_video" src="<?php echo e(handleVideoUrl($youtube)); ?>" allowscriptaccess="always" allow="autoplay"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /home3/cdjofzdd/test.booking.dorica.fi/modules/Template/Views/frontend/blocks/video-player.blade.php ENDPATH**/ ?>