<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
    <div class="card-header cursor-pointer">
        <div class="card-title m-0">
            <h3 class="fw-bold m-0">{{ $lesson->name }}</h3>
        </div>
        <a href="{{ route('course.view', $course->slug) }}" class="btn btn-sm btn-primary align-self-center">رجوع الى
            الدورة</a>
    </div>
    <div class="card-body p-9">
        @if ($lesson->has_video && $lesson->video_source == 'youtube')
            @php
                $youtube_url = $lesson->youtube_url;
                $video_id = '';
                $parsed_url = parse_url($youtube_url);
                if (isset($parsed_url['query'])) {
                    parse_str($parsed_url['query'], $query_params);
                    if (isset($query_params['v'])) {
                        $video_id = $query_params['v'];
                    }
                }
            @endphp
            <div class="embed-responsive position-relative w-100 d-block overflow-hidden p-0 mb-3" style="height: 600px">
                <iframe class="position-absolute top-0 end-0 start-0 end-0 bottom-0 h-100 w-100 rounded" width="560"
                    height="315" src="https://www.youtube.com/embed/{{ $video_id }}?si=wiVKlAGlnBcNCrNk"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        @else
            <p>{{ $lesson->content }}</p>
        @endif
        <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
            <i class="ki-outline ki-information fs-2tx text-warning me-4"></i>
            <div class="d-flex flex-stack flex-grow-1">
                <div class="fw-semibold">
                    <h4 class="text-gray-900 fw-bold">We need your attention!</h4>
                    <div class="fs-6 text-gray-700">Your payment was declined. To
                        start
                        using tools,
                        please
                        <a class="fw-bold" href="account/billing.html">Add Payment
                            Method</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
