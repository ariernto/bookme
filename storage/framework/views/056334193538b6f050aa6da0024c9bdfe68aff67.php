<?php if(!empty($seo_meta)): ?>
    <?php if(isset($seo_meta['seo_index']) and $seo_meta['seo_index'] == 0): ?>
        <meta name="robots" content="noindex">
    <?php endif; ?>
    <?php
        $page_title = $seo_meta['seo_title'] ?? $seo_meta['service_title'] ?? $page_title ?? "";
        if(!empty($page_title) and empty($seo_meta['is_homepage'])){
            $page_title .= " - ".setting_item_with_lang('site_title' ,false,'Booking Core');
        }
        if(empty($page_title)){
            $page_title = setting_item_with_lang('site_title' ,false,'Booking Core');
        }
    ?>
    <title><?php echo e($page_title); ?></title>
    <meta name="description" content="<?php echo e($seo_meta['seo_desc'] ?? $seo_meta['service_desc'] ?? setting_item_with_lang("site_desc")); ?>"/>
    
    <meta property="og:url" content="<?php echo e($seo_meta['full_url'] ?? ""); ?>"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="<?php echo e($seo_meta['seo_share']['facebook']['title'] ?? $seo_meta['seo_title'] ?? $seo_meta['service_title'] ?? $page_title ?? ""); ?>"/>
    <meta property="og:description" content="<?php echo e($seo_meta['seo_share']['facebook']['desc'] ?? $seo_meta['seo_desc'] ?? $seo_meta['service_desc'] ?? ""); ?>"/>
    <meta property="og:image" content="<?php echo e(get_file_url( $seo_meta['seo_share']['facebook']['image'] ?? $seo_meta['seo_image'] ?? $seo_meta['service_image'] ?? "" , "full")); ?>"/>
    
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo e($seo_meta['seo_share']['twitter']['title'] ?? $seo_meta['seo_title'] ?? $seo_meta['service_title'] ?? $page_title ?? ""); ?>">
    <meta name="twitter:description" content="<?php echo e($seo_meta['seo_share']['twitter']['desc'] ?? $seo_meta['seo_desc'] ?? $seo_meta['service_desc'] ?? ""); ?>">
    <meta name="twitter:image" content="<?php echo e(get_file_url( $seo_meta['seo_share']['twitter']['image'] ?? $seo_meta['seo_image'] ?? $seo_meta['service_image'] ?? "" , "full")); ?>">
    <link rel="canonical" href="<?php echo e($seo_meta['full_url'] ?? ""); ?>"/>
<?php else: ?>
    <?php
        if(!empty($page_title)){
            $page_title .= " - ".setting_item_with_lang('site_title' ,false,'Booking Core');
        }else{
            $page_title = setting_item_with_lang('site_title' ,false,'Booking Core');
        }
    ?>
    <title><?php echo e($page_title); ?></title>
    <meta name="description" content="<?php echo e(setting_item_with_lang("site_desc")); ?>"/>
<?php endif; ?>
<?php /**PATH C:\Work\laravel\modules/Layout/parts/seo-meta.blade.php ENDPATH**/ ?>