@php($store_logo = \App\Models\Utility::get_file('uploads/project_cover_image/'))
@extends('layouts.admin')
@section('page-title')
    {{ __('Project') }}
@endsection
@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 ">{{ __('Project') }}</h5>
    </div>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('Project') }}</li>
@endsection
@push('css-page')
    <link rel="stylesheet" href="{{ asset('custom/libs/summernote/summernote-bs4.css') }}">
@endpush
@push('script-page')
    <script src="{{ asset('custom/libs/summernote/summernote-bs4.js') }}"></script>
@endpush
@section('action-btn')
    <ul class="nav nav-pills cust-nav   rounded  mb-3" id="pills-tab" role="tablist">
        @foreach (\App\Models\Utility::languages() as $code => $lang)
            @if ($loop->first)
                <li class="nav-item">
                    <a class="nav-link active" id="{{ $code }}_setting_tab" data-bs-toggle="pill"
                        href="#pills-{{ $code }}" role="tab" aria-controls="pills-{{ $code }}"
                        aria-selected="true">{{ __(ucFirst($lang)) }}</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" id="{{ $code }}_setting_tab" data-bs-toggle="pill"
                        href="#pills-{{ $code }}" role="tab" aria-controls="pills-{{ $code }}"
                        aria-selected="false">{{ __(ucFirst($lang)) }}</a>
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
                    <div class="tab-pane fade {{ $loop->first ? 'active show' : '' }}" id="pills-{{ $code }}"
                        role="tabpanel" aria-labelledby="pills-{{ $code }}-tab">
                        {{ Form::model($project, ['route' => ['project.update', $project->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) }}
                        <input type="hidden" name="lang" value="{{ $code }}">

                        <div class="">

                            <div class="card-body table-border-style">
                                <div class="row" style="gap:20px">

                                    <div class="col-lg-7 card">
                                        <div class="card-header">
                                            <h5 class="">
                                                {{ __('Section') }}
                                            </h5>
                                        </div>


                                        <div class="row">
                                            <div class='col-6'>
                                                <div class='form-group'>
                                                    {{ Form::label('category_id', __('Category'), ['class' => 'form-label']) }}
                                                    {{ Form::select('category_id', $categories, $project->category_id, ['class' => 'form-control', 'placeholder' => __('Enter category'), 'required' => 'required']) }}
                                                </div>
                                            </div>


                                            <div class='col-6'>
                                                <div class='form-group'>
                                                    {{ Form::label('title', __('title'), ['class' => 'form-label']) }}
                                                    {{ Form::text('title', $project->getTranslation('title', $code), ['class' => 'form-control', 'placeholder' => __('Enter title'), 'required' => 'required']) }}
                                                </div>
                                            </div>
                                        </div>


                                        <div class='col-12'>
                                            <div class='form-group'>
                                                {{ Form::label('desc', __('desc'), ['class' => 'form-label']) }}
                                                {{ Form::textarea('desc', $project->getTranslation('desc', $code), ['class' => 'form-control  summernote-simple nicEdit', 'placeholder' => __('Enter desc'), 'required' => 'required']) }}
                                            </div>
                                        </div>



                                        <div class="form-group col-md-12">
                                            <div class="custom-fields">
                                                <div class="card-header d-flex align-items-center justify-content-between">
                                                    <div class="">
                                                        <h5 class="">{{ __('Attributes') }}</h5>

                                                    </div>
                                                    <button data-repeater-create type="button"
                                                        class="btn btn-sm btn-primary btn-icon m-1 float-end ms-2"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="{{ __('Create Custom Field') }}">
                                                        <i class="ti ti-plus mr-1"></i>
                                                    </button>
                                                </div>
                                                <div class="card-body table-border-style">
                                                    @csrf
                                                    <div class="table-responsive custom-field-table">

                                                        <table class="table dataTable-table" id="pc-dt-simple"
                                                            data-repeater-list="fields">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th>{{ __('Key') }}</th>
                                                                    <th>{{ __('Value') }}</th>

                                                                    <th class="text-right">{{ __('Action') }}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                @foreach ($project->attribute as $key => $attribute)
                                                                    <tr>
                                                                        <td>
                                                                            <input type="hidden" class="id"
                                                                                name="attribute[{{ $key }}][id]"
                                                                                value="{{ $attribute->id }}" />

                                                                            <input type="text"
                                                                                name="attribute[{{ $key }}][key]"
                                                                                value="{{ $attribute->getTranslation('key', $code) }}"
                                                                                class="form-control mb-0" required />
                                                                        </td>
                                                                        <td>
                                                                            <input type="text"
                                                                                name="attribute[{{ $key }}][value]"
                                                                                class="form-control mb-0"
                                                                                value="{{ $attribute->getTranslation('value', $code) }}"
                                                                                required />
                                                                        </td>


                                                                        <td class="text-center">

                                                                            <a href="{{ route('projectattribute.destroy', $attribute->id) }}"
                                                                                class="delete-icon"><i
                                                                                    class="fas fa-trash text-danger"></i></a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach

                                                                <tr data-repeater-item>
                                                                    <td>

                                                                        <input type="text" name="key"
                                                                            class="form-control mb-0" required />
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



                                    <div class="col-lg-4">
                                        <div class="card row">
                                        <div class="card-header">
                                            <h5 class="">
                                                {{ __('Image') }}
                                            </h5>
                                        </div>

                                        <div class='col-12'>
                                            <div class='form-group'>
                                                <label for='image' class='col-form-label'>Şəkil</label>
                                                <input type='file' name='image' id='blog_cover_image'
                                                    class='form-control'
                                                    onchange='document.getElementById("imageImg").src = window.URL.createObjectURL(this.files[0])'>
                                                <img src='/public/{{ $project->image }}' width='200'
                                                    class='mt-2' />
                                                <img id='imageImg' src='' width='20%' class='mt-2' />
                                            </div>
                                        </div>

                                        </div>

                                        <div class="card row">
                                        <div class="card-header">
                                            <h5 class="">
                                                {{ __('Meta tags') }}
                                            </h5>
                                        </div>

                                        <div class='col-12'>
                                            <div class='form-group'>
                                                {{ Form::label('meta_title', __('meta_title'), ['class' => 'form-label']) }}
                                                {{ Form::textarea('meta_title', $project->getTranslation('meta_title', $code), ['class' => 'form-control', 'rows' => 3, 'placeholder' => __('Enter meta_title'), 'required' => 'required']) }}
                                            </div>
                                        </div>

                                        <div class='col-12'>
                                            <div class='form-group'>
                                                {{ Form::label('meta_description', __('meta_description'), ['class' => 'form-label']) }}
                                                {{ Form::textarea('meta_description', $project->getTranslation('meta_description', $code), ['class' => 'form-control', 'rows' => 3, 'placeholder' => __('Enter meta_description'), 'required' => 'required']) }}
                                            </div>
                                        </div>

                                        <div class='col-12'>
                                            <div class='form-group'>
                                                {{ Form::label('meta_keywords', __('meta_keywords'), ['class' => 'form-label']) }}
                                                {{ Form::textarea('meta_keywords', $project->getTranslation('meta_keywords', $code), ['class' => 'form-control', 'rows' => 3, 'placeholder' => __('Enter meta_keywords'), 'required' => 'required']) }}
                                            </div>
                                        </div>
                                        </div>


                                    </div>
                                    <div class="form-group col-12 d-flex justify-content-end col-form-label">
                                        <input onclick="history.back()" type="button" value="{{ __('Cancel') }}"
                                            class="btn btn-secondary btn-light" data-bs-dismiss="modal">
                                        <input type="submit" value="{{ __('Update') }}" class="btn btn-primary ms-2">
                                    </div>
                                </div>
                            </div>


                            </div>
                            {{ Form::close() }}
                        </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@push('script-page')
    <script src="{{ asset('/public/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('/public/js/repeater.js') }}"></script>

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

                },
                hide: function(deleteElement) {
                    if (confirm('{{ __('Are you sure ? ') }}')) {
                        $(this).slideUp(deleteElement);
                        var inputElement = document.getElementsByClassName("id");

                        console.log(inputElement.value);
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
@endpush
