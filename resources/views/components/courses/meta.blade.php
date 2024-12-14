<div class="card mb-4 card-flush">
    <img src="{{ photo_or_default($course->feature_image) }}" alt="course" class="card-img-top">
    <!-- Card body -->
    <div class="card-body">
        <div class="d-flex flex-column h-100">
            <!--begin::Header-->
            <div class="mb-7">
                <!--begin::Items-->
                <div class="d-flex align-items-center justify-content-center flex-wrap d-grid gap-2">
                    <!--begin::Item-->
                    <div class="d-flex align-items-center me-5 ">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-30px symbol-circle me-3">
                            <img src="{{ photo_or_default($course->creator->profile->avatar) }}" class=""
                                alt="">
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Info-->
                        <div class="m-0">
                            <span class="fw-semibold text-gray-500 d-block fs-8">creator</span>
                            <a href="pages/user-profile/overview.html"
                                class="fw-bold text-gray-800 text-hover-primary fs-7">{{ $course->creator->name }}</a>
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="d-flex align-items-center me-5">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-30px symbol-circle me-3">
                            <span class="symbol-label bg-success">
                                <i class="ki-outline ki-abstract-41 fs-5 text-white"></i>
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Info-->
                        <div class="m-0">
                            <span class="fw-semibold text-gray-500 d-block fs-8">Budget</span>
                            <span class="fw-bold text-gray-800 fs-7">$64.800</span>
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="d-flex align-items-center me-5 ">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-30px symbol-circle me-3">
                            <span class="symbol-label bg-success">
                                <i class="ki-outline ki-abstract-41 fs-5 text-white"></i>
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Info-->
                        <div class="m-0">
                            <span class="fw-semibold text-gray-500 d-block fs-8">Budget</span>
                            <span class="fw-bold text-gray-800 fs-7">$64.800</span>
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Item-->
                </div>
                <!--end::Items-->
            </div>
            <!--end::Header-->
            <!--begin::Footer-->
            <div class="d-flex flex-stack mt-auto bd-highlight">
                <!--begin::Users group-->
                <div class="symbol-group symbol-hover flex-nowrap">
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Melody Macy"
                        data-bs-original-title="Melody Macy" data-kt-initialized="1">
                        <img alt="Pic" src="{{ asset('assets') }}/media/avatars/300-2.jpg">
                    </div>
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Michael Eberon"
                        data-bs-original-title="Michael Eberon" data-kt-initialized="1">
                        <img alt="Pic" src="{{ asset('assets') }}/media/avatars/300-3.jpg">
                    </div>
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                        data-bs-original-title="Susan Redwood" data-kt-initialized="1">
                        <span class="symbol-label bg-primary text-inverse-primary fw-bold">S</span>
                    </div>
                </div>
                <!--end::Users group-->
                <!--begin::Actions-->
                <a href="#"
                    class="d-flex align-items-center text-primary opacity-75-hover fs-6 fw-semibold">Manage the
                    Curriculum
                    <i class="ki-outline ki-exit-right-corner fs-4 ms-1"></i></a>
                <!--end::Actions-->
            </div>
            <!--end::Footer-->
        </div>
    </div>
</div>

<div class="card mb-4">
    <!--begin::Header-->
    <div class="card-header pt-5">
        <!--begin::Title-->
        <h3 class="card-title text-gray-800"> What’s included</h3>
        <!--end::Title-->
        <!--begin::Toolbar-->
        <div class="card-toolbar d-none">
            <!--begin::Daterangepicker(defined in src/js/layout/app.js)-->
            <div data-kt-daterangepicker="true" data-kt-daterangepicker-opens="left"
                class="btn btn-sm btn-light d-flex align-items-center px-4" data-kt-initialized="1">
                <!--begin::Display range-->
                <div class="text-gray-600 fw-bold">10 Mar 2024 - 8 Apr 2024</div>
                <!--end::Display range-->
                <i class="ki-outline ki-calendar-8 fs-1 ms-2 me-0"></i>
            </div>
            <!--end::Daterangepicker-->
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body pt-5">
        <!--begin::Item-->
        <div class="d-flex ">
            <span class="me-2">
                <i class="bi bi-play-circle fs-1 me-2" style="color: #844aff" data-section-id="19"></i>
            </span>
            <div class="text-gray-700 fw-semibold fs-6 me-2">Avg. Client Rating</div>
        </div>
        <!--end::Item-->
        <!--begin::Separator-->
        <div class="separator separator-dashed my-3"></div>
        <!--end::Separator-->
        <!--begin::Item-->
        <div class="d-flex">
            <span class="me-2">
                <i class="bi bi-play-circle fs-1 me-2" style="color: #844aff" data-section-id="19"></i>
            </span>
            <div class="text-gray-700 fw-semibold fs-6 me-2">Avg. Quotes</div>
        </div>
        <!--end::Item-->
        <!--begin::Separator-->
        <div class="separator separator-dashed my-3"></div>
        <!--end::Separator-->
        <!--begin::Item-->
        <div class="d-flex">
            <span class="me-2">
                <i class="bi bi-play-circle fs-1 me-2" style="color: #844aff" data-section-id="19"></i>
            </span>
            <div class="text-gray-700 fw-semibold fs-6 me-2">Avg. Agent Earnings</div>
        </div>
        <!--end::Item-->
    </div>
    <!--end::Body-->
</div>
<!-- Card -->
<div class="card">
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
                <img src="{{ asset('assets') }}/media/svg/illustrations/easy/2.svg" class="theme-light-show w-200px"
                    alt="">
                <img src="{{ asset('assets') }}/media/svg/illustrations/easy/2-dark.svg" class="theme-dark-show w-200px"
                    alt="">
            </div>
            <!--end::Illustration-->
        </div>
        <!--end::Heading-->
        <!--begin::Links-->
        <div class="text-center mb-1">
            <!--begin::Link-->
            <a class="btn btn-sm btn-primary me-2" data-bs-target="#kt_modal_new_address" data-bs-toggle="modal">Try
                Now</a>
            <!--end::Link-->
            <!--begin::Link-->
            <a class="btn btn-sm btn-light" href="apps/user-management/users/view.html">Learn More</a>
            <!--end::Link-->
        </div>
        <!--end::Links-->
    </div>
    <!--end::Body-->
</div>
