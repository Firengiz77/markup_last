<?php
    $logo = asset(Storage::url('uploads/logo/'));
    $favicon = \App\Models\Utility::getValByName('company_favicon');
    $settings = Utility::settings();
    $title_text = \App\Models\Utility::getValByName('title_text');
?>
<head>
    <title>
        <?php echo e($title_text ? $title_text : env('APP_NAME', 'MarkUp')); ?> - <?php echo $__env->yieldContent('page-title'); ?>
    </title>

    <meta charset="utf-8" dir="<?php echo e($settings['SITE_RTL'] == 'on' ? 'rtl' : ''); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="<?php echo e(env('APP_NAME')); ?> - Online Store Builder" />
    <meta name="keywords" content="<?php echo e(env('APP_NAME')); ?>" />
    <meta name="author" content="Rajodiya Infotech" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- Favicon icon -->
    <?php if(\Auth::user()->type == 1): ?>
        <link rel="icon" href="<?php echo e(asset('assets/images/logo/favicon.png')); ?>" type="image/x-icon" />
    <?php else: ?>
        <link rel="icon" href="<?php echo e($logo . '/' . (isset($favicon) && !empty($favicon) ? $favicon : 'favicon.png') . '?timestamp='. time()); ?>" type="image/x-icon" />
    <?php endif; ?>


    <!-- font css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />

    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/feather.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/fontawesome.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/material.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('custom/libs/animate.css/animate.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('custom/libs/select2/dist/css/select2.min.css')); ?>">
     <link rel="stylesheet" href="<?php echo e(asset('custom/libs/@fortawesome/fontawesome-free/css/all.min.css')); ?>">
     <link rel="stylesheet" href="<?php echo e(asset('custom/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.css')); ?>">
     <link rel="stylesheet" href="<?php echo e(asset('custom/libs/summernote/summernote-bs4.css')); ?>">
     <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/bootstrap-switch-button.min.css')); ?>">
    <!-- vendor css -->
    
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/customizer.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/custom.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('custom/css/custom.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/style.css')); ?>">
    <?php if(isset($settings['SITE_RTL']) && $settings['SITE_RTL'] == 'on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-rtl.css')); ?>">
    <?php endif; ?>
    <?php if($settings['cust_darklayout'] == 'on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-dark.css')); ?>" id="main-style-link">
        <link rel="stylesheet" href="<?php echo e(asset('custom/css/custom-dark.css')); ?>">
    <?php else: ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>" id="main-style-link">
    <?php endif; ?>

    <style>
        :root {
            --color-customColor: <?= $color ?>;
        }
    </style>

    <link rel="stylesheet" href="<?php echo e(asset('css/custom-color.css')); ?>">

    <?php echo $__env->yieldPushContent('css'); ?>
</head>
<?php /**PATH C:\xampp\htdocs\bcg\resources\views/partials/admin/head.blade.php ENDPATH**/ ?>