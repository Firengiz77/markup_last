

<?php $__env->startSection('container'); ?>

       <!-- ==================== Start Header ==================== -->

       <header class="page-header bg-img section-padding" data-background="assets/imgs/header/bg1.jpg"
                    data-overlay-dark="9">
                    <div class="container pt-100">
                        <div class="text-center">
                            <h1>Blog</h1>
                            <div class="mt-15">
                                <a href="<?php echo e(route('index')); ?>">Home</a>
                                <span class="padding-rl-20">|</span>
                                <span class="main-color">Blog List</span>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- ==================== End Header ==================== -->



                <!-- ==================== Start Blog ==================== -->

                <section class="blog-crev section-padding">
                    <div class="container">
                        <div class="row">
                            <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4">
                                <div class="item sub-bg mb-40">
                                    <div class="img">
                                        <img src="/public/<?php echo e($item->image); ?>" alt="">
                                        <div class="tag sub-bg">
                                           <?php if($item->tags): ?>
                                            <span><?php echo e($item->tags[0]->title); ?></span>
                                              <?php endif; ?>
                                            <div class="shap-right-bottom">
                                                <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                                    class="w-11 h-11">
                                                    <path
                                                        d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                                        fill="#fff"></path>
                                                </svg>
                                            </div>
                                            <div class="shap-left-bottom">
                                                <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                                    class="w-11 h-11">
                                                    <path
                                                        d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                                        fill="#fff"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cont">
                                        <div class="date fz-13 text-u ls1 mb-10 opacity-7">
                                            <a href="<?php echo e(route(app()->getLocale().'.blog_single',$item->slug)); ?>"><?php echo e(date_format($item->created_at,"D M,Y")); ?></a>
                                        </div>
                                        <h5>
                                            <a href="<?php echo e(route(app()->getLocale().'.blog_single',$item->slug)); ?>"><?php echo e($item->title); ?></a>
                                        </h5>
                                        <a href="<?php echo e(route(app()->getLocale().'.blog_single',$item->slug)); ?>" class="d-flex align-items-center mt-30">
                                            <span class="text mr-15">Read More</span>
                                            <span class="ti-arrow-top-right"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         

                        </div>
                    </div>
                </section>

                <!-- ==================== End Blog ==================== -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\markup\resources\views/front/pages/blogs.blade.php ENDPATH**/ ?>