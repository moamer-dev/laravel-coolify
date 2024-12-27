@php
    if (Auth::user()) {
        $user = Auth::user()->load('profile');
        Debugbar::info($user);
    }
@endphp
<div id="kt_app_header" class="app-header">
    <div class="app-header-primary">
        <div class="app-container container-fluid d-flex align-items-stretch justify-content-between"
            id="kt_app_header_primary_container">
            <div class="d-flex flex-stack flex-grow-1">
                <div class="d-flex">
                    <div class="app-header-logo d-flex flex-center gap-2 me-lg-15">
                        <button class="btn btn-icon btn-sm btn-custom d-flex d-lg-none ms-n2"
                            id="kt_app_header_menu_toggle">
                            <i class="ki-outline ki-abstract-14 fs-2"></i>
                        </button>
                        <a href="{{ route('home') }}">
                            <img alt="Logo" src="{{ asset('assets') }}/media/logos/icon_light.svg"
                                class="w-35px d-sm-none d-inline" />
                            <img alt="Logo" src="{{ asset('assets') }}/media/logos/logo_dark.svg"
                                class="w-150px theme-light-show d-none d-sm-inline" />
                            <img alt="Logo" src="{{ asset('assets') }}/media/logos/logo_dark.svg"
                                class="w-150px theme-dark-show d-none d-sm-inline" />
                        </a>
                    </div>
                    <div class="d-flex align-items-stretch" id="kt_app_header_menu_wrapper">
                        <div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true"
                            data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}"
                            data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}"
                            data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_header_menu_toggle"
                            data-kt-swapper="true" data-kt-swapper-mode="{default: 'append', lg: 'prepend'}"
                            data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_menu_wrapper'}">
                            @include('components.navbar.nav-menu')
                        </div>
                    </div>
                </div>
                <div class="app-navbar flex-shrink-0 gap-2">
                    <div class="app-navbar-item me-lg-3">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#kt_modal_share_earn"
                            class="btn btn-sm btn-flex flex-center border border-300 bg-light-light btn-active-color-gray-900 px-0 px-lg-3 min-w-35px h-35px">
                            <i class="ki-outline ki-share pe-0 pe-lg-2 fs-3"></i>
                            <span class="d-none d-lg-inline">Share</span>
                        </a>
                    </div>
                    <div class="app-navbar-item ms-1">
                        <div class="btn btn-sm btn-icon btn-custom h-35px w-35px"
                            data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                            data-kt-menu-placement="bottom-end">
                            <i class="ki-outline ki-notification-status fs-3"></i>
                        </div>
                        @include('components.layout.navbar-quickaccess')
                    </div>
                    <div class="app-navbar-item ms-1">
                        <div class="btn btn-sm btn-icon btn-custom h-35px w-35px"
                            data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                            data-kt-menu-placement="bottom-end">
                            <i class="ki-outline ki-notification-on fs-3"></i>
                        </div>
                        @include('components.layout.navbar-notifications', [
                            'notifications' => $user->notifications,
                        ])
                    </div>
                    @auth
                        @include('components.navbar.nav-user-menu')
                    @endauth
                    @guest
                        <div class="app-navbar-item ms-1">
                            <div class="btn btn-sm btn-icon btn-custom h-35px w-35px">
                                <a href="{{ route('login') }}"
                                    class="btn btn-icon btn-icon-gray-600 btn-active-color-primary position-relative">
                                    <i class="ki-outline
                        ki-user fs-1"></i>
                                </a>
                            </div>
                        </div>
                    @endguest
                    <div class="app-navbar-item d-lg-none" title="Show header menu">
                        <button class="btn btn-sm btn-icon btn-custom h-35px w-35px"
                            id="kt_header_secondary_mobile_toggle">
                            <i class="ki-outline ki-element-4 fs-2"></i>
                        </button>
                    </div>
                    <div class="app-navbar-item d-lg-none me-n3" title="Show header menu">
                        <button class="btn btn-sm btn-icon btn-custom h-35px w-35px" id="kt_app_sidebar_mobile_toggle">
                            <i class="ki-outline ki-setting-3 fs-2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.navbar.nav-secondary')
</div>
