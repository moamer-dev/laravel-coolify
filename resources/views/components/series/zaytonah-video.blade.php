<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
    <!--begin::Card header-->
    <div class="card-header cursor-pointer">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bold m-0">{{ $zaytonah_to_view->name }}</h3>
        </div>
        <!--end::Card title-->
        <!--begin::Action-->
        <a href="/learn?m=series" class="btn btn-sm btn-primary align-self-center">رجوع الى السلاسل</a>
        <!--end::Action-->
    </div>
    <!--begin::Card header-->
    <!--begin::Card body-->
    <div class="card-body p-9">
        @if ($zaytonah_to_view->has_video && $zaytonah_to_view->video_source == 'youtube')
            @php
                $youtube_url = $zaytonah_to_view->youtube_url;
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
            <p>{!! $zaytonah->content !!}</p>
        @endif
        <!--begin::Notice-->
        <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
            <!--begin::Icon-->
            <i class="ki-outline ki-information fs-2tx text-warning me-4"></i>
            <!--end::Icon-->
            <!--begin::Wrapper-->
            <div class="d-flex flex-stack flex-grow-1">
                <!--begin::Content-->
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
                <!--end::Content-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Notice-->
    </div>
    <!--end::Card body-->
</div>
