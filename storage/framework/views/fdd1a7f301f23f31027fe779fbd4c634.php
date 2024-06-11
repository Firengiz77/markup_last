

<?php $__env->startSection('container'); ?>


                <!-- ==================== Start Header ==================== -->

                <header class="page-header-cerv bg-img section-padding" data-background="<?php echo e(asset('/public/front/assets/imgs/header/2.jpg')); ?>"
                    data-overlay-dark="4">
                    <div class="container pt-100">
                        <div class="text-center">
                            <h1 class="fz-100">Contact Us.</h1>
                            <div class="mt-15">
                                <a href="<?php echo e(route('index')); ?>">Home</a>
                                <span class="padding-rl-20">|</span>
                                <span class="main-color">Contact</span>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- ==================== End Header ==================== -->



                <!-- ==================== Start Contact ==================== -->

                <section class="contact section-padding">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 valign">
                                <div class="sec-head info-box full-width md-mb80">
                                    <div class="phone fz-30 fw-600 underline main-color">
                                        <a href="tel:<?php echo e(str_replace(' ','',$contact->phone)); ?>"><?php echo e($contact->phone); ?></a>
                                    </div>
                                    <div class="morinfo mt-50 pb-30 bord-thin-bottom">
                                        <h6 class="mb-15">Address</h6>
                                        <p><?php echo e($contact->address); ?></p>
                                    </div>
                                    <div class="morinfo mt-30 pb-30 bord-thin-bottom">
                                        <h6 class="mb-15">Email</h6>
                                        <a href="mailto:<?php echo e($contact->email); ?>"><?php echo e($contact->email); ?></a>
                                    </div>

                                    <div class="social-icon-circle mt-50">
                                        <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="<?php echo e($item->link); ?>"><i class="<?php echo e($item->icon); ?>"></i></a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 offset-lg-1 valign">
                                <div class="full-width">
                                    <div class="sec-head mb-50">
                                        <h6 class="sub-title main-color mb-15">Let's Chat</h6>
                                        <h3 class="text-u ls1">Send a <span class="fw-200">message</span></h3>
                                    </div>
                                    <form id="contact-form" class="form2" method="post" action="https://Markup.smartinnovates.net/items/Markup/Markup-light/contact.php">

                                        <div class="messages"></div>

                                        <div class="controls row">

                                            <div class="col-lg-6">
                                                <div class="form-group mb-30">
                                                    <input id="form_name" type="text" name="name" placeholder="Name"
                                                        required="required">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group mb-30">
                                                    <input id="form_email" type="email" name="email" placeholder="Email"
                                                        required="required">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group mb-30">
                                                    <input id="form_subject" type="text" name="subject"
                                                        placeholder="Subject">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <textarea id="form_message" name="message" placeholder="Message"
                                                        rows="4" required="required"></textarea>
                                                </div>
                                                <div class="mt-30">
                                                    <button type="submit" class="butn butn-full butn-bord radius-30">
                                                        <span class="text">Let's Talk</span>
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ==================== End Contact ==================== -->



                <!-- ==================== Start google-map ==================== -->

                <div class="google-map">
                    <iframe id="gmap_canvas"
                        src="<?php echo e($contact->map); ?>">
                    </iframe>
                </div>

                <!-- ==================== End google-map ==================== -->



<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\markup\resources\views/front/pages/contact.blade.php ENDPATH**/ ?>