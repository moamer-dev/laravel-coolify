<div class="card card-reset mb-5 mb-xl-10">
    <div class="card-body p-0">
        <div class="row g-5 g-lg-9">
            @foreach ($dashboard_options as $option)
                <div class="col-4">
                    <div class="card card-shadow">
                        <div class="card-body p-0">
                            <a href="{{ route($option['route']) }}"
                                class="btn btn-active-color-primary px-7 py-6 text-start w-100">
                                <i class="ki-outline {{ $option['icon'] }} fs-2x fs-lg-2hx text-gray-500 ms-n1"></i>
                                <div class="fw-bold fs-6 pt-4">{{ $option['title'] }}</div>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
