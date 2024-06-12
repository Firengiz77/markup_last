

<?php $__env->startSection('container'); ?>


                <!-- ==================== Start Header ==================== -->

                <header class="page-header bg-img section-padding" data-background="assets/imgs/header/b5.jpg"
                    data-overlay-dark="9">
                    <div class="container pt-100">
                        <div class="text-center">
                            <h1><?php echo e($service->title); ?></h1>
                            <div class="mt-15">
                                <a href="<?php echo e(route('index')); ?>">Home</a>
                                <span class="padding-rl-20">|</span>
                                <a href="">Services</a>
                                <span class="padding-rl-20">|</span>
                                <span class="main-color"><?php echo e($service->title); ?></span>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- ==================== End Header ==================== -->



                <!-- ==================== Start Services ==================== -->

                <section class="services-details section-padding">
                    <div class="container">
                        <div class="row serv-imgs mt-80">
                            <div class="col-lg-4">
                                <div class="img o-hidden radius-15 fit-img md-mb30">
                                    <img src="/public/<?php echo e(asset($service->image)); ?>" alt="">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="img o-hidden radius-15">
                                    <img src="/public/<?php echo e(asset($service->image2)); ?>" alt="" data-speed="auto" data-lag="0">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-80">
                            <div>
                                <?php echo $service->detail; ?>

                            </div>
                        </div>
                    </div>
                </section>

                <!-- ==================== End Services ==================== -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\markup\resources\views/front/pages/service_single.blade.php ENDPATH**/ ?>