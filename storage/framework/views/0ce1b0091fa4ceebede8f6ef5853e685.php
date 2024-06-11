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
                        <?php echo e(Form::model($service, array('route' => array('service.update', $service->id), 'method' => 'PUT','enctype'=>'multipart/form-data'))); ?>

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
<?php echo e(Form::label('name', __('name'), array('class' => 'form-label'))); ?>

<?php echo e(Form::text('name', $service->getTranslation('name', $code), array('class' => 'form-control', 'placeholder' => __('Enter name'), 'required' => 'required'))); ?>

</div>
</div>


<div class='col-12'>
<div class='form-group'>
<?php echo e(Form::label('desc', __('desc'), array('class' => 'form-label'))); ?>

<?php echo e(Form::textarea('desc', $service->getTranslation('desc', $code), array('class' => 'form-control  summernote-simple nicEdit', 'placeholder' => __('Enter desc'), 'required' => 'required'))); ?>

</div>
</div>



<div class='col-12'>
<div class='form-group'>
<label for='image' class='col-form-label'>Şəkil</label>
<input type='file' name='image' id='blog_cover_image' class='form-control' onchange='document.getElementById("imageImg").src = window.URL.createObjectURL(this.files[0])'>
<img src='/public/<?php echo e($service->image); ?>' width='200' class='mt-2'/>
<img id='imageImg' src='' width='20%' class='mt-2'/>
</div>
</div>

<div class="card form-group col-md-12">
                                <div class="custom-fields" >
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <div class="">
                                            <h5 class=""><?php echo e(__('Attributes')); ?></h5>

                                        </div>
                                        <button data-repeater-create type="button"
                                            class="btn btn-sm btn-primary btn-icon m-1 float-end ms-2" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="<?php echo e(__('Create Custom Field')); ?>">
                                            <i class="ti ti-plus mr-1"></i>
                                        </button>
                                    </div>
                                    <div class="card-body table-border-style">
                                            <?php echo csrf_field(); ?>
                                            <div class="table-responsive custom-field-table">

                                                <table class="table dataTable-table" id="pc-dt-simple"
                                                    data-repeater-list="fields">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th><?php echo e(__('Image')); ?></th>
                                                            <th><?php echo e(__('Key')); ?></th>
                                                            <th><?php echo e(__('Value')); ?></th>

                                                            <th class="text-right"><?php echo e(__('Action')); ?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                       
                                                        <?php $__currentLoopData = $service->attribute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                     
                                                        <tr >
                                                            <td>
                                                           <div style="display:flex">
                                                             <input type="file"  name="attribute[<?php echo e($key); ?>][image]"  class="form-control mb-0">
                                                                <img src="/public/<?php echo e($attribute->image); ?>" alt="" width="80px">
                                                           </div>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" class="id" name="attribute[<?php echo e($key); ?>][id]"  value="<?php echo e($attribute->id); ?>" />

                                                                <input type="text" name="attribute[<?php echo e($key); ?>][key]" value="<?php echo e($attribute->getTranslation('key', $code)); ?>" class="form-control mb-0"
                                                                    required />
                                                            </td>
                                                            <td>
                                                                <input type="text" name="attribute[<?php echo e($key); ?>][value]"
                                                                    class="form-control mb-0"  value="<?php echo e($attribute->getTranslation('value', $code)); ?>" required />
                                                            </td>


                                                            <td class="text-center">
                                                              
                                                                <a href="<?php echo e(route('projectattribute.destroy',$attribute->id)); ?>" class="delete-icon"><i
                                                                        class="fas fa-trash text-danger"></i></a>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        <tr data-repeater-item>
                                                        <td>
                                                                <input type="file" required name="image" id="" class="form-control mb-0">
                                                            </td>

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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bcg\resources\views/service/edit.blade.php ENDPATH**/ ?>