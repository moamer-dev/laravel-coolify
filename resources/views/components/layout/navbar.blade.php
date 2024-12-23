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
                        <div class="menu menu-sub menu-sub-dropdown menu-column w-100 w-sm-350px" data-kt-menu="true">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">My Apps</div>
                                    <div class="card-toolbar">
                                        <button type="button"
                                            class="btn btn-sm btn-icon btn-active-light-primary me-n3"
                                            data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                            data-kt-menu-placement="bottom-end">
                                            <i class="ki-outline ki-setting-3 fs-2"></i>
                                        </button>
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3"
                                            data-kt-menu="true">
                                            <!--begin::Heading-->
                                            <div class="menu-item px-3">
                                                <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">
                                                    Payments</div>
                                            </div>
                                            <!--end::Heading-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">Create Invoice</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link flex-stack px-3">Create Payment
                                                    <span class="ms-2" data-bs-toggle="tooltip"
                                                        title="Specify a target name for future usage and reference">
                                                        <i class="ki-outline ki-information fs-6"></i>
                                                    </span></a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">Generate Bill</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                                data-kt-menu-placement="right-end">
                                                <a href="#" class="menu-link px-3">
                                                    <span class="menu-title">Subscription</span>
                                                    <span class="menu-arrow"></span>
                                                </a>
                                                <!--begin::Menu sub-->
                                                <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">Plans</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">Billing</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">Statements</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu separator-->
                                                    <div class="separator my-2"></div>
                                                    <!--end::Menu separator-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <div class="menu-content px-3">
                                                            <!--begin::Switch-->
                                                            <label
                                                                class="form-check form-switch form-check-custom form-check-solid">
                                                                <!--begin::Input-->
                                                                <input class="form-check-input w-30px h-20px"
                                                                    type="checkbox" value="1" checked="checked"
                                                                    name="notifications" />
                                                                <!--end::Input-->
                                                                <!--end::Label-->
                                                                <span
                                                                    class="form-check-label text-muted fs-6">Recuring</span>
                                                                <!--end::Label-->
                                                            </label>
                                                            <!--end::Switch-->
                                                        </div>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu sub-->
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3 my-1">
                                                <a href="#" class="menu-link px-3">Settings</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu 3-->
                                        <!--end::Menu-->
                                    </div>
                                    <!--end::Card toolbar-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body py-5">
                                    <!--begin::Scroll-->
                                    <div class="mh-450px scroll-y me-n5 pe-5">
                                        <!--begin::Row-->
                                        <div class="row g-2">
                                            <!--begin::Col-->
                                            <div class="col-4">
                                                <a href="#"
                                                    class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                    <img src="{{ asset('assets') }}/media/svg/brand-logos/amazon.svg"
                                                        class="w-25px h-25px mb-2" alt="" />
                                                    <span class="fw-semibold">AWS</span>
                                                </a>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-4">
                                                <a href="#"
                                                    class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                    <img src="{{ asset('assets') }}/media/svg/brand-logos/angular-icon-1.svg"
                                                        class="w-25px h-25px mb-2" alt="" />
                                                    <span class="fw-semibold">AngularJS</span>
                                                </a>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-4">
                                                <a href="#"
                                                    class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                    <img src="{{ asset('assets') }}/media/svg/brand-logos/atica.svg"
                                                        class="w-25px h-25px mb-2" alt="" />
                                                    <span class="fw-semibold">Atica</span>
                                                </a>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-4">
                                                <a href="#"
                                                    class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                    <img src="{{ asset('assets') }}/media/svg/brand-logos/beats-electronics.svg"
                                                        class="w-25px h-25px mb-2" alt="" />
                                                    <span class="fw-semibold">Music</span>
                                                </a>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-4">
                                                <a href="#"
                                                    class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                    <img src="{{ asset('assets') }}/media/svg/brand-logos/codeigniter.svg"
                                                        class="w-25px h-25px mb-2" alt="" />
                                                    <span class="fw-semibold">Codeigniter</span>
                                                </a>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-4">
                                                <a href="#"
                                                    class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                    <img src="{{ asset('assets') }}/media/svg/brand-logos/bootstrap-4.svg"
                                                        class="w-25px h-25px mb-2" alt="" />
                                                    <span class="fw-semibold">Bootstrap</span>
                                                </a>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-4">
                                                <a href="#"
                                                    class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                    <img src="{{ asset('assets') }}/media/svg/brand-logos/google-tag-manager.svg"
                                                        class="w-25px h-25px mb-2" alt="" />
                                                    <span class="fw-semibold">GTM</span>
                                                </a>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-4">
                                                <a href="#"
                                                    class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                    <img src="{{ asset('assets') }}/media/svg/brand-logos/disqus.svg"
                                                        class="w-25px h-25px mb-2" alt="" />
                                                    <span class="fw-semibold">Disqus</span>
                                                </a>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-4">
                                                <a href="#"
                                                    class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                    <img src="{{ asset('assets') }}/media/svg/brand-logos/dribbble-icon-1.svg"
                                                        class="w-25px h-25px mb-2" alt="" />
                                                    <span class="fw-semibold">Dribble</span>
                                                </a>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-4">
                                                <a href="#"
                                                    class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                    <img src="{{ asset('assets') }}/media/svg/brand-logos/google-play-store.svg"
                                                        class="w-25px h-25px mb-2" alt="" />
                                                    <span class="fw-semibold">Play Store</span>
                                                </a>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-4">
                                                <a href="#"
                                                    class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                    <img src="{{ asset('assets') }}/media/svg/brand-logos/google-podcasts.svg"
                                                        class="w-25px h-25px mb-2" alt="" />
                                                    <span class="fw-semibold">Podcasts</span>
                                                </a>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-4">
                                                <a href="#"
                                                    class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                    <img src="{{ asset('assets') }}/media/svg/brand-logos/figma-1.svg"
                                                        class="w-25px h-25px mb-2" alt="" />
                                                    <span class="fw-semibold">Figma</span>
                                                </a>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-4">
                                                <a href="#"
                                                    class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                    <img src="{{ asset('assets') }}/media/svg/brand-logos/github.svg"
                                                        class="w-25px h-25px mb-2" alt="" />
                                                    <span class="fw-semibold">Github</span>
                                                </a>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-4">
                                                <a href="#"
                                                    class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                    <img src="{{ asset('assets') }}/media/svg/brand-logos/gitlab.svg"
                                                        class="w-25px h-25px mb-2" alt="" />
                                                    <span class="fw-semibold">Gitlab</span>
                                                </a>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-4">
                                                <a href="#"
                                                    class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                    <img src="{{ asset('assets') }}/media/svg/brand-logos/instagram-2-1.svg"
                                                        class="w-25px h-25px mb-2" alt="" />
                                                    <span class="fw-semibold">Instagram</span>
                                                </a>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-4">
                                                <a href="#"
                                                    class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                    <img src="{{ asset('assets') }}/media/svg/brand-logos/pinterest-p.svg"
                                                        class="w-25px h-25px mb-2" alt="" />
                                                    <span class="fw-semibold">Pinterest</span>
                                                </a>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Scroll-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                    </div>
                    @if (Auth::user())
                        @include('components.navbar.nav-user-menu')
                    @else
                        <div class="app-navbar-item ms-1">
                            <div class="btn btn-sm btn-icon btn-custom h-35px w-35px">
                                <a href="{{ route('login') }}"
                                    class="btn btn-icon btn-icon-gray-600 btn-active-color-primary position-relative">
                                    <i class="ki-outline
                        ki-user fs-1"></i>
                                </a>
                            </div>
                        </div>
                    @endif
                    <div class="app-navbar-item d-lg-none" title="Show header menu">
                        <button class="btn btn-sm btn-icon btn-custom h-35px w-35px"
                            id="kt_header_secondary_mobile_toggle">
                            <i class="ki-outline ki-element-4 fs-2"></i>
                        </button>
                    </div>
                    <div class="app-navbar-item d-lg-none me-n3" title="Show header menu">
                        <button class="btn btn-sm btn-icon btn-custom h-35px w-35px"
                            id="kt_app_sidebar_mobile_toggle">
                            <i class="ki-outline ki-setting-3 fs-2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.navbar.nav-secondary')
</div>
