<?php
    $checktableExist = Utility::checktableExist();

        $LangName = 'english';
?>
<!-- [ Header ] start -->
<?php if(isset($setting['cust_theme_bg']) && $setting['cust_theme_bg'] == 'on'): ?>
    <header class="dash-header transprent-bg">
<?php else: ?>
    <header class="dash-header">
<?php endif; ?>
<div class="header-wrapper">
    <div class="me-auto dash-mob-drp">
        <ul class="list-unstyled">
            <li class="dash-h-item mob-hamburger">
                <a href="#!" class="dash-head-link" id="mobile-collapse">
                    <div class="hamburger hamburger--arrowturn">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                </a>
            </li>
            <li class="dropdown dash-h-item drp-company">
                <a class="dash-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    <span class="theme-avtar">
                        <img class="theme-avtar" alt="#" style="width:30px;"
                            src="<?php echo e(!empty($users->avatar) ? $profile . '/' . $users->avatar : $profile . '/avatar.png'); ?>">
                    </span>
                    <span class="hide-mob ms-2"><?php echo e('Hi,'); ?><?php echo e(Auth::user()->name); ?>!</span>
                    <i class="ti ti-chevron-down drp-arrow nocolor hide-mob"></i>
                </a>
                <div class="dropdown-menu dash-h-dropdown">

                    <a href="<?php echo e(route('profile')); ?>" class="dropdown-item">
                        <i class="ti ti-user"></i>
                        <span><?php echo e(__('My Profile')); ?></span>
                    </a>
                    <a href="<?php echo e(route('logout')); ?>" class="dropdown-item"
                        onclick="event.preventDefault();document.getElementById('frm-logout').submit();">
                        <i class="ti ti-power"></i>
                        <span><?php echo e(__('Logout')); ?></span>
                    </a>
                    <form id="frm-logout" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;"><?php echo csrf_field(); ?>
                    </form>
                </div>
            </li>
        </ul>
    </div>
    <div class="ms-auto">
        <ul class="list-unstyled">
            <?php if (is_impersonating($guard = null)) : ?>
                <li class="dropdown dash-h-item drp-company">
                    <a class="btn btn-danger btn-sm me-3"
                        href="<?php echo e(route('exit.owner')); ?>"><i class="ti ti-ban"></i>
                        <?php echo e(__('Exit Owner Login')); ?>

                    </a>
                </li>
            <?php endif; ?>

            <li class="dropdown dash-h-item drp-language">
                <a class="dash-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="ti ti-world nocolor"></i>
                    <span class="drp-text"><?php echo e(ucFirst($LangName)); ?></span>
                    <i class="ti ti-chevron-down drp-arrow nocolor"></i>
                </a>
                <div class="dropdown-menu dash-h-dropdown dropdown-menu-end">
                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('change.language', $code)); ?>"
                            class="dropdown-item <?php echo e($currantLang == $code ? 'text-primary' : ''); ?>">
                            <span><?php echo e(ucFirst($lang)); ?></span>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if(Auth::user()->type == 1): ?>
                           <a href="#" data-url="<?php echo e(route('create.language')); ?>" data-size="md" data-ajax-popup="true" data-title="<?php echo e(__('Create New Language')); ?>" class="dropdown-item border-top py-1 text-primary"
                            ><?php echo e(__('Create Language')); ?></a>
                            <a href="<?php echo e(route('manage.language', [$currantLang])); ?>"
                                class="dropdown-item py-1 text-primary"><?php echo e(__('Manage Languages')); ?>

                            </a>
                    <?php endif; ?>
                </div>
            </li>
        </ul>
    </div>
</div>
</header>
<!-- [ Header ] end -->
<?php /**PATH C:\xampp\htdocs\bcg\resources\views/partials/admin/header.blade.php ENDPATH**/ ?>