<?php

$logo=\App\Models\Utility::get_file('uploads/logo/');
$profile=\App\Models\Utility::get_file('uploads/profile/');
$logo1=\App\Models\Utility::get_file('uploads/is_cover_image/');
$setting = App\Models\Utility::settings();
$company_logo = \App\Models\Utility::getValByName('company_logo');
?>


<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Dashboard')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        var timezone = '<?php echo e(!empty($setting['timezone']) ? $setting['timezone'] : 'Asia/Kolkata'); ?>';

        let today = new Date(new Date().toLocaleString("en-US", {
            timeZone: timezone
        }));
        var curHr = today.getHours()
        var target = document.getElementById("greetings");

        if (curHr < 12) {
            target.innerHTML = "Good Morning,";
        } else if (curHr < 17) {
            target.innerHTML = "Good Afternoon,";
        } else {
            target.innerHTML = "Good Evening,";
        }

    </script>
    <script>
        $(document).on('click', '#code-generate', function() {
            var length = 10;
            var result = '';
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            var charactersLength = characters.length;
            for (var i = 0; i < length; i++) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            $('#auto-code').val(result);
        });
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<?php if(\Auth::user()->type == 1): ?>
<div class="row">
    <!-- [ sample-page ] start -->
    <div class="col-sm-12">
        <div class="row">

            <div class="col-xxl-6">
                <div class="card">
                    <div class="card-header">
                        <h5><?php echo e(__('Dashboard')); ?></h5>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- [ sample-page ] end -->
</div>


<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
<?php if(\Auth::user()->type == 1): ?>
<?php else: ?>
<?php endif; ?>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bcg\resources\views/home.blade.php ENDPATH**/ ?>