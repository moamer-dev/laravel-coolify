<div class="card mb-4 card-flush">
    <img src="{{ feature_image_or_default($course->feature_image) }}" alt="course" class="card-img-top">
    <!-- Card body -->
    <div class="card-body">
        <div class="d-flex flex-column h-100">
            <div class="d-flex flex-stack mt-auto bd-highlight mb-7">
                <div class="d-flex align-items-center justify-content-center flex-wrap d-grid gap-2">
                    <div class="d-flex align-items-center me-5 ">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-30px symbol-circle me-3">
                            <img src="{{ photo_or_default($course->creator->profile->avatar) }}" class=""
                                alt="">
                        </div>
                        <div class="m-0">
                            <span class="fw-semibold text-gray-500 d-block fs-8">المدرب</span>
                            <a href="pages/user-profile/overview.html"
                                class="fw-bold text-gray-800 text-hover-primary fs-7">{{ $course->creator->name }}</a>
                        </div>
                    </div>
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
                            <span class="fw-semibold text-gray-500 d-block fs-8">التكنولوجيات</span>
                            <span class="fw-bold text-gray-800 fs-7">
                                {{ $course->technologyStacks->pluck('name')->join(', ') }}
                            </span>
                        </div>
                        <!--end::Info-->
                    </div>
                </div>
            </div>
            <div class="d-flex flex-stack mt-auto bd-highlight">
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
                <a href="#"
                    class="d-flex align-items-center text-primary opacity-75-hover fs-6 fw-semibold">Manage the
                    Curriculum
                    <i class="ki-outline ki-exit-right-corner fs-4 ms-1"></i></a>
            </div>
        </div>
    </div>
</div>
