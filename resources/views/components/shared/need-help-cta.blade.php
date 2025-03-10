<div class="card card-boder-0">
    <div class="card-body d-flex flex-column flex-center">
        <div class="mb-2">
            <h1 class="fw-bold text-gray-800 text-center lh-lg fs-4">{{ $title }}</h1>
            <div class="py-10 text-center">
                <img src="{{ asset('assets') }}/media/svg/illustrations/easy/2.svg" class="theme-light-show w-150px"
                    alt="">
                <img src="{{ asset('assets') }}/media/svg/illustrations/easy/2-dark.svg" class="theme-dark-show w-150px"
                    alt="">
            </div>
        </div>
        <div class="text-center mb-1">
            <a href={{ $btn_href }} class="btn btn-sm btn-primary me-2">{{ $btn_text }}
            </a>
            @if (isset($btn_secondary_text))
                <a href={{ $btn_secondary_href }} class="btn btn-sm btn-light">{{ $btn_secondary_text }}
                </a>
            @endif
        </div>
    </div>
</div>
