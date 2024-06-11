

<?php $__env->startSection('container'); ?>

    <!-- ==================== Start Header ==================== -->

    <header class="page-header section-padding">
                    <div class="container pt-100">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="caption">
                                    <h2><?php echo e($about->title); ?></h2>
                                    <div class="mt-30">
                                        <a href="<?php echo e(route('index')); ?>">Home</a>
                                        <span class="padding-rl-20">|</span>
                                        <span class="main-color">About Us</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- ==================== End Header ==================== -->



                <!-- ==================== Start intro ==================== -->

                <section class="page-intro position-re">
                    <div class="container-fluid rest">
                        <div class="img fit-img">
                            <img src="/public/<?php echo e($about->image); ?>" alt="">
                        </div>
                    </div>
                    <div class="container section-padding">
                        <div class="row">
                            <div class="col-lg-5">
                                <h6 class="sub-title main-color">About Company</h6>
                            </div>
                            <div class="col-lg-7">
                                <div class="text">
                                  <?php echo $about->detail; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="line-overlay">
                        <svg viewBox="0 0 1728 1101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M-43 773.821C160.86 662.526 451.312 637.01 610.111 733.104C768.91 829.197 932.595 1062.9 602.782 1098.75C272.969 1134.6 676.888 25.4306 1852 1"
                                style="stroke-dasharray: 3246.53, 0;"></path>
                        </svg>
                    </div>
                </section>

                <!-- ==================== End intro ==================== -->



                <!-- ==================== Start numbers ==================== -->

                <section class="numbers section-padding pt-0">
                    <div class="container">
                        <div class="row justify-content-center">


                        <?php $__currentLoopData = $counter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="item d-flex align-items-center justify-content-center md-mb50">
                                    <h2 class="fz-80 line-height-1"><?php echo e($item->number); ?></h2>
                                    <span class="sub-title opacity-7 ml-30"><?php echo e($item->title); ?></span>
                                </div>
                            </div>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </div>
                    </div>
                </section>

                <!-- ==================== End numbers ==================== -->







                <!-- ==================== Start services tabs ==================== -->

                <section class="services-tab section-padding mb-80">
                    <div class="container">
                        <div class="row lg-marg" id="tabs">
                            <div class="col-lg-6 valign">
                                <div class="serv-tab-cont md-mb80">


                                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="tab-content <?php if($loop->first): ?> current <?php endif; ?>" id="tabs-<?php echo e(++$key); ?>">
                                        <div class="item">
                                            <div class="img">
                                                <img src="/public/<?php echo e($item->image); ?>" alt="">
                                            </div>
                                            <div class="cont sub-bg">
                                                <div class="icon-img-60 mb-40">
                                                    <img src="/public/<?php echo e($item->icon); ?>" alt="">
                                                </div>
                                                <div class="text">
                                                    <p><?php echo e($item->description); ?></p>
                                                </div>
                                                <a href="<?php echo e(route(app()->getLocale().'.service_single',$item->slug)); ?>" class="mt-30">
                                                    <span class="mr-15">Read More</span>
                                                    <i class="fas fa-long-arrow-alt-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                </div>
                            </div>
                            <div class="col-lg-6 valign">
                                <div class="serv-tab-link tab-links full-width pt-40">
                                    <div class="sec-head mb-30">
                                        <h6 class="sub-title mb-15 main-color">What we do?</h6>
                                        <h2>The ultmiate guide to marketing success.</h2>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-lg-11">
                                            <div class="text mb-50">
                                                <p>We shifted our talents to frontier science because we wanted our work
                                                    to have tangible. we get front row
                                                    seats to the future.</p>
                                            </div>
                                            <ul class="rest">


                                            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="item-link current mb-15"
                                                    data-tab="tabs-1"><h4><span class="fz-18 opacity-7 mr-15"><?php echo e(++$key); ?></span><?php echo e($item->title); ?></h4></li>
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                           
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </section>

                <!-- ==================== End services tabs ==================== -->



<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\markup\resources\views/front/pages/about.blade.php ENDPATH**/ ?>