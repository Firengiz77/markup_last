@php($store_logo=\App\Models\Utility::get_file('uploads/sociallink_cover_image/'))
@extends('layouts.admin')
@section('page-title')
    {{ __('SocialLink') }}
@endsection
@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 ">{{ __('SocialLink') }}</h5>
    </div>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('SocialLink') }}</li>
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
                {{Form::open(array('url'=>'admin/sociallink','method'=>'post','enctype'=>'multipart/form-data'))}}
                <div class="d-flex justify-content-end">

                </div>
                <div class="card-body table-border-style">

                    <div class="row">

                    <div class='col-6'><div class='form-group'>{{ Form::label('name', __('Name'), array('class' => 'form-label')) }}{{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => __('Enter name'), 'required' => 'required')) }}</div></div>
                            <div class='col-6'><div class='form-group'>{{ Form::label('icon', __('Icon'), array('class' => 'form-label')) }}{{ Form::text('icon', null, array('class' => 'form-control', 'placeholder' => __('Enter icon'), 'required' => 'required')) }}</div></div>
                            <div class='col-12'><div class='form-group'>{{ Form::label('link', __('link'), array('class' => 'form-label')) }}{{ Form::text('link', null, array('class' => 'form-control', 'placeholder' => __('Enter link'), 'required' => 'required')) }}</div></div>
                           
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
