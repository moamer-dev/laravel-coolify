    <div class="card">
        <a href="{{ route('course.view', [$item->slug]) }}">
            <img src="{{ feature_image_or_default($item->feature_image) }}" class="card-img-top course-image"
                alt="{{ $item->name }}">
        </a>
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{ route('quiz.index', [$item->slug]) }}" class="text-inherit">{{ $item->title }}
                </a>
            </h5>
            <p class="card-text">{{ $item->description }}</p>
        </div>
        <div class="card-footer">
            <div class="row align-items-center g-0">
                <div>
                    <span class="fw-semibold">
                        {{ $item->category?->name }}
                    </span>
                </div>
                <span class="fw-semibold">
                    {{ $item->type }}
                </span>
                <div class="col-auto">
                    <a href="#" class="text-reset bookmark">
                        <i class="fe fe-bookmark fs-4"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
