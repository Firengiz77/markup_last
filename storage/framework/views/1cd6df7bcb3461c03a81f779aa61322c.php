

<?php $__env->startSection('container'); ?>

      <!-- ==================== Start Header ==================== -->

      <header class="page-header bg-img section-padding" data-background="<?php echo e(asset('/front/assets/imgs/header/bg1.jpg')); ?>"
                    data-overlay-dark="9">
                    <div class="container pt-100">
                        <div class="text-center">
                            <h1>Referanslar</h1>
                            <div class="mt-15">
                                <a href="<?php echo e(route('index')); ?>">Ana Səhifə</a>
                                <span class="padding-rl-20">|</span>
                                <span class="main-color">Referanslar</span>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- ==================== End Header ==================== -->



                <!-- ==================== Start Portfolio ==================== -->

                <section class="work-minimal section-padding sub-bg">
                    <div class="container">
                        <div class="row">
                            <?php $__currentLoopData = $references; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6 mb-30 mb-30">
                                <div class="reference-card">
                                    <img src="<?php echo e($item->image); ?>" alt="<?php echo e($item->name); ?>">
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                        </div>
                    </div>
                </section>

                <!-- ==================== End Portfolio ==================== -->





<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\markup\resources\views/front/pages/reference.blade.php ENDPATH**/ ?>