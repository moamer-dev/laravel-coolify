<div class="card card-flush h-xl-100">
    <!--begin::Heading-->
    <div class="card-header rounded bgi-no-repeat bgi-size-cover bgi-position-y-top bgi-position-x-center align-items-start h-250px"
        style="background-image:url('{{ asset('assets') }}/media/svg/shapes/top-green.png" data-bs-theme="light">
        <!--begin::Title-->
        <h3 class="card-title align-items-start flex-column text-white pt-15">
            <span class="fw-bold fs-2x mb-3">مصادر تعليمية بإنتظارك</span>
            <div class="fs-4 text-white">
                <span class="opacity-75">لديك </span>
                <span class="position-relative d-inline-block">
                    <span class="link-white opacity-75-hover fw-bold d-block mb-1">{{ $tasksCount }}
                        مصادر تعليمية</span>
                    <!--begin::Separator-->
                    <span
                        class="position-absolute opacity-50 bottom-0 start-0 border-2 border-body border-bottom w-100"></span>
                    <!--end::Separator-->
                </span>
                <span class="opacity-75">تنتظرك لإكمالها</span>
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
                            <span class="text-gray-500 fw-semibold fs-6">دورات</span>
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
                            <span class="text-gray-500 fw-semibold fs-6">إختبارات</span>
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
                            <span class="text-gray-500 fw-semibold fs-6">مشاريع</span>
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
                                class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{ $pathSeries->count() }}</span>
                            <!--end::Number-->
                            <!--begin::Desc-->
                            <span class="text-gray-500 fw-semibold fs-6">سلاسل تعليمية</span>
                            <!--end::Desc-->
                        </div>
                        <!--end::Stats-->
                    </div>
                    <!--end::Items-->
                </div>
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
                                class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{ $pathSeries->count() }}</span>
                            <!--end::Number-->
                            <!--begin::Desc-->
                            <span class="text-gray-500 fw-semibold fs-6">مقالات</span>
                            <!--end::Desc-->
                        </div>
                        <!--end::Stats-->
                    </div>
                    <!--end::Items-->
                </div>
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
                                class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{ $pathSeries->count() }}</span>
                            <!--end::Number-->
                            <!--begin::Desc-->
                            <span class="text-gray-500 fw-semibold fs-6">مصادر خارجية</span>
                            <!--end::Desc-->
                        </div>
                        <!--end::Stats-->
                    </div>
                    <!--end::Items-->
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Stats-->
    </div>
    <!--end::Body-->
</div>
