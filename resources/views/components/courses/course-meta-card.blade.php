<div class="card mb-3 mb-4">
    <div class="p-1">
        <div class="d-flex justify-content-center align-items-center rounded border-white border rounded-3 bg-cover"
            style="background-image: url({{ feature_image_or_default($course->feature_image) }}); height: 210px;  background-repeat: no-repeat; background-size: cover; ">
            <a class="glightbox icon-shape rounded-circle btn-play icon-xl"
                href="https://www.youtube.com/watch?v=Nfzi7034Kbg">
                <i class="fe fe-play"></i>
            </a>
        </div>
    </div>
    <!-- Card body -->
    <div class="card-body">
        <!-- Price single page -->
        {{-- <div class="mb-3">
            <span class="text-dark fw-bold h2">{{ $course->price }}</span>
            <del class="fs-4">$750</del>
        </div> --}}
        <div class="d-grid">
            <a href="#" class="btn btn-primary mb-2">Start Free Month</a>
            <a href="pricing.html" class="btn btn-outline-primary">Get Full Access</a>
        </div>
    </div>
</div>
