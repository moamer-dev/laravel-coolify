{{-- @php 
dd($model);
@endphp --}}
<div class="col-lg-4 col-md-6 mb-4">
    <div class="card">
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
    </div>
</div>
