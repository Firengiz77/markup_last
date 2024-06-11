@php

$logo=\App\Models\Utility::get_file('uploads/logo/');
$profile=\App\Models\Utility::get_file('uploads/profile/');
$logo1=\App\Models\Utility::get_file('uploads/is_cover_image/');
$setting = App\Models\Utility::settings();
$company_logo = \App\Models\Utility::getValByName('company_logo');
@endphp

@extends('layouts.admin')
@section('page-title')
    {{ __('Dashboard') }}
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{__('Home')}}</a></li>
@endsection
@push('script-page')
    <script>
        var timezone = '{{ !empty($setting['timezone']) ? $setting['timezone'] : 'Asia/Kolkata' }}';

        let today = new Date(new Date().toLocaleString("en-US", {
            timeZone: timezone
        }));
        var curHr = today.getHours()
        var target = document.getElementById("greetings");

        if (curHr < 12) {
            target.innerHTML = "Good Morning,";
        } else if (curHr < 17) {
            target.innerHTML = "Good Afternoon,";
        } else {
            target.innerHTML = "Good Evening,";
        }

    </script>
    <script>
        $(document).on('click', '#code-generate', function() {
            var length = 10;
            var result = '';
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            var charactersLength = characters.length;
            for (var i = 0; i < length; i++) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            $('#auto-code').val(result);
        });
    </script>
@endpush
@section('content')
@if (\Auth::user()->type == 1)
<div class="row">
    <!-- [ sample-page ] start -->
    <div class="col-sm-12">
        <div class="row">

            <div class="col-xxl-6">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ __('Dashboard') }}</h5>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- [ sample-page ] end -->
</div>


@endif
@endsection
@push('script-page')
@if (\Auth::user()->type == 1)
@else
@endif
@endpush

