<div id="kt_app_sidebar" class="app-sidebar" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <div id="kt_app_sidebar_wrapper" class="flex-grow-1 hover-scroll-y mt-9 mb-5 px-2 mx-3 ms-lg-7 me-lg-5"
        data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
        data-kt-scroll-dependencies="{default: false, lg: '#kt_app_header'}" data-kt-scroll-offset="5px">
        <div class="mb-4">
            <div class="d-flex align-items-center position-relative mb-6">
                <i class="ki-outline ki-magnifier fs-4 text-gray-500 position-absolute ms-3 fw-bold"></i>
                <input type="text" id="kt_filter_search"
                    class="form-control form-control-sm form-control-solid w-100 ps-10 border border-300 bg-light-active"
                    placeholder="Find a view" />
                <i
                    class="ki-solid ki-setting-4 fs-5 text-gray-500 position-absolute top-50 end-0 translate-middle-y fw-bold me-3"></i>
            </div>
            <div class="m-0">
                <a href="{{ route('dashboard') }}"
                    class="btn btn-sm d-flex flex-stack {{ request()->is('user/dashboard*') ? 'border border-300 bg-gray-100i' : '' }} btn-color-gray-700 btn-active-color-gray-900 px-3 mb-2">
                    <span class="d-flex align-item-center">
                        <i class="ki-outline ki-abstract-41 fs-4 me-2 text-primary"></i>لوحة التحكم</span>
                </a>
                <a href="{{ route('profile.learningCenter') }}"
                    class="btn btn-sm d-flex flex-stack {{ request()->is('user/learning-center/overview*') ? 'border border-300 bg-gray-100i' : '' }} btn-color-gray-700 btn-active-color-gray-900 px-3 mb-2">
                    <span class="d-flex align-item-center">
                        <i class="ki-outline ki-calendar fs-4 me-2 text-primary"></i>مركز التعلم</span>
                </a>
                <a href="{{ route('user.notifications') }}"
                    class="btn btn-sm d-flex flex-stack {{ request()->is('user/notifications*') ? 'border border-300 bg-gray-100i' : '' }} btn-color-gray-700 btn-active-color-gray-900 px-3 mb-2">
                    <span class="d-flex align-item-center">
                        <i class="ki-outline ki-calendar fs-4 me-2 text-primary"></i>الإشعارات</span>
                </a>
            </div>
        </div>
        <div class="menu-sidebar menu menu-fit menu-column menu-rounded menu-title-gray-700 menu-icon-gray-700 menu-arrow-gray-700 fw-semibold fs-6 align-items-stretch flex-grow-1"
            id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="true">
            <div class="menu-item py-1">
                <div class="menu-content">
                    <div class="separator separator-dashed"></div>
                </div>
            </div>
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion show">
                <span class="menu-link">
                    <span class="menu-title">مركز التعلم</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion menu-state-gray-900 menu-fit open">
                    <div class="menu-item menu-accordion menu-fit">
                        <a href="{{ route('profile.learningCenter') }}" class="menu-link">
                            <span class="menu-icon">
                                <i class="ki-outline ki-element-11 fs-4 text-gray-700"></i>
                            </span>
                            <span
                                class="menu-title {{ request()->is('user/learning-center/overview*') ? 'text-primary' : '' }}">مركز
                                التعلم</span>
                            <span class="menu-badge">
                                <i class="btn btn-sm btn-icon btn-action"></i>
                            </span>
                        </a>
                    </div>
                    <div class="menu-item menu-accordion menu-fit">
                        <a href="{{ route('profile.learning-path') }}" class="menu-link">
                            <span class="menu-icon">
                                <i class="ki-outline ki-picture fs-4 text-info"></i>
                            </span>
                            <span
                                class="menu-title {{ request()->is('profile/learning-path*') ? 'text-primary' : '' }}">إختيارات
                                مسارات التعلم</span>
                            <span class="menu-badge">
                                <i class="btn btn-sm btn-icon btn-action"></i>
                            </span>
                        </a>
                    </div>
                    <div class="menu-item menu-accordion menu-fit">
                        <a href="{{ route('user.path-todo') }}" class="menu-link">
                            <span class="menu-icon">
                                <i class="ki-outline ki-subtitle fs-4 text-danger"></i>
                            </span>
                            <span
                                class="menu-title {{ request()->is('user/learning-center/plan*') ? 'text-primary' : '' }}">خطة
                                التعلم</span>
                            <span class="menu-badge">
                                <i class="btn btn-sm btn-icon btn-action"></i>
                            </span>
                        </a>
                    </div>
                    <div class="menu-item menu-accordion menu-fit">
                        <a href="{{ route('profile.billing') }}" class="menu-link">
                            <span class="menu-icon">
                                <i class="ki-outline ki-calendar fs-4 text-success"></i>
                            </span>
                            <span
                                class="menu-title {{ request()->is('profile/billing*') ? 'text-primary' : '' }}">الإحصائيات</span>
                            <span class="menu-badge">
                                <i class="btn btn-sm btn-icon btn-action"></i>
                            </span>
                        </a>
                    </div>
                    <div class="menu-item menu-accordion menu-fit">
                        <a href="{{ route('profile.learning-path') }}" class="menu-link">
                            <span class="menu-icon">
                                <i class="ki-outline ki-picture fs-4 text-info"></i>
                            </span>
                            <span
                                class="menu-title {{ request()->is('profile/learning-path*') ? 'text-primary' : '' }}">التكنولوجيات</span>
                            <span class="menu-badge">
                                <i class="btn btn-sm btn-icon btn-action"></i>
                            </span>
                        </a>
                    </div>
                    <div class="menu-item menu-accordion menu-fit">
                        <a href="{{ route('user.quiz-attempts') }}" class="menu-link">
                            <span class="menu-icon">
                                <i class="ki-outline ki-element-2 fs-4 text-warning"></i>
                            </span>
                            <span
                                class="menu-title {{ request()->is('profile/quiz-attempts*') ? 'text-primary' : '' }}">محاولات
                                الإختبارات</span>
                            <span class="menu-badge">
                                <i class="btn btn-sm btn-icon btn-action"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="menu-item py-1">
                <!--begin:Menu content-->
                <div class="menu-content">
                    <div class="separator separator-dashed"></div>
                </div>
                <!--end:Menu content-->
            </div>
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <span class="menu-link">
                    <span class="menu-title">حسابي</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion menu-state-gray-900 menu-fit open">
                    <div class="menu-item menu-accordion menu-fit">
                        <a href="{{ route('profile.overview') }}" class="menu-link">
                            <span class="menu-icon">
                                <i class="ki-outline ki-element-11 fs-4 text-gray-700"></i>
                            </span>
                            <span
                                class="menu-title {{ request()->is('profile/overview*') ? 'text-primary' : '' }}">بياناتي</span>
                            <span class="menu-badge">
                                <i class="btn btn-sm btn-icon btn-action"></i>
                            </span>
                        </a>
                    </div>
                    <div class="menu-item menu-accordion menu-fit">
                        <a href="{{ route('profile.settings') }}" class="menu-link">
                            <span class="menu-icon">
                                <i class="ki-outline ki-subtitle fs-4 text-danger"></i>
                            </span>
                            <span
                                class="menu-title {{ request()->is('profile/settings*') ? 'text-primary' : '' }}">الإعدادات</span>
                            <span class="menu-badge">
                                <i class="btn btn-sm btn-icon btn-action"></i>
                            </span>
                        </a>
                    </div>
                    <div class="menu-item menu-accordion menu-fit">
                        <a href="{{ route('profile.billing') }}" class="menu-link">
                            <span class="menu-icon">
                                <i class="ki-outline ki-calendar fs-4 text-success"></i>
                            </span>
                            <span
                                class="menu-title {{ request()->is('profile/billing*') ? 'text-primary' : '' }}">إعدادات
                                الدفع</span>
                            <span class="menu-badge">
                                <i class="btn btn-sm btn-icon btn-action"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
