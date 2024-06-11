

<?php $__env->startSection('container'); ?>


                <!-- ==================== Start Header ==================== -->

                <header class="page-header bg-img section-padding" data-background="<?php echo e(asset('/public/front/assets/imgs/header/bg1.jpg')); ?>"
                    data-overlay-dark="9">
                    <div class="container pt-100 ontop">
                        <div class="text-center">
                            <h1 class="fz-100 text-u">FAQS.</h1>
                            <div class="mt-15">
                                <a href="<?php echo e(route('index')); ?>">Home</a>
                                <span class="padding-rl-20">|</span>
                                <span class="main-color">FAQS</span>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- ==================== End Header ==================== -->



                <!-- ==================== Start FAQS ==================== -->

                <section class="faqs section-padding position-re">
                    <div class="container">
                        <div class="row justify-content-between">
                            <div class="col-lg-4">
                                <div class="sec-head md-mb80">
                                    <h6 class="sub-title main-color mb-15">FAQS</h6>
                                    <h2>Frequently <br> asked questions</h2>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="list-serv">
                                    <div class="accordion bord">

                                    <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="item mb-15 wow fadeInUp <?php if($loop->first): ?> active <?php endif; ?>" data-wow-delay=".1s">
                                            <div class="title">
                                                <h6><?php echo e($item->question); ?></h6>
                                                <span class="ico ti-plus"></span>
                                            </div>
                                            <div class="accordion-info">
                                                <p class=""><?php echo e($item->answer); ?></p>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="line-overlay up opacity-7">
                        <svg viewBox="0 0 1728 1101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M-43 773.821C160.86 662.526 451.312 637.01 610.111 733.104C768.91 829.197 932.595 1062.9 602.782 1098.75C272.969 1134.6 676.888 25.4306 1852 1"
                                style="stroke-dasharray: 3246.53, 0;"></path>
                        </svg>
                    </div>
                </section>

                <!-- ==================== End FAQS ==================== -->




<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\markup\resources\views/front/pages/faq.blade.php ENDPATH**/ ?>