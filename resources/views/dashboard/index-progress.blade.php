@php
    $user = Auth::user()->load('profile');
@endphp
@extends('layouts.dashboard')
@section('content')
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <div class="col-xxl-8">
            <div class="card h-xl-100">
                <div class="card-header position-relative py-0 border-bottom-2">
                    <ul class="nav nav-stretch nav-pills nav-pills-custom d-flex mt-3">
                        <li class="nav-item p-0 ms-0 me-8">
                            <a class="nav-link btn btn-color-muted active px-0" data-bs-toggle="tab"
                                id="kt_chart_widgets_22_tab_1" href="#kt_chart_widgets_22_tab_content_1">
                                <span class="nav-text fw-semibold fs-6 mb-3">الدورات</span>
                                <span
                                    class="bullet-custom position-absolute z-index-2 w-100 h-2px top-100 bottom-n100 bg-primary rounded"></span>
                            </a>
                        </li>
                        <li class="nav-item p-0 ms-0 me-8">
                            <a class="nav-link btn btn-color-muted px-0" data-bs-toggle="tab" id="kt_chart_widgets_22_tab_2"
                                href="#kt_chart_widgets_22_tab_content_2">
                                <span class="nav-text fw-semibold fs-6 mb-3">المشاريع</span>
                                <span
                                    class="bullet-custom position-absolute z-index-2 w-100 h-2px top-100 bottom-n100 bg-primary rounded"></span>
                            </a>
                        </li>
                        <li class="nav-item p-0 ms-0">
                            <a class="nav-link btn btn-color-muted px-0" data-bs-toggle="tab" id="kt_chart_widgets_22_tab_2"
                                href="#kt_chart_widgets_22_tab_content_2">
                                <span class="nav-text fw-semibold fs-6 mb-3">الإختبارات</span>
                                <span
                                    class="bullet-custom position-absolute z-index-2 w-100 h-2px top-100 bottom-n100 bg-primary rounded"></span>
                            </a>
                        </li>
                    </ul>
                    <div class="card-toolbar">
                        <div data-kt-daterangepicker="true" data-kt-daterangepicker-opens="left"
                            class="btn btn-sm btn-light d-flex align-items-center px-4">
                            <span class="text-gray-600 fw-bold">Loading date range...</span>
                            <i class="ki-outline ki-calendar-8 text-gray-500 lh-0 fs-2 ms-2 me-0"></i>
                        </div>
                    </div>
                </div>
                <div class="card-body pb-3">
                    <!--begin::Tab Content-->
                    <div class="tab-content">
                        <!--begin::Tap pane-->
                        <div class="tab-pane fade show active" id="kt_chart_widgets_22_tab_content_1">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-wrap flex-md-nowrap">
                                <!--begin::Items-->
                                <div class="me-md-5 w-100">
                                    <!--begin::Item-->
                                    <div class="d-flex border border-gray-300 border-dashed rounded p-6 mb-6">
                                        <!--begin::Block-->
                                        <div class="d-flex align-items-center flex-grow-1 me-2 me-sm-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-50px me-4">
                                                <span class="symbol-label">
                                                    <i class="ki-outline ki-timer fs-2qx text-primary"></i>
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Section-->
                                            <div class="me-2">
                                                <a href="#"
                                                    class="text-gray-800 text-hover-primary fs-6 fw-bold">Attendance</a>
                                                <span class="text-gray-500 fw-bold d-block fs-7">Great, you always attending
                                                    class. keep it up</span>
                                            </div>
                                            <!--end::Section-->
                                        </div>
                                        <!--end::Block-->
                                        <!--begin::Info-->
                                        <div class="d-flex align-items-center">
                                            <span class="text-gray-900 fw-bolder fs-2x">73</span>
                                            <span class="fw-semibold fs-2 text-gray-600 mx-1 pt-1">/</span>
                                            <span class="text-gray-600 fw-semibold fs-2 me-3 pt-2">76</span>
                                            <span
                                                class="badge badge-lg badge-light-success align-self-center px-2">95%</span>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex border border-gray-300 border-dashed rounded p-6 mb-6">
                                        <!--begin::Block-->
                                        <div class="d-flex align-items-center flex-grow-1 me-2 me-sm-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-50px me-4">
                                                <span class="symbol-label">
                                                    <i class="ki-outline ki-element-11 fs-2qx text-primary"></i>
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Section-->
                                            <div class="me-2">
                                                <a href="#"
                                                    class="text-gray-800 text-hover-primary fs-6 fw-bold">Homeworks</a>
                                                <span class="text-gray-500 fw-bold d-block fs-7">Don’t forget to turn in
                                                    your task</span>
                                            </div>
                                            <!--end::Section-->
                                        </div>
                                        <!--end::Block-->
                                        <!--begin::Info-->
                                        <div class="d-flex align-items-center">
                                            <span class="text-gray-900 fw-bolder fs-2x">207</span>
                                            <span class="fw-semibold fs-2 text-gray-600 mx-1 pt-1">/</span>
                                            <span class="text-gray-600 fw-semibold fs-2 me-3 pt-2">214</span>
                                            <span
                                                class="badge badge-lg badge-light-success align-self-center px-2">92%</span>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex border border-gray-300 border-dashed rounded p-6 mb-6">
                                        <!--begin::Block-->
                                        <div class="d-flex align-items-center flex-grow-1 me-2 me-sm-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-50px me-4">
                                                <span class="symbol-label">
                                                    <i class="ki-outline ki-abstract-24 fs-2qx text-primary"></i>
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Section-->
                                            <div class="me-2">
                                                <a href="#"
                                                    class="text-gray-800 text-hover-primary fs-6 fw-bold">Tests</a>
                                                <span class="text-gray-500 fw-bold d-block fs-7">You take 12 subjects at
                                                    this semester</span>
                                            </div>
                                            <!--end::Section-->
                                        </div>
                                        <!--end::Block-->
                                        <!--begin::Info-->
                                        <div class="d-flex align-items-center">
                                            <span class="text-gray-900 fw-bolder fs-2x">27</span>
                                            <span class="fw-semibold fs-2 text-gray-600 mx-1 pt-1">/</span>
                                            <span class="text-gray-600 fw-semibold fs-2 me-3 pt-2">38</span>
                                            <span
                                                class="badge badge-lg badge-light-warning align-self-center px-2">80%</span>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Items-->
                                <!--begin::Container-->
                                <div
                                    class="d-flex justify-content-between flex-column w-225px w-md-600px mx-auto mx-md-0 pt-3 pb-10">
                                    <!--begin::Title-->
                                    <div class="fs-4 fw-bold text-gray-900 text-center mb-5">Session Attendance
                                        <br />for Current Academic Year
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Chart-->
                                    <div id="kt_chart_widgets_22_chart_1" class="mx-auto mb-4"></div>
                                    <!--end::Chart-->
                                    <!--begin::Labels-->
                                    <div class="mx-auto">
                                        <!--begin::Label-->
                                        <div class="d-flex align-items-center mb-2">
                                            <!--begin::Bullet-->
                                            <div class="bullet bullet-dot w-8px h-7px bg-success me-2"></div>
                                            <!--end::Bullet-->
                                            <!--begin::Label-->
                                            <div class="fs-8 fw-semibold text-muted">Precent(133)</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Label-->
                                        <!--begin::Label-->
                                        <div class="d-flex align-items-center mb-2">
                                            <!--begin::Bullet-->
                                            <div class="bullet bullet-dot w-8px h-7px bg-primary me-2"></div>
                                            <!--end::Bullet-->
                                            <!--begin::Label-->
                                            <div class="fs-8 fw-semibold text-muted">Illness(9)</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Label-->
                                        <!--begin::Label-->
                                        <div class="d-flex align-items-center mb-2">
                                            <!--begin::Bullet-->
                                            <div class="bullet bullet-dot w-8px h-7px bg-info me-2"></div>
                                            <!--end::Bullet-->
                                            <!--begin::Label-->
                                            <div class="fs-8 fw-semibold text-muted">Late(2)</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Label-->
                                        <!--begin::Label-->
                                        <div class="d-flex align-items-center mb-2">
                                            <!--begin::Bullet-->
                                            <div class="bullet bullet-dot w-8px h-7px bg-danger me-2"></div>
                                            <!--end::Bullet-->
                                            <!--begin::Label-->
                                            <div class="fs-8 fw-semibold text-muted">Absent(3)</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Labels-->
                                </div>
                                <!--end::Container-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Tap pane-->
                        <!--begin::Tap pane-->
                        <div class="tab-pane fade" id="kt_chart_widgets_22_tab_content_2">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-wrap flex-md-nowrap">
                                <!--begin::Items-->
                                <div class="me-md-5 w-100">
                                    <!--begin::Item-->
                                    <div class="d-flex border border-gray-300 border-dashed rounded p-6 mb-6">
                                        <!--begin::Block-->
                                        <div class="d-flex align-items-center flex-grow-1 me-2 me-sm-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-50px me-4">
                                                <span class="symbol-label">
                                                    <i class="ki-outline ki-element-11 fs-2qx text-primary"></i>
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Section-->
                                            <div class="me-2">
                                                <a href="#"
                                                    class="text-gray-800 text-hover-primary fs-6 fw-bold">Homeworks</a>
                                                <span class="text-gray-500 fw-bold d-block fs-7">Don’t forget to turn in
                                                    your task</span>
                                            </div>
                                            <!--end::Section-->
                                        </div>
                                        <!--end::Block-->
                                        <!--begin::Info-->
                                        <div class="d-flex align-items-center">
                                            <span class="text-gray-900 fw-bolder fs-2x">423</span>
                                            <span class="fw-semibold fs-2 text-gray-600 mx-1 pt-1">/</span>
                                            <span class="text-gray-600 fw-semibold fs-2 me-3 pt-2">154</span>
                                            <span
                                                class="badge badge-lg badge-light-danger align-self-center px-2">74%</span>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex border border-gray-300 border-dashed rounded p-6 mb-6">
                                        <!--begin::Block-->
                                        <div class="d-flex align-items-center flex-grow-1 me-2 me-sm-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-50px me-4">
                                                <span class="symbol-label">
                                                    <i class="ki-outline ki-abstract-24 fs-2qx text-primary"></i>
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Section-->
                                            <div class="me-2">
                                                <a href="#"
                                                    class="text-gray-800 text-hover-primary fs-6 fw-bold">Tests</a>
                                                <span class="text-gray-500 fw-bold d-block fs-7">You take 12 subjects at
                                                    this semester</span>
                                            </div>
                                            <!--end::Section-->
                                        </div>
                                        <!--end::Block-->
                                        <!--begin::Info-->
                                        <div class="d-flex align-items-center">
                                            <span class="text-gray-900 fw-bolder fs-2x">43</span>
                                            <span class="fw-semibold fs-2 text-gray-600 mx-1 pt-1">/</span>
                                            <span class="text-gray-600 fw-semibold fs-2 me-3 pt-2">53</span>
                                            <span class="badge badge-lg badge-light-info align-self-center px-2">65%</span>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex border border-gray-300 border-dashed rounded p-6 mb-6">
                                        <!--begin::Block-->
                                        <div class="d-flex align-items-center flex-grow-1 me-2 me-sm-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-50px me-4">
                                                <span class="symbol-label">
                                                    <i class="ki-outline ki-timer fs-2qx text-primary"></i>
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Section-->
                                            <div class="me-2">
                                                <a href="#"
                                                    class="text-gray-800 text-hover-primary fs-6 fw-bold">Attendance</a>
                                                <span class="text-gray-500 fw-bold d-block fs-7">Great, you always
                                                    attending class. keep it up</span>
                                            </div>
                                            <!--end::Section-->
                                        </div>
                                        <!--end::Block-->
                                        <!--begin::Info-->
                                        <div class="d-flex align-items-center">
                                            <span class="text-gray-900 fw-bolder fs-2x">53</span>
                                            <span class="fw-semibold fs-2 text-gray-600 mx-1 pt-1">/</span>
                                            <span class="text-gray-600 fw-semibold fs-2 me-3 pt-2">94</span>
                                            <span
                                                class="badge badge-lg badge-light-primary align-self-center px-2">87%</span>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Items-->
                                <!--begin::Container-->
                                <div
                                    class="d-flex justify-content-between flex-column w-225px w-md-600px mx-auto mx-md-0 pt-3 pb-10">
                                    <!--begin::Title-->
                                    <div class="fs-4 fw-bold text-gray-900 text-center mb-5">Session Attendance
                                        <br />for Current Academic Year
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Chart-->
                                    <div id="kt_chart_widgets_22_chart_2" class="mx-auto mb-4"></div>
                                    <!--end::Chart-->
                                    <!--begin::Labels-->
                                    <div class="mx-auto">
                                        <!--begin::Label-->
                                        <div class="d-flex align-items-center mb-2">
                                            <!--begin::Bullet-->
                                            <div class="bullet bullet-dot w-8px h-7px bg-success me-2"></div>
                                            <!--end::Bullet-->
                                            <!--begin::Label-->
                                            <div class="fs-8 fw-semibold text-muted">Precent(133)</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Label-->
                                        <!--begin::Label-->
                                        <div class="d-flex align-items-center mb-2">
                                            <!--begin::Bullet-->
                                            <div class="bullet bullet-dot w-8px h-7px bg-primary me-2"></div>
                                            <!--end::Bullet-->
                                            <!--begin::Label-->
                                            <div class="fs-8 fw-semibold text-muted">Illness(9)</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Label-->
                                        <!--begin::Label-->
                                        <div class="d-flex align-items-center mb-2">
                                            <!--begin::Bullet-->
                                            <div class="bullet bullet-dot w-8px h-7px bg-info me-2"></div>
                                            <!--end::Bullet-->
                                            <!--begin::Label-->
                                            <div class="fs-8 fw-semibold text-muted">Late(2)</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Label-->
                                        <!--begin::Label-->
                                        <div class="d-flex align-items-center mb-2">
                                            <!--begin::Bullet-->
                                            <div class="bullet bullet-dot w-8px h-7px bg-danger me-2"></div>
                                            <!--end::Bullet-->
                                            <!--begin::Label-->
                                            <div class="fs-8 fw-semibold text-muted">Absent(3)</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Labels-->
                                </div>
                                <!--end::Container-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Tap pane-->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-4">
            <div class="card card-flush h-xl-100">
                <!--begin::Header-->
                <div class="card-header pt-7">
                    <!--begin::Title-->
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-gray-900">Departments</span>
                        <span class="text-gray-500 pt-2 fw-semibold fs-6">Performance & achievements</span>
                    </h3>
                    <!--end::Title-->
                    <!--begin::Toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Menu-->
                        <button class="btn btn-icon btn-color-gray-500 btn-active-color-primary justify-content-end"
                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                            data-kt-menu-overflow="true">
                            <i class="ki-outline ki-dots-square fs-1 text-gray-500 me-n1"></i>
                        </button>
                        <!--begin::Menu 3-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3"
                            data-kt-menu="true">
                            <!--begin::Heading-->
                            <div class="menu-item px-3">
                                <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Payments</div>
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
                            <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end">
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
                                            <label class="form-check form-switch form-check-custom form-check-solid">
                                                <!--begin::Input-->
                                                <input class="form-check-input w-30px h-20px" type="checkbox"
                                                    value="1" checked="checked" name="notifications" />
                                                <!--end::Input-->
                                                <!--end::Label-->
                                                <span class="form-check-label text-muted fs-6">Recuring</span>
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
                    <!--end::Toolbar-->
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-5">
                    <!--begin::Chart container-->
                    <div id="kt_charts_widget_14_chart" class="w-100 h-350px"></div>
                    <!--end::Chart container-->
                </div>
                <!--end::Body-->
            </div>
        </div>
    </div>
@endsection

@push('footerScripts')
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="assets/js/widgets.bundle.js"></script>
    <script src="assets/js/custom/widgets.js"></script>
@endpush
