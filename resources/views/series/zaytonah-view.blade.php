@extends('layouts.dashboard')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_content" class="app-content">
            <div class=" d-flex">
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <div class="d-flex flex-column flex-column-fluid">
                        <style>
                            .menu .menu-item.hover:not(.here)>.menu-link:not(.disabled):not(.active):not(.here) .menu-title,
                            .app-sidebar .menu .menu-item:not(.here) .menu-link:hover:not(.disabled):not(.active):not(.here) .menu-title {
                                color: var(--bs-component-active-bg);
                            }

                            .menu-title-gray-600 .menu-item .menu-link .menu-title {
                                color: #151617;
                            }
                        </style>
                        <div id="kt_app_content" class="app-content container">
                            <div class="row g-5 g-xxl-10">
                                <div class="col-xxl-4 mb-5 mb-xl-10">
                                    <div class="card flex-grow-1 py-4" data-kt-sticky="true"
                                        data-kt-sticky-name="app-sidebar-menu-sticky"
                                        data-kt-sticky-offset="{default: false, xl: '500px'}" data-kt-sticky-width="225px"
                                        data-kt-sticky-left="auto" data-kt-sticky-top="125px"
                                        data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
                                        <div class="hover-scroll-y mx-3 px-1 px-lg-2" data-kt-scroll="true"
                                            data-kt-scroll-activate="{default: false, lg: true}"
                                            data-kt-scroll-height="auto"
                                            data-kt-scroll-dependencies="#kt_app_header, #kt_app_toolbar, #kt_app_footer"
                                            data-kt-scroll-wrappers="#kt_app_main" data-kt-scroll-offset="5px"
                                            style="height: 650px;">
                                            <div id="kt_app_sidebar_menu" data-kt-menu="true"
                                                class=" menu menu-sub-indention menu-rounded menu-column menu-title-gray-600 menu-icon-gray-500 menu-arrow-gray-500 fw-semibold fs-6">
                                                <div class="menu-item mb-3">
                                                    <div class="menu-content">
                                                        <span
                                                            class="menu-section fs-4 fw-bolder ps-1 py-1">{{ $series->name }}</span>
                                                    </div>
                                                    <div class="separator separator-dashed my-3"></div>
                                                </div>
                                                @foreach ($series->zaytonahs->sortBy('order') as $zaytonah)
                                                    <a href="{{ route('zaytonah.view', [$series->slug, $zaytonah->id]) }}"
                                                        class="text-gray-900">
                                                        <div
                                                            class="d-flex align-items-center flex-stack flex-wrap d-grid gap-1 flex-row-fluid ps-4">
                                                            <div class="me-5">

                                                                <span
                                                                    class="fw-bold text-hover-primary fs-6  @if ($zaytonah_to_view->id == $zaytonah->id) text-primary @endif">{{ $zaytonah->name }}</span>
                                                                <span
                                                                    class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0">{{ $zaytonah->description }}</span>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <span class="badge badge-light-success fs-base">
                                                                    <i
                                                                        class="ki-outline ki-arrow-up fs-5 text-success ms-n1"></i>2.6%</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <div class="separator separator-dashed my-3"></div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--begin::Col-->
                                <div class="col-xxl-8 mb-xxl-10">
                                    <!--begin::details View-->
                                    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                                        <!--begin::Card header-->
                                        <div class="card-header cursor-pointer">
                                            <!--begin::Card title-->
                                            <div class="card-title m-0">
                                                <h3 class="fw-bold m-0">{{ $zaytonah_to_view->name }}</h3>
                                            </div>
                                            <!--end::Card title-->
                                            <!--begin::Action-->
                                            <a href="/learn?m=series" class="btn btn-sm btn-primary align-self-center">Back
                                                to Series</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--begin::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body p-9">
                                            @if ($zaytonah_to_view->has_video && $zaytonah_to_view->video_source == 'youtube')
                                                @php
                                                    $youtube_url = $zaytonah_to_view->youtube_url;
                                                    $video_id = '';
                                                    $parsed_url = parse_url($youtube_url);
                                                    if (isset($parsed_url['query'])) {
                                                        parse_str($parsed_url['query'], $query_params);
                                                        if (isset($query_params['v'])) {
                                                            $video_id = $query_params['v'];
                                                        }
                                                    }
                                                @endphp
                                                <div class="embed-responsive position-relative w-100 d-block overflow-hidden p-0 mb-3"
                                                    style="height: 600px">
                                                    <iframe
                                                        class="position-absolute top-0 end-0 start-0 end-0 bottom-0 h-100 w-100 rounded"
                                                        width="560" height="315"
                                                        src="https://www.youtube.com/embed/{{ $video_id }}?si=wiVKlAGlnBcNCrNk"
                                                        title="YouTube video player" frameborder="0"
                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                        referrerpolicy="strict-origin-when-cross-origin"
                                                        allowfullscreen></iframe>
                                                </div>
                                            @else
                                                <p>{!! $zaytonah->content !!}</p>
                                            @endif
                                            <!--begin::Notice-->
                                            <div
                                                class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
                                                <!--begin::Icon-->
                                                <i class="ki-outline ki-information fs-2tx text-warning me-4"></i>
                                                <!--end::Icon-->
                                                <!--begin::Wrapper-->
                                                <div class="d-flex flex-stack flex-grow-1">
                                                    <!--begin::Content-->
                                                    <div class="fw-semibold">
                                                        <h4 class="text-gray-900 fw-bold">We need your attention!</h4>
                                                        <div class="fs-6 text-gray-700">Your payment was declined. To
                                                            start
                                                            using tools,
                                                            please
                                                            <a class="fw-bold" href="account/billing.html">Add Payment
                                                                Method</a>.
                                                        </div>
                                                    </div>
                                                    <!--end::Content-->
                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
                                            <!--end::Notice-->
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
