<style>
    .card-link-hover:hover .card-title {
        color: var(--bs-primary) !important;
        text-decoration: none;
    }
</style>
<a href="{{ route('course.view', [$item->slug]) }}" class="text-decoration-none card-link-hover">
    <div class="card shadow-sm fw-semibold border-0 mx-auto card-lift hover-elevate-up parent-hover"
        style="max-width: 22rem;">
        <div class="card-header text-uppercase d-flex align-items-center justify-content-start"
            style="min-height: 60px !important">
            <i class="bi bi-mortarboard-fill fs-2 px-2 text-primary"></i>
            <span class="fs-6">دورات تدريبية</span>
        </div>

        <div class="card-body">
            <h5 class="card-title d-flex align-items-center mb-4 text-hover-primary">
                <span class="text-inherit">{{ $item->name }}</span>
            </h5>
            <p class="card-text text-muted">
                {{ $item->short_title }}
            </p>
        </div>

        <div class="card-footer px-8 py-5 d-flex justify-content-between flex-wrap">
            <div class="btn btn-link text-decoration-none d-flex align-items-center">
                <i class="bi bi-bar-chart fs-3 text-primary"></i>
                <span class="fs-7">{{ $item->level->name }}</span>
            </div>
            <div class="btn btn-link text-decoration-none d-flex align-items-center">
                <i class="bi bi-play-circle fs-3 text-primary"></i>
                <span class="fs-7">{{ $item->sections->flatMap(fn($section) => $section->lessons)->count() }}
                    دروس</span>
            </div>
        </div>
    </div>
</a>




{{-- <div class="card">
    <a href="{{ route('course.view', [$item->slug]) }}">
        <img src="{{ feature_image_or_default($item->feature_image) }}" class="card-img-top course-image"
            alt="{{ $item->name }}">
    </a>
    <div class="card-body">
        <h5 class="card-title"><a href="{{ route('course.view', [$item->slug]) }}"
                class="text-inherit">{{ $item->name }}</a></h5>
        <p class="card-text">{{ $item->short_title }}</p>
    </div>
    <div class="card-footer">
        <div class="row align-items-center g-0">
            <div>
                <span class="fw-semibold">{!! getFormattedPriceFront($item) !!}</span>
            </div>
            <div>
                <span class="fw-semibold">
                    @foreach ($item->categories as $category)
                        {{ $category->name }}
                    @endforeach
                </span>
                </span>
            </div>
            <div>
                <span class="fw-semibold">{{ $item->level->name }}</span>
            </div>
            <div class="col-auto">
                <a href="#" class="text-reset bookmark">
                    <i class="fe fe-bookmark fs-4"></i>
                </a>
            </div>
        </div>
    </div>
</div> --}}
