@php($store_logo=\App\Models\Utility::get_file('uploads/contact_cover_image/'))
@extends('layouts.admin')
@section('page-title')
    {{ __('Contact') }}
@endsection
@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 ">{{ __('Contact') }}</h5>
    </div>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('Contact') }}</li>
@endsection
@push('css-page')
    <link rel="stylesheet" href="{{ asset('custom/libs/summernote/summernote-bs4.css') }}">
@endpush
@push('script-page')
    <script src="{{ asset('custom/libs/summernote/summernote-bs4.js') }}"></script>
@endpush
@section('action-btn')


@endsection
@section('filter')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {{Form::open(array('url'=>'admin/contact','method'=>'post','enctype'=>'multipart/form-data'))}}
                <div class="d-flex justify-content-end">

                </div>
                <div class="card-body table-border-style">

                    <div class="row">


                        <div class='col-12'><div class='form-group'>{{ Form::label('office', __('office'), array('class' => 'form-label')) }}{{ Form::text('office', null, array('class' => 'form-control', 'placeholder' => __('Enter office'), 'required' => 'required')) }}</div></div>
<div class='col-12'> <div class='form-group'><label for='image' class='col-form-label'>Şəkil</label><input type='file' name='image' id='blog_cover_image' class='form-control' onchange='document.getElementById("imageImg").src = window.URL.createObjectURL(this.files[0])'><img id='imageImg' src='' width='20%' class='mt-2'/></div></div>
<div class='col-12'><div class='form-group'>{{ Form::label('address', __('address'), array('class' => 'form-label')) }}{{ Form::text('address', null, array('class' => 'form-control', 'placeholder' => __('Enter address'), 'required' => 'required')) }}</div></div>
<div class='col-12'><div class='form-group'>{{ Form::label('phone', __('phone'), array('class' => 'form-label')) }}{{ Form::text('phone', null, array('class' => 'form-control', 'placeholder' => __('Enter phone'), 'required' => 'required')) }}</div></div>
<div class='col-12'><div class='form-group'>{{ Form::label('email', __('email'), array('class' => 'form-label')) }}{{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => __('Enter email'), 'required' => 'required')) }}</div></div>




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
