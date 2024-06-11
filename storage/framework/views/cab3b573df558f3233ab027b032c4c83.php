
</main>


<!-- ==================== Start Footer ==================== -->

<footer class="modern-footer pt-80">
    <div class="footer-container">
        <div class="container ontop">
            <div class="row pb-30 bord-thin-bottom">
                <div class="col-lg-5">
                    <div class="logo icon-img-120">
                        <img src="<?php echo e($main->footer_logo); ?>" alt="">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="social-media d-flex justify-content-end">
                        <ul class="rest d-flex align-items-center fz-14">
                            <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="hover-this cursor-pointer">
                                <a href="<?php echo e($item->link); ?>" class="hover-anim"><i class="<?php echo e($item->icon); ?> mr-10"></i> <?php echo e($item->name); ?></a>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    


                        </ul>
                    </div>
                </div>
            </div>
           
            <div class="text-center pt-10 pb-10 sub-bg ">
                <p class="fz-14">© 2023 Markup is Proudly Powered by <span class="underline main-color"><a
                            href="https://themeforest.net/user/Markup"
                            target="_blank">Markup</a></span></p>
            </div>
        </div>
    </div>
</footer>

<!-- ==================== End Footer ==================== -->


</div>

</div>

    <!-- jQuery -->
    <script src="<?php echo e(asset('/front/assets/js/jquery-3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/front/assets/js/jquery-migrate-3.4.0.min.js')); ?>"></script>

    <!-- plugins -->
    <script src="<?php echo e(asset('/front/assets/js/plugins.js')); ?>"></script>

    <script src="<?php echo e(asset('/front/assets/js/gsap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/front/assets/js/ScrollSmoother.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/front/assets/js/ScrollTrigger.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/front/assets/js/smoother-script.js')); ?>"></script>

    <!-- custom scripts -->
    <script src="<?php echo e(asset('/front/assets/js/scripts.js')); ?>"></script>

</body>


<!-- Mirrored from Markup.smartinnovates.net/items/Markup/Markup-light/portfolio-gallery.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Feb 2024 09:28:03 GMT -->
</html><?php /**PATH D:\xampp\htdocs\markup\resources\views/front/layout/footer.blade.php ENDPATH**/ ?>