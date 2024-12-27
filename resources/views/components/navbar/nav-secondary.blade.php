<div class="app-header-secondary app-header-mobile-drawer" data-kt-drawer="true" data-kt-drawer-name="app-header-secondary"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_header_secondary_mobile_toggle" data-kt-swapper="true"
    data-kt-swapper-mode="{default: 'append', lg: 'append'}"
    data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header'}">
    <div class="d-flex flex-column flex-grow-1 overflow-hidden">
        <div
            class="app-header-secondary-menu-main d-flex flex-grow-lg-1 align-items-end pt-3 pt-lg-2 px-3 px-lg-0 w-auto overflow-auto flex-nowrap">
            <div class="app-container container-fluid">
                <div class="menu menu-rounded menu-nowrap flex-shrink-0 menu-row menu-active-bg menu-title-gray-700 menu-state-gray-900 menu-icon-gray-500 menu-arrow-gray-500 menu-state-icon-primary menu-state-bullet-primary fw-semibold fs-base align-items-stretch"
                    id="#kt_app_header_secondary_menu" data-kt-menu="true">
                    <div class="menu-item {{ request()->is('user/dashboard*') ? 'here' : '' }}">
                        <a class="menu-link" href="{{ route('dashboard') }}">
                            <span class="menu-title">لوحة التحكم</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <div class="menu-content">
                            <div class="menu-separator"></div>
                        </div>
                    </div>
                    <div class="menu-item {{ request()->is('user/learning-center*') ? 'here' : '' }}">
                        <a class="menu-link" href="{{ route('profile.learningCenter') }}">
                            <span class="menu-title">مركز التعلم</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <div class="menu-content">
                            <div class="menu-separator"></div>
                        </div>
                    </div>
                    <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-end"
                        class="menu-item {{ request()->is('profile*') ? 'here' : '' }} show">
                        <span class="menu-link">
                            <span class="menu-title">حسابي</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-dropdown px-lg-2 py-lg-4 w-150px w-lg-175px">
                            <div class="menu-item">
                                <a class="menu-link {{ request()->is('profile/overview*') ? 'active' : '' }}"
                                    href="{{ route('profile.overview') }}">
                                    <span class="menu-icon">
                                        <i class="ki-outline ki-chart-simple fs-3"></i>
                                    </span>
                                    <span class="menu-title">بياناتي</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ request()->is('profile/settings*') ? 'active' : '' }}"
                                    href="{{ route('profile.settings') }}">
                                    <span class="menu-icon">
                                        <i class="ki-outline ki-share fs-3"></i>
                                    </span>
                                    <span class="menu-title">الإعدادات</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ request()->is('profile/billing*') ? 'active' : '' }}"
                                    href="{{ route('profile.billing') }}">
                                    <span class="menu-icon">
                                        <i class="ki-outline ki-shield fs-3"></i>
                                    </span>
                                    <span class="menu-title">إعدادات الدفع</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ request()->is('profile/learning-path*') ? 'active' : '' }}"
                                    href="{{ route('profile.learning-path') }}">
                                    <span class="menu-icon">
                                        <i class="ki-outline ki-scan-barcode fs-3"></i>
                                    </span>
                                    <span class="menu-title">إختيار مسارات التعلم</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ request()->is('profile/quiz-attempts*') ? 'active' : '' }}"
                                    href="{{ route('user.quiz-attempts') }}">
                                    <span class="menu-icon">
                                        <i class="ki-outline ki-dollar fs-3"></i>
                                    </span>
                                    <span class="menu-title">محاولات الإختبارات</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="menu-item flex-grow-1"></div>
                    <div class="menu-item">
                        <div class="menu-content">
                            <div class="menu-separator d-block d-lg-none"></div>
                        </div>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link" href="utilities/modals/wizards/create-app.html">
                            <span class="menu-icon">
                                <i class="ki-outline ki-plus fs-3"></i>
                            </span>
                            <span class="menu-title">Extensions</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <!--begin:Menu content-->
                        <div class="menu-content">
                            <div class="menu-separator"></div>
                        </div>
                        <!--end:Menu content-->
                    </div>
                    <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-end"
                        class="menu-item">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <span class="menu-title">Tools</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-dropdown px-lg-2 py-lg-4 w-150px w-lg-175px">
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link"
                                    href="https://preview.keenthemes.com/metronic8/demo60/layout-builder.html">
                                    <span class="menu-icon">
                                        <i class="ki-outline ki-chart-simple fs-3"></i>
                                    </span>
                                    <span class="menu-title">Layout Builder</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link"
                                    href="https://preview.keenthemes.com/html/metronic/docs/getting-started/changelog">
                                    <span class="menu-icon">
                                        <i class="ki-outline ki-code fs-3"></i>
                                    </span>
                                    <span class="menu-title">Changelog</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link" href="https://preview.keenthemes.com/html/metronic/docs">
                                    <span class="menu-icon">
                                        <i class="ki-outline ki-abstract-26 fs-3"></i>
                                    </span>
                                    <span class="menu-title">Docs</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                        </div>
                        <!--end:Menu sub-->
                    </div>
                </div>
            </div>
        </div>
        <div class="app-header-secondary-menu-sub d-flex align-items-stretch flex-grow-1">
            <div
                class="app-container d-flex flex-column flex-lg-row align-items-stretch justify-content-lg-between container-fluid">
                <!--begin::Main menu-->
                <div class="{{ request()->is('profile*') ? '' : 'd-none' }} menu menu-rounded menu-column menu-lg-row menu-active-bg menu-title-gray-700 menu-state-gray-900 menu-icon-gray-500 menu-arrow-gray-500 menu-state-icon-primary menu-state-bullet-primary fw-semibold fs-base align-items-stretch my-2 my-lg-0 px-2 px-lg-0"
                    id="#kt_app_header_tertiary_menu" data-kt-menu="true">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('profile/overview*') ? 'active' : '' }}"
                            href="{{ route('profile.overview') }}">
                            <span class="menu-icon">
                                <i class="ki-outline ki-element-9 fs-4"></i>
                            </span>
                            <span class="menu-title">بياناتي</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('profile/settings*') ? 'active' : '' }}"
                            href="{{ route('profile.settings') }}">
                            <span class="menu-icon">
                                <i class="ki-outline ki-element-9 fs-4"></i>
                            </span>
                            <span class="menu-title">الإعدادات</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('profile/billing*') ? 'active' : '' }}"
                            href="{{ route('profile.billing') }}">
                            <span class="menu-icon">
                                <i class="ki-outline ki-element-9 fs-4"></i>
                            </span>
                            <span class="menu-title">إعدادات الدفع</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('profile/learning-path*') ? 'active' : '' }}"
                            href="{{ route('profile.learning-path') }}">
                            <span class="menu-icon">
                                <i class="ki-outline ki-element-9 fs-4"></i>
                            </span>
                            <span class="menu-title">إختيار مسارات التعلم</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('profile/quiz-attempts*') ? 'active' : '' }}"
                            href="{{ route('user.quiz-attempts') }}">
                            <span class="menu-icon">
                                <i class="ki-outline ki-element-9 fs-4"></i>
                            </span>
                            <span class="menu-title">محاولات الإختبارات</span>
                        </a>
                    </div>
                </div>
                <div class="{{ request()->is('user/learning-center/*') ? '' : 'd-none' }} menu menu-rounded menu-column menu-lg-row menu-active-bg menu-title-gray-700 menu-state-gray-900 menu-icon-gray-500 menu-arrow-gray-500 menu-state-icon-primary menu-state-bullet-primary fw-semibold fs-base align-items-stretch my-2 my-lg-0 px-2 px-lg-0"
                    id="#kt_app_header_tertiary_menu" data-kt-menu="true">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('user/learning-center/overview*') ? 'active' : '' }}"
                            href="{{ route('profile.learningCenter') }}">
                            <span class="menu-icon">
                                <i class="ki-outline ki-element-9 fs-4"></i>
                            </span>
                            <span class="menu-title">مركز التعلم</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('user/learning-center/plan*') ? 'active' : '' }}"
                            href="{{ route('user.path-todo') }}">
                            <span class="menu-icon">
                                <i class="ki-outline ki-element-9 fs-4"></i>
                            </span>
                            <span class="menu-title">خطة التعلم</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link" href="#">
                            <span class="menu-icon">
                                <i class="ki-outline ki-element-9 fs-4"></i>
                            </span>
                            <span class="menu-title">إحصائياتي</span>
                        </a>
                    </div>
                </div>
                <div id="kt_header_search" class="header-search d-flex align-items-stretch"
                    data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter"
                    data-kt-search-layout="menu" data-kt-menu-trigger="auto" data-kt-menu-overflow="false"
                    data-kt-menu-permanent="true" data-kt-menu-placement="bottom-end">
                    <!--begin::Search toggle-->
                    <div class="d-flex align-items-center" data-kt-search-element="toggle"
                        id="kt_header_search_toggle">
                        <div class="btn btn-icon btn-active-color-primary ms-1">
                            <i class="ki-outline ki-magnifier fs-3"></i>
                        </div>
                    </div>
                    <!--end::Search toggle-->
                    <!--begin::Menu-->
                    <div data-kt-search-element="content"
                        class="menu menu-sub menu-sub-dropdown p-7 w-325px w-md-375px">
                        <!--begin::Wrapper-->
                        <div data-kt-search-element="wrapper">
                            <!--begin::Form-->
                            <form data-kt-search-element="form" class="w-100 position-relative mb-3"
                                autocomplete="off">
                                <!--begin::Icon-->
                                <i
                                    class="ki-outline ki-magnifier fs-2 text-gray-500 position-absolute top-50 translate-middle-y ms-0"></i>
                                <!--end::Icon-->
                                <!--begin::Input-->
                                <input type="text" class="search-input form-control form-control-flush ps-10"
                                    name="search" value="" placeholder="Search..."
                                    data-kt-search-element="input" />
                                <!--end::Input-->
                                <!--begin::Spinner-->
                                <span
                                    class="search-spinner position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-1"
                                    data-kt-search-element="spinner">
                                    <span class="spinner-border h-15px w-15px align-middle text-gray-500"></span>
                                </span>
                                <!--end::Spinner-->
                                <!--begin::Reset-->
                                <span
                                    class="search-reset btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 d-none"
                                    data-kt-search-element="clear">
                                    <i class="ki-outline ki-cross fs-2 fs-lg-1 me-0"></i>
                                </span>
                                <!--end::Reset-->
                                <!--begin::Toolbar-->
                                <div class="position-absolute top-50 end-0 translate-middle-y"
                                    data-kt-search-element="toolbar">
                                    <!--begin::Preferences toggle-->
                                    <div data-kt-search-element="preferences-show"
                                        class="btn btn-icon w-20px btn-sm btn-active-color-primary me-1"
                                        data-bs-toggle="tooltip" title="Show search preferences">
                                        <i class="ki-outline ki-setting-2 fs-2"></i>
                                    </div>
                                    <!--end::Preferences toggle-->
                                    <!--begin::Advanced search toggle-->
                                    <div data-kt-search-element="advanced-options-form-show"
                                        class="btn btn-icon w-20px btn-sm btn-active-color-primary"
                                        data-bs-toggle="tooltip" title="Show more search options">
                                        <i class="ki-outline ki-down fs-2"></i>
                                    </div>
                                    <!--end::Advanced search toggle-->
                                </div>
                                <!--end::Toolbar-->
                            </form>
                            <!--end::Form-->
                            <!--begin::Separator-->
                            <div class="separator border-gray-200 mb-6"></div>
                            <!--end::Separator-->
                            <!--begin::Recently viewed-->
                            <div data-kt-search-element="results" class="d-none">
                                <!--begin::Items-->
                                <div class="scroll-y mh-200px mh-lg-350px">
                                    <!--begin::Category title-->
                                    <h3 class="fs-5 text-muted m-0 pb-5" data-kt-search-element="category-title">
                                        Users</h3>
                                    <!--end::Category title-->
                                    <!--begin::Item-->
                                    <a href="#"
                                        class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-40px me-4">
                                            <img src="{{ asset('assets') }}/media/avatars/300-6.jpg"
                                                alt="" />
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Title-->
                                        <div class="d-flex flex-column justify-content-start fw-semibold">
                                            <span class="fs-6 fw-semibold">Karina Clark</span>
                                            <span class="fs-7 fw-semibold text-muted">Marketing Manager</span>
                                        </div>
                                        <!--end::Title-->
                                    </a>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <a href="#"
                                        class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-40px me-4">
                                            <img src="{{ asset('assets') }}/media/avatars/300-2.jpg"
                                                alt="" />
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Title-->
                                        <div class="d-flex flex-column justify-content-start fw-semibold">
                                            <span class="fs-6 fw-semibold">Olivia Bold</span>
                                            <span class="fs-7 fw-semibold text-muted">Software Engineer</span>
                                        </div>
                                        <!--end::Title-->
                                    </a>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <a href="#"
                                        class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-40px me-4">
                                            <img src="{{ asset('assets') }}/media/avatars/300-9.jpg"
                                                alt="" />
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Title-->
                                        <div class="d-flex flex-column justify-content-start fw-semibold">
                                            <span class="fs-6 fw-semibold">Ana Clark</span>
                                            <span class="fs-7 fw-semibold text-muted">UI/UX Designer</span>
                                        </div>
                                        <!--end::Title-->
                                    </a>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <a href="#"
                                        class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-40px me-4">
                                            <img src="{{ asset('assets') }}/media/avatars/300-14.jpg"
                                                alt="" />
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Title-->
                                        <div class="d-flex flex-column justify-content-start fw-semibold">
                                            <span class="fs-6 fw-semibold">Nick Pitola</span>
                                            <span class="fs-7 fw-semibold text-muted">Art Director</span>
                                        </div>
                                        <!--end::Title-->
                                    </a>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <a href="#"
                                        class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-40px me-4">
                                            <img src="{{ asset('assets') }}/media/avatars/300-11.jpg"
                                                alt="" />
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Title-->
                                        <div class="d-flex flex-column justify-content-start fw-semibold">
                                            <span class="fs-6 fw-semibold">Edward Kulnic</span>
                                            <span class="fs-7 fw-semibold text-muted">System Administrator</span>
                                        </div>
                                        <!--end::Title-->
                                    </a>
                                    <!--end::Item-->
                                    <!--begin::Category title-->
                                    <h3 class="fs-5 text-muted m-0 pt-5 pb-5" data-kt-search-element="category-title">
                                        Customers</h3>
                                    <!--end::Category title-->
                                    <!--begin::Item-->
                                    <a href="#"
                                        class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-40px me-4">
                                            <span class="symbol-label bg-light">
                                                <img class="w-20px h-20px"
                                                    src="{{ asset('assets') }}/media/svg/brand-logos/volicity-9.svg"
                                                    alt="" />
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Title-->
                                        <div class="d-flex flex-column justify-content-start fw-semibold">
                                            <span class="fs-6 fw-semibold">Company Rbranding</span>
                                            <span class="fs-7 fw-semibold text-muted">UI Design</span>
                                        </div>
                                        <!--end::Title-->
                                    </a>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <a href="#"
                                        class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-40px me-4">
                                            <span class="symbol-label bg-light">
                                                <img class="w-20px h-20px"
                                                    src="{{ asset('assets') }}/media/svg/brand-logos/tvit.svg"
                                                    alt="" />
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Title-->
                                        <div class="d-flex flex-column justify-content-start fw-semibold">
                                            <span class="fs-6 fw-semibold">Company Re-branding</span>
                                            <span class="fs-7 fw-semibold text-muted">Web Development</span>
                                        </div>
                                        <!--end::Title-->
                                    </a>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <a href="#"
                                        class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-40px me-4">
                                            <span class="symbol-label bg-light">
                                                <img class="w-20px h-20px"
                                                    src="{{ asset('assets') }}/media/svg/misc/infography.svg"
                                                    alt="" />
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Title-->
                                        <div class="d-flex flex-column justify-content-start fw-semibold">
                                            <span class="fs-6 fw-semibold">Business Analytics App</span>
                                            <span class="fs-7 fw-semibold text-muted">Administration</span>
                                        </div>
                                        <!--end::Title-->
                                    </a>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <a href="#"
                                        class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-40px me-4">
                                            <span class="symbol-label bg-light">
                                                <img class="w-20px h-20px"
                                                    src="{{ asset('assets') }}/media/svg/brand-logos/leaf.svg"
                                                    alt="" />
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Title-->
                                        <div class="d-flex flex-column justify-content-start fw-semibold">
                                            <span class="fs-6 fw-semibold">EcoLeaf App Launch</span>
                                            <span class="fs-7 fw-semibold text-muted">Marketing</span>
                                        </div>
                                        <!--end::Title-->
                                    </a>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <a href="#"
                                        class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-40px me-4">
                                            <span class="symbol-label bg-light">
                                                <img class="w-20px h-20px"
                                                    src="{{ asset('assets') }}/media/svg/brand-logos/tower.svg"
                                                    alt="" />
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Title-->
                                        <div class="d-flex flex-column justify-content-start fw-semibold">
                                            <span class="fs-6 fw-semibold">Tower Group Website</span>
                                            <span class="fs-7 fw-semibold text-muted">Google Adwords</span>
                                        </div>
                                        <!--end::Title-->
                                    </a>
                                    <!--end::Item-->
                                    <!--begin::Category title-->
                                    <h3 class="fs-5 text-muted m-0 pt-5 pb-5" data-kt-search-element="category-title">
                                        Projects</h3>
                                    <!--end::Category title-->
                                    <!--begin::Item-->
                                    <a href="#"
                                        class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-40px me-4">
                                            <span class="symbol-label bg-light">
                                                <i class="ki-outline ki-notepad fs-2 text-primary"></i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Title-->
                                        <div class="d-flex flex-column">
                                            <span class="fs-6 fw-semibold">Si-Fi Project by AU Themes</span>
                                            <span class="fs-7 fw-semibold text-muted">#45670</span>
                                        </div>
                                        <!--end::Title-->
                                    </a>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <a href="#"
                                        class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-40px me-4">
                                            <span class="symbol-label bg-light">
                                                <i class="ki-outline ki-frame fs-2 text-primary"></i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Title-->
                                        <div class="d-flex flex-column">
                                            <span class="fs-6 fw-semibold">Shopix Mobile App Planning</span>
                                            <span class="fs-7 fw-semibold text-muted">#45690</span>
                                        </div>
                                        <!--end::Title-->
                                    </a>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <a href="#"
                                        class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-40px me-4">
                                            <span class="symbol-label bg-light">
                                                <i class="ki-outline ki-message-text-2 fs-2 text-primary"></i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Title-->
                                        <div class="d-flex flex-column">
                                            <span class="fs-6 fw-semibold">Finance Monitoring SAAS
                                                Discussion</span>
                                            <span class="fs-7 fw-semibold text-muted">#21090</span>
                                        </div>
                                        <!--end::Title-->
                                    </a>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <a href="#"
                                        class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-40px me-4">
                                            <span class="symbol-label bg-light">
                                                <i class="ki-outline ki-profile-circle fs-2 text-primary"></i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Title-->
                                        <div class="d-flex flex-column">
                                            <span class="fs-6 fw-semibold">Dashboard Analitics Launch</span>
                                            <span class="fs-7 fw-semibold text-muted">#34560</span>
                                        </div>
                                        <!--end::Title-->
                                    </a>
                                    <!--end::Item-->
                                </div>
                                <!--end::Items-->
                            </div>
                            <!--end::Recently viewed-->
                            <!--begin::Recently viewed-->
                            <div class="mb-5" data-kt-search-element="main">
                                <!--begin::Heading-->
                                <div class="d-flex flex-stack fw-semibold mb-4">
                                    <!--begin::Label-->
                                    <span class="text-muted fs-6 me-2">Recently Searched:</span>
                                    <!--end::Label-->
                                </div>
                                <!--end::Heading-->
                                <!--begin::Items-->
                                <div class="scroll-y mh-200px mh-lg-325px">
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center mb-5">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-40px me-4">
                                            <span class="symbol-label bg-light">
                                                <i class="ki-outline ki-laptop fs-2 text-primary"></i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Title-->
                                        <div class="d-flex flex-column">
                                            <a href="#"
                                                class="fs-6 text-gray-800 text-hover-primary fw-semibold">BoomApp
                                                by Keenthemes</a>
                                            <span class="fs-7 text-muted fw-semibold">#45789</span>
                                        </div>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center mb-5">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-40px me-4">
                                            <span class="symbol-label bg-light">
                                                <i class="ki-outline ki-chart-simple fs-2 text-primary"></i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Title-->
                                        <div class="d-flex flex-column">
                                            <a href="#"
                                                class="fs-6 text-gray-800 text-hover-primary fw-semibold">"Kept API
                                                Project Meeting</a>
                                            <span class="fs-7 text-muted fw-semibold">#84050</span>
                                        </div>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center mb-5">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-40px me-4">
                                            <span class="symbol-label bg-light">
                                                <i class="ki-outline ki-chart fs-2 text-primary"></i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Title-->
                                        <div class="d-flex flex-column">
                                            <a href="#"
                                                class="fs-6 text-gray-800 text-hover-primary fw-semibold">"KPI
                                                Monitoring App Launch</a>
                                            <span class="fs-7 text-muted fw-semibold">#84250</span>
                                        </div>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center mb-5">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-40px me-4">
                                            <span class="symbol-label bg-light">
                                                <i class="ki-outline ki-chart-line-down fs-2 text-primary"></i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Title-->
                                        <div class="d-flex flex-column">
                                            <a href="#"
                                                class="fs-6 text-gray-800 text-hover-primary fw-semibold">Project
                                                Reference FAQ</a>
                                            <span class="fs-7 text-muted fw-semibold">#67945</span>
                                        </div>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center mb-5">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-40px me-4">
                                            <span class="symbol-label bg-light">
                                                <i class="ki-outline ki-sms fs-2 text-primary"></i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Title-->
                                        <div class="d-flex flex-column">
                                            <a href="#"
                                                class="fs-6 text-gray-800 text-hover-primary fw-semibold">"FitPro
                                                App Development</a>
                                            <span class="fs-7 text-muted fw-semibold">#84250</span>
                                        </div>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center mb-5">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-40px me-4">
                                            <span class="symbol-label bg-light">
                                                <i class="ki-outline ki-bank fs-2 text-primary"></i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Title-->
                                        <div class="d-flex flex-column">
                                            <a href="#"
                                                class="fs-6 text-gray-800 text-hover-primary fw-semibold">Shopix
                                                Mobile App</a>
                                            <span class="fs-7 text-muted fw-semibold">#45690</span>
                                        </div>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center mb-5">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-40px me-4">
                                            <span class="symbol-label bg-light">
                                                <i class="ki-outline ki-chart-line-down fs-2 text-primary"></i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Title-->
                                        <div class="d-flex flex-column">
                                            <a href="#"
                                                class="fs-6 text-gray-800 text-hover-primary fw-semibold">"Landing
                                                UI Design" Launch</a>
                                            <span class="fs-7 text-muted fw-semibold">#24005</span>
                                        </div>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Items-->
                            </div>
                            <!--end::Recently viewed-->
                            <!--begin::Empty-->
                            <div data-kt-search-element="empty" class="text-center d-none">
                                <!--begin::Icon-->
                                <div class="pt-10 pb-10">
                                    <i class="ki-outline ki-search-list fs-4x opacity-50"></i>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Message-->
                                <div class="pb-15 fw-semibold">
                                    <h3 class="text-gray-600 fs-5 mb-2">No result found</h3>
                                    <div class="text-muted fs-7">Please try again with a different query</div>
                                </div>
                                <!--end::Message-->
                            </div>
                            <!--end::Empty-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Preferences-->
                        <form data-kt-search-element="advanced-options-form" class="pt-1 d-none">
                            <!--begin::Heading-->
                            <h3 class="fw-semibold text-gray-900 mb-7">Advanced Search</h3>
                            <!--end::Heading-->
                            <!--begin::Input group-->
                            <div class="mb-5">
                                <input type="text" class="form-control form-control-sm form-control-solid"
                                    placeholder="Contains the word" name="query" />
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-5">
                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="type" value="has"
                                            checked="checked" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary">All</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="type" value="users" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Users</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="type" value="orders" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Orders</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="type" value="projects" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Projects</span>
                                    </label>
                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-5">
                                <input type="text" name="assignedto"
                                    class="form-control form-control-sm form-control-solid" placeholder="Assigned to"
                                    value="" />
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-5">
                                <input type="text" name="collaborators"
                                    class="form-control form-control-sm form-control-solid"
                                    placeholder="Collaborators" value="" />
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-5">
                                <!--begin::Radio group-->
                                <div class="nav-group nav-group-fluid">
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="attachment" value="has"
                                            checked="checked" />
                                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary">Has
                                            attachment</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label>
                                        <input type="radio" class="btn-check" name="attachment" value="any" />
                                        <span
                                            class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Any</span>
                                    </label>
                                    <!--end::Option-->
                                </div>
                                <!--end::Radio group-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-5">
                                <select name="timezone" aria-label="Select a Timezone" data-control="select2"
                                    data-dropdown-parent="#kt_header_search" data-placeholder="date_period"
                                    class="form-select form-select-sm form-select-solid">
                                    <option value="next">Within the next</option>
                                    <option value="last">Within the last</option>
                                    <option value="between">Between</option>
                                    <option value="on">On</option>
                                </select>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-6">
                                    <input type="number" name="date_number"
                                        class="form-control form-control-sm form-control-solid" placeholder="Lenght"
                                        value="" />
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-6">
                                    <select name="date_typer" aria-label="Select a Timezone" data-control="select2"
                                        data-dropdown-parent="#kt_header_search" data-placeholder="Period"
                                        class="form-select form-select-sm form-select-solid">
                                        <option value="days">Days</option>
                                        <option value="weeks">Weeks</option>
                                        <option value="months">Months</option>
                                        <option value="years">Years</option>
                                    </select>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="d-flex justify-content-end">
                                <button type="reset"
                                    class="btn btn-sm btn-light fw-bold btn-active-light-primary me-2"
                                    data-kt-search-element="advanced-options-form-cancel">Cancel</button>
                                <a href="utilities/search/horizontal.html" class="btn btn-sm fw-bold btn-primary"
                                    data-kt-search-element="advanced-options-form-search">Search</a>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Preferences-->
                        <!--begin::Preferences-->
                        <form data-kt-search-element="preferences" class="pt-1 d-none">
                            <!--begin::Heading-->
                            <h3 class="fw-semibold text-gray-900 mb-7">Search Preferences</h3>
                            <!--end::Heading-->
                            <!--begin::Input group-->
                            <div class="pb-4 border-bottom">
                                <label
                                    class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                                    <span
                                        class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">Projects</span>
                                    <input class="form-check-input" type="checkbox" value="1"
                                        checked="checked" />
                                </label>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="py-4 border-bottom">
                                <label
                                    class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                                    <span
                                        class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">Targets</span>
                                    <input class="form-check-input" type="checkbox" value="1"
                                        checked="checked" />
                                </label>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="py-4 border-bottom">
                                <label
                                    class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                                    <span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">Affiliate
                                        Programs</span>
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </label>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="py-4 border-bottom">
                                <label
                                    class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                                    <span
                                        class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">Referrals</span>
                                    <input class="form-check-input" type="checkbox" value="1"
                                        checked="checked" />
                                </label>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="py-4 border-bottom">
                                <label
                                    class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                                    <span
                                        class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">Users</span>
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </label>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="d-flex justify-content-end pt-7">
                                <button type="reset"
                                    class="btn btn-sm btn-light fw-bold btn-active-light-primary me-2"
                                    data-kt-search-element="preferences-dismiss">Cancel</button>
                                <button type="submit" class="btn btn-sm fw-bold btn-primary">Save
                                    Changes</button>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Preferences-->
                    </div>
                    <!--end::Menu-->
                </div>
                <!--end::Search-->
            </div>
        </div>
    </div>
    <!--end::Header secondary wrapper-->
</div>
