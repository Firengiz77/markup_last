<?php ($store_logo=\App\Models\Utility::get_file('uploads/serviceimage_cover_image/')); ?>

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('ServiceImage')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 "><?php echo e(__('ServiceImage')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('ServiceImage')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('custom/libs/summernote/summernote-bs4.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-page'); ?>
    <script src="<?php echo e(asset('custom/libs/summernote/summernote-bs4.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('action-btn'); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('filter'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <?php echo e(Form::open(array('url'=>'admin/serviceimage/'.$id,'method'=>'post','enctype'=>'multipart/form-data'))); ?>

                <div class="d-flex justify-content-end">

                </div>
                <div class="card-body table-border-style">

                    <div class="row">

     
<div class='col-12'> <div class='form-group'><label for='image' class='col-form-label'>Şəkil</label><input type='file' name='image' id='blog_cover_image' class='form-control' onchange='document.getElementById("imageImg").src = window.URL.createObjectURL(this.files[0])'><img id='imageImg' src='' width='20%' class='mt-2'/></div></div>




                        <div class="form-group col-12 d-flex justify-content-end col-form-label">
                            <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-secondary btn-light"
                                   data-bs-dismiss="modal">
                            <input type="submit" value="<?php echo e(__('Save')); ?>" class="btn btn-primary ms-2">
                        </div>

                    </div>
                </div>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).ready(function () {
            $(document).on('keyup', '.search-user', function () {
                var value = $(this).val();
                $('.employee_tableese tbody>tr').each(function (index) {
                    var name = $(this).attr('data-name').toLowerCase();
                    if (name.includes(value.toLowerCase())) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bcg\resources\views/serviceimage/create.blade.php ENDPATH**/ ?>