@php
    $zaytonah = $item->zaytonahs->first();
@endphp

<div class="card card-flush h-md-100">
    <div class="card-body py-9">
        <div class="row gx-9 h-100">
            @php
                $averageRating = round($item->reviews->where('is_approved')->avg('rating'), 1);
            @endphp
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
                                <!-- Stars Positioned Below the Title -->
                                <div class="mt-2">
                                    @for ($i = 5; $i >= 1; $i--)
                                        @if ($i <= floor($averageRating))
                                            <i class="bi bi-star-fill text-warning fs-5"></i>
                                        @elseif ($i == ceil($averageRating) && $averageRating - floor($averageRating) >= 0.5)
                                            <i class="bi bi-star-half text-warning fs-5"></i>
                                        @else
                                            <i class="bi bi-star text-secondary fs-5"></i>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                            <div class="col-auto text-center">
                                <h3 class="fs-1 fw-bold">{{ number_format($averageRating, 1) }}</h3>
                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#reviewModal">
                                    التقييمات
                                </button>

                            </div>
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
                            <div class="d-flex align-items-center me-5 me-xl-13">
                                <div class="symbol symbol-30px symbol-circle me-3">
                                    <img src="{{ photo_or_default($item->technologyStack->image) }}" class=""
                                        alt="">
                                </div>
                                <div class="m-0">
                                    <span class="fw-semibold text-gray-500 d-block fs-8">موضوعات السلسلة</span>
                                    <a href="pages/user-profile/overview.html"
                                        class="fw-bold text-gray-800 text-hover-primary fs-7">{{ $item->technologyStack->name }}</a>
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
                                aria-label="Melody Macy" data-bs-original-title="Melody Macy" data-kt-initialized="1">
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

<!-- Modal: Scrollable -->
<div class="modal fade" id="reviewModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">التقييمات</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @livewire('shared.review', ['series' => $item], key('review-' . $item->id))
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">غلق</button>
            </div>
        </div>
    </div>
</div>
