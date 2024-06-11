

<?php $__env->startSection('container'); ?>


                <!-- ==================== Start Slider ==================== -->

                <header class="blog-header section-padding pb-0">
                    <div class="container mt-80">
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <div class="caption">
                                    <div class="sub-title fz-12">
                                        <?php $__currentLoopData = $blog->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="#"><span><?php echo e($tag->title); ?> </span></a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <h1 class="fz-55 mt-30"><?php echo e($blog->title); ?>

                                    </h1>
                                </div>
                                <div class="info d-flex mt-40 align-items-center">
                                    <div class="left-info">
                                        <div class="d-flex align-items-center">
                                            <div class="author-info">
                                                <div class="d-flex align-items-center">
                                                    <a href="#0" class="circle-60">
                                                        <img src="assets/imgs/blog/author.png" alt=""
                                                            class="circle-img">
                                                    </a>
                                                    <a href="#0" class="ml-20">
                                                        <span class="opacity-7">Author</span>
                                                        <h6 class="fz-16">Markup</h6>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="date ml-50">
                                                <a href="#0">
                                                    <span class="opacity-7">Published</span>
                                                    <h6 class="fz-16"><?php echo e(date_format($blog->created_at,"d m,Y")); ?> </h6>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="right-info ml-auto">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="background bg-img mt-80" data-background="<?php echo e(asset('/public/front/assets/imgs/blog/b1.jpg')); ?>"></div>
                </header>

                <!-- ==================== End Slider ==================== -->



                <!-- ==================== Start Blog ==================== -->

                <section class="blog section-padding">
                    <div class="container">
                        <div class="row xlg-marg justify-content-center">
                            <div class="col-lg-10">
                                <div class="main-post">
                                    <div class="item pb-60">
                                        <article>
                                            <div class="text">
                                        <?php echo $blog->desc; ?>   
                                        </div>
                                        </article>

                                    </div>
                                    <div class="info-area flex pt-50 bord-thin-top">
                                        <div>
                                            <div class="tags flex">
                                                <div class="valign">
                                                    <span>Tags :</span>
                                                </div>
                                                <div>
                                                    <?php $__currentLoopData = $blog->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href=""><?php echo e($tag->title); ?></a>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ml-auto">
                                            <div class="share-icon flex">
                                                <div class="valign">
                                                    <span>Share :</span>
                                                </div>
                                                <div>

                                                    <a href="https://www.facebook.com/"><i
                                                            class="fab fa-facebook-f"></i></a>
                                                    <a href="https://www.twitter.com/"><i
                                                            class="fab fa-twitter"></i></a>
                                                    <a href="https://www.youtube.com/"><i
                                                            class="fab fa-youtube"></i></a>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                               
                            </div>
                            
                        </div>
                    </div>
                </section>

                <!-- ==================== End Blog ==================== -->




<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\markup\resources\views/front/pages/blog_single.blade.php ENDPATH**/ ?>