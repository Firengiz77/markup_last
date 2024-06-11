@php
    $checktableExist = Utility::checktableExist();

        $LangName = 'english';
@endphp
<!-- [ Header ] start -->
@if (isset($setting['cust_theme_bg']) && $setting['cust_theme_bg'] == 'on')
    <header class="dash-header transprent-bg">
@else
    <header class="dash-header">
@endif
<div class="header-wrapper">
    <div class="me-auto dash-mob-drp">
        <ul class="list-unstyled">
            <li class="dash-h-item mob-hamburger">
                <a href="#!" class="dash-head-link" id="mobile-collapse">
                    <div class="hamburger hamburger--arrowturn">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                </a>
            </li>
            <li class="dropdown dash-h-item drp-company">
                <a class="dash-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    <span class="theme-avtar">
                        <img class="theme-avtar" alt="#" style="width:30px;"
                            src="{{ !empty($users->avatar) ? $profile . '/' . $users->avatar : $profile . '/avatar.png' }}">
                    </span>
                    <span class="hide-mob ms-2">{{ 'Hi,' }}{{ Auth::user()->name }}!</span>
                    <i class="ti ti-chevron-down drp-arrow nocolor hide-mob"></i>
                </a>
                <div class="dropdown-menu dash-h-dropdown">

                    <a href="{{ route('profile') }}" class="dropdown-item">
                        <i class="ti ti-user"></i>
                        <span>{{ __('My Profile') }}</span>
                    </a>
                    <a href="{{ route('logout') }}" class="dropdown-item"
                        onclick="event.preventDefault();document.getElementById('frm-logout').submit();">
                        <i class="ti ti-power"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
    <div class="ms-auto">
        <ul class="list-unstyled">
            @impersonating($guard = null)
                <li class="dropdown dash-h-item drp-company">
                    <a class="btn btn-danger btn-sm me-3"
                        href="{{ route('exit.owner') }}"><i class="ti ti-ban"></i>
                        {{ __('Exit Owner Login') }}
                    </a>
                </li>
            @endImpersonating

            <li class="dropdown dash-h-item drp-language">
                <a class="dash-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="ti ti-world nocolor"></i>
                    <span class="drp-text">{{ ucFirst($LangName) }}</span>
                    <i class="ti ti-chevron-down drp-arrow nocolor"></i>
                </a>
                <div class="dropdown-menu dash-h-dropdown dropdown-menu-end">
                    @foreach ($languages as $code => $lang)
                        <a href="{{ route('change.language', $code) }}"
                            class="dropdown-item {{ $currantLang == $code ? 'text-primary' : '' }}">
                            <span>{{ucFirst($lang)}}</span>
                        </a>
                    @endforeach
                    @if (Auth::user()->type == 1)
                           <a href="#" data-url="{{ route('create.language') }}" data-size="md" data-ajax-popup="true" data-title="{{__('Create New Language')}}" class="dropdown-item border-top py-1 text-primary"
                            >{{ __('Create Language') }}</a>
                            <a href="{{ route('manage.language', [$currantLang]) }}"
                                class="dropdown-item py-1 text-primary">{{ __('Manage Languages') }}
                            </a>
                    @endif
                </div>
            </li>
        </ul>
    </div>
</div>
</header>
<!-- [ Header ] end -->
