<div class="container mt-12">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-4">
            <div class="row d-md-flex justify-content-between align-items-center">
                <div class="col-md-6 col-lg-8 col-xl-9">
                    <h4 class="mb-3 mb-md-0">Displaying 9 out of {{ count($courses) }} courses</h4>
                </div>
                <div class="d-inline-flex col-md-6 col-lg-4 col-xl-3">
                    <div class="me-2">
                        <!-- Nav -->
                        <div class="nav btn-group flex-nowrap" role="tablist">
                            <button class="btn btn-outline-secondary active" data-bs-toggle="tab"
                                data-bs-target="#tabPaneGrid" role="tab" aria-controls="tabPaneGrid"
                                aria-selected="true">
                                <span class="fe fe-grid"></span>
                            </button>
                            <button class="btn btn-outline-secondary" data-bs-toggle="tab" data-bs-target="#tabPaneList"
                                role="tab" aria-controls="tabPaneList" aria-selected="false" tabindex="-1">
                                <span class="fe fe-list"></span>
                            </button>
                        </div>
                    </div>
                    <!-- List  -->
                    <select class="form-select">
                        <option value="">Sort by</option>
                        <option value="Newest">Newest</option>
                        <option value="Free">Free</option>
                        <option value="Most Popular">Most Popular</option>
                        <option value="Highest Rated">Highest Rated</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-4 col-12 mb-4 mb-lg-0">
            <div class="offcanvas-body pt-0 p-lg-0">
                <div class="d-flex flex-column gap-3">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="">
                                <!-- Toggle -->
                                <a class="d-flex align-items-center h4 mb-0 justify-content-between"
                                    data-bs-toggle="collapse" href="#coursCategories" role="button"
                                    aria-expanded="true" aria-controls="coursCategories">
                                    <div>Categories</div>
                                    <!-- Chevron -->
                                    <span class="chevron-arrow ms-4">
                                        <i class="fe fe-chevron-down fs-4"></i>
                                    </span>
                                </a>
                                <!-- Row -->
                                <!-- Collapse -->
                                <div class="collapse show" id="coursCategories" data-bs-parent="#courseAccordion"
                                    style="">
                                    <div class="d-flex flex-column">
                                        <ul class="list-unstyled mb-1 d-flex flex-column gap-1 mt-3">
                                            @foreach ($categories as $category)
                                                <li class="d-flex flex-row gap-2">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                            wire:model.live="selectedCategories"
                                                            value="{{ $category->id }}"
                                                            id="categoryCheck{{ $category->id }}">
                                                        <label class="form-check-label"
                                                            for="categoryCheck{{ $category->id }}">{{ $category->name }}</label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="">
                                <!-- Toggle -->
                                <a class="d-flex align-items-center h4 mb-0 justify-content-between"
                                    data-bs-toggle="collapse" href="#coursLevels" role="button" aria-expanded="true"
                                    aria-controls="coursLevels">
                                    <div>Levels</div>
                                    <!-- Chevron -->
                                    <span class="chevron-arrow ms-4">
                                        <i class="fe fe-chevron-down fs-4"></i>
                                    </span>
                                </a>
                                <!-- Row -->
                                <!-- Collapse -->
                                <div class="collapse show" id="coursLevels" data-bs-parent="#courseAccordion"
                                    style="">
                                    <div class="d-flex flex-column">
                                        <ul class="list-unstyled mb-1 d-flex flex-column gap-1 mt-3">
                                            @foreach ($levels as $level)
                                                <li class="d-flex flex-row gap-2">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                            wire:model.live="selectedLevels" value="{{ $level->id }}"
                                                            id="levelCheck{{ $level->id }}">
                                                        <label class="form-check-label"
                                                            for="levelCheck{{ $level->id }}">{{ $level->name }}</label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-8 col-12">
            <div class="tab-content">
                <!-- Tab pane -->
                <style>
                    .course-image {
                        max-height: 180px;
                        object-fit: cover;
                        width: 100%;
                    }

                    .card-hover {
                        transition: box-shadow .25s ease;
                    }
                </style>

                <div class="row gy-4">
                    @forelse ($courses as $course)
                        <div class="col-lg-4 col-md-6 col-12">
                            <!-- Card -->
                            <div class="card mb-4 card-hover">
                                <a href="{{ route('course.view', [$course->slug]) }}">
                                    <img src="{{ asset('storage/' . $course->feature_image) }}" alt="course"
                                        class="card-img-top course-image">
                                </a>
                                <!-- Card body -->
                                <div class="card-body d-flex flex-column gap-4">
                                    <h4 class="mb-2 text-truncate-line-2">
                                        <a href="{{ route('course.view', [$course->slug]) }}"
                                            class="text-inherit">{{ $course->name }}</a>
                                    </h4>
                                    <!-- List inline -->
                                    <ul class="mb-3 list-inline">
                                        <li class="list-inline-item">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                    fill="currentColor" class="bi bi-clock align-baseline"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z">
                                                    </path>
                                                    <path
                                                        d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z">
                                                    </path>
                                                </svg>
                                            </span>
                                            <span>3h 56m</span>
                                        </li>
                                        <li class="list-inline-item">
                                            <svg class="me-1 mt-n1" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect x="3" y="8" width="2" height="6" rx="1"
                                                    fill="#754FFE"></rect>
                                                <rect x="7" y="5" width="2" height="9" rx="1"
                                                    fill="#DBD8E9"></rect>
                                                <rect x="11" y="2" width="2" height="12" rx="1"
                                                    fill="#DBD8E9"></rect>
                                            </svg>
                                            {{ $course->level->name }}
                                        </li>
                                    </ul>
                                    <div class="lh-1">
                                        <span class="align-text-top">
                                            <span class="fs-6">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                    fill="currentColor" class="bi bi-star-fill text-warning"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                            </span>
                                        </span>
                                        <span class="text-warning">4.5</span>
                                        <span class="fs-6">(7,700)</span>
                                    </div>
                                </div>
                                <!-- Card footer -->
                                <div class="card-footer">
                                    <!-- Row -->
                                    <div class="row align-items-center g-0">
                                        {{-- <div class="col ms-2">
                                                <span>{{ $course->creator->name }}</span>
                                            </div> --}}
                                        <div>
                                            <span class="fw-semibold">{{ getFormattedPrice($course) }}</span>
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
                    @empty
                        <div class="col-12">
                            <p>No courses found for the selected categories.</p>
                        </div>
                    @endforelse
                </div>

            </div>
        </div>
    </div>
</div>
