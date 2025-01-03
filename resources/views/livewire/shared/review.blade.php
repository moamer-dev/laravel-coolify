<style>
    .avatar-lg {
        height: 3.5rem;
        width: 3.5rem;
    }

    .rounded-circle {
        border-radius: 50% !important;
    }
</style>

<div>
    @if ($model->reviews->isEmpty())
        <span class="fw-semibold">لم يتم إضافة تقييمات لهذه الدورة بعد.
        </span>
    @else
        <div class="mb-3">
            <h3 class="mb-4">{{ $title }}</h3>
            <div class="row align-items-center">
                <div class="col-auto text-center">
                    @php
                        $averageRating = round($model->reviews->where('is_approved')->avg('rating'), 1);
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
                    <p class="mb-0 fs-6">(بناءاً على {{ $model->reviews->where('is_approved')->count() }} تقييمات)</p>
                </div>
                <div class="col order-3 order-md-2">
                    @php
                        $totalReviews = $model->reviews->where('is_approved', true)->count();
                        $ratingCounts = $model->reviews
                            ->where('is_approved', true)
                            ->groupBy('rating')
                            ->map(fn($group) => $group->count())
                            ->toArray();
                        $ratingCounts = array_replace(array_fill(1, 5, 0), $ratingCounts);
                        krsort($ratingCounts);
                    @endphp
                    @foreach ($ratingCounts as $rating => $count)
                        <div class="d-flex align-items-center mb-2">
                            <span class="me-2">{{ $rating }} <i class="bi bi-star-fill text-warning"></i></span>
                            <div class="progress flex-grow-1" style="height: 6px;">
                                <div class="progress-bar bg-warning" role="progressbar"
                                    style="width: {{ $totalReviews > 0 ? ($count / $totalReviews) * 100 : 0 }}%;"
                                    aria-valuenow="{{ $count }}" aria-valuemin="0"
                                    aria-valuemax="{{ $totalReviews }}">
                                </div>
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
            @foreach ($model->reviews->where('is_approved') as $review)
                <div class="d-flex align-items-start border-bottom pb-4 mb-4">
                    <img src="{{ photo_or_default($review->user->profile?->avatar) }}" alt=""
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
            @if ($this->userReviewd())
                <div class="d-flex align-items-center py-4">
                    <div class="symbol symbol-35px me-3">
                        <img src="{{ photo_or_default(Auth::user()->profile->avatar) }}" alt="">
                    </div>
                    <div class="position-relative w-100">
                        <h3 class="mb-6">إضافة تعليق</h3>
                        <form wire:submit.prevent="addReview">
                            <div class="rating">
                                <label class="btn btn-light fw-bold btn-sm rating-label me-3" for="kt_rating_input_0">
                                    إعادة تعيين
                                </label>
                                <input class="rating-input" name="rating" value="0" checked type="radio"
                                    id="kt_rating_input_0" />
                                @for ($i = 1; $i <= 5; $i++)
                                    <label class="rating-label" for="kt_rating_input_{{ $i }}">
                                        <i class="ki-duotone ki-star fs-1"></i>
                                    </label>
                                    <input wire:click="setRating({{ $i }})" class="rating-input"
                                        name="rating" value="{{ $i }}" type="radio"
                                        id="kt_rating_input_{{ $i }}" />
                                @endfor
                            </div>


                            <textarea wire:model.defer="review" class="form-control form-control-solid border ps-5 mt-3" rows="4"
                                placeholder="قم بكتابة تعليقك هنا ..."></textarea>
                            <button type="submit" class="btn btn-primary btn-sm mt-3">إضافة تعليق</button>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    @endif
</div>

@script
    <script>
        document.querySelectorAll('.number-rating:not(.readonly) label').forEach((number) => {
            number.addEventListener('click', function() {
                this.style.transform = 'scale(1.2)';
                setTimeout(() => {
                    this.style.transform = 'scale(1)';
                }, 200);
            });
        });
    </script>
@endscript
