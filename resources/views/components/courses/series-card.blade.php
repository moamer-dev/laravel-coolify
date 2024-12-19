@php
    $zaytonah = $item->zaytonahs->first();
@endphp
<div class="col-12 mb-4">
    <div class="card card-flush h-md-100">
        <!--begin::Body-->
        <div class="card-body py-9">
            <!--begin::Row-->
            <div class="row gx-9 h-100">
                {{-- <!--begin::Col-->
                <div class="col-md-6 mb-10 mb-sm-0">
                    <!--begin::Image-->
                    <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-400px min-h-sm-100 h-100"
                        style="background-size: 100% 100%;background-image:url('assets/media/stock/600x600/img-33.jpg')">
                    </div>
                    <!--end::Image-->
                </div>
                <!--end::Col--> --}}
                <!--begin::Col-->
                <div class="col-md-12">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column h-100">
                        <!--begin::Header-->
                        <div class="mb-7">
                            <!--begin::Headin-->
                            <div class="d-flex flex-stack mb-6">
                                <!--begin::Title-->
                                <div class="flex-shrink-0 me-5">
                                    <span class="text-gray-500 fs-7 fw-bold me-2 d-block lh-1 pb-1">Featured</span>
                                    <span class="text-gray-800 fs-1 fw-bold">
                                        <a
                                            href="{{ route('zaytonah.view', ['series' => $item->slug, 'zaytonah' => $zaytonah->id]) }}">
                                            {{ $item->name }}
                                        </a>
                                    </span>
                                </div>
                                <!--end::Title-->
                                <span
                                    class="badge badge-light-primary flex-shrink-0 align-self-center py-3 px-4 fs-7">In
                                    Process</span>
                            </div>
                            <!--end::Heading-->
                            <!--begin::Items-->
                            <div class="d-flex align-items-center flex-wrap d-grid gap-2">
                                <!--begin::Item-->
                                <div class="d-flex align-items-center me-5 me-xl-13">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-30px symbol-circle me-3">
                                        <img src="assets/media/avatars/300-3.jpg" class="" alt="">
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Info-->
                                    <div class="m-0">
                                        <span class="fw-semibold text-gray-500 d-block fs-8">Manager</span>
                                        <a href="pages/user-profile/overview.html"
                                            class="fw-bold text-gray-800 text-hover-primary fs-7">Robert Fox</a>
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-30px symbol-circle me-3">
                                        <span class="symbol-label bg-success">
                                            <i class="ki-outline ki-abstract-41 fs-5 text-white"></i>
                                        </span>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Info-->
                                    <div class="m-0">
                                        <span class="fw-semibold text-gray-500 d-block fs-8">Zaytonahs</span>
                                        <span class="fw-bold text-gray-800 fs-7">{{ $item->zaytonahs->count() }}</span>
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::Item-->
                            </div>
                            <!--end::Items-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="mb-6">
                            <!--begin::Text-->
                            <span class="fw-semibold text-gray-600 fs-6 mb-8 d-block">{{ $item->description }}</span>
                            <!--end::Text-->
                        </div>
                        <!--end::Body-->
                        <!--begin::Footer-->
                        <div class="d-flex flex-stack mt-auto bd-highlight">
                            <!--begin::Users group-->
                            <div class="symbol-group symbol-hover flex-nowrap">
                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                    aria-label="Melody Macy" data-bs-original-title="Melody Macy"
                                    data-kt-initialized="1">
                                    <img alt="Pic" src="assets/media/avatars/300-2.jpg">
                                </div>
                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                    aria-label="Michael Eberon" data-bs-original-title="Michael Eberon"
                                    data-kt-initialized="1">
                                    <img alt="Pic" src="assets/media/avatars/300-3.jpg">
                                </div>
                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                    data-bs-original-title="Susan Redwood" data-kt-initialized="1">
                                    <span class="symbol-label bg-primary text-inverse-primary fw-bold">S</span>
                                </div>
                            </div>
                            <!--end::Users group-->
                            <!--begin::Actions-->
                            <a href="{{ route('zaytonah.view', ['series' => $item->slug, 'zaytonah' => $zaytonah->id]) }}"
                                class="d-flex align-items-center text-primary opacity-75-hover fs-6 fw-semibold">View
                                Zaytonahs
                                <i class="ki-outline ki-exit-right-corner fs-4 ms-1"></i></a>
                            <!--end::Actions-->
                        </div>

                        <!--end::Footer-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Body-->
    </div>
</div>
