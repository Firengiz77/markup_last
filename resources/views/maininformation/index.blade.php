
@extends('layouts.admin')
@section('page-title')
    {{ __('MainInformation') }}
@endsection
@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 ">{{ __('MainInformation') }}</h5>
    </div>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('MainInformation') }}</li>
@endsection
@push('css-page')
    <link rel="stylesheet" href="{{ asset('custom/libs/summernote/summernote-bs4.css') }}">
@endpush
@push('script-page')
    <script src="{{ asset('custom/libs/summernote/summernote-bs4.js') }}"></script>
@endpush

@section('filter')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table mb-0 dataTable">
                            <thead>
                                <tr>

                                <th>{{ __('Title') }}</th>
                                    <th>{{ __('Created At') }}</th>
                                    <th class="text-right">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($maininformations as $maininformation)
                                    <tr data-name="{{ @$maininformation->title }}">

                                    <td>{{ $maininformation->title }}</td>



                                        <td>
                                            {{ \App\Models\Utility::dateFormat($maininformation->created_at) }}
                                        </td>


                                        <td class="Action">
                                            <div class="d-flex">
                                                <a href="{{ route('maininformation.edit', $maininformation->id) }}" class="btn btn-sm btn-icon  bg-light-secondary me-2"  data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('Edit') }}">
                                                    <i  class="ti ti-edit f-20"></i>
                                                </a>
                                               
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script-page')
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
