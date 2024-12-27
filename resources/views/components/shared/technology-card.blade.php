<style>
    [data-bs-theme="dark"] .invert {
        filter: invert(1) hue-rotate(180deg);
    }
</style>
<a href="{{ route('technology-view', $item->slug) }}" class="text-decoration-none">
    <div class="card mb-4 hover-elevate-up parent-hover">
        <div class="d-flex justify-content-between align-items-center p-4">
            <div class="d-flex">
                <!-- Img -->
                <img src="{{ asset('storage') }}/{{ $item->image }}" alt="bootstrap" class="avatar-md invert">
                <div class="me-3">
                    <h4 class="mb-1">
                        <span class="h4 fw-semibold">{{ $item->name }}</span>
                    </h4>
                    <p class="mb-0 fs-6">
                        <span class="me-2">
                            <span class="fw-medium">12</span>
                            Courses
                        </span>
                        <span>
                            <span class="fw-medium">34</span>
                            Hours
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</a>
