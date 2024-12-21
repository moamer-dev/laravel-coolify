@extends('layouts.front')
<style>
    .avatar-md {
        height: 2.5rem;
        width: 2.5rem;
    }

    .card-hover:hover {
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, .1), 0 4px 6px -2px rgba(0, 0, 0, .05) !important;
    }

    .card-hover {
        transition: box-shadow .25s ease;
    }

    .accordion {
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .accordion-body {
        max-height: 300px;
        overflow-y: auto;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        align-items: stretch;
        /* Ensures all columns stay aligned */
    }

    .accordion-item-inner:hover {
        background-color: #f5f5f5;
        transition: background-color 0.3s ease;
    }
</style>
@section('content')
    <div style="min-height: 78vh;">
        <section style="background: linear-gradient(112.14deg, #9d4eff 0%, #7239ea 100%)">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12 py-3">
                        <div class="py-4 py-lg-6">
                            <h1 class="mb-0 text-white display-6">المسارات الخاصة بـ {{ $path->title }}</h1>
                            <p class="text-white mb-0 fs-3">قم بالضغط على المسار الفرعي لإظهار التكنولوجيات الخاصة به</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="container py-7">
            <div class="row">
                <div class="col-md-4">
                    <div id="kt_docs_search_handler_basic" data-kt-search-keypress="true" data-kt-search-min-length="2"
                        data-kt-search-enter="true" data-kt-search-layout="inline">
                        <form data-kt-search-element="form" class="w-100 position-relative mb-5" autocomplete="off">
                            <input type="hidden" />
                            <input type="text" class="form-control form-control-lg  px-15 bg-gray-200" name="search"
                                value="" placeholder="إبحث عن تكنولوجيا معينة" data-kt-search-element="input" />

                            <span class="position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-5"
                                data-kt-search-element="spinner">
                                <span class="spinner-border h-15px w-15px align-middle text-gray-500"></span>
                            </span>
                            <span
                                class="btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 me-5 d-none"
                                data-kt-search-element="clear">

                            </span>
                        </form>
                        {{-- <div class="py-5">
                            <div data-kt-search-element="suggestions">
                                ...
                            </div>

                            <div data-kt-search-element="results" class="d-none">
                                ...
                            </div>

                            <div data-kt-search-element="empty" class="text-center d-none">
                                ...
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <a class="btn btn-primary mt-3 mb-4 " href="/#paths">
                            عودة للمسارات
                        </a>
                    </div>
                </div>
                <div class="row">
                    @if ($path->learningStacks->count() == 0)
                        @include('components/shared/no-content')
                    @endif
                    @foreach ($path->learningStacks as $key => $stack)
                        <div class="col-xl-4 col-lg-6 col-md-6 col-12 my-3">
                            {{-- <div class="accordion h-100">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="kt_accordion_1_header_path_{{ $key + 1 }}">
                                            <button class="accordion-button fs-4 fw-semibold text-gray-800 bg-white"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#kt_accordion_1_body_path_{{ $key + 1 }}"
                                                aria-expanded="false"
                                                aria-controls="kt_accordion_1_body_path_{{ $key + 1 }}">
                                                <img src="http://127.0.0.1:8000/assets/media/svg/brand-logos/laravel-2.svg"
                                                    class="me-4 w-30px" alt="">
                                                {{ $stack->title }}
                                            </button>
                                        </h2>
                                        <div id="kt_accordion_1_body_path_{{ $key + 1 }}"
                                            class="accordion-collapse collapse"
                                            aria-labelledby="kt_accordion_1_header_path_{{ $key + 1 }}">
                                            <div class="accordion-body overflow-auto">
                                                <div class="card-body pt-5">
                                                    @foreach ($stack->technologyStacks as $technology)
                                                        <div class="d-flex flex-stack accordion-item-inner rounded p-2">
                                                            <div class="d-flex align-items-center me-3 py-3">
                                                                <img src="http://127.0.0.1:8000/assets/media/svg/brand-logos/laravel-2.svg"
                                                                    class="me-4 w-30px" alt="">
                                                                <div class="flex-grow-1">
                                                                    <a href="#"
                                                                        class="text-gray-800 text-hover-primary fs-5 fw-bold lh-0">{{ $technology->name }}</a>
                                                                    <span
                                                                        class="text-gray-500 fw-semibold d-block fs-6 mt-4">PHP
                                                                        Framework</span>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center w-100 mw-125px">
                                                                <div class="progress h-6px w-100 me-2 bg-light-success">
                                                                    <div class="progress-bar bg-success" role="progressbar"
                                                                        style="width: 65%" aria-valuenow="65"
                                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                                <span class="text-gray-500 fw-semibold">65%</span>
                                                            </div>
                                                        </div>
                                                        <div class="separator separator-dashed my-3"></div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            <div class="card ">
                                <!--begin::Header-->
                                <div class="card-header border-0 pt-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bold text-gray-900">{{ $stack->title }}</span>
                                        <span class="text-muted mt-1 fw-semibold fs-7">{{ $stack->description }}</span>
                                    </h3>
                                </div>
                                <div class="card-body pt-5" style="max-height: 350px; overflow-y: auto; min-height: 350px;">
                                    @if ($stack->technologyStacks->count() == 0)
                                        <div class="mb-2 w-100 text-center">
                                            <span class="fs-6 text-gray-800 text-center lh-lg mt-4 fw-bolder">سيتم إضافة
                                                محتوى
                                                قريباً
                                                <br>
                                            </span>
                                            <div class="py-10 text-center">
                                                <img src="assets/media/svg/illustrations/easy/2.svg"
                                                    class="theme-light-show w-200px" alt="">
                                                <img src="assets/media/svg/illustrations/easy/2-dark.svg"
                                                    class="theme-dark-show w-200px" alt="">
                                            </div>
                                        </div>
                                        <div class="text-center mb-1">
                                            <a href="{{ route('profile.learning-path') }}"
                                                class="btn btn-sm btn-primary me-2">إشعاري بالتحديثات
                                            </a>
                                            <a class="btn btn-sm btn-light" href="account/settings.html">مركز المساعدة</a>
                                        </div>
                                    @endif
                                    @foreach ($stack->technologyStacks as $technology)
                                        <a href="{{ route('technology-view', $technology->slug) }}"
                                            class="text-decoration-none">
                                            <div class="d-flex flex-stack accordion-item-inner rounded p-2">
                                                <div class="d-flex align-items-center me-3 py-3">
                                                    <img src="http://127.0.0.1:8000/assets/media/svg/brand-logos/laravel-2.svg"
                                                        class="me-4 w-30px" alt="">
                                                    <div class="flex-grow-1">
                                                        <span
                                                            class="text-gray-800 text-hover-primary fs-5 fw-bold lh-0">{{ $technology->name }}</span>
                                                        <span class="text-gray-500 fw-semibold d-block fs-6 mt-4">PHP
                                                            Framework</span>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center w-100 mw-125px">
                                                    <div class="progress h-6px w-100 me-2 bg-light-success">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            style="width: 65%" aria-valuenow="65" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                    <span class="text-gray-500 fw-semibold">65%</span>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="separator separator-dashed my-3"></div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
        </section>
    </div>
@endsection
