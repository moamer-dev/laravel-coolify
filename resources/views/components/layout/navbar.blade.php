@php
    if (Auth::user()) {
        $user = Auth::user()->load('profile');
        Debugbar::info($user);
    }
@endphp
<div id="kt_app_header" class="app-header">
    <div class="app-header-primary" data-kt-sticky="true" data-kt-sticky-name="app-header-primary-sticky"
        data-kt-sticky-offset="{default: 'false', lg: '300px'}">
        <div class="app-container container-xxl d-flex align-items-stretch justify-content-between"
            id="kt_app_header_primary_container">
            <div class="d-flex flex-grow-1 flex-lg-grow-0">
                <div class="d-flex align-items-center me-7" id="kt_app_header_logo_wrapper">
                    <button
                        class="d-lg-none btn btn-icon btn-flex btn-color-gray-600 btn-active-color-primary w-35px h-35px ms-n2 me-2"
                        id="kt_app_header_menu_toggle">
                        <i class="ki-outline ki-abstract-14 fs-2"></i>
                    </button>
                    <a href="/" class="d-flex align-items-center me-lg-20 me-5">
                        <img alt="Logo" src="{{ asset('assets') }}/media/logos/icon_light.svg"
                            class="w-35px d-sm-none d-inline" />
                        <img alt="Logo" src="{{ asset('assets') }}/media/logos/logo_light.svg"
                            class="w-150px theme-light-show d-none d-sm-inline" />
                        <img alt="Logo" src="{{ asset('assets') }}/media/logos/logo_dark.svg"
                            class="w-150px theme-dark-show d-none d-sm-inline" />
                    </a>
                </div>
                @include('components.navbar.nav-menu')
            </div>
            <div class="app-navbar flex-shrink-0">
                @include('components.navbar.nav-notifications')
                <div class="app-navbar-item">
                    <div class="btn btn-icon btn-icon-gray-600 btn-active-color-primary position-relative"
                        id="kt_drawer_chat_toggle">
                        <i class="ki-outline ki-message-notif fs-1"></i>
                    </div>
                </div>
                @if (Auth::user())
                    @include('components.navbar.nav-user-menu')
                @else
                    <div class="app-navbar-item">
                        <div class="btn btn-icon btn-icon-gray-600 btn-active-color-primary"
                            data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                            data-kt-menu-placement="bottom">
                            <a href="{{ route('login') }}"
                                class="btn btn-icon btn-icon-gray-600 btn-active-color-primary position-relative">
                                <i class="ki-outline
                        ki-user fs-1"></i>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @include('components.navbar.nav-submenu')
</div>
