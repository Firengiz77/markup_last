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
    <ul class="nav nav-pills cust-nav   rounded  mb-3" id="pills-tab" role="tablist">
        @foreach (\App\Models\Utility::languages() as $code => $lang)
            @if ($loop->first)
                <li class="nav-item">
                    <a class="nav-link active" id="{{$code}}_setting_tab" data-bs-toggle="pill" href="#pills-{{$code}}"
                       role="tab" aria-controls="pills-{{$code}}" aria-selected="true">{{ __(ucFirst($lang)) }}</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" id="{{$code}}_setting_tab" data-bs-toggle="pill" href="#pills-{{$code}}"
                       role="tab" aria-controls="pills-{{$code}}" aria-selected="false">{{ __(ucFirst($lang)) }}</a>
                </li>
            @endif

        @endforeach
    </ul>

@endsection
@section('filter')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="tab-content" id="pills-tabContent">

                @foreach (\App\Models\Utility::languages() as $code => $lang)
                    <div class="tab-pane fade {{$loop->first?"active show":""}}" id="pills-{{$code}}" role="tabpanel"
                         aria-labelledby="pills-{{$code}}-tab">
                        {{Form::model($blog, array('route' => array('blog.update', $blog->id), 'method' => 'PUT','enctype'=>'multipart/form-data')) }}
                        <input type="hidden" name="lang" value="{{$code}}">

                        <div class="">
                          
                            <div class="card-body table-border-style">

                                <div class="row" style="gap:20px">
<div class="col-lg-7 card">
<div class="card-header">
      <h5 class="">
                   {{ __('Section') }} 1 - {{ __(ucFirst($lang)) }}
            </h5>
  </div>
  
<div class='col-12'>
<div class='form-group'>
{{ Form::label('title', __('title'), array('class' => 'form-label')) }}
{{ Form::text('title', $blog->getTranslation('title', $code), array('class' => 'form-control', 'placeholder' => __('Enter title'), 'required' => 'required')) }}
</div>
</div>


<div class='col-12'>
<div class='form-group'>
{{ Form::label('desc', __('desc'), array('class' => 'form-label')) }}
{{ Form::textarea('desc', $blog->getTranslation('desc', $code), array('class' => 'form-control  summernote-simple nicEdit', 'placeholder' => __('Enter desc'), 'required' => 'required')) }}
</div>
</div>


<div class="card-header">
      <h5 class="">
               {{ __('Meta tags') }}
            </h5>
  </div>
<div class="row">
    
<div class='col-4'>
<div class='form-group'>
{{ Form::label('meta_title', __('meta_title'), array('class' => 'form-label')) }}
{{ Form::textarea('meta_title', $blog->getTranslation('meta_title', $code), array('class' => 'form-control', 'rows'=> 3,'placeholder' => __('Enter meta_title'), 'required' => 'required')) }}
</div>
</div>

<div class='col-4'>
<div class='form-group'>
{{ Form::label('meta_description', __('meta_description'), array('class' => 'form-label')) }}
{{ Form::textarea('meta_description', $blog->getTranslation('meta_description', $code), array('class' => 'form-control','rows'=> 3, 'placeholder' => __('Enter meta_description'), 'required' => 'required')) }}
</div>
</div>

<div class='col-4'>
<div class='form-group'>
{{ Form::label('meta_keywords', __('meta_keywords'), array('class' => 'form-label')) }}
{{ Form::textarea('meta_keywords', $blog->getTranslation('meta_keywords', $code), array('class' => 'form-control','rows'=> 3, 'placeholder' => __('Enter meta_keywords'), 'required' => 'required')) }}
</div>
</div>



</div>




</div>

<div class="col-lg-4 card" style="height:100%">
<div class="card-header">
      <h5 class="">
               {{ __('Image') }}
            </h5>
  </div>

<div class='col-12'>
<div class='form-group'>
<label for='image' class='col-form-label'>Şəkil</label>
<input type='file' name='image' id='blog_cover_image' class='form-control' onchange='document.getElementById("imageImg").src = window.URL.createObjectURL(this.files[0])'>
<img src='/public/{{$blog->image}}' width='200' class='mt-2'/>
<img id='imageImg' src='' width='20%' class='mt-2'/>
</div>
</div>


<div class="card-header">
      <h5 class="">
               {{ __('Tags') }}
            </h5>
  </div>

<div class="col-md-12 mb-5">
                                    <div class="mb-5">
                                        <select name="tags[]" id="choices-multiple-remove-button" required multiple>
                                            @foreach ($tags as $tag)
                                                <option
                                                    {{ $tag->id ==in_array($tag->id,$blog->tags()->pluck('id')->toArray())? 'selected': '' }}
                                                    value="{{ $tag->id }}">{{ $tag->title }}
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




              



                                </div>
                                <div class="form-group col-12 d-flex justify-content-end col-form-label">
                                    <input onclick="history.back()" type="button" value="{{ __('Cancel') }}" class="btn btn-secondary btn-light"
                                           data-bs-dismiss="modal">
                                    <input type="submit" value="{{ __('Update') }}" class="btn btn-primary ms-2">
                                </div>
                            </div>
                        </div>
                        {{Form::close()}}
                    </div>
                @endforeach
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
