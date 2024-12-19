@extends('layouts.dashboard')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content">
            <div class=" d-flex">
                <!--begin::Sidebar-->
                <!--begin::Sidebar-->

                <!--end::Sidebar-->
                <!--end::Sidebar-->
                <!--begin::Wrapper container-->
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <!--begin::Content wrapper-->
                    <div class="d-flex flex-column flex-column-fluid">
                        <!--begin::Content-->
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
                                    <!--begin::Sidebar secondary menu-->
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
                                                <!--begin:Menu item-->
                                                <div class="menu-item">
                                                    <!--begin:Menu content-->
                                                    <div class="menu-content">
                                                        <span class="menu-section fs-5 fw-bolder ps-1 py-1">Course
                                                            Content</span>
                                                    </div>
                                                    <!--end:Menu content-->
                                                </div>
                                                <!--end:Menu item-->
                                                <!--begin:Menu item-->
                                                @foreach ($course->sections->sortBy('order') as $section)
                                                    <div data-kt-menu-trigger="click"
                                                        class="menu-item menu-accordion menu-sub-indention @if ($section->lessons->contains('id', $lesson->id)) show @endif">
                                                        <!--begin:Menu link-->
                                                        <span class="menu-link">
                                                            <span class="menu-icon">
                                                                <i
                                                                    class="ki-outline ki-rocket fs-2 @if ($section->lessons->contains('id', $lesson->id)) text-primary @endif "></i>
                                                            </span>
                                                            <span
                                                                class=" fw-bold text-hover-primary  @if ($section->lessons->contains('id', $lesson->id)) text-primary @endif">{{ $section->name }}</span>
                                                            <span class="menu-arrow"></span>
                                                        </span>
                                                        <!--end:Menu link-->
                                                        @foreach ($section->lessons->sortBy('order') as $globallesson)
                                                            <div class="menu-sub menu-sub-accordion">
                                                                <!--begin:Menu item-->
                                                                <div class="menu-item">
                                                                    <!--begin:Menu link-->
                                                                    <a class="menu-link active"
                                                                        href="{{ route('lesson.view', ['course' => $course->slug, 'lesson' => $globallesson->id]) }}">
                                                                        <span
                                                                            class="menu-bullet  @if ($section->lessons->contains('id', $lesson->id)) text-primary @endif">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span
                                                                            class=" @if ($lesson->id == $globallesson->id) text-primary @endif">{{ $globallesson->name }}</span>
                                                                    </a>
                                                                    <!--end:Menu link-->
                                                                </div>
                                                                <!--end:Menu item-->
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endforeach
                                                <!--end:Menu link-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Sidebar secondary menu-->
                                </div>
                                <!--begin::Col-->
                                <div class="col-xxl-8 mb-xxl-10">
                                    <!--begin::details View-->
                                    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                                        <!--begin::Card header-->
                                        <div class="card-header cursor-pointer">
                                            <!--begin::Card title-->
                                            <div class="card-title m-0">
                                                <h3 class="fw-bold m-0">{{ $lesson->name }}</h3>
                                            </div>
                                            <!--end::Card title-->
                                            <!--begin::Action-->
                                            <a href="{{ route('course.view', $course->slug) }}"
                                                class="btn btn-sm btn-primary align-self-center">Back to Course</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--begin::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body p-9">
                                            @if ($lesson->has_video && $lesson->video_source == 'youtube')
                                                @php
                                                    $youtube_url = $lesson->youtube_url;
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
                                                <p>{{ $lesson->content }}</p>
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
                            <!--end::details View-->
                            <!--begin::Footer-->
                            <div id="kt_app_footer"
                                class="app-footer d-flex flex-column flex-md-row flex-center flex-md-stack pb-3">
                                <!--begin::Copyright-->
                                <div class="text-gray-900 order-2 order-md-1">
                                    <span class="text-muted fw-semibold me-1">2024©</span>
                                    <a href="https://keenthemes.com" target="_blank"
                                        class="text-gray-800 text-hover-primary">Keenthemes</a>
                                </div>
                                <!--end::Copyright-->
                                <!--begin::Menu-->
                                <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                                    <li class="menu-item">
                                        <a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="https://devs.keenthemes.com" target="_blank"
                                            class="menu-link px-2">Support</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="https://1.envato.market/EA4JP" target="_blank"
                                            class="menu-link px-2">Purchase</a>
                                    </li>
                                </ul>
                                <!--end::Menu-->
                            </div>
                        </div> <!--closing tag of main-content-->
                        <!--end::Footer-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Content wrapper-->
            </div>
        </div>
        <!--end::Content-->
    </div>
@endsection
