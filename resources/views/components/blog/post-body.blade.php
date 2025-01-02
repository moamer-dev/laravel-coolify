<div class="mb-17">
    <div class="mb-8">
        <div class="d-flex flex-wrap mb-6">
            <div class="me-9 my-1">
                <i class="ki-outline ki-element-11 text-primary fs-2 me-1"></i>
                <span class="fw-bold text-gray-500">{{ formattedDate($post->created_at) }}</span>
            </div>
            <div class="me-9 my-1">
                <i class="ki-outline ki-briefcase text-primary fs-2 me-1"></i>
                <span class="fw-bold text-gray-500">{{ $post->category->name }}</span>
            </div>
        </div>
        <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold">
            {{ $post->title }}
        </a>
        <div class="overlay mt-8">
            <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-350px"
                style="background-image:url('{{ feature_image_or_default($post->image) }}')">
            </div>
        </div>
    </div>
    <div class="fs-5 fw-semibold text-gray-600">
        {!! $post->content !!}
    </div>
    <div class="d-flex align-items-center border-1 border-dashed card-rounded p-5 p-lg-10 mb-14">
        <div class="text-center flex-shrink-0 me-7 me-lg-13">
            <div class="symbol symbol-70px symbol-circle mb-2">
                <img src="{{ get_avatar_by_id($post->author->id) }}" class="" alt="">
            </div>
            <div class="mb-0">
                <a href="/metronic8/demo60/pages/user-profile/overview.html"
                    class="text-gray-700 fw-bold text-hover-primary">{{ $post->author->name }}</a>
            </div>
        </div>
        <div class="mb-0 fs-6">
            <div class="text-muted fw-semibold lh-lg mb-2">
                {{ $post->author->profile->bio }}
            </div>
        </div>
    </div>
    <div class="d-flex flex-center">
        <a href="#" class="mx-4">
            <img src="{{ asset('assets') }}/media/svg/brand-logos/facebook-4.svg" class="h-20px my-2" alt="">
        </a>
        <a href="#" class="mx-4">
            <img src="{{ asset('assets') }}/media/svg/brand-logos/instagram-2-1.svg" class="h-20px my-2" alt="">
        </a>
        <a href="#" class="mx-4">
            <img src="{{ asset('assets') }}/media/svg/brand-logos/github.svg" class="h-20px my-2" alt="">
        </a>
        <a href="#" class="mx-4">
            <img src="{{ asset('assets') }}/media/svg/brand-logos/behance.svg" class="h-20px my-2" alt="">
        </a>
        <a href="#" class="mx-4">
            <img src="{{ asset('assets') }}/media/svg/brand-logos/pinterest-p.svg" class="h-20px my-2" alt="">
        </a>
        <a href="#" class="mx-4">
            <img src="{{ asset('assets') }}/media/svg/brand-logos/twitter.svg" class="h-20px my-2" alt="">
        </a>
        <a href="#" class="mx-4">
            <img src="{{ asset('assets') }}/media/svg/brand-logos/dribbble-icon-1.svg" class="h-20px my-2"
                alt="">
        </a>
    </div>
</div>
