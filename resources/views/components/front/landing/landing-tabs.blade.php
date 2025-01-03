<style>
    .avatar-md {
        height: 3.5rem;
        width: 3.5rem;
    }

    [data-bs-theme="dark"] .nav {
        --bs-nav-link-color: none !important;
    }
</style>
<section class="py-10" id="paths" style="direction: ltr">
    <div class="container">
        <div class="text-center pb-10">
            <h2 class="fw-bold display-6">التكنولوجيات المتاحة</h2>
        </div>
        <div class="row gy-4 justify-content-center">
            <div class="col-10">
                <!-- Center Tabs with Scrollable Wrapper -->
                <div class="d-flex justify-content-center" style="overflow-x: auto; white-space: nowrap; width: 100%;">
                    <ul class="nav nav-tabs d-flex justify-content-center flex-nowrap" id="pathsTabs" role="tablist"
                        style="gap: 10px; color:gray !important">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active fs-3 fw-semibold" id="all-technologies-tab"
                                data-bs-toggle="tab" data-bs-target="#all-technologies" type="button" role="tab"
                                aria-controls="all-technologies" aria-selected="true">
                                All Technologies
                            </button>
                        </li>
                        @foreach ($paths as $index => $path)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link fs-3 fw-semibold" id="path-tab-{{ $path->id }}"
                                    data-bs-toggle="tab" data-bs-target="#path-{{ $path->id }}" type="button"
                                    role="tab" aria-controls="path-{{ $path->id }}" aria-selected="false">
                                    {{ $path->title }}
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="tab-content mt-6" id="pathsTabsContent">
                    <div class="tab-pane fade show active" id="all-technologies" role="tabpanel"
                        aria-labelledby="all-technologies-tab">
                        <div class="row mt-3 align-items-center">
                            @php
                                $allTechnologies = $paths
                                    ->flatMap(function ($path) {
                                        return $path->learningStacks->flatMap(function ($stack) {
                                            return $stack->technologyStacks->where('is_active', true);
                                        });
                                    })
                                    ->unique('id');
                            @endphp
                            @foreach ($allTechnologies as $technology)
                                <div class="col-xl-4 col-lg-6 col-md-6 col-6 align-items-center" data-aos="fade-up"
                                    data-aos-duration="800" style="direction: rtl;">
                                    @include('components.shared.technology-card', ['item' => $technology])
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @foreach ($paths as $path)
                        <div class="tab-pane fade mt-6" id="path-{{ $path->id }}" role="tabpanel"
                            aria-labelledby="path-tab-{{ $path->id }}">
                            <div class="row mt-3">
                                @foreach ($path->learningStacks as $stack)
                                    @foreach ($stack->technologyStacks->where('is_active', true) as $technology)
                                        <div class="col-xl-4 col-lg-6 col-md-6 col-6 align-items-center"
                                            data-aos="fade-up" data-aos-duration="800" style="direction: rtl;">
                                            @include('components.shared.technology-card', [
                                                'item' => $technology,
                                            ])
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        // Initialize AOS
        AOS.init();

        // Refresh AOS when a tab is activated
        const tabElements = document.querySelectorAll('[data-bs-toggle="tab"]');
        tabElements.forEach(tab => {
            tab.addEventListener("shown.bs.tab", () => {
                AOS.refresh();
            });
        });
    });
</script>
