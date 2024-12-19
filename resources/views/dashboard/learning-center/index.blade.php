@php
    $user = Auth::user()->load('profile');
@endphp
@extends('layouts.dashboard')
@section('content')
    <div id="kt_app_content" class="app-content ">
        @if ($user->learningPaths->count() == 0)
            <div class="row gy-5 g-xl-10">
                <!--begin::Col-->
                <div class="col-12">
                    <!--begin::Engage widget 1-->
                    <div class="card h-md-100">
                        <!--begin::Body-->
                        <div class="card-body d-flex flex-column flex-center">
                            <!--begin::Heading-->
                            <div class="mb-2 w-100">
                                <!-- Title -->
                                <h1 class="fw-semibold text-gray-800 text-center lh-lg mt-4">You have not selected any
                                    <br>
                                    <span class="fw-bolder">Learning Path(s)</span>
                                </h1>

                                <!-- Illustration -->
                                <div class="py-10 text-center">
                                    <img src="assets/media/svg/illustrations/easy/2.svg" class="theme-light-show w-200px"
                                        alt="">
                                    <img src="assets/media/svg/illustrations/easy/2-dark.svg"
                                        class="theme-dark-show w-200px" alt="">
                                </div>
                            </div>
                            <!--end::Heading-->

                            <!-- Links -->
                            <div class="text-center mb-1">
                                <a href="{{ route('profile.learning-path') }}" class="btn btn-sm btn-primary me-2">Select
                                    Paths</a>
                                <a class="btn btn-sm btn-light" href="account/settings.html">Learn More</a>
                            </div>
                            <!--end::Links-->
                        </div>
                        <!--end::Body-->
                    </div>


                    <!--end::Engage widget 1-->
                </div>
            </div>
        @else
            <div class="row gx-5 gx-xl-10">
                <!--begin::Col-->
                <div class="col-xl-4 mb-10">
                    <!--begin::Lists Widget 19-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Heading-->
                        <div class="card-header rounded bgi-no-repeat bgi-size-cover bgi-position-y-top bgi-position-x-center align-items-start h-250px"
                            style="background-image:url('{{ asset('assets') }}/media/svg/shapes/top-green.png"
                            data-bs-theme="light">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column text-white pt-15">
                                <span class="fw-bold fs-2x mb-3">My Tasks</span>
                                <div class="fs-4 text-white">
                                    <span class="opacity-75">You have</span>
                                    <span class="position-relative d-inline-block">
                                        <span class="link-white opacity-75-hover fw-bold d-block mb-1">{{ $tasksCount }}
                                            tasks</span>
                                        <!--begin::Separator-->
                                        <span
                                            class="position-absolute opacity-50 bottom-0 start-0 border-2 border-body border-bottom w-100"></span>
                                        <!--end::Separator-->
                                    </span>
                                    <span class="opacity-75">to comlete</span>
                                </div>
                            </h3>
                        </div>
                        <!--end::Heading-->
                        <!--begin::Body-->
                        <div class="card-body mt-n20">
                            <!--begin::Stats-->
                            <div class="mt-n20 position-relative">
                                <!--begin::Row-->
                                <div class="row g-3 g-lg-6">
                                    <!--begin::Col-->
                                    <div class="col-6">
                                        <!--begin::Items-->
                                        <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-30px me-5 mb-8">
                                                <span class="symbol-label">
                                                    <i class="ki-outline ki-flask fs-1 text-primary"></i>
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Stats-->
                                            <div class="m-0">
                                                <!--begin::Number-->
                                                <span
                                                    class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{ $pathCourses->count() }}</span>
                                                <!--end::Number-->
                                                <!--begin::Desc-->
                                                <span class="text-gray-500 fw-semibold fs-6">Courses</span>
                                                <!--end::Desc-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::Items-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-6">
                                        <!--begin::Items-->
                                        <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-30px me-5 mb-8">
                                                <span class="symbol-label">
                                                    <i class="ki-outline ki-bank fs-1 text-primary"></i>
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Stats-->
                                            <div class="m-0">
                                                <!--begin::Number-->
                                                <span
                                                    class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{ $pathQuizzes->count() }}</span>
                                                <!--end::Number-->
                                                <!--begin::Desc-->
                                                <span class="text-gray-500 fw-semibold fs-6">Quizzes</span>
                                                <!--end::Desc-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::Items-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-6">
                                        <!--begin::Items-->
                                        <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-30px me-5 mb-8">
                                                <span class="symbol-label">
                                                    <i class="ki-outline ki-award fs-1 text-primary"></i>
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Stats-->
                                            <div class="m-0">
                                                <!--begin::Number-->
                                                <span
                                                    class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{ $pathProjects->count() }}</span>
                                                <!--end::Number-->
                                                <!--begin::Desc-->
                                                <span class="text-gray-500 fw-semibold fs-6">Projects</span>
                                                <!--end::Desc-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::Items-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-6">
                                        <!--begin::Items-->
                                        <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-30px me-5 mb-8">
                                                <span class="symbol-label">
                                                    <i class="ki-outline ki-timer fs-1 text-primary"></i>
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Stats-->
                                            <div class="m-0">
                                                <!--begin::Number-->
                                                <span
                                                    class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">822</span>
                                                <!--end::Number-->
                                                <!--begin::Desc-->
                                                <span class="text-gray-500 fw-semibold fs-6">Hours Learned</span>
                                                <!--end::Desc-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::Items-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Lists Widget 19-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-8 mb-10">
                    <!--begin::Row-->
                    <div class="row g-5 g-xl-10">
                        <!--begin::Col-->
                        <div class="col-xl-6 mb-xl-10">
                            <!--begin::Slider Widget 1-->
                            <div id="kt_sliders_widget_1_slider"
                                class="card card-flush carousel carousel-custom carousel-stretch slide h-xl-100"
                                data-bs-ride="carousel" data-bs-interval="5000">
                                <!--begin::Header-->
                                <div class="card-header pt-5">
                                    <!--begin::Title-->
                                    <h4 class="card-title d-flex align-items-start flex-column">
                                        <span class="card-label fw-bold text-gray-800">Today’s Course</span>
                                        <span class="text-gray-500 mt-1 fw-bold fs-7">4 lessons, 3 hours 45 minutes</span>
                                    </h4>
                                    <!--end::Title-->
                                    <!--begin::Toolbar-->
                                    <div class="card-toolbar">
                                        <!--begin::Carousel Indicators-->
                                        <ol
                                            class="p-0 m-0 carousel-indicators carousel-indicators-bullet carousel-indicators-active-primary">
                                            <li data-bs-target="#kt_sliders_widget_1_slider" data-bs-slide-to="0"
                                                class="ms-1 active" aria-current="true"></li>
                                            <li data-bs-target="#kt_sliders_widget_1_slider" data-bs-slide-to="1"
                                                class="ms-1"></li>
                                            <li data-bs-target="#kt_sliders_widget_1_slider" data-bs-slide-to="2"
                                                class="ms-1"></li>
                                        </ol>
                                        <!--end::Carousel Indicators-->
                                    </div>
                                    <!--end::Toolbar-->
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body py-6">
                                    <!--begin::Carousel-->
                                    <div class="carousel-inner mt-n5">
                                        <!--begin::Item-->
                                        <div class="carousel-item show active">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex align-items-center mb-5">
                                                <!--begin::Chart-->
                                                <div class="w-80px flex-shrink-0 me-2">
                                                    <div class="min-h-auto ms-n3 initialized"
                                                        id="kt_slider_widget_1_chart_1"
                                                        style="height: 100px; min-height: 93px;">
                                                        <div id="apexchartskp6r8sljg"
                                                            class="apexcharts-canvas apexchartskp6r8sljg apexcharts-theme-light"
                                                            style="width: 90px; height: 93px;"><svg id="SvgjsSvg1996"
                                                                width="90" height="93"
                                                                xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                                xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                                style="background: transparent;">
                                                                <foreignObject x="0" y="0" width="90" height="93">
                                                                    <div class="apexcharts-legend"
                                                                        xmlns="http://www.w3.org/1999/xhtml"></div>
                                                                </foreignObject>
                                                                <g id="SvgjsG1998"
                                                                    class="apexcharts-inner apexcharts-graphical"
                                                                    transform="translate(0, 1)">
                                                                    <defs id="SvgjsDefs1997">
                                                                        <clipPath id="gridRectMaskkp6r8sljg">
                                                                            <rect id="SvgjsRect1999" width="96"
                                                                                height="104" x="-3" y="-3"
                                                                                rx="0" ry="0"
                                                                                opacity="1" stroke-width="0"
                                                                                stroke="none" stroke-dasharray="0"
                                                                                fill="#fff"></rect>
                                                                        </clipPath>
                                                                        <clipPath id="forecastMaskkp6r8sljg"></clipPath>
                                                                        <clipPath id="nonForecastMaskkp6r8sljg"></clipPath>
                                                                        <clipPath id="gridRectMarkerMaskkp6r8sljg">
                                                                            <rect id="SvgjsRect2000" width="94"
                                                                                height="102" x="-2" y="-2"
                                                                                rx="0" ry="0"
                                                                                opacity="1" stroke-width="0"
                                                                                stroke="none" stroke-dasharray="0"
                                                                                fill="#fff"></rect>
                                                                        </clipPath>
                                                                    </defs>
                                                                    <g id="SvgjsG2001" class="apexcharts-radialbar">
                                                                        <g id="SvgjsG2002">
                                                                            <g id="SvgjsG2003" class="apexcharts-tracks">
                                                                                <g id="SvgjsG2004"
                                                                                    class="apexcharts-radialbar-track apexcharts-track"
                                                                                    rel="1">
                                                                                    <path id="apexcharts-radialbarTrack-0"
                                                                                        d="M 45 16.707317073170728 A 28.292682926829272 28.292682926829272 0 1 1 44.995061995312106 16.707317504092927 "
                                                                                        fill="none" fill-opacity="1"
                                                                                        stroke="rgba(248,245,255,0.85)"
                                                                                        stroke-opacity="1"
                                                                                        stroke-linecap="round"
                                                                                        stroke-width="7.073170731707318"
                                                                                        stroke-dasharray="0"
                                                                                        class="apexcharts-radialbar-area"
                                                                                        data:pathOrig="M 45 16.707317073170728 A 28.292682926829272 28.292682926829272 0 1 1 44.995061995312106 16.707317504092927 ">
                                                                                    </path>
                                                                                </g>
                                                                            </g>
                                                                            <g id="SvgjsG2006">
                                                                                <g id="SvgjsG2009"
                                                                                    class="apexcharts-series apexcharts-radial-series"
                                                                                    seriesName="Progress" rel="1"
                                                                                    data:realIndex="0">
                                                                                    <path id="SvgjsPath2010"
                                                                                        d="M 45 16.707317073170728 A 28.292682926829272 28.292682926829272 0 1 1 16.77623662679521 43.02640220626378 "
                                                                                        fill="none" fill-opacity="0.85"
                                                                                        stroke="rgba(114,57,234,0.85)"
                                                                                        stroke-opacity="1"
                                                                                        stroke-linecap="round"
                                                                                        stroke-width="7.073170731707318"
                                                                                        stroke-dasharray="0"
                                                                                        class="apexcharts-radialbar-area apexcharts-radialbar-slice-0"
                                                                                        data:angle="274" data:value="76"
                                                                                        index="0" j="0"
                                                                                        data:pathOrig="M 45 16.707317073170728 A 28.292682926829272 28.292682926829272 0 1 1 16.77623662679521 43.02640220626378 ">
                                                                                    </path>
                                                                                </g>
                                                                                <circle id="SvgjsCircle2007"
                                                                                    r="24.75609756097561" cx="45"
                                                                                    cy="45"
                                                                                    class="apexcharts-radialbar-hollow"
                                                                                    fill="transparent"></circle>
                                                                                <g id="SvgjsG2008"
                                                                                    class="apexcharts-datalabels-group"
                                                                                    transform="translate(0, 0) scale(1)"
                                                                                    style="opacity: 1;"></g>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                    <line id="SvgjsLine2011" x1="0"
                                                                        y1="0" x2="90" y2="0"
                                                                        stroke="#b6b6b6" stroke-dasharray="0"
                                                                        stroke-width="1" stroke-linecap="butt"
                                                                        class="apexcharts-ycrosshairs">
                                                                    </line>
                                                                    <line id="SvgjsLine2012" x1="0"
                                                                        y1="0" x2="90" y2="0"
                                                                        stroke-dasharray="0" stroke-width="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-ycrosshairs-hidden"></line>
                                                                </g>
                                                            </svg></div>
                                                    </div>
                                                </div>
                                                <!--end::Chart-->
                                                <!--begin::Info-->
                                                <div class="m-0">
                                                    <!--begin::Subtitle-->
                                                    <h4 class="fw-bold text-gray-800 mb-3">Ruby on Rails</h4>
                                                    <!--end::Subtitle-->
                                                    <!--begin::Items-->
                                                    <div class="d-flex d-grid gap-5">
                                                        <!--begin::Item-->
                                                        <div class="d-flex flex-column flex-shrink-0 me-4">
                                                            <!--begin::Section-->
                                                            <span
                                                                class="d-flex align-items-center fs-7 fw-bold text-gray-500 mb-2">
                                                                <i
                                                                    class="ki-outline ki-right-square fs-6 text-gray-600 me-2"></i>3
                                                                Topics</span>
                                                            <!--end::Section-->
                                                            <!--begin::Section-->
                                                            <span
                                                                class="d-flex align-items-center text-gray-500 fw-bold fs-7">
                                                                <i
                                                                    class="ki-outline ki-right-square fs-6 text-gray-600 me-2"></i>1
                                                                Speakers</span>
                                                            <!--end::Section-->
                                                        </div>
                                                        <!--end::Item-->
                                                        <!--begin::Item-->
                                                        <div class="d-flex flex-column flex-shrink-0">
                                                            <!--begin::Section-->
                                                            <span
                                                                class="d-flex align-items-center fs-7 fw-bold text-gray-500 mb-2">
                                                                <i
                                                                    class="ki-outline ki-right-square fs-6 text-gray-600 me-2"></i>50
                                                                Min</span>
                                                            <!--end::Section-->
                                                            <!--begin::Section-->
                                                            <span
                                                                class="d-flex align-items-center text-gray-500 fw-bold fs-7">
                                                                <i
                                                                    class="ki-outline ki-right-square fs-6 text-gray-600 me-2"></i>72
                                                                students</span>
                                                            <!--end::Section-->
                                                        </div>
                                                        <!--end::Item-->
                                                    </div>
                                                    <!--end::Items-->
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Wrapper-->
                                            <!--begin::Action-->
                                            <div class="m-0">
                                                <a href="#" class="btn btn-sm btn-light me-2 mb-2">Skip This</a>
                                                <a href="#" class="btn btn-sm btn-primary mb-2"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#kt_modal_create_app">Continue</a>
                                            </div>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="carousel-item">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex align-items-center mb-5">
                                                <!--begin::Chart-->
                                                <div class="w-80px flex-shrink-0 me-2">
                                                    <div class="min-h-auto ms-n3 initialized"
                                                        id="kt_slider_widget_1_chart_2"
                                                        style="height: 100px; min-height: 100px;">
                                                        <div id="apexcharts11aivnnck"
                                                            class="apexcharts-canvas apexcharts11aivnnck"
                                                            style="width: 0px; height: 100px;"><svg id="SvgjsSvg1993"
                                                                width="0" height="100"
                                                                xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                                xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                                style="background: transparent;">
                                                                <foreignObject x="0" y="0" width="0" height="100">
                                                                    <div class="apexcharts-legend"
                                                                        xmlns="http://www.w3.org/1999/xhtml"></div>
                                                                </foreignObject>
                                                                <g id="SvgjsG1995"
                                                                    class="apexcharts-inner apexcharts-graphical">
                                                                    <defs id="SvgjsDefs1994"></defs>
                                                                </g>
                                                            </svg></div>
                                                    </div>
                                                </div>
                                                <!--end::Chart-->
                                                <!--begin::Info-->
                                                <div class="m-0">
                                                    <!--begin::Subtitle-->
                                                    <h4 class="fw-bold text-gray-800 mb-3">Ruby on Rails</h4>
                                                    <!--end::Subtitle-->
                                                    <!--begin::Items-->
                                                    <div class="d-flex d-grid gap-5">
                                                        <!--begin::Item-->
                                                        <div class="d-flex flex-column flex-shrink-0 me-4">
                                                            <!--begin::Section-->
                                                            <span
                                                                class="d-flex align-items-center fs-7 fw-bold text-gray-500 mb-2">
                                                                <i
                                                                    class="ki-outline ki-right-square fs-6 text-gray-600 me-2"></i>3
                                                                Topics</span>
                                                            <!--end::Section-->
                                                            <!--begin::Section-->
                                                            <span
                                                                class="d-flex align-items-center text-gray-500 fw-bold fs-7">
                                                                <i
                                                                    class="ki-outline ki-right-square fs-6 text-gray-600 me-2"></i>1
                                                                Speakers</span>
                                                            <!--end::Section-->
                                                        </div>
                                                        <!--end::Item-->
                                                        <!--begin::Item-->
                                                        <div class="d-flex flex-column flex-shrink-0">
                                                            <!--begin::Section-->
                                                            <span
                                                                class="d-flex align-items-center fs-7 fw-bold text-gray-500 mb-2">
                                                                <i
                                                                    class="ki-outline ki-right-square fs-6 text-gray-600 me-2"></i>50
                                                                Min</span>
                                                            <!--end::Section-->
                                                            <!--begin::Section-->
                                                            <span
                                                                class="d-flex align-items-center text-gray-500 fw-bold fs-7">
                                                                <i
                                                                    class="ki-outline ki-right-square fs-6 text-gray-600 me-2"></i>72
                                                                students</span>
                                                            <!--end::Section-->
                                                        </div>
                                                        <!--end::Item-->
                                                    </div>
                                                    <!--end::Items-->
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Wrapper-->
                                            <!--begin::Action-->
                                            <div class="m-0">
                                                <a href="#" class="btn btn-sm btn-light me-2 mb-2">Skip This</a>
                                                <a href="#" class="btn btn-sm btn-primary mb-2"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#kt_modal_create_app">Continue</a>
                                            </div>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="carousel-item">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex align-items-center mb-5">
                                                <!--begin::Chart-->
                                                <div class="w-80px flex-shrink-0 me-2">
                                                    <div class="min-h-auto ms-n3 initialized"
                                                        id="kt_slider_widget_1_chart_3"
                                                        style="height: 100px; min-height: 100px;">
                                                        <div id="apexchartsgw425jfh"
                                                            class="apexcharts-canvas apexchartsgw425jfh"
                                                            style="width: 0px; height: 100px;"><svg id="SvgjsSvg2013"
                                                                width="0" height="100"
                                                                xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                                xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                                style="background: transparent;">
                                                                <foreignObject x="0" y="0" width="0" height="100">
                                                                    <div class="apexcharts-legend"
                                                                        xmlns="http://www.w3.org/1999/xhtml"></div>
                                                                </foreignObject>
                                                                <g id="SvgjsG2015"
                                                                    class="apexcharts-inner apexcharts-graphical">
                                                                    <defs id="SvgjsDefs2014"></defs>
                                                                </g>
                                                            </svg></div>
                                                    </div>
                                                </div>
                                                <!--end::Chart-->
                                                <!--begin::Info-->
                                                <div class="m-0">
                                                    <!--begin::Subtitle-->
                                                    <h4 class="fw-bold text-gray-800 mb-3">Ruby on Rails</h4>
                                                    <!--end::Subtitle-->
                                                    <!--begin::Items-->
                                                    <div class="d-flex d-grid gap-5">
                                                        <!--begin::Item-->
                                                        <div class="d-flex flex-column flex-shrink-0 me-4">
                                                            <!--begin::Section-->
                                                            <span
                                                                class="d-flex align-items-center fs-7 fw-bold text-gray-500 mb-2">
                                                                <i
                                                                    class="ki-outline ki-right-square fs-6 text-gray-600 me-2"></i>3
                                                                Topics</span>
                                                            <!--end::Section-->
                                                            <!--begin::Section-->
                                                            <span
                                                                class="d-flex align-items-center text-gray-500 fw-bold fs-7">
                                                                <i
                                                                    class="ki-outline ki-right-square fs-6 text-gray-600 me-2"></i>1
                                                                Speakers</span>
                                                            <!--end::Section-->
                                                        </div>
                                                        <!--end::Item-->
                                                        <!--begin::Item-->
                                                        <div class="d-flex flex-column flex-shrink-0">
                                                            <!--begin::Section-->
                                                            <span
                                                                class="d-flex align-items-center fs-7 fw-bold text-gray-500 mb-2">
                                                                <i
                                                                    class="ki-outline ki-right-square fs-6 text-gray-600 me-2"></i>50
                                                                Min</span>
                                                            <!--end::Section-->
                                                            <!--begin::Section-->
                                                            <span
                                                                class="d-flex align-items-center text-gray-500 fw-bold fs-7">
                                                                <i
                                                                    class="ki-outline ki-right-square fs-6 text-gray-600 me-2"></i>72
                                                                students</span>
                                                            <!--end::Section-->
                                                        </div>
                                                        <!--end::Item-->
                                                    </div>
                                                    <!--end::Items-->
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Wrapper-->
                                            <!--begin::Action-->
                                            <div class="m-0">
                                                <a href="#" class="btn btn-sm btn-light me-2 mb-2">Skip This</a>
                                                <a href="#" class="btn btn-sm btn-primary mb-2"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#kt_modal_create_app">Continue</a>
                                            </div>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Carousel-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Slider Widget 1-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-xl-6 mb-5 mb-xl-10">
                            <!--begin::Slider Widget 2-->
                            <div id="kt_sliders_widget_2_slider"
                                class="card card-flush carousel carousel-custom carousel-stretch slide h-xl-100"
                                data-bs-ride="carousel" data-bs-interval="5500">
                                <!--begin::Header-->
                                <div class="card-header pt-5">
                                    <!--begin::Title-->
                                    <h4 class="card-title d-flex align-items-start flex-column">
                                        <span class="card-label fw-bold text-gray-800">Today’s Events</span>
                                        <span class="text-gray-500 mt-1 fw-bold fs-7">24 events on all activities</span>
                                    </h4>
                                    <!--end::Title-->
                                    <!--begin::Toolbar-->
                                    <div class="card-toolbar">
                                        <!--begin::Carousel Indicators-->
                                        <ol
                                            class="p-0 m-0 carousel-indicators carousel-indicators-bullet carousel-indicators-active-success">
                                            <li data-bs-target="#kt_sliders_widget_2_slider" data-bs-slide-to="0"
                                                class="ms-1"></li>
                                            <li data-bs-target="#kt_sliders_widget_2_slider" data-bs-slide-to="1"
                                                class="ms-1 active" aria-current="true"></li>
                                            <li data-bs-target="#kt_sliders_widget_2_slider" data-bs-slide-to="2"
                                                class="ms-1"></li>
                                        </ol>
                                        <!--end::Carousel Indicators-->
                                    </div>
                                    <!--end::Toolbar-->
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body py-6">
                                    <!--begin::Carousel-->
                                    <div class="carousel-inner">
                                        <!--begin::Item-->
                                        <div class="carousel-item show">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex align-items-center mb-9">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-70px symbol-circle me-5">
                                                    <span class="symbol-label bg-light-success">
                                                        <i class="ki-outline ki-abstract-24 fs-3x text-success"></i>
                                                    </span>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Info-->
                                                <div class="m-0">
                                                    <!--begin::Subtitle-->
                                                    <h4 class="fw-bold text-gray-800 mb-3">Ruby on Rails</h4>
                                                    <!--end::Subtitle-->
                                                    <!--begin::Items-->
                                                    <div class="d-flex d-grid gap-5">
                                                        <!--begin::Item-->
                                                        <div class="d-flex flex-column flex-shrink-0 me-4">
                                                            <!--begin::Section-->
                                                            <span
                                                                class="d-flex align-items-center fs-7 fw-bold text-gray-500 mb-2">
                                                                <i
                                                                    class="ki-outline ki-right-square fs-6 text-gray-600 me-2"></i>5
                                                                Topics</span>
                                                            <!--end::Section-->
                                                            <!--begin::Section-->
                                                            <span
                                                                class="d-flex align-items-center text-gray-500 fw-bold fs-7">
                                                                <i
                                                                    class="ki-outline ki-right-square fs-6 text-gray-600 me-2"></i>1
                                                                Speakers</span>
                                                            <!--end::Section-->
                                                        </div>
                                                        <!--end::Item-->
                                                        <!--begin::Item-->
                                                        <div class="d-flex flex-column flex-shrink-0">
                                                            <!--begin::Section-->
                                                            <span
                                                                class="d-flex align-items-center fs-7 fw-bold text-gray-500 mb-2">
                                                                <i
                                                                    class="ki-outline ki-right-square fs-6 text-gray-600 me-2"></i>60
                                                                Min</span>
                                                            <!--end::Section-->
                                                            <!--begin::Section-->
                                                            <span
                                                                class="d-flex align-items-center text-gray-500 fw-bold fs-7">
                                                                <i
                                                                    class="ki-outline ki-right-square fs-6 text-gray-600 me-2"></i>137
                                                                students</span>
                                                            <!--end::Section-->
                                                        </div>
                                                        <!--end::Item-->
                                                    </div>
                                                    <!--end::Items-->
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Wrapper-->
                                            <!--begin::Action-->
                                            <div class="m-0">
                                                <a href="#" class="btn btn-sm btn-light me-2 mb-2">Details</a>
                                                <a href="#" class="btn btn-sm btn-success mb-2"
                                                    data-bs-toggle="modal" data-bs-target="#kt_modal_create_campaign">Join
                                                    Event</a>
                                            </div>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="carousel-item active">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex align-items-center mb-9">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-70px symbol-circle me-5">
                                                    <span class="symbol-label bg-light-danger">
                                                        <i class="ki-outline ki-abstract-25 fs-3x text-danger"></i>
                                                    </span>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Info-->
                                                <div class="m-0">
                                                    <!--begin::Subtitle-->
                                                    <h4 class="fw-bold text-gray-800 mb-3">Ruby on Rails</h4>
                                                    <!--end::Subtitle-->
                                                    <!--begin::Items-->
                                                    <div class="d-flex d-grid gap-5">
                                                        <!--begin::Item-->
                                                        <div class="d-flex flex-column flex-shrink-0 me-4">
                                                            <!--begin::Section-->
                                                            <span
                                                                class="d-flex align-items-center fs-7 fw-bold text-gray-500 mb-2">
                                                                <i
                                                                    class="ki-outline ki-right-square fs-6 text-gray-600 me-2"></i>12
                                                                Topics</span>
                                                            <!--end::Section-->
                                                            <!--begin::Section-->
                                                            <span
                                                                class="d-flex align-items-center text-gray-500 fw-bold fs-7">
                                                                <i
                                                                    class="ki-outline ki-right-square fs-6 text-gray-600 me-2"></i>1
                                                                Speakers</span>
                                                            <!--end::Section-->
                                                        </div>
                                                        <!--end::Item-->
                                                        <!--begin::Item-->
                                                        <div class="d-flex flex-column flex-shrink-0">
                                                            <!--begin::Section-->
                                                            <span
                                                                class="d-flex align-items-center fs-7 fw-bold text-gray-500 mb-2">
                                                                <i
                                                                    class="ki-outline ki-right-square fs-6 text-gray-600 me-2"></i>50
                                                                Min</span>
                                                            <!--end::Section-->
                                                            <!--begin::Section-->
                                                            <span
                                                                class="d-flex align-items-center text-gray-500 fw-bold fs-7">
                                                                <i
                                                                    class="ki-outline ki-right-square fs-6 text-gray-600 me-2"></i>72
                                                                students</span>
                                                            <!--end::Section-->
                                                        </div>
                                                        <!--end::Item-->
                                                    </div>
                                                    <!--end::Items-->
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Wrapper-->
                                            <!--begin::Action-->
                                            <div class="m-0">
                                                <a href="#" class="btn btn-sm btn-light me-2 mb-2">Details</a>
                                                <a href="#" class="btn btn-sm btn-success mb-2"
                                                    data-bs-toggle="modal" data-bs-target="#kt_modal_create_campaign">Join
                                                    Event</a>
                                            </div>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="carousel-item">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex align-items-center mb-9">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-70px symbol-circle me-5">
                                                    <span class="symbol-label bg-light-primary">
                                                        <i class="ki-outline ki-abstract-36 fs-3x text-primary"></i>
                                                    </span>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Info-->
                                                <div class="m-0">
                                                    <!--begin::Subtitle-->
                                                    <h4 class="fw-bold text-gray-800 mb-3">Ruby on Rails</h4>
                                                    <!--end::Subtitle-->
                                                    <!--begin::Items-->
                                                    <div class="d-flex d-grid gap-5">
                                                        <!--begin::Item-->
                                                        <div class="d-flex flex-column flex-shrink-0 me-4">
                                                            <!--begin::Section-->
                                                            <span
                                                                class="d-flex align-items-center fs-7 fw-bold text-gray-500 mb-2">
                                                                <i
                                                                    class="ki-outline ki-right-square fs-6 text-gray-600 me-2"></i>3
                                                                Topics</span>
                                                            <!--end::Section-->
                                                            <!--begin::Section-->
                                                            <span
                                                                class="d-flex align-items-center text-gray-500 fw-bold fs-7">
                                                                <i
                                                                    class="ki-outline ki-right-square fs-6 text-gray-600 me-2"></i>1
                                                                Speakers</span>
                                                            <!--end::Section-->
                                                        </div>
                                                        <!--end::Item-->
                                                        <!--begin::Item-->
                                                        <div class="d-flex flex-column flex-shrink-0">
                                                            <!--begin::Section-->
                                                            <span
                                                                class="d-flex align-items-center fs-7 fw-bold text-gray-500 mb-2">
                                                                <i
                                                                    class="ki-outline ki-right-square fs-6 text-gray-600 me-2"></i>50
                                                                Min</span>
                                                            <!--end::Section-->
                                                            <!--begin::Section-->
                                                            <span
                                                                class="d-flex align-items-center text-gray-500 fw-bold fs-7">
                                                                <i
                                                                    class="ki-outline ki-right-square fs-6 text-gray-600 me-2"></i>72
                                                                students</span>
                                                            <!--end::Section-->
                                                        </div>
                                                        <!--end::Item-->
                                                    </div>
                                                    <!--end::Items-->
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Wrapper-->
                                            <!--begin::Action-->
                                            <div class="m-0">
                                                <a href="#" class="btn btn-sm btn-light me-2 mb-2">Details</a>
                                                <a href="#" class="btn btn-sm btn-success mb-2"
                                                    data-bs-toggle="modal" data-bs-target="#kt_modal_create_campaign">Join
                                                    Event</a>
                                            </div>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Carousel-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Slider Widget 2-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Engage widget 4-->
                    <div class="card border-transparent" data-bs-theme="light" style="background-color: #1C325E;">
                        <!--begin::Body-->
                        <div class="card-body d-flex ps-xl-15">
                            <!--begin::Wrapper-->
                            <div class="m-0">
                                <!--begin::Title-->
                                <div class="position-relative fs-2x z-index-2 fw-bold text-white mb-7">
                                    <span class="me-2">You have got
                                        <span class="position-relative d-inline-block text-danger">
                                            <a href="pages/user-profile/overview.html"
                                                class="text-danger opacity-75-hover">2300 bonus</a>
                                            <!--begin::Separator-->
                                            <span
                                                class="position-absolute opacity-50 bottom-0 start-0 border-4 border-danger border-bottom w-100"></span>
                                            <!--end::Separator-->
                                        </span></span>points.
                                    <br>Feel free to use them in your lessons
                                </div>
                                <!--end::Title-->
                                <!--begin::Action-->
                                <div class="mb-3">
                                    <a href="{{ route('user.path-view') }}"
                                        class="btn btn-primary fw-semibold me-2">Explore Path</a>
                                    <a href="apps/support-center/overview.html"
                                        class="btn btn-color-white bg-white bg-opacity-15 bg-hover-opacity-25 fw-semibold">How
                                        to</a>
                                </div>
                                <!--begin::Action-->
                            </div>
                            <!--begin::Wrapper-->
                            <!--begin::Illustration-->
                            <img src="{{ asset('assets') }}/media/illustrations/sigma-1/17-dark.png"
                                class="position-absolute me-3 bottom-0 end-0 h-200px" alt="">
                            <!--end::Illustration-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Engage widget 4-->
                </div>
                <!--end::Col-->
            </div>
            <div class="row g-5 g-xl-10">
                <div class="col-xl-4 mb-xl-10">
                    <!--begin::List widget 20-->
                    <div class="card h-xl-100">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-900">Path(s) Courses</span>
                                <span class="text-muted mt-1 fw-semibold fs-7">8k social visitors</span>
                            </h3>
                            <!--begin::Toolbar-->
                            <div class="card-toolbar">
                                <a href="#" class="btn btn-sm btn-light">All Courses</a>
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-6">
                            @foreach ($pathCourses as $pathCourse)
                                <div class="d-flex flex-stack">
                                    <div class="cursor-pointer symbol symbol symbol-45px symbol-md-55px">
                                        <img class="" src="{{ photo_or_default($pathCourse->feature_image) }}"
                                            alt="feature_image" />
                                    </div>
                                    <div class="d-flex align-items-center flex-row-fluid flex-wrap mx-4">
                                        <div class="flex-grow-1 me-2 ">
                                            <a href="{{ route('course.view', [$pathCourse->slug]) }}"
                                                class="text-gray-800 text-hover-primary fs-6 fw-bold">{{ $pathCourse->name }}</a>
                                            <span class="text-muted fw-semibold d-block fs-7">
                                                @php
                                                    $learningPaths = $pathCourse->technologyStacks
                                                        ->flatMap(
                                                            fn($technologyStack) => $technologyStack->learningStacks,
                                                        )
                                                        ->flatMap(fn($learningStack) => $learningStack->learningPaths)
                                                        ->unique('id'); // Avoid duplicates
                                                @endphp
                                                @foreach ($learningPaths as $learningPath)
                                                    <div>{{ $learningPath->title }}</div>
                                                @endforeach
                                            </span>
                                        </div>
                                        <div class="d-flex align-items-center w-100 mw-150px">
                                            <!--begin::Progress-->
                                            <div class="progress h-6px w-100 me-2 bg-light-success">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: {{ random_int(5, 90) }}%"
                                                    aria-valuenow="{{ random_int(5, 90) }}" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                            <!--end::Progress-->
                                            <!--begin::Value-->
                                            <span class="text-gray-500 fw-semibold">65%</span>
                                            <!--end::Value-->
                                        </div>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-4"></div>
                            @endforeach
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::List widget 20-->
                </div>
                <div class="col-xl-4">
                    <!--begin::List widget 21-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-900">Active Lessons</span>
                                <span class="text-muted mt-1 fw-semibold fs-7">Avg. 72% completed lessons</span>
                            </h3>
                            <!--begin::Toolbar-->
                            <div class="card-toolbar">
                                <a href="#" class="btn btn-sm btn-light">All Lessons</a>
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-5">
                            <!--begin::Item-->
                            <div class="d-flex flex-stack">
                                <!--begin::Wrapper-->
                                <div class="d-flex align-items-center me-3">
                                    <!--begin::Logo-->
                                    <img src="{{ asset('assets') }}/media/svg/brand-logos/laravel-2.svg"
                                        class="me-4 w-30px" alt="">
                                    <!--end::Logo-->
                                    <!--begin::Section-->
                                    <div class="flex-grow-1">
                                        <!--begin::Text-->
                                        <a href="#"
                                            class="text-gray-800 text-hover-primary fs-5 fw-bold lh-0">Laravel</a>
                                        <!--end::Text-->
                                        <!--begin::Description-->
                                        <span class="text-gray-500 fw-semibold d-block fs-6">PHP Framework</span>
                                        <!--end::Description=-->
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Statistics-->
                                <div class="d-flex align-items-center w-100 mw-125px">
                                    <!--begin::Progress-->
                                    <div class="progress h-6px w-100 me-2 bg-light-success">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 65%"
                                            aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <!--end::Progress-->
                                    <!--begin::Value-->
                                    <span class="text-gray-500 fw-semibold">65%</span>
                                    <!--end::Value-->
                                </div>
                                <!--end::Statistics-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Separator-->
                            <div class="separator separator-dashed my-3"></div>
                            <!--end::Separator-->
                            <!--begin::Item-->
                            <div class="d-flex flex-stack">
                                <!--begin::Wrapper-->
                                <div class="d-flex align-items-center me-3">
                                    <!--begin::Logo-->
                                    <img src="{{ asset('assets') }}/media/svg/brand-logos/vue-9.svg" class="me-4 w-30px"
                                        alt="">
                                    <!--end::Logo-->
                                    <!--begin::Section-->
                                    <div class="flex-grow-1">
                                        <!--begin::Text-->
                                        <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold lh-0">Vue
                                            3</a>
                                        <!--end::Text-->
                                        <!--begin::Description-->
                                        <span class="text-gray-500 fw-semibold d-block fs-6">JS Framework</span>
                                        <!--end::Description=-->
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Statistics-->
                                <div class="d-flex align-items-center w-100 mw-125px">
                                    <!--begin::Progress-->
                                    <div class="progress h-6px w-100 me-2 bg-light-warning">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 87%"
                                            aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <!--end::Progress-->
                                    <!--begin::Value-->
                                    <span class="text-gray-500 fw-semibold">87%</span>
                                    <!--end::Value-->
                                </div>
                                <!--end::Statistics-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Separator-->
                            <div class="separator separator-dashed my-3"></div>
                            <!--end::Separator-->
                            <!--begin::Item-->
                            <div class="d-flex flex-stack">
                                <!--begin::Wrapper-->
                                <div class="d-flex align-items-center me-3">
                                    <!--begin::Logo-->
                                    <img src="{{ asset('assets') }}/media/svg/brand-logos/bootstrap5.svg"
                                        class="me-4 w-30px" alt="">
                                    <!--end::Logo-->
                                    <!--begin::Section-->
                                    <div class="flex-grow-1">
                                        <!--begin::Text-->
                                        <a href="#"
                                            class="text-gray-800 text-hover-primary fs-5 fw-bold lh-0">Bootstrap
                                            5</a>
                                        <!--end::Text-->
                                        <!--begin::Description-->
                                        <span class="text-gray-500 fw-semibold d-block fs-6">CSS Framework</span>
                                        <!--end::Description=-->
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Statistics-->
                                <div class="d-flex align-items-center w-100 mw-125px">
                                    <!--begin::Progress-->
                                    <div class="progress h-6px w-100 me-2 bg-light-primary">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 44%"
                                            aria-valuenow="44" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <!--end::Progress-->
                                    <!--begin::Value-->
                                    <span class="text-gray-500 fw-semibold">44%</span>
                                    <!--end::Value-->
                                </div>
                                <!--end::Statistics-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Separator-->
                            <div class="separator separator-dashed my-3"></div>
                            <!--end::Separator-->
                            <!--begin::Item-->
                            <div class="d-flex flex-stack">
                                <!--begin::Wrapper-->
                                <div class="d-flex align-items-center me-3">
                                    <!--begin::Logo-->
                                    <img src="{{ asset('assets') }}/media/svg/brand-logos/angular-icon.svg"
                                        class="me-4 w-30px" alt="">
                                    <!--end::Logo-->
                                    <!--begin::Section-->
                                    <div class="flex-grow-1">
                                        <!--begin::Text-->
                                        <a href="#"
                                            class="text-gray-800 text-hover-primary fs-5 fw-bold lh-0">Angular
                                            16</a>
                                        <!--end::Text-->
                                        <!--begin::Description-->
                                        <span class="text-gray-500 fw-semibold d-block fs-6">JS Framework</span>
                                        <!--end::Description=-->
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Statistics-->
                                <div class="d-flex align-items-center w-100 mw-125px">
                                    <!--begin::Progress-->
                                    <div class="progress h-6px w-100 me-2 bg-light-info">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 70%"
                                            aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <!--end::Progress-->
                                    <!--begin::Value-->
                                    <span class="text-gray-500 fw-semibold">70%</span>
                                    <!--end::Value-->
                                </div>
                                <!--end::Statistics-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Separator-->
                            <div class="separator separator-dashed my-3"></div>
                            <!--end::Separator-->
                            <!--begin::Item-->
                            <div class="d-flex flex-stack">
                                <!--begin::Wrapper-->
                                <div class="d-flex align-items-center me-3">
                                    <!--begin::Logo-->
                                    <img src="{{ asset('assets') }}/media/svg/brand-logos/spring-3.svg"
                                        class="me-4 w-30px" alt="">
                                    <!--end::Logo-->
                                    <!--begin::Section-->
                                    <div class="flex-grow-1">
                                        <!--begin::Text-->
                                        <a href="#"
                                            class="text-gray-800 text-hover-primary fs-5 fw-bold lh-0">Spring</a>
                                        <!--end::Text-->
                                        <!--begin::Description-->
                                        <span class="text-gray-500 fw-semibold d-block fs-6">Java Framework</span>
                                        <!--end::Description=-->
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Statistics-->
                                <div class="d-flex align-items-center w-100 mw-125px">
                                    <!--begin::Progress-->
                                    <div class="progress h-6px w-100 me-2 bg-light-danger">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 56%"
                                            aria-valuenow="56" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <!--end::Progress-->
                                    <!--begin::Value-->
                                    <span class="text-gray-500 fw-semibold">56%</span>
                                    <!--end::Value-->
                                </div>
                                <!--end::Statistics-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Separator-->
                            <div class="separator separator-dashed my-3"></div>
                            <!--end::Separator-->
                            <!--begin::Item-->
                            <div class="d-flex flex-stack">
                                <!--begin::Wrapper-->
                                <div class="d-flex align-items-center me-3">
                                    <!--begin::Logo-->
                                    <img src="{{ asset('assets') }}/media/svg/brand-logos/typescript-1.svg"
                                        class="me-4 w-30px" alt="">
                                    <!--end::Logo-->
                                    <!--begin::Section-->
                                    <div class="flex-grow-1">
                                        <!--begin::Text-->
                                        <a href="#"
                                            class="text-gray-800 text-hover-primary fs-5 fw-bold lh-0">TypeScript</a>
                                        <!--end::Text-->
                                        <!--begin::Description-->
                                        <span class="text-gray-500 fw-semibold d-block fs-6">Better Tooling</span>
                                        <!--end::Description=-->
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Statistics-->
                                <div class="d-flex align-items-center w-100 mw-125px">
                                    <!--begin::Progress-->
                                    <div class="progress h-6px w-100 me-2 bg-light-success">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 82%"
                                            aria-valuenow="82" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <!--end::Progress-->
                                    <!--begin::Value-->
                                    <span class="text-gray-500 fw-semibold">82%</span>
                                    <!--end::Value-->
                                </div>
                                <!--end::Statistics-->
                            </div>
                            <!--end::Item-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::List widget 21-->
                </div>
                <div class="col-xl-4">
                    <!--begin::List widget 21-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-900">Active Lessons</span>
                                <span class="text-muted mt-1 fw-semibold fs-7">Avg. 72% completed lessons</span>
                            </h3>
                            <!--begin::Toolbar-->
                            <div class="card-toolbar">
                                <a href="#" class="btn btn-sm btn-light">All Lessons</a>
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-5">
                            <!--begin::Item-->
                            <div class="d-flex flex-stack">
                                <!--begin::Wrapper-->
                                <div class="d-flex align-items-center me-3">
                                    <!--begin::Logo-->
                                    <img src="{{ asset('assets') }}/media/svg/brand-logos/laravel-2.svg"
                                        class="me-4 w-30px" alt="">
                                    <!--end::Logo-->
                                    <!--begin::Section-->
                                    <div class="flex-grow-1">
                                        <!--begin::Text-->
                                        <a href="#"
                                            class="text-gray-800 text-hover-primary fs-5 fw-bold lh-0">Laravel</a>
                                        <!--end::Text-->
                                        <!--begin::Description-->
                                        <span class="text-gray-500 fw-semibold d-block fs-6">PHP Framework</span>
                                        <!--end::Description=-->
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Statistics-->
                                <div class="d-flex align-items-center w-100 mw-125px">
                                    <!--begin::Progress-->
                                    <div class="progress h-6px w-100 me-2 bg-light-success">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 65%"
                                            aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <!--end::Progress-->
                                    <!--begin::Value-->
                                    <span class="text-gray-500 fw-semibold">65%</span>
                                    <!--end::Value-->
                                </div>
                                <!--end::Statistics-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Separator-->
                            <div class="separator separator-dashed my-3"></div>
                            <!--end::Separator-->
                            <!--begin::Item-->
                            <div class="d-flex flex-stack">
                                <!--begin::Wrapper-->
                                <div class="d-flex align-items-center me-3">
                                    <!--begin::Logo-->
                                    <img src="{{ asset('assets') }}/media/svg/brand-logos/vue-9.svg" class="me-4 w-30px"
                                        alt="">
                                    <!--end::Logo-->
                                    <!--begin::Section-->
                                    <div class="flex-grow-1">
                                        <!--begin::Text-->
                                        <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold lh-0">Vue
                                            3</a>
                                        <!--end::Text-->
                                        <!--begin::Description-->
                                        <span class="text-gray-500 fw-semibold d-block fs-6">JS Framework</span>
                                        <!--end::Description=-->
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Statistics-->
                                <div class="d-flex align-items-center w-100 mw-125px">
                                    <!--begin::Progress-->
                                    <div class="progress h-6px w-100 me-2 bg-light-warning">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 87%"
                                            aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <!--end::Progress-->
                                    <!--begin::Value-->
                                    <span class="text-gray-500 fw-semibold">87%</span>
                                    <!--end::Value-->
                                </div>
                                <!--end::Statistics-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Separator-->
                            <div class="separator separator-dashed my-3"></div>
                            <!--end::Separator-->
                            <!--begin::Item-->
                            <div class="d-flex flex-stack">
                                <!--begin::Wrapper-->
                                <div class="d-flex align-items-center me-3">
                                    <!--begin::Logo-->
                                    <img src="{{ asset('assets') }}/media/svg/brand-logos/bootstrap5.svg"
                                        class="me-4 w-30px" alt="">
                                    <!--end::Logo-->
                                    <!--begin::Section-->
                                    <div class="flex-grow-1">
                                        <!--begin::Text-->
                                        <a href="#"
                                            class="text-gray-800 text-hover-primary fs-5 fw-bold lh-0">Bootstrap
                                            5</a>
                                        <!--end::Text-->
                                        <!--begin::Description-->
                                        <span class="text-gray-500 fw-semibold d-block fs-6">CSS Framework</span>
                                        <!--end::Description=-->
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Statistics-->
                                <div class="d-flex align-items-center w-100 mw-125px">
                                    <!--begin::Progress-->
                                    <div class="progress h-6px w-100 me-2 bg-light-primary">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 44%"
                                            aria-valuenow="44" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <!--end::Progress-->
                                    <!--begin::Value-->
                                    <span class="text-gray-500 fw-semibold">44%</span>
                                    <!--end::Value-->
                                </div>
                                <!--end::Statistics-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Separator-->
                            <div class="separator separator-dashed my-3"></div>
                            <!--end::Separator-->
                            <!--begin::Item-->
                            <div class="d-flex flex-stack">
                                <!--begin::Wrapper-->
                                <div class="d-flex align-items-center me-3">
                                    <!--begin::Logo-->
                                    <img src="{{ asset('assets') }}/media/svg/brand-logos/angular-icon.svg"
                                        class="me-4 w-30px" alt="">
                                    <!--end::Logo-->
                                    <!--begin::Section-->
                                    <div class="flex-grow-1">
                                        <!--begin::Text-->
                                        <a href="#"
                                            class="text-gray-800 text-hover-primary fs-5 fw-bold lh-0">Angular
                                            16</a>
                                        <!--end::Text-->
                                        <!--begin::Description-->
                                        <span class="text-gray-500 fw-semibold d-block fs-6">JS Framework</span>
                                        <!--end::Description=-->
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Statistics-->
                                <div class="d-flex align-items-center w-100 mw-125px">
                                    <!--begin::Progress-->
                                    <div class="progress h-6px w-100 me-2 bg-light-info">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 70%"
                                            aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <!--end::Progress-->
                                    <!--begin::Value-->
                                    <span class="text-gray-500 fw-semibold">70%</span>
                                    <!--end::Value-->
                                </div>
                                <!--end::Statistics-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Separator-->
                            <div class="separator separator-dashed my-3"></div>
                            <!--end::Separator-->
                            <!--begin::Item-->
                            <div class="d-flex flex-stack">
                                <!--begin::Wrapper-->
                                <div class="d-flex align-items-center me-3">
                                    <!--begin::Logo-->
                                    <img src="{{ asset('assets') }}/media/svg/brand-logos/spring-3.svg"
                                        class="me-4 w-30px" alt="">
                                    <!--end::Logo-->
                                    <!--begin::Section-->
                                    <div class="flex-grow-1">
                                        <!--begin::Text-->
                                        <a href="#"
                                            class="text-gray-800 text-hover-primary fs-5 fw-bold lh-0">Spring</a>
                                        <!--end::Text-->
                                        <!--begin::Description-->
                                        <span class="text-gray-500 fw-semibold d-block fs-6">Java Framework</span>
                                        <!--end::Description=-->
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Statistics-->
                                <div class="d-flex align-items-center w-100 mw-125px">
                                    <!--begin::Progress-->
                                    <div class="progress h-6px w-100 me-2 bg-light-danger">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 56%"
                                            aria-valuenow="56" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <!--end::Progress-->
                                    <!--begin::Value-->
                                    <span class="text-gray-500 fw-semibold">56%</span>
                                    <!--end::Value-->
                                </div>
                                <!--end::Statistics-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Separator-->
                            <div class="separator separator-dashed my-3"></div>
                            <!--end::Separator-->
                            <!--begin::Item-->
                            <div class="d-flex flex-stack">
                                <!--begin::Wrapper-->
                                <div class="d-flex align-items-center me-3">
                                    <!--begin::Logo-->
                                    <img src="{{ asset('assets') }}/media/svg/brand-logos/typescript-1.svg"
                                        class="me-4 w-30px" alt="">
                                    <!--end::Logo-->
                                    <!--begin::Section-->
                                    <div class="flex-grow-1">
                                        <!--begin::Text-->
                                        <a href="#"
                                            class="text-gray-800 text-hover-primary fs-5 fw-bold lh-0">TypeScript</a>
                                        <!--end::Text-->
                                        <!--begin::Description-->
                                        <span class="text-gray-500 fw-semibold d-block fs-6">Better Tooling</span>
                                        <!--end::Description=-->
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Statistics-->
                                <div class="d-flex align-items-center w-100 mw-125px">
                                    <!--begin::Progress-->
                                    <div class="progress h-6px w-100 me-2 bg-light-success">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 82%"
                                            aria-valuenow="82" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <!--end::Progress-->
                                    <!--begin::Value-->
                                    <span class="text-gray-500 fw-semibold">82%</span>
                                    <!--end::Value-->
                                </div>
                                <!--end::Statistics-->
                            </div>
                            <!--end::Item-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::List widget 21-->
                </div>
            </div>
        @endif
    </div>
@endsection
