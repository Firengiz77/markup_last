<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Equipment')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 "><?php echo e(__('Equipment')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Equipment')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('custom/libs/summernote/summernote-bs4.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-page'); ?>
    <script src="<?php echo e(asset('custom/libs/summernote/summernote-bs4.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('action-btn'); ?>
    <a href="<?php echo e(route('equipment.create')); ?>" class="btn btn-sm btn-icon  btn-primary me-2 text-white"  data-title="<?php echo e(__('Create New Equipment')); ?>"  data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Create')); ?>">
        <i  data-feather="plus"></i>
    </a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('filter'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table mb-0 dataTable">
                            <thead>
                                <tr>

                                <th><?php echo e(__('Name')); ?></th>
                                <th><?php echo e(__('Title')); ?></th>
                                    <th><?php echo e(__('Created At')); ?></th>
                                    <th class="text-right"><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $equipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $equipment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr data-name="<?php echo e(@$equipment->title); ?>">


                                    <td><?php echo e($equipment->name); ?></td>
                                    <td><?php echo e($equipment->title); ?></td>

                                        <td>
                                            <?php echo e(\App\Models\Utility::dateFormat($equipment->created_at)); ?>

                                        </td>


                                        <td class="Action">
                                            <div class="d-flex">
                                            <a href="<?php echo e(route('equipmentimage.index', $equipment->id)); ?>" class="btn btn-sm btn-icon  bg-light-secondary me-2"  data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Image')); ?>">
                                                    <i  class="ti ti-photo-edit f-20"></i>
                                                </a>

                                                <a href="<?php echo e(route('equipment.edit', $equipment->id)); ?>" class="btn btn-sm btn-icon  bg-light-secondary me-2"  data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Edit')); ?>">
                                                    <i  class="ti ti-edit f-20"></i>
                                                </a>
                                                    <a class="bs-pass-para btn btn-sm btn-icon bg-light-secondary" href="#"
                                                        data-title="<?php echo e(__('Delete Lead')); ?>"
                                                        data-confirm="<?php echo e(__('Are You Sure?')); ?>"
                                                        data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>"
                                                        data-confirm-yes="delete-form-<?php echo e($equipment->id); ?>"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="<?php echo e(__('Delete')); ?>">
                                                        <i class="ti ti-trash f-20"></i>
                                                    </a>
                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['equipment.destroy', $equipment->id], 'id' => 'delete-form-' . $equipment->id]); ?>

                                                    <?php echo Form::close(); ?>

                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).ready(function() {
            $(document).on('keyup', '.search-user', function() {
                var value = $(this).val();
                $('.employee_tableese tbody>tr').each(function(index) {
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bcg\resources\views/equipment/index.blade.php ENDPATH**/ ?>