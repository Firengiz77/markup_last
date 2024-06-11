<?php
    $settings = Utility::settings();
    $setting = App\Models\Utility::colorset();
    // $color = 'theme-3';
    // if (!empty($setting['color'])) {
    //     $color = $setting['color'];
    // }
    $color = !empty($setting['color']) ? $setting['color'] : 'theme-6';

    if(isset($setting['color_flag']) && $setting['color_flag'] == 'true')
    {
        $themeColor = 'custom-color';
    }
    else {
        $themeColor = $color;
    }
    $company_logo = \App\Models\Utility::GetLogo();
    $logo = \App\Models\Utility::get_file('uploads/logo/');
    $lang = \App::getLocale('lang');
    if ($lang == 'ar' || $lang == 'he') {
        $setting['SITE_RTL'] = 'on';
    }
?>
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>"
    dir="<?php echo e(isset($setting['SITE_RTL']) && $setting['SITE_RTL'] == 'on' ? 'rtl' : ''); ?>">

<head>
    <title>
        <?php echo e(\App\Models\Utility::getValByName('title_text') ? \App\Models\Utility::getValByName('title_text') : config('app.name', 'MarkUp')); ?>

        - <?php echo $__env->yieldContent('page-title'); ?></title>
    <!-- Meta -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Dashboard Template Description" />
    <meta name="keywords" content="Dashboard Template" />
    <meta name="author" content="Rajodiya Infotech" />

    <!-- Favicon icon -->
    <link rel="icon" href="<?php echo e(asset(Storage::url('uploads/logo/')) . '/favicon.png' . '?timestamp=' . time()); ?>"
        type="image/png">

    <?php if($setting['cust_darklayout'] == 'on'): ?>
        <?php if(isset($setting['SITE_RTL']) && $setting['SITE_RTL'] == 'on'): ?>
            <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-rtl.css')); ?>" id="main-style-link">
        <?php endif; ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-dark.css')); ?>">
    <?php else: ?>
        <?php if(isset($setting['SITE_RTL']) && $setting['SITE_RTL'] == 'on'): ?>
            <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-rtl.css')); ?>" id="main-style-link">
        <?php else: ?>
            <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>" id="main-style-link">
        <?php endif; ?>
    <?php endif; ?>

    <?php if(isset($setting['SITE_RTL']) && $setting['SITE_RTL'] == 'on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('custom/css/custom-auth-rtl.css')); ?>" id="main-style-link">
    <?php else: ?>
        <link rel="stylesheet" href="<?php echo e(asset('custom/css/custom-auth.css')); ?>" id="main-style-link">
    <?php endif; ?>
    <?php if($setting['cust_darklayout'] == 'on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('custom/css/custom-auth-dark.css')); ?>" id="main-style-link">
    <?php endif; ?>

    <style>
        :root {
            --color-customColor: <?= $color ?>;
        }
    </style>

    <link rel="stylesheet" href="<?php echo e(asset('css/custom-color.css')); ?>">
</head>

<body class="<?php echo e($themeColor); ?>">
    <!-- [custom-login] start -->
    <div class="custom-login">
        <div class="login-bg-img">
            <img src="<?php echo e(isset($setting['color_flag']) && $setting['color_flag'] == 'false' ? asset('assets/images/auth/'.$color.'.svg') : asset('assets/images/auth/theme-1.svg')); ?>" class="login-bg-1">
            <img src="<?php echo e(asset('assets/images/auth/common.svg')); ?>" class="login-bg-2">
        </div>
        <div class="bg-login bg-primary"></div>
        <div class="custom-login-inner">
            <header class="dash-header">
                <nav class="navbar navbar-expand-md default">
                    <div class="container">
                        <div class="navbar-brand">
                            <a href="#">
                                <img src="<?php echo e($logo . $company_logo . '?timestamp=' . time()); ?>"
                                    alt="<?php echo e(config('app.name', 'MarkUp')); ?>" alt="logo" loading="lazy"
                                    class="" height="40px" width="165px"/>
                            </a>
                        </div>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarlogin">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarlogin">
                            <ul class="navbar-nav align-items-center ms-auto mb-2 mb-lg-0">

                                <?php echo $__env->yieldContent('language-bar'); ?>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
            <main class="custom-wrapper">
                <div class="custom-row">
                    <div class="card">
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                </div>
            </main>
            <footer>
                <div class="auth-footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <span>&copy; <?php echo e(date('Y')); ?>

                                    <?php echo e(App\Models\Utility::getValByName('footer_text') ? App\Models\Utility::getValByName('footer_text') : config('app.name', 'MarkUp')); ?>

                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- [custom-login] end -->

    <!-- Required Js -->
    <?php if($settings['enable_cookie'] == 'on'): ?>
        <?php echo $__env->make('layouts.cookie_consent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <script src="<?php echo e(asset('assets/js/vendor-all.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/feather.min.js')); ?>"></script>

    <?php echo $__env->yieldPushContent('custom-scripts'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\bcg\resources\views/layouts/auth.blade.php ENDPATH**/ ?>