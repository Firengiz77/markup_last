<?php ($store_logo=\App\Models\Utility::get_file('uploads/service_cover_image/')); ?>

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Service')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 "><?php echo e(__('Service')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Service')); ?></li>
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
            <div class="">
                <?php echo e(Form::open(array('url'=>'admin/service','method'=>'post','enctype'=>'multipart/form-data'))); ?>

                
                <div class="card-body table-border-style">

                    <div class="row" style="gap:20px">


           <div class="col-lg-7 card">
           <div class="card-header">
                                <h5 class="">
                                    <?php echo e(__('Section')); ?> 
                                </h5>
                            </div>

            <div class='col-12'><div class='form-group'><?php echo e(Form::label('title', __('title'), array('class' => 'form-label'))); ?><?php echo e(Form::text('title', null, array('class' => 'form-control', 'placeholder' => __('Enter title')))); ?></div></div>
           <div class='col-12'><div class='form-group'><?php echo e(Form::label('detail', __('detail'), array('class' => 'form-label'))); ?><?php echo e(Form::textarea('detail', null, array('class' => 'form-control summernote-simple nicEdit', 'placeholder' => __('Enter detail'), 'required' => 'required'))); ?></div></div>
        


           <div class="row">
<div class='col-4'><div class='form-group'><?php echo e(Form::label('meta_title', __('meta_title'), array('class' => 'form-label'))); ?><?php echo e(Form::textarea('meta_title', null, array('class' => 'form-control', 'rows' => 3,'placeholder' => __('Enter meta_title'), 'required' => 'required'))); ?></div></div>
<div class='col-4'><div class='form-group'><?php echo e(Form::label('meta_description', __('meta_description'), array('class' => 'form-label'))); ?><?php echo e(Form::textarea('meta_description', null, array('class' => 'form-control','rows' => 3, 'placeholder' => __('Enter meta_description'), 'required' => 'required'))); ?></div></div>
<div class='col-4'><div class='form-group'><?php echo e(Form::label('meta_keywords', __('meta_keywords'), array('class' => 'form-label'))); ?><?php echo e(Form::textarea('meta_keywords', null, array('class' => 'form-control','rows' => 3, 'placeholder' => __('Enter meta_keywords'), 'required' => 'required'))); ?></div></div>
</div>
        </div>


<div class="col-lg-4">

<div class="card row">
<div class="card-header">
                                <h5 class="">
                                 <?php echo e(__('Home page image')); ?>

                                </h5>
                            </div>

    
<div class='col-12'> <div class='form-group'><input type='file' name='image' id='blog_cover_image' class='form-control' onchange='document.getElementById("imageImg").src = window.URL.createObjectURL(this.files[0])'><img id='imageImg' src='' width='20%' class='mt-2'/></div></div>


<div class="card-header">
                                <h5 class="">
                                <?php echo e(__('Single page image')); ?>

                                </h5>
                            </div>
<div class='col-12'> <div class='form-group'>
    <input type='file' name='image2' id='blog_cover_image2' class='form-control' onchange='document.getElementById("image2Img").src = window.URL.createObjectURL(this.files[0])'><img id='image2Img' src='' width='20%' class='mt-2'/></div></div>

    <div class="card-header">
                                <h5 class="">
                                <?php echo e(__('Icon')); ?>

                                </h5>
                            </div>

<div class='col-12'> <div class='form-group'><input type='file' name='icon' id='blog_cover_icon' class='form-control' onchange='document.getElementById("iconImg").src = window.URL.createObjectURL(this.files[0])'><img id='iconImg' src='' width='20%' class='mt-2'/></div></div>

</div>
</div>








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

<script src="<?php echo e(asset('/public/js/jquery-ui.min.js')); ?>"></script>
<script src="<?php echo e(asset('/public/js/repeater.js')); ?>"></script>


<script>

    // $(document).on('change','.SITE_RTL',function(){
    //     $()
    // });
    $(document).ready(function() {
        var $dragAndDrop = $("body .custom-fields tbody").sortable({
            handle: '.sort-handler'
        });

        var $repeater = $('.custom-fields').repeater({
            initEmpty: true,
            defaultValues: {},
            show: function() {
                $(this).slideDown();

                console.log(this.deyer);
                var eleId = $(this).find('input[type=hidden]').val();
                if (eleId > 7 || eleId == '') {
                    $(this).find(".field_type option[value='file']").remove();
                    $(this).find(".field_type option[value='select']").remove();
                }
            },
            hide: function(deleteElement) {
                if (confirm('<?php echo e(__('Are you sure ? ')); ?>')) {
                    $(this).slideUp(deleteElement);
                }
            },
            ready: function(setIndexes) {
                $dragAndDrop.on('drop', setIndexes);
            },
            isFirstItemUndeletable: true
        });

        var value = $(".custom-fields").attr('data-value');
        if (typeof value != 'undefined' && value.length != 0) {
            value = JSON.parse(value);
            $repeater.setList(value);
        }

        $.each($('[data-repeater-item]'), function(index, val) {
            var elementId = $(this).find('input[type=hidden]').val();
            if (elementId <= 7) {
                $.each($(this).find('.field_type'), function(index, val) {
                    $(this).prop('disabled', 'disabled');
                });
                $(this).find('.delete-icon').remove();
            }
        });
    });
</script>




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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\markup\resources\views/service/create.blade.php ENDPATH**/ ?>