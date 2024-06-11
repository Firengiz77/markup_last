<?php ($store_logo=\App\Models\Utility::get_file('uploads/page/')); ?>

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Home Page')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 "><?php echo e(__('Home Page')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Home Page')); ?></li>
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

            <?php echo e(Form::open(array('url'=>'/admin/crud','method'=>'post','enctype'=>'multipart/form-data'))); ?>


            <div class="card">

                <div class="card-header">
                    <h5 class="">
                    </h5>
                </div>
                <div class="card-body table-border-style">

                    <div class="row">

                        <div class="form-group col-md-12">
                            <?php echo e(Form::label('name',__('Model Name'),array('class'=>'form-label'))); ?>

                            <?php echo e(Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Model Name'),'required'=>'required'))); ?>

                        </div>
                        <div class="form-group col-6 col-md-3">
                            <div class="custom-control form-switch p-0">
                                <label class="form-check-label"
                                       for="seo"><?php echo e(__('SEO')); ?></label><br>
                                <input type="checkbox" name="seo"
                                       class="form-check-input" id="seo"
                                       data-toggle="switchbutton"
                                       data-onstyle="primary">
                            </div>
                        </div>

                    </div>


                </div>

            </div>


            <div class="card">

                <div
                    class="card-header flex-column flex-lg-row  d-flex align-items-lg-center gap-2 justify-content-between">
                    <h5><?php echo e(__('İnputlar')); ?></h5>
                    <div class="d-flex align-items-center">
                        <div class="custom-control custom-switch">
                            <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary"
                                    data-title="<?php echo e(__('Add Settings')); ?>" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="<?php echo e(__('Add Settings')); ?>"><i data-feather="plus"></i>
                            </button>


                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">


                        <div class="form-group col-md-12">
                            <table class="table table-bordered" id="dynamicAddRemove">
                                <tr>
                                    <th>Sütun adı</th>
                                    <th>Sütun Tipi</th>
                                    <th>HTML Tipi</th>
                                    <th>Seçənəklər</th>
                                    <th>Sil</th>
                                </tr>
                                <tr>
                                    <td><input type="text" name="inputFields[0][row_name]" placeholder="Enter Row Name"
                                               class="form-control"/>
                                    </td>

                                    <td>
                                        <select name="inputFields[0][row_type]" class="form-control">
                                            <option value="string">string</option>
                                            <option value="text">text</option>
                                            <option value="integer">integer</option>
                                            <option value="float">float</option>
                                            <option value="date">date</option>
                                            <option value="timestamps">timestamps</option>
                                            <option value="tinyInteger">tinyInteger</option>
                                            <option value="bigInteger">bigInteger</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="inputFields[0][input_type]" class="form-control">
                                            <option value="text">text</option>
                                            <option value="number">Number</option>
                                            <option value="file">file</option>
                                        </select>
                                    </td>

                                    <td>
                                        <label class="form-check-label"
                                               for="translatable">Tercume</label>
                                        <input type="checkbox" name="inputFields[0][translatable]"
                                               class="form-check-input" id="translatable"

                                               data-onstyle="primary">



                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-danger remove-input-field">Sil
                                        </button>
                                    </td>
                                </tr>
                            </table>

                        </div>


                    </div>
                </div>
            </div>

            <div class="card">

                <div class="card-footer text-end">
                    <input class="btn btn-print-invoice  btn-primary m-r-10" type="submit"
                           value="<?php echo e(__('Save Changes')); ?>">
                </div>
            </div>
            <?php echo e(Form::close()); ?>


        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript">
        var i = 0;
        $("#dynamic-ar").click(function () {
            ++i;
            $("#dynamicAddRemove").append('<tr> <td><input type="text" name="inputFields[' + i + '][row_name]" placeholder="Enter Row Name" class="form-control"/> </td> <td> <select name="inputFields[' + i + '][row_type]" class="form-control"> <option value="string">string</option> <option value="text">text</option> <option value="integer">integer</option> <option value="float">float</option> <option value="date">date</option> <option value="timestamps">timestamps</option> <option value="tinyInteger">tinyInteger</option> <option value="bigInteger">bigInteger</option> </select> </td> <td> <select name="inputFields[' + i + '][input_type]" class="form-control"> <option value="text">text</option> <option value="number">Number</option> <option value="file">file</option> </select> </td> <td> <label class="form-check-label" for="translatable' + i + '">Tercume</label> <input type="checkbox" name="inputFields[' + i + '][translatable]" class="form-check-input" id="translatable' + i + '" data-toggle="switchbutton" data-onstyle="primary">  <td> <button type="button" class="btn btn-outline-danger remove-input-field">Sil </button> </td> </tr>');
        });
        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bcg\resources\views/crud/index.blade.php ENDPATH**/ ?>