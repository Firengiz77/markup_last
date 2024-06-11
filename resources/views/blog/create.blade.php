@php($store_logo=\App\Models\Utility::get_file('uploads/blog_cover_image/'))
@extends('layouts.admin')
@section('page-title')
    {{ __('Blog') }}
@endsection
@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 ">{{ __('Blog') }}</h5>
    </div>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('Blog') }}</li>
@endsection
@push('css-page')
    <link rel="stylesheet" href="{{ asset('custom/libs/summernote/summernote-bs4.css') }}">
@endpush
@push('script-page')
<link rel="stylesheet" href="{{ asset('/admin/css/choise.css')}}">
<script src="{{ asset('/admin/js/choise.js')}} "></script>

<script>
$(document).ready(function() {
    var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
        removeItemButton: true,
    });
});
</script>



    <script src="{{ asset('custom/libs/summernote/summernote-bs4.js') }}"></script>
@endpush
@section('action-btn')


@endsection
@section('filter')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="">
                {{Form::open(array('url'=>'admin/blog','method'=>'post','enctype'=>'multipart/form-data'))}}
              
                <div class="card-body table-border-style">
                    <div class="row" style="gap:20px">

<div class="col-lg-7 card">
<div class="card-header">
      <h5 class="">
               {{ __('Detail') }}
            </h5>
  </div>

<div class='col-12'><div class='form-group'>{{ Form::label('title', __('title'), array('class' => 'form-label')) }}{{ Form::text('title', null, array('class' => 'form-control', 'placeholder' => __('Enter title'), 'required' => 'required')) }}</div></div>
<div class='col-12'><div class='form-group'>{{ Form::label('desc', __('desc'), array('class' => 'form-label')) }}{{ Form::textarea('desc', null, array('class' => 'form-control  summernote-simple nicEdit', 'placeholder' => __('Enter desc'), 'required' => 'required')) }}</div></div>


<div class="row">
<div class='col-4'><div class='form-group'>{{ Form::label('meta_title', __('meta_title'), array('class' => 'form-label')) }}{{ Form::textarea('meta_title', null, array('class' => 'form-control', 'rows' => 3,'placeholder' => __('Enter meta_title'), 'required' => 'required')) }}</div></div>
<div class='col-4'><div class='form-group'>{{ Form::label('meta_description', __('meta_description'), array('class' => 'form-label')) }}{{ Form::textarea('meta_description', null, array('class' => 'form-control','rows' => 3, 'placeholder' => __('Enter meta_description'), 'required' => 'required')) }}</div></div>
<div class='col-4'><div class='form-group'>{{ Form::label('meta_keywords', __('meta_keywords'), array('class' => 'form-label')) }}{{ Form::textarea('meta_keywords', null, array('class' => 'form-control','rows' => 3, 'placeholder' => __('Enter meta_keywords'), 'required' => 'required')) }}</div></div>
</div>

</div>


<div class="col-lg-4 card" style="height:100%">
<div class="card-header">
      <h5 class="">
               {{ __('Image') }}
            </h5>
  </div>


<div class='col-12'> <div class='form-group'><input type='file' name='image' id='blog_cover_image' class='form-control' onchange='document.getElementById("imageImg").src = window.URL.createObjectURL(this.files[0])'><img id='imageImg' src='' width='20%' class='mt-2'/></div></div>
<div class="col-md-12 mb-5">
<div class="card-header">
      <h5 class="">
               {{ __('Tags') }}
            </h5>
  </div>


                                <div class="mb-5">
                                    <select name="tags[]" id="choices-multiple-remove-button"  multiple>
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('tags')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                      </div>
             </div>
</div>


      
                  



                        <div class="form-group col-12 d-flex justify-content-end col-form-label">
                            <input type="button" value="{{__('Cancel')}}" class="btn btn-secondary btn-light"
                                   data-bs-dismiss="modal">
                            <input type="submit" value="{{__('Save')}}" class="btn btn-primary ms-2">
                        </div>

                    </div>
                </div>
                {{Form::close()}}
            </div>
        </div>



    </div>
@endsection
@push('script-page')
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
@endpush
