<style>
    .avatar-lg {
        height: 3.5rem;
        width: 3.5rem;
    }

    .rounded-circle {
        border-radius: 50% !important;
    }
</style>
<div class="tab-pane fade" id="kt_tab_pane_6" role="tabpanel">
    <div class="mb-3">
        <h3 class="mb-4">حصلت هذه الدورة على إجمالي تقييم</h3>
        <div class="row align-items-center">
            <div class="col-auto text-center">
                @php
                    $averageRating = round($course->reviews->avg('rating'), 1);
                @endphp
                <h3 class="display-2 fw-bold">{{ number_format($averageRating, 1) }}</h3>
                <span class="fs-6">
                    @for ($i = 5; $i >= 1; $i--)
                        @if ($i <= floor($averageRating))
                            <i class="bi bi-star-fill text-warning"></i>
                        @elseif ($i == ceil($averageRating) && $averageRating - floor($averageRating) >= 0.5)
                            <i class="bi bi-star-half text-warning"></i>
                        @else
                            <i class="bi bi-star text-secondary"></i>
                        @endif
                    @endfor
                </span>
                <p class="mb-0 fs-6">(بناءاً على {{ $course->reviews->count() }} تقييمات)</p>
            </div>
            <!-- Progress Bars for Rating Distribution -->
            <div class="col order-3 order-md-2">
                @php
                    $totalReviews = $course->reviews->count();
                    $ratingCounts = [
                        5 => $course->reviews->where('rating', 5)->count(),
                        4 => $course->reviews->where('rating', 4)->count(),
                        3 => $course->reviews->where('rating', 3)->count(),
                        2 => $course->reviews->where('rating', 2)->count(),
                        1 => $course->reviews->where('rating', 1)->count(),
                    ];
                @endphp
                @foreach ($ratingCounts as $rating => $count)
                    <div class="d-flex align-items-center mb-2">
                        <span class="me-2">{{ $rating }} <i class="bi bi-star-fill text-warning"></i></span>
                        <div class="progress flex-grow-1" style="height: 6px;">
                            <div class="progress-bar bg-warning" role="progressbar"
                                style="width: {{ $totalReviews > 0 ? ($count / $totalReviews) * 100 : 0 }}%;"
                                aria-valuenow="{{ $count }}" aria-valuemin="0"
                                aria-valuemax="{{ $totalReviews }}"></div>
                        </div>
                        <span class="ms-2 text-muted">{{ $count }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <hr class="my-5">
    <div class="mb-3">
        <div class="d-lg-flex align-items-center justify-content-between mb-5">
            <div class="mb-3 mb-lg-0">
                <h3 class="mb-0">التقييمات</h3>
            </div>
        </div>
        @foreach ($course->reviews as $review)
            <div class="d-flex align-items-start border-bottom pb-4 mb-4">
                <img src="{{ photo_or_default($review->user->profile->avatar) }}" alt=""
                    class="rounded-circle avatar-lg">
                <div class="ms-3">
                    <h4 class="mb-1">
                        {{ $review->user->name }}
                    </h4>
                    <div class="mb-2 d-inline-flex align-items-center">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= floor($review->rating))
                                <i class="bi bi-star-fill text-warning"></i>
                            @elseif ($i == ceil($review->rating) && $review->rating - floor($review->rating) >= 0.5)
                                <i class="bi bi-star-half text-warning"></i>
                            @else
                                <i class="bi bi-star text-secondary"></i>
                            @endif
                        @endfor
                        <span class="ms-2 text-muted">{{ number_format($review->rating, 1) }}</span>
                    </div>
                    <p>{{ $review->review }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
