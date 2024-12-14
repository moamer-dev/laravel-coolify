@php
    $user = Auth::user()->load('profile');
@endphp
@extends('layouts.dashboard')
@section('content')
    <div id="kt_app_content" class="app-content bg-red">
        <!--begin::Row-->
        <div class="row g-5 g-xxl-10">
            <!--begin::Col-->
            <div class="col-xxl-4 mb-xxl-10 bg-gray-100 pt-4 rounded-1">
                <!--begin::Card Widget 22-->
                <div class="card card-reset mb-5 mb-xl-10">
                    <!--begin::Body-->
                    <div class="card-body p-0">
                        <!--begin::Row-->
                        <div class="row g-5 g-lg-9">
                            <!--begin::Col-->
                            <div class="col-6">
                                <!--begin::Card-->
                                <div class="card card-shadow">
                                    <!--begin::Body-->
                                    <div class="card-body p-0">
                                        <!--begin::Items-->
                                        <a href="{{ route('profile.overview') }}"
                                            class="btn btn-active-color-primary px-7 py-6 text-start w-100">
                                            <!--begin::Icon-->
                                            <i class="ki-outline ki-plus-square fs-2x fs-lg-2hx text-gray-500 ms-n1"></i>
                                            <!--end::Icon-->
                                            <!--begin::Desc-->
                                            <div class="fw-bold fs-5 pt-4">Profile</div>
                                            <!--end::Desc-->
                                        </a>
                                        <!--end::Items-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Card-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-6">
                                <!--begin::Card-->
                                <div class="card card-shadow">
                                    <!--begin::Body-->
                                    <div class="card-body p-0">
                                        <!--begin::Items-->
                                        <a href="{{ route('profile.settings') }}"
                                            class="btn btn-active-color-primary px-7 py-6 text-start w-100">
                                            <!--begin::Icon-->
                                            <i class="ki-outline ki-element-11 fs-2x fs-lg-2hx text-gray-500 ms-n1"></i>
                                            <!--end::Icon-->
                                            <!--begin::Desc-->
                                            <div class="fw-bold fs-5 pt-4">
                                                Settings
                                            </div>
                                            <!--end::Desc-->
                                        </a>
                                        <!--end::Items-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Card-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-6">
                                <!--begin::Card-->
                                <div class="card card-shadow">
                                    <!--begin::Body-->
                                    <div class="card-body p-0">
                                        <!--begin::Items-->
                                        <a href="pages/contact.html"
                                            class="btn btn-active-color-primary px-7 py-6 text-start w-100">
                                            <!--begin::Icon-->
                                            <i class="ki-outline ki-message-edit fs-2x fs-lg-2hx text-gray-500 ms-n1"></i>
                                            <!--end::Icon-->
                                            <!--begin::Desc-->
                                            <div class="fw-bold fs-5 pt-4">
                                                Courses
                                            </div>
                                            <!--end::Desc-->
                                        </a>
                                        <!--end::Items-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Card-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-6">
                                <!--begin::Card-->
                                <div class="card card-shadow">
                                    <!--begin::Body-->
                                    <div class="card-body p-0">
                                        <!--begin::Items-->
                                        <a href="apps/file-manager/folders.html"
                                            class="btn btn-active-color-primary px-7 py-6 text-start w-100">
                                            <!--begin::Icon-->
                                            <i class="ki-outline ki-rocket fs-2x fs-lg-2hx text-gray-500 ms-n1"></i>
                                            <!--end::Icon-->
                                            <!--begin::Desc-->
                                            <div class="fw-bold fs-5 pt-4">
                                                Projects
                                            </div>
                                            <!--end::Desc-->
                                        </a>
                                        <!--end::Items-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Card-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-6">
                                <!--begin::Card-->
                                <div class="card card-shadow">
                                    <!--begin::Body-->
                                    <div class="card-body p-0">
                                        <!--begin::Items-->
                                        <a href="apps/subscriptions/list.html"
                                            class="btn btn-active-color-primary px-7 py-6 text-start w-100">
                                            <!--begin::Icon-->
                                            <i class="ki-outline ki-chart-pie-3 fs-2x fs-lg-2hx text-gray-500 ms-n1"></i>
                                            <!--end::Icon-->
                                            <!--begin::Desc-->
                                            <div class="fw-bold fs-5 pt-4">
                                                Subscriptions
                                            </div>
                                            <!--end::Desc-->
                                        </a>
                                        <!--end::Items-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Card-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-6">
                                <!--begin::Card-->
                                <div class="card card-shadow">
                                    <!--begin::Body-->
                                    <div class="card-body p-0">
                                        <!--begin::Items-->
                                        <a href="apps/support-center/overview.html"
                                            class="btn btn-active-color-primary px-7 py-6 text-start w-100">
                                            <!--begin::Icon-->
                                            <i class="ki-outline ki-rescue fs-2x fs-lg-2hx text-gray-500 ms-n1"></i>
                                            <!--end::Icon-->
                                            <!--begin::Desc-->
                                            <div class="fw-bold fs-5 pt-4">
                                                Help Center
                                            </div>
                                            <!--end::Desc-->
                                        </a>
                                        <!--end::Items-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Card-->
                            </div>
                            <!--end::Col-->
                        </div>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card Widget 22-->
                <!--begin::Card Widget 23-->
                <div class="card border-0">
                    <!--begin::Body-->
                    <div class="card-body py-12">
                        <!--begin::Action-->
                        <button class="btn btn-light-warning fs-3 fw-bolder w-100 py-5 mb-13" data-bs-toggle="modal"
                            data-bs-target="#kt_modal_create_app">
                            Campaign Glossary
                        </button>
                        <!--end::Action-->
                        <!--begin::Block-->
                        <div class="d-flex border border-primary border-dashed rounded p-5 bg-light-primary mb-6">
                            <!--begin::Icon-->
                            <span class="me-5">
                                <i class="ki-outline ki-information fs-3x text-primary"></i>
                            </span>
                            <!--end::Icon-->
                            <!--begin::Section-->
                            <div class="me-2">
                                <a href="#" class="text-gray-800 text-hover-primary fs-4 fw-bolder">Important
                                    Note!</a>
                                <span class="text-gray-700 fw-semibold d-block fs-5">Please add tracking code to
                                    your website to
                                    optimize your campaigns</span>
                            </div>
                            <!--end::Section-->
                        </div>
                        <!--end::Block-->
                        <!--begin::Action-->
                        <button class="btn btn-primary fs-3 fw-bolder w-100 py-5" data-bs-toggle="modal"
                            data-bs-target="#kt_modal_new_card">
                            Add Conversion Tracking
                        </button>
                        <!--end::Action-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card Widget 23-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xxl-8 mb-5 mb-xl-10">
                <!--begin::Engage widget 14-->
                <div class="card border-0 mb-5 mb-xl-11" data-bs-theme="light" style="background-color: #844aff">
                    <!--begin::Body-->
                    <div class="card-body py-0">
                        <!--begin::Row-->
                        <div class="row align-items-center lh-1 h-100">
                            <!--begin::Col-->
                            <div class="col-7 ps-xl-10 pe-5">
                                <!--begin::Title-->
                                <div class="fs-2qx fw-bold text-white mb-6">
                                    Welcome {{ $user->name }}
                                </div>
                                <!--end::Title-->
                                <!--begin::Text-->
                                <span class="fw-semibold text-white fs-6 mb-10 d-block opacity-75">Flat cartoony and
                                    illustrations with vivid
                                    unblended purple hair lady</span>
                                <!--end::Text-->
                                <!--begin::Items-->
                                <div class="d-flex align-items-center flex-wrap d-grid gap-2 mb-9">
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center me-5 me-xl-13">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-30px symbol-circle me-3">
                                            <span class="symbol-label" style="background: rgba(255, 255, 255, 0.1); ">
                                                <i class="ki-outline ki-abstract-41 fs-5 text-white"></i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Info-->
                                        <div class="text-white">
                                            <span class="fw-semibold d-block fs-8 opacity-75 mb-2">Projects</span>
                                            <span class="fw-bold fs-7">Up to 500</span>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-30px symbol-circle me-3">
                                            <span class="symbol-label" style="background: rgba(255, 255, 255, 0.1);">
                                                <i class="ki-outline ki-abstract-26 fs-5 text-white"></i>
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Info-->
                                        <div class="text-white">
                                            <span class="fw-semibold opacity-75 d-block fs-8 mb-2">Tasks</span>
                                            <span class="fw-bold fs-7">Unlimited</span>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Items-->
                                <div class="d-flex align-items-center flex-wrap d-grid gap-2 mb-9">
                                    <a href="#" class="bookmark text-white">
                                        <i class="fe fe-bookmark fs-4 me-2"></i>
                                        Bookmark
                                    </a>

                                    <span class="text-white ms-3">
                                        <i class="fe fe-user"></i>
                                        1200 Enrolled
                                    </span>
                                    <div>
                                        <span class="fs-6 ms-4 align-text-top">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                        </span>
                                        <span class="text-white">(140)</span>
                                    </div>
                                    <span class="text-white ms-4 d-none d-md-block">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect x="3" y="8" width="2" height="6" rx="1"
                                                fill="#DBD8E9"></rect>
                                            <rect x="7" y="5" width="2" height="9" rx="1"
                                                fill="#DBD8E9"></rect>
                                            <rect x="11" y="2" width="2" height="12" rx="1"
                                                fill="#DBD8E9"></rect>
                                        </svg>
                                        <span class="align-middle">Intermediate</span>
                                    </span>
                                </div>
                                <!--begin::Action-->
                                <div class="d-flex d-grid gap-2 mt-7">
                                    <a href="#" class="btn btn-success me-lg-2" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_upgrade_plan">Upgrade</a>
                                    <a href="#" class="btn text-white" style="background: rgba(255, 255, 255, 0.2)"
                                        data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Help</a>
                                </div>
                                <!--end::Action-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-5 pt-5 pt-lg-15">
                                <!--begin::Illustration-->
                                <div class="bgi-no-repeat bgi-size-contain bgi-position-x-end bgi-position-y-bottom h-325px"
                                    style="background-image:url('{{ asset('assets') }}/media/svg/illustrations/easy/8.svg">
                                </div>
                                <!--end::Illustration-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Engage widget 14-->
                <!--begin::Table widget 17-->
                <div class="card card-flush border-0">
                    <!--begin::Header-->
                    <div class="card-header pt-7">
                        <!--begin::Title-->
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fs-3 fw-bold text-gray-800">Campaigns</span>
                            <span class="text-gray-500 mt-1 fw-semibold fs-6">Select a campaign &amp; date range to
                                view data</span>
                        </h3>
                        <!--end::Title-->
                        <!--begin::Toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Daterangepicker(defined in src/js/layout/app.js)-->
                            <div data-kt-daterangepicker="true" data-kt-daterangepicker-opens="left"
                                class="btn btn-sm btn-light d-flex align-items-center px-4" data-kt-initialized="1">
                                <!--begin::Display range-->
                                <div class="text-gray-600 fw-bold">15 Nov 2024 - 14 Dec 2024</div>
                                <!--end::Display range-->
                                <i class="ki-outline ki-calendar-8 fs-1 ms-2 me-0"></i>
                            </div>
                            <!--end::Daterangepicker-->
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-6">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table table-row-dashed align-middle gs-0 gy-6 my-0">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="fs-7 fw-bold text-gray-500">
                                        <th class="p-0 pb-3 w-150px text-start">
                                            STATUS
                                        </th>
                                        <th class="p-0 pb-3 min-w-100px text-start">
                                            NAME
                                        </th>
                                        <th class="p-0 pb-3 min-w-100px text-center">
                                            BUDGET
                                        </th>
                                        <th class="p-0 pb-3 w-250px text-start">
                                            OPTIMIZATION SCORE
                                        </th>
                                        <th class="p-0 pb-3 w-50px text-end">
                                            ACTION
                                        </th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                    <tr>
                                        <td>
                                            <span class="badge py-3 px-4 fs-7 badge-light-success">Live Now</span>
                                        </td>
                                        <td class="ps-0 text-start">
                                            <span class="text-gray-800 fw-bold fs-6 d-block">Marni Schlanger</span>
                                            <span class="text-gray-500 fw-semibold fs-7">20 Jul 2021</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-gray-800 fw-bold fs-6">$15</span>
                                            <span class="text-gray-500 fw-bold fs-7 d-block">Daily</span>
                                        </td>
                                        <td class="ps-0 pe-20">
                                            <div class="progress bg-light-primary rounded">
                                                <div class="progress-bar bg-primary rounded m-0" role="progressbar"
                                                    style="height: 12px; width: 120px" aria-valuenow="120"
                                                    aria-valuemin="0" aria-valuemax="120px">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <a href="#"
                                                class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                                <i class="ki-outline ki-black-right fs-2 text-gray-500"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="badge py-3 px-4 fs-7 badge-light-primary">Reviewing</span>
                                        </td>
                                        <td class="ps-0 text-start">
                                            <span class="text-gray-800 fw-bold fs-6 d-block">Addison Smart</span>
                                            <span class="text-gray-500 fw-semibold fs-7">19 Jul 2021</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-gray-800 fw-bold fs-6">$10</span>
                                            <span class="text-gray-500 fw-bold fs-7 d-block">Daily</span>
                                        </td>
                                        <td class="ps-0 pe-20">
                                            <div class="progress bg-light-primary rounded">
                                                <div class="progress-bar bg-primary rounded m-0" role="progressbar"
                                                    style="height: 12px; width: 10px" aria-valuenow="10"
                                                    aria-valuemin="0" aria-valuemax="10px">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <a href="#"
                                                class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                                <i class="ki-outline ki-black-right fs-2 text-gray-500"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="badge py-3 px-4 fs-7 badge-light-warning">Paused</span>
                                        </td>
                                        <td class="ps-0 text-start">
                                            <span class="text-gray-800 fw-bold fs-6 d-block">Paul Melone</span>
                                            <span class="text-gray-500 fw-semibold fs-7">21 Jul 2021</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-gray-800 fw-bold fs-6">$3</span>
                                            <span class="text-gray-500 fw-bold fs-7 d-block">Daily</span>
                                        </td>
                                        <td class="ps-0 pe-20">
                                            <div class="progress bg-light-primary rounded">
                                                <div class="progress-bar bg-primary rounded m-0" role="progressbar"
                                                    style="height: 12px; width: 60px" aria-valuenow="60"
                                                    aria-valuemin="0" aria-valuemax="60px">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <a href="#"
                                                class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                                <i class="ki-outline ki-black-right fs-2 text-gray-500"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="badge py-3 px-4 fs-7 badge-light-success">Live Now</span>
                                        </td>
                                        <td class="ps-0 text-start">
                                            <span class="text-gray-800 fw-bold fs-6 d-block">Marni Schlanger</span>
                                            <span class="text-gray-500 fw-semibold fs-7">23 Jul 2021</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-gray-800 fw-bold fs-6">$23</span>
                                            <span class="text-gray-500 fw-bold fs-7 d-block">Daily</span>
                                        </td>
                                        <td class="ps-0 pe-20">
                                            <div class="progress bg-light-primary rounded">
                                                <div class="progress-bar bg-primary rounded m-0" role="progressbar"
                                                    style="height: 12px; width: 160px" aria-valuenow="160"
                                                    aria-valuemin="0" aria-valuemax="160px">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <a href="#"
                                                class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                                <i class="ki-outline ki-black-right fs-2 text-gray-500"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                                <!--end::Table body-->
                            </table>
                        </div>
                        <!--end::Table-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed border-gray-200 mb-n4"></div>
                        <!--end::Separator-->
                        <!--begin::Pagination-->
                        <div class="d-flex flex-stack flex-wrap pt-10">
                            <div class="fs-6 fw-semibold text-gray-700">
                                Showing 1 to 10 of 50 entries
                            </div>
                            <!--begin::Pages-->
                            <ul class="pagination">
                                <li class="page-item previous">
                                    <a href="#" class="page-link">
                                        <i class="previous"></i>
                                    </a>
                                </li>
                                <li class="page-item active">
                                    <a href="#" class="page-link">1</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">2</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">3</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">4</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">5</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">6</a>
                                </li>
                                <li class="page-item next">
                                    <a href="#" class="page-link">
                                        <i class="next"></i>
                                    </a>
                                </li>
                            </ul>
                            <!--end::Pages-->
                        </div>
                        <!--end::Pagination-->
                    </div>
                    <!--end: Card Body-->
                </div>
                <!--end::Table widget 17-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->
        <!--begin::Engage widget 13-->
        <div class="row g-5 g-xl-10">
            <!--begin::Col-->
            <div class="col-xl-4">
                <!--begin::Engage widget 1-->
                <div class="card h-md-100" dir="ltr">
                    <!--begin::Body-->
                    <div class="card-body d-flex flex-column flex-center">
                        <!--begin::Heading-->
                        <div class="mb-2">
                            <!--begin::Title-->
                            <h1 class="fw-semibold text-gray-800 text-center lh-lg">Have your tried
                                <br>new
                                <span class="fw-bolder">Invoice Manager?</span>
                            </h1>
                            <!--end::Title-->
                            <!--begin::Illustration-->
                            <div class="py-10 text-center">
                                <img src="{{ asset('assets') }}/media/svg/illustrations/easy/2.svg"
                                    class="theme-light-show w-200px" alt="">
                                <img src="{{ asset('assets') }}/media/svg/illustrations/easy/2-dark.svg"
                                    class="theme-dark-show w-200px" alt="">
                            </div>
                            <!--end::Illustration-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Links-->
                        <div class="text-center mb-1">
                            <!--begin::Link-->
                            <a class="btn btn-sm btn-primary me-2" data-bs-target="#kt_modal_new_address"
                                data-bs-toggle="modal">Try
                                Now</a>
                            <!--end::Link-->
                            <!--begin::Link-->
                            <a class="btn btn-sm btn-light" href="apps/user-management/users/view.html">Learn
                                More</a>
                            <!--end::Link-->
                        </div>
                        <!--end::Links-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Engage widget 1-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-8">
                <!--begin::Timeline Widget 4-->
                <div class="card h-md-100">
                    <!--begin::Card header-->
                    <div class="card-header position-relative py-0 border-bottom-1">
                        <!--begin::Card title-->
                        <h3 class="card-title text-gray-800 fw-bold">Active Tasks</h3>
                        <!--end::Card title-->
                        <!--begin::Tabs-->
                        <ul class="nav nav-stretch nav-pills nav-pills-custom d-flex mt-4" role="tablist">
                            <!--begin::Nav item-->
                            <li class="nav-item p-0 ms-0" role="presentation">
                                <a class="nav-link btn btn-color-gray-500 flex-center px-3 active"
                                    data-kt-timeline-widget-4="tab" data-bs-toggle="tab"
                                    href="#kt_timeline_widget_4_tab_day" aria-selected="true" role="tab">
                                    <!--begin::Title-->
                                    <span class="nav-text fw-semibold fs-4 mb-3">Day</span>
                                    <!--end::Title-->
                                    <!--begin::Bullet-->
                                    <span
                                        class="bullet-custom position-absolute z-index-2 w-100 h-1px top-100 bottom-n100 bg-primary rounded"></span>
                                    <!--end::Bullet-->
                                </a>
                            </li>
                            <!--end::Nav item-->
                            <!--begin::Nav item-->
                            <li class="nav-item p-0 ms-0" role="presentation">
                                <a class="nav-link btn btn-color-gray-500 flex-center px-3"
                                    data-kt-timeline-widget-4="tab" data-bs-toggle="tab"
                                    href="#kt_timeline_widget_4_tab_week" aria-selected="false" tabindex="-1"
                                    role="tab">
                                    <!--begin::Title-->
                                    <span class="nav-text fw-semibold fs-4 mb-3">Week</span>
                                    <!--end::Title-->
                                    <!--begin::Bullet-->
                                    <span
                                        class="bullet-custom position-absolute z-index-2 w-100 h-1px top-100 bottom-n100 bg-primary rounded"></span>
                                    <!--end::Bullet-->
                                </a>
                            </li>
                            <!--end::Nav item-->
                            <!--begin::Nav item-->
                            <li class="nav-item p-0 ms-0" role="presentation">
                                <a class="nav-link btn btn-color-gray-500 flex-center px-3"
                                    data-kt-timeline-widget-4="tab" data-bs-toggle="tab"
                                    href="#kt_timeline_widget_4_tab_month" aria-selected="false" tabindex="-1"
                                    role="tab">
                                    <!--begin::Title-->
                                    <span class="nav-text fw-semibold fs-4 mb-3">Month</span>
                                    <!--end::Title-->
                                    <!--begin::Bullet-->
                                    <span
                                        class="bullet-custom position-absolute z-index-2 w-100 h-1px top-100 bottom-n100 bg-primary rounded"></span>
                                    <!--end::Bullet-->
                                </a>
                            </li>
                            <!--end::Nav item-->
                            <!--begin::Nav item-->
                            <li class="nav-item p-0 ms-0" role="presentation">
                                <a class="nav-link btn btn-color-gray-500 flex-center px-3"
                                    data-kt-timeline-widget-4="tab" data-bs-toggle="tab"
                                    href="#kt_timeline_widget_4_tab_2022" aria-selected="false" tabindex="-1"
                                    role="tab">
                                    <!--begin::Title-->
                                    <span class="nav-text fw-semibold fs-4 mb-3">2022</span>
                                    <!--end::Title-->
                                    <!--begin::Bullet-->
                                    <span
                                        class="bullet-custom position-absolute z-index-2 w-100 h-1px top-100 bottom-n100 bg-primary rounded"></span>
                                    <!--end::Bullet-->
                                </a>
                            </li>
                            <!--end::Nav item-->
                        </ul>
                        <!--end::Tabs-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pb-0">
                        <!--begin::Tab content-->
                        <div class="tab-content">
                            <!--begin::Tab pane-->
                            <div class="tab-pane active blockui" id="kt_timeline_widget_4_tab_day" role="tabpanel"
                                aria-labelledby="day-tab" data-kt-timeline-widget-4-blockui="true" style="">
                                <div class="table-responsive pb-10">
                                    <!--begin::Timeline-->
                                    <div id="kt_timeline_widget_4_1" class="vis-timeline-custom h-350px min-w-700px"
                                        data-kt-timeline-widget-4-image-root="{{ asset('assets') }}/media/"
                                        style="position: relative;">
                                        <div class="vis-timeline vis-bottom vis-ltr"
                                            style="touch-action: pan-y; user-select: none; visibility: visible; height: 354px;">
                                            <div class="vis-panel vis-background"
                                                style="height: 354px; width: 777px; left: 0px; top: 0px;"></div>
                                            <div class="vis-panel vis-background vis-vertical"
                                                style="height: 354px; width: 651px; left: 128px; top: 0px;">
                                                <div class="vis-axis" style="top: 304px; left: 0px;">
                                                    <div class="vis-group"></div>
                                                    <div class="vis-group"></div>
                                                    <div class="vis-group"></div>
                                                    <div class="vis-group"></div>
                                                </div>
                                                <div class="vis-time-axis vis-background">
                                                    <div style="width: 210.25px; height: 330px; transform: translate(-86.8053px, -1px);"
                                                        class="vis-grid vis-vertical vis-minor vis-h10  vis-today  vis-even">
                                                    </div>
                                                    <div style="width: 210.25px; height: 330px; transform: translate(123.445px, -1px);"
                                                        class="vis-grid vis-vertical vis-minor vis-h11  vis-today  vis-odd">
                                                    </div>
                                                    <div style="width: 210.25px; height: 330px; transform: translate(333.695px, -1px);"
                                                        class="vis-grid vis-vertical vis-minor vis-h12  vis-today  vis-even">
                                                    </div>
                                                    <div style="width: 210.25px; height: 330px; transform: translate(543.946px, -1px);"
                                                        class="vis-grid vis-vertical vis-minor vis-h13  vis-today  vis-odd">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="vis-panel vis-background vis-horizontal"
                                                style="height: 305px; width: 777px; left: 0px; top: -1px;"></div>
                                            <div class="vis-panel vis-center"
                                                style="touch-action: pan-y; user-select: none; height: 305px; width: 651px; left: 127px; top: -1px;">
                                                <div class="vis-content" style="left: 0px; transform: translateY(0px);">
                                                    <div class="vis-itemset" style="height: 303px;">
                                                        <div class="vis-background">
                                                            <div class="vis-group" style="height: 0px;">
                                                                <div style="visibility: hidden; position: absolute;">
                                                                </div>
                                                            </div>
                                                            <div class="vis-group" style="height: 75px;">
                                                                <div style="visibility: hidden; position: absolute;">
                                                                </div>
                                                            </div>
                                                            <div class="vis-group" style="height: 75px;">
                                                                <div style="visibility: hidden; position: absolute;">
                                                                </div>
                                                            </div>
                                                            <div class="vis-group" style="height: 75px;">
                                                                <div style="visibility: hidden; position: absolute;">
                                                                </div>
                                                            </div>
                                                            <div class="vis-group" style="height: 78px;">
                                                                <div style="visibility: hidden; position: absolute;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="vis-foreground">
                                                            <div class="vis-group" style="height: 75px;">
                                                                <div class="vis-item vis-range vis-readonly"
                                                                    style="transform: translateX(10.1244px); width: 315.376px; top: 17.5px;">
                                                                    <div class="vis-item-overflow">
                                                                        <div class="vis-item-content"
                                                                            style="transform: translateX(0px);">
                                                                            <div
                                                                                class="rounded-pill bg-light-primary d-flex align-items-center position-relative h-40px w-100 p-2 overflow-hidden">
                                                                                <div class="position-absolute rounded-pill d-block bg-primary start-0 top-0 h-100 z-index-1"
                                                                                    style="width:60%;"></div>

                                                                                <div
                                                                                    class="d-flex align-items-center position-relative z-index-2">
                                                                                    <div
                                                                                        class="symbol-group symbol-hover flex-nowrap me-3">
                                                                                        <div
                                                                                            class="symbol symbol-circle symbol-25px">
                                                                                            <img alt=""
                                                                                                src="{{ asset('assets') }}/media/avatars/300-6.jpg">
                                                                                        </div>
                                                                                        <div
                                                                                            class="symbol symbol-circle symbol-25px">
                                                                                            <img alt=""
                                                                                                src="{{ asset('assets') }}/media/avatars/300-1.jpg">
                                                                                        </div>
                                                                                    </div>

                                                                                    <a href="#"
                                                                                        class="fw-bold text-white text-hover-dark">Meeting</a>
                                                                                </div>

                                                                                <div
                                                                                    class="d-flex flex-center bg-body rounded-pill fs-7 fw-bolder ms-auto h-100 px-3 position-relative z-index-2">
                                                                                    60%
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="vis-item-visible-frame"></div>
                                                                </div>
                                                            </div>
                                                            <div class="vis-group" style="height: 75px;">
                                                                <div class="vis-item vis-range vis-readonly"
                                                                    style="transform: translateX(220.375px); width: 210.25px; top: 17.5px;">
                                                                    <div class="vis-item-overflow">
                                                                        <div class="vis-item-content"
                                                                            style="transform: translateX(0px);">
                                                                            <div
                                                                                class="rounded-pill bg-light-success d-flex align-items-center position-relative h-40px w-100 p-2 overflow-hidden">
                                                                                <div class="position-absolute rounded-pill d-block bg-success start-0 top-0 h-100 z-index-1"
                                                                                    style="width:47%;"></div>

                                                                                <div
                                                                                    class="d-flex align-items-center position-relative z-index-2">
                                                                                    <div
                                                                                        class="symbol-group symbol-hover flex-nowrap me-3">
                                                                                        <div
                                                                                            class="symbol symbol-circle symbol-25px">
                                                                                            <img alt=""
                                                                                                src="{{ asset('assets') }}/media/avatars/300-2.jpg">
                                                                                        </div>
                                                                                    </div>

                                                                                    <a href="#"
                                                                                        class="fw-bold text-white text-hover-dark">Testing</a>
                                                                                </div>

                                                                                <div
                                                                                    class="d-flex flex-center bg-body rounded-pill fs-7 fw-bolder ms-auto h-100 px-3 position-relative z-index-2">
                                                                                    47%
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="vis-item-visible-frame"></div>
                                                                </div>
                                                            </div>
                                                            <div class="vis-group" style="height: 75px;">
                                                                <div class="vis-item vis-range vis-readonly"
                                                                    style="transform: translateX(115.25px); width: 420.501px; top: 17.5px;">
                                                                    <div class="vis-item-overflow">
                                                                        <div class="vis-item-content"
                                                                            style="transform: translateX(0px);">
                                                                            <div
                                                                                class="rounded-pill bg-light-danger d-flex align-items-center position-relative h-40px w-100 p-2 overflow-hidden">
                                                                                <div class="position-absolute rounded-pill d-block bg-danger start-0 top-0 h-100 z-index-1"
                                                                                    style="width:55%;"></div>

                                                                                <div
                                                                                    class="d-flex align-items-center position-relative z-index-2">
                                                                                    <div
                                                                                        class="symbol-group symbol-hover flex-nowrap me-3">
                                                                                        <div
                                                                                            class="symbol symbol-circle symbol-25px">
                                                                                            <img alt=""
                                                                                                src="{{ asset('assets') }}/media/avatars/300-5.jpg">
                                                                                        </div>
                                                                                        <div
                                                                                            class="symbol symbol-circle symbol-25px">
                                                                                            <img alt=""
                                                                                                src="{{ asset('assets') }}/media/avatars/300-20.jpg">
                                                                                        </div>
                                                                                    </div>

                                                                                    <a href="#"
                                                                                        class="fw-bold text-white text-hover-dark">Landing
                                                                                        page</a>
                                                                                </div>

                                                                                <div
                                                                                    class="d-flex flex-center bg-body rounded-pill fs-7 fw-bolder ms-auto h-100 px-3 position-relative z-index-2">
                                                                                    55%
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="vis-item-visible-frame"></div>
                                                                </div>
                                                            </div>
                                                            <div class="vis-group" style="height: 78px;">
                                                                <div class="vis-item vis-range vis-readonly"
                                                                    style="transform: translateX(325.5px); width: 315.376px; top: 18px;">
                                                                    <div class="vis-item-overflow">
                                                                        <div class="vis-item-content"
                                                                            style="transform: translateX(0px);">
                                                                            <div
                                                                                class="rounded-pill bg-light-info d-flex align-items-center position-relative h-40px w-100 p-2 overflow-hidden">
                                                                                <div class="position-absolute rounded-pill d-block bg-info start-0 top-0 h-100 z-index-1"
                                                                                    style="width:75%;"></div>

                                                                                <div
                                                                                    class="d-flex align-items-center position-relative z-index-2">
                                                                                    <div
                                                                                        class="symbol-group symbol-hover flex-nowrap me-3">
                                                                                        <div
                                                                                            class="symbol symbol-circle symbol-25px">
                                                                                            <img alt=""
                                                                                                src="{{ asset('assets') }}/media/avatars/300-23.jpg">
                                                                                        </div>
                                                                                        <div
                                                                                            class="symbol symbol-circle symbol-25px">
                                                                                            <img alt=""
                                                                                                src="{{ asset('assets') }}/media/avatars/300-12.jpg">
                                                                                        </div>
                                                                                        <div
                                                                                            class="symbol symbol-circle symbol-25px">
                                                                                            <img alt=""
                                                                                                src="{{ asset('assets') }}/media/avatars/300-9.jpg">
                                                                                        </div>
                                                                                    </div>

                                                                                    <a href="#"
                                                                                        class="fw-bold text-white text-hover-dark">Products
                                                                                        module</a>
                                                                                </div>

                                                                                <div
                                                                                    class="d-flex flex-center bg-body rounded-pill fs-7 fw-bolder ms-auto h-100 px-3 position-relative z-index-2">
                                                                                    75%
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="vis-item-visible-frame"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="vis-shadow vis-top" style="visibility: hidden;"></div>
                                                <div class="vis-shadow vis-bottom" style="visibility: hidden;">
                                                </div>
                                            </div>
                                            <div class="vis-panel vis-left"
                                                style="touch-action: none; user-select: none; height: 305px; left: 0px; top: -1px;">
                                                <div class="vis-content" style="left: 0px; top: 0px;">
                                                    <div class="vis-labelset">
                                                        <div class="vis-label vis-group-level-0" title=""
                                                            style="height: 75px;">
                                                            <div class="vis-inner">Research</div>
                                                        </div>
                                                        <div class="vis-label vis-group-level-0" title=""
                                                            style="height: 75px;">
                                                            <div class="vis-inner">Phase 2.6 QA</div>
                                                        </div>
                                                        <div class="vis-label vis-group-level-0" title=""
                                                            style="height: 75px;">
                                                            <div class="vis-inner">UI Design</div>
                                                        </div>
                                                        <div class="vis-label vis-group-level-0" title=""
                                                            style="height: 78px;">
                                                            <div class="vis-inner">Development</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="vis-shadow vis-top" style="visibility: hidden;"></div>
                                                <div class="vis-shadow vis-bottom" style="visibility: hidden;">
                                                </div>
                                            </div>
                                            <div class="vis-panel vis-right"
                                                style="height: 305px; left: 778px; top: -1px;">
                                                <div class="vis-content" style="left: 0px; top: 0px;"></div>
                                                <div class="vis-shadow vis-top" style="visibility: hidden;"></div>
                                                <div class="vis-shadow vis-bottom" style="visibility: hidden;">
                                                </div>
                                            </div>
                                            <div class="vis-panel vis-top" style="width: 651px; left: 127px; top: 0px;">
                                            </div>
                                            <div class="vis-panel vis-bottom"
                                                style="width: 651px; left: 127px; top: 304px;">
                                                <div class="vis-time-axis vis-foreground" style="height: 50px;">
                                                    <div class="vis-text vis-minor vis-measure"
                                                        style="position: absolute;">0
                                                    </div>
                                                    <div class="vis-text vis-major vis-measure"
                                                        style="position: absolute;">0
                                                    </div>
                                                    <div style="transform: translate(-86.3053px); width: 210.25px;"
                                                        class="vis-text vis-minor vis-h10  vis-today  vis-even">
                                                        10:00</div>
                                                    <div style="transform: translate(123.945px); width: 210.25px;"
                                                        class="vis-text vis-minor vis-h11  vis-today  vis-odd">
                                                        11:00</div>
                                                    <div style="transform: translate(334.195px); width: 210.25px;"
                                                        class="vis-text vis-minor vis-h12  vis-today  vis-even">
                                                        12:00</div>
                                                    <div style="transform: translate(544.446px); width: 210.25px;"
                                                        class="vis-text vis-minor vis-h13  vis-today  vis-odd">
                                                        13:00</div>
                                                    <div class="vis-text vis-major vis-h13  vis-today  vis-odd"
                                                        style="transform: translate(0px, 25px);">
                                                        <div>Sat 16 March</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="vis-rolling-mode-btn" style="visibility: hidden;"></div>
                                        </div>
                                    </div>
                                    <!--end::Timeline-->
                                </div>
                            </div>
                            <!--end::Tab pane-->
                            <!--begin::Tab pane-->
                            <div class="tab-pane blockui" id="kt_timeline_widget_4_tab_week" role="tabpanel"
                                aria-labelledby="week-tab" data-kt-timeline-widget-4-blockui="true"
                                style="overflow: hidden;">
                                <div class="table-responsive pb-10">
                                    <!--begin::Timeline-->
                                    <div id="kt_timeline_widget_4_2" class="vis-timeline-custom h-350px min-w-700px"
                                        data-kt-timeline-widget-4-image-root="{{ asset('assets') }}/media/"></div>
                                    <!--end::Timeline-->
                                </div>
                                <div class="blockui-overlay bg-body" style="z-index: 1;"><span
                                        class="spinner-border text-primary"></span></div>
                            </div>
                            <!--end::Tab pane-->
                            <!--begin::Tab pane-->
                            <div class="tab-pane blockui" id="kt_timeline_widget_4_tab_month" role="tabpanel"
                                aria-labelledby="month-tab" data-kt-timeline-widget-4-blockui="true"
                                style="overflow: hidden;">
                                <div class="table-responsive pb-10">
                                    <!--begin::Timeline-->
                                    <div id="kt_timeline_widget_4_3" class="vis-timeline-custom h-350px min-w-700px"
                                        data-kt-timeline-widget-4-image-root="{{ asset('assets') }}/media/"></div>
                                    <!--end::Timeline-->
                                </div>
                                <div class="blockui-overlay bg-body" style="z-index: 1;"><span
                                        class="spinner-border text-primary"></span></div>
                            </div>
                            <!--end::Tab pane-->
                            <!--begin::Tab pane-->
                            <div class="tab-pane blockui" id="kt_timeline_widget_4_tab_2022" role="tabpanel"
                                aria-labelledby="week-tab" data-kt-timeline-widget-4-blockui="true"
                                style="overflow: hidden;">
                                <div class="table-responsive pb-10">
                                    <!--begin::Timeline-->
                                    <div id="kt_timeline_widget_4_4" class="vis-timeline-custom h-350px min-w-700px"
                                        data-kt-timeline-widget-4-image-root="{{ asset('assets') }}/media/"></div>
                                    <!--end::Timeline-->
                                </div>
                                <div class="blockui-overlay bg-body" style="z-index: 1;"><span
                                        class="spinner-border text-primary"></span></div>
                            </div>
                            <!--end::Tab pane-->
                        </div>
                        <!--end::Tab content-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Timeline Widget 1-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Engage widget 13-->
    </div>
@endsection
