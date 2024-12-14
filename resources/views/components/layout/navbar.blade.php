<!--begin::Header-->
@php
    $user = Auth::user()->load('profile');
    Debugbar::info($user);
@endphp
<div id="kt_app_header" class="app-header">
    <!--begin::Header primary-->
    <div class="app-header-primary" data-kt-sticky="true" data-kt-sticky-name="app-header-primary-sticky"
        data-kt-sticky-offset="{default: 'false', lg: '300px'}">
        <!--begin::Header primary container-->
        <div class="app-container container-xxl d-flex align-items-stretch justify-content-between"
            id="kt_app_header_primary_container">
            <!--begin::Logo and search-->
            <div class="d-flex flex-grow-1 flex-lg-grow-0">
                <!--begin::Logo wrapper-->
                <div class="d-flex align-items-center me-7" id="kt_app_header_logo_wrapper">
                    <!--begin::Header toggle-->
                    <button
                        class="d-lg-none btn btn-icon btn-flex btn-color-gray-600 btn-active-color-primary w-35px h-35px ms-n2 me-2"
                        id="kt_app_header_menu_toggle">
                        <i class="ki-outline ki-abstract-14 fs-2"></i>
                    </button>
                    <!--end::Header toggle-->
                    <!--begin::Logo-->
                    <a href="index.html" class="d-flex align-items-center me-lg-20 me-5">
                        <img alt="Logo" src="{{ asset('assets') }}/media/logos/demo-35-small.svg"
                            class="h-20px d-sm-none d-inline" />
                        <img alt="Logo" src="{{ asset('assets') }}/media/logos/demo-35.svg"
                            class="h-20px h-lg-25px theme-light-show d-none d-sm-inline" />
                        <img alt="Logo" src="{{ asset('assets') }}/media/logos/demo-35-dark.png"
                            class="h-20px h-lg-25px theme-dark-show d-none d-sm-inline" />
                    </a>
                    <!--end::Logo-->
                </div>
                <!--end::Logo wrapper-->
                @include('components.navbar.nav-menu')
            </div>
            <!--end::Logo and search-->
            <!--begin::Navbar-->
            <div class="app-navbar flex-shrink-0">
                @include('components.navbar.nav-notifications')
                <!--begin::Chat-->
                <div class="app-navbar-item">
                    <!--begin::Menu wrapper-->
                    <div class="btn btn-icon btn-icon-gray-600 btn-active-color-primary position-relative"
                        id="kt_drawer_chat_toggle">
                        <i class="ki-outline ki-message-notif fs-1"></i>
                    </div>
                    <!--end::Menu wrapper-->
                </div>
                <!--end::Chat-->
                @include('components.navbar.nav-user-menu')
            </div>
            <!--end::Navbar-->
        </div>
        <!--end::Header primary container-->
    </div>
    <!--end::Header primary-->
    @include('components.navbar.nav-submenu')
</div>
<!--end::Header-->
