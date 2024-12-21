@php
    $zaytonah = $item->zaytonahs->first();
@endphp
<div class="col-12 mb-4">
    <div class="card card-flush h-md-100">
        <div class="card-body py-9">
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
                <div class="col-md-12">
                    <div class="d-flex flex-column h-100">
                        <div class="mb-7">
                            <div class="d-flex flex-stack mb-6">
                                <div class="flex-shrink-0 me-5">
                                    <span class="text-gray-500 fs-7 fw-bold me-2 d-block lh-1 pb-1">مميزة</span>
                                    <span class="text-gray-800 fs-1 fw-bold">
                                        <a
                                            href="{{ route('zaytonah.view', ['series' => $item->slug, 'zaytonah' => $zaytonah->id]) }}">
                                            {{ $item->name }}
                                        </a>
                                    </span>
                                </div>
                                <span class="badge badge-light-primary flex-shrink-0 align-self-center py-3 px-4 fs-7">
                                    {{ $item->technologyStack->name }}</span>
                            </div>
                            <div class="d-flex align-items-center flex-wrap d-grid gap-2">
                                <div class="d-flex align-items-center me-5 me-xl-13">
                                    <div class="symbol symbol-30px symbol-circle me-3">
                                        <img src="assets/media/avatars/300-3.jpg" class="" alt="">
                                    </div>
                                    <div class="m-0">
                                        <span class="fw-semibold text-gray-500 d-block fs-8">مقدم السلسلة</span>
                                        <a href="pages/user-profile/overview.html"
                                            class="fw-bold text-gray-800 text-hover-primary fs-7">محمد عامر</a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-30px symbol-circle me-3">
                                        <span class="symbol-label bg-success">
                                            <i class="ki-outline ki-abstract-41 fs-5 text-white"></i>
                                        </span>
                                    </div>
                                    <div class="m-0">
                                        <span class="fw-semibold text-gray-500 d-block fs-8">عدد الزيتونات</span>
                                        <span class="fw-bold text-gray-800 fs-7">{{ $item->zaytonahs->count() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-6">
                            <span class="fw-semibold text-gray-600 fs-6 mb-8 d-block">{{ $item->description }}</span>
                        </div>
                        <div class="d-flex flex-stack mt-auto bd-highlight">
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
                            <a href="{{ route('zaytonah.view', ['series' => $item->slug, 'zaytonah' => $zaytonah->id]) }}"
                                class="d-flex align-items-center text-primary opacity-75-hover fs-6 fw-semibold">مشاهدة
                                الزيتونات
                                <i class="ki-outline ki-exit-right-corner fs-4 ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
