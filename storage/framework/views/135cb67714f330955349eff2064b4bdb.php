<?php ($store_logo=\App\Models\Utility::get_file('uploads/gallery_cover_image/')); ?>

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Gallery')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 "><?php echo e(__('Gallery')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Gallery')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('custom/libs/summernote/summernote-bs4.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-page'); ?>
    <script src="<?php echo e(asset('custom/libs/summernote/summernote-bs4.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('action-btn'); ?>
    <ul class="nav nav-pills cust-nav   rounded  mb-3" id="pills-tab" role="tablist">
        <?php $__currentLoopData = \App\Models\Utility::languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($loop->first): ?>
                <li class="nav-item">
                    <a class="nav-link active" id="<?php echo e($code); ?>_setting_tab" data-bs-toggle="pill" href="#pills-<?php echo e($code); ?>"
                       role="tab" aria-controls="pills-<?php echo e($code); ?>" aria-selected="true"><?php echo e(__(ucFirst($lang))); ?></a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" id="<?php echo e($code); ?>_setting_tab" data-bs-toggle="pill" href="#pills-<?php echo e($code); ?>"
                       role="tab" aria-controls="pills-<?php echo e($code); ?>" aria-selected="false"><?php echo e(__(ucFirst($lang))); ?></a>
                </li>
            <?php endif; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('filter'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="tab-content" id="pills-tabContent">

                <?php $__currentLoopData = \App\Models\Utility::languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="tab-pane fade <?php echo e($loop->first?"active show":""); ?>" id="pills-<?php echo e($code); ?>" role="tabpanel"
                         aria-labelledby="pills-<?php echo e($code); ?>-tab">
                        <?php echo e(Form::model($gallery, array('route' => array('gallery.update', $gallery->id), 'method' => 'PUT','enctype'=>'multipart/form-data'))); ?>

                        <input type="hidden" name="lang" value="<?php echo e($code); ?>">

                        <div class="card">
                            <div class="card-header">
                                <h5 class="">
                                    <?php echo e(__('Section')); ?> 1 - <?php echo e(__(ucFirst($lang))); ?>

                                </h5>
                            </div>
                            <div class="card-body table-border-style">

                                <div class="d-flex justify-content-end">

                                </div>
                                <div class="row">


                            





<div class='col-12'>
<div class='form-group'>
<label for='image' class='col-form-label'>Şəkil</label>
<input type='file' name='image' id='blog_cover_image' class='form-control' onchange='document.getElementById("imageImg").src = window.URL.createObjectURL(this.files[0])'>
<img src='/public/<?php echo e($gallery->image); ?>' width='200' class='mt-2'/>
<img id='imageImg' src='' width='20%' class='mt-2'/>
</div>
</div>





                                </div>
                                <div class="form-group col-12 d-flex justify-content-end col-form-label">
                                    <input onclick="history.back()" type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-secondary btn-light"
                                           data-bs-dismiss="modal">
                                    <input type="submit" value="<?php echo e(__('Update')); ?>" class="btn btn-primary ms-2">
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bcg\resources\views/gallery/edit.blade.php ENDPATH**/ ?>