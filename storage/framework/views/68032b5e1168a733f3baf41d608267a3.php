<?php ($store_logo=\App\Models\Utility::get_file('uploads/project_cover_image/')); ?>

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Project')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 "><?php echo e(__('Project')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Project')); ?></li>
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
                <?php echo e(Form::open(array('url'=>'admin/project','method'=>'post','enctype'=>'multipart/form-data'))); ?>

                <div class="d-flex justify-content-end">

                </div>
                <div class="card-body table-border-style">

                    <div class="row">


                        <div class='col-12'><div class='form-group'><?php echo e(Form::label('country', __('country'), array('class' => 'form-label'))); ?><?php echo e(Form::text('country', null, array('class' => 'form-control', 'placeholder' => __('Enter country'), 'required' => 'required'))); ?></div></div>
    <div class='col-12'><div class='form-group'><?php echo e(Form::label('title', __('title'), array('class' => 'form-label'))); ?><?php echo e(Form::text('title', null, array('class' => 'form-control', 'placeholder' => __('Enter title'), 'required' => 'required'))); ?></div></div>
    <div class='col-12'><div class='form-group'><?php echo e(Form::label('status', __('status'), array('class' => 'form-label'))); ?><?php echo e(Form::text('status', null, array('class' => 'form-control', 'placeholder' => __('Enter status'), 'required' => 'required'))); ?></div></div>
    <div class='col-12'><div class='form-group'><?php echo e(Form::label('desc', __('desc'), array('class' => 'form-label'))); ?><?php echo e(Form::textarea('desc', null, array('class' => 'form-control  summernote-simple nicEdit', 'placeholder' => __('Enter desc'), 'required' => 'required'))); ?></div></div>
    <div class='col-12'> <div class='form-group'><label for='images' class='col-form-label'>images</label><input type='file' multiple name='images[]' id='blog_cover_image' class='form-control' onchange='document.getElementById("imagesImg").src = window.URL.createObjectURL(this.files[0])'><img id='imagesImg' src='' width='20%' class='mt-2'/></div></div>


<div class="form-group col-md-12">
                                <div class="custom-fields" data-value="">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <div class="">
                                            <h5 class=""><?php echo e(__('Attributes')); ?></h5>
                                            <label class="form-check-label pe-5 text-muted"
                                                for="enable_chat"><?php echo e(__('You can easily change order of fields using drag & drop.')); ?></label>
                                        </div>
                                        <button data-repeater-create type="button"
                                            class="btn btn-sm btn-primary btn-icon m-1 float-end ms-2" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="<?php echo e(__('Create Custom Field')); ?>">
                                            <i class="ti ti-plus mr-1"></i>
                                        </button>
                                    </div>
                                    <div class="card-body table-border-style">
                                            <?php echo csrf_field(); ?>
                                            <div class="table-responsive m-0 custom-field-table">

                                                <table class="table dataTable-table" id="pc-dt-simple"
                                                    data-repeater-list="fields">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th></th>
                                                            <th><?php echo e(__('Key')); ?></th>
                                                            <th><?php echo e(__('Value')); ?></th>

                                                            <th class="text-right"><?php echo e(__('Action')); ?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr data-repeater-item>
                                                            <td><i class="ti ti-arrows-maximize sort-handler"></i></td>
                                                            <td>
                                                                <input type="text" name="key" class="form-control mb-0"
                                                                    required />
                                                            </td>
                                                            <td>
                                                                <input type="text" name="value"
                                                                    class="form-control mb-0" required />
                                                            </td>


                                                            <td class="text-center">
                                                                <a data-repeater-delete class="delete-icon"><i
                                                                        class="fas fa-trash text-danger"></i></a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>

                                    </div>


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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bcg\resources\views/project/create.blade.php ENDPATH**/ ?>