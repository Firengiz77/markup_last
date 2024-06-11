
<?php
// get theme color
$setting = App\Models\Utility::colorset();

$settings = Utility::settings();
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
$users = \Auth::user();
$currantLang = $users->currentLanguages();
$languages = \App\Models\Utility::languages();
$footer_text = isset($settings['footer_text']) ? $settings['footer_text'] : '';

$profile = \App\Models\Utility::get_file('uploads/profile');
$logo = \App\Models\Utility::get_file('uploads/logo');
?>

<!DOCTYPE html>
<html lang="en" dir="<?php echo e(isset($settings['SITE_RTL']) && $settings['SITE_RTL'] == 'on' ? 'rtl' : ''); ?>">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<style>

    [dir="rtl"] .dash-sidebar {
        left: auto !important;
    }

    [dir="rtl"] .dash-header {
        left: 0;
        right: 280px;
    }
    [dir="rtl"] .dash-header:not(.transprent-bg) .header-wrapper {
        padding: 0 0 0 30px;
    }

    [dir="rtl"] .dash-header:not(.transprent-bg):not(.dash-mob-header)~.dash-container {
        margin-left: 0px;
    }

    [dir="rtl"] .me-auto.dash-mob-drp {
        margin-right: 10px !important;
    }

    [dir="rtl"] .me-auto {
        margin-left: 10px !important;
    }


    [dir="rtl"] .header-wrapper .ms-auto {
        margin-left: 0 !important;
    }

    [dir="rtl"] .dash-header {
        left: 0 !important;
        right: 280px !important;
    }

    [dir="rtl"] .list-group-flush>.list-group-item .float-end {
        float: left !important;
    }
</style>

<?php echo $__env->make('partials.admin.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body class="<?php echo e($themeColor); ?>">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>

    <!-- [ navigation menu ] start -->
    <?php echo $__env->make('partials.admin.menu',['currantLang'=>$currantLang,'logo'=>$logo], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- [ Header ] start -->
    <?php echo $__env->make('partials.admin.header',['languages'=>$languages,'profile'=>$profile], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- [ Main Content ] start -->
    <div class="dash-container">
        <div class="dash-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-3 mb-3">
                            <div class="page-header-title">
                                <h4 class="m-b-10"><?php echo $__env->yieldContent('page-title'); ?></h4>
                            </div>
                            <ul class="breadcrumb">
                                <?php echo $__env->yieldContent('breadcrumb'); ?>
                            </ul>
                        </div>
                        <div class="col-md-9">
                            <div class="col-12">
                                <?php echo $__env->yieldContent('filter'); ?>
                            </div>
                            <div class="col-12 <?php echo e(isset($settings['SITE_RTL']) && $settings['SITE_RTL'] == 'on' ? 'text-start' : 'text-end'); ?> ">
                                <?php echo $__env->yieldContent('action-btn'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>

    <div class="modal fade" id="commonModal" tabindex="-1" role="dialog" aria-labelledby="commonModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="commonModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="commonModalOver" tabindex="-1" role="dialog" aria-labelledby="commonModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="commonModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('partials.admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if($settings['enable_cookie'] == 'on'): ?>
        <?php echo $__env->make('layouts.cookie_consent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
</body>


</html>
<?php /**PATH D:\xampp\htdocs\markup\resources\views/layouts/admin.blade.php ENDPATH**/ ?>