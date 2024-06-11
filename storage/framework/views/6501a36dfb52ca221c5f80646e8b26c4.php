<?php ($store_logo=\App\Models\Utility::get_file('uploads/blog_cover_image/')); ?>

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Blog')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 "><?php echo e(__('Blog')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Blog')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('custom/libs/summernote/summernote-bs4.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-page'); ?>
<link rel="stylesheet" href="<?php echo e(asset('/admin/css/choise.css')); ?>">
<script src="<?php echo e(asset('/admin/js/choise.js')); ?> "></script>

<script>
$(document).ready(function() {
    var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
        removeItemButton: true,
    });
});
</script>


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
                        <?php echo e(Form::model($blog, array('route' => array('blog.update', $blog->id), 'method' => 'PUT','enctype'=>'multipart/form-data'))); ?>

                        <input type="hidden" name="lang" value="<?php echo e($code); ?>">

                        <div class="">
                          
                            <div class="card-body table-border-style">

                                <div class="row" style="gap:20px">
<div class="col-lg-7 card">
<div class="card-header">
      <h5 class="">
                   <?php echo e(__('Section')); ?> 1 - <?php echo e(__(ucFirst($lang))); ?>

            </h5>
  </div>
  
<div class='col-12'>
<div class='form-group'>
<?php echo e(Form::label('title', __('title'), array('class' => 'form-label'))); ?>

<?php echo e(Form::text('title', $blog->getTranslation('title', $code), array('class' => 'form-control', 'placeholder' => __('Enter title'), 'required' => 'required'))); ?>

</div>
</div>


<div class='col-12'>
<div class='form-group'>
<?php echo e(Form::label('desc', __('desc'), array('class' => 'form-label'))); ?>

<?php echo e(Form::textarea('desc', $blog->getTranslation('desc', $code), array('class' => 'form-control  summernote-simple nicEdit', 'placeholder' => __('Enter desc'), 'required' => 'required'))); ?>

</div>
</div>


<div class="card-header">
      <h5 class="">
               <?php echo e(__('Meta tags')); ?>

            </h5>
  </div>
<div class="row">
    
<div class='col-4'>
<div class='form-group'>
<?php echo e(Form::label('meta_title', __('meta_title'), array('class' => 'form-label'))); ?>

<?php echo e(Form::textarea('meta_title', $blog->getTranslation('meta_title', $code), array('class' => 'form-control', 'rows'=> 3,'placeholder' => __('Enter meta_title'), 'required' => 'required'))); ?>

</div>
</div>

<div class='col-4'>
<div class='form-group'>
<?php echo e(Form::label('meta_description', __('meta_description'), array('class' => 'form-label'))); ?>

<?php echo e(Form::textarea('meta_description', $blog->getTranslation('meta_description', $code), array('class' => 'form-control','rows'=> 3, 'placeholder' => __('Enter meta_description'), 'required' => 'required'))); ?>

</div>
</div>

<div class='col-4'>
<div class='form-group'>
<?php echo e(Form::label('meta_keywords', __('meta_keywords'), array('class' => 'form-label'))); ?>

<?php echo e(Form::textarea('meta_keywords', $blog->getTranslation('meta_keywords', $code), array('class' => 'form-control','rows'=> 3, 'placeholder' => __('Enter meta_keywords'), 'required' => 'required'))); ?>

</div>
</div>



</div>




</div>

<div class="col-lg-4 card" style="height:100%">
<div class="card-header">
      <h5 class="">
               <?php echo e(__('Image')); ?>

            </h5>
  </div>

<div class='col-12'>
<div class='form-group'>
<label for='image' class='col-form-label'>Şəkil</label>
<input type='file' name='image' id='blog_cover_image' class='form-control' onchange='document.getElementById("imageImg").src = window.URL.createObjectURL(this.files[0])'>
<img src='/public/<?php echo e($blog->image); ?>' width='200' class='mt-2'/>
<img id='imageImg' src='' width='20%' class='mt-2'/>
</div>
</div>


<div class="card-header">
      <h5 class="">
               <?php echo e(__('Tags')); ?>

            </h5>
  </div>

<div class="col-md-12 mb-5">
                                    <div class="mb-5">
                                        <select name="tags[]" id="choices-multiple-remove-button" required multiple>
                                            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option
                                                    <?php echo e($tag->id ==in_array($tag->id,$blog->tags()->pluck('id')->toArray())? 'selected': ''); ?>

                                                    value="<?php echo e($tag->id); ?>"><?php echo e($tag->title); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php $__errorArgs = ['tags'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\markup\resources\views/blog/edit.blade.php ENDPATH**/ ?>