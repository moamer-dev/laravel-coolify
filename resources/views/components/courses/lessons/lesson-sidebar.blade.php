<style>
    .accordion-button,
    .menu-link {
        color: #151617;
        /* Black color */
        font-weight: normal;
        /* Default weight */
    }

    /* Highlight Active Section */
    .accordion-button.text-primary {
        color: var(--bs-primary);
        /* Primary color */
        font-weight: bold;
        /* Bold for active section */
    }

    /* Highlight Active Lesson */
    .menu-link.text-primary {
        color: var(--bs-primary);
        /* Primary color */
        font-weight: bold;
        /* Bold for active lesson */
    }

    /* Circle Number Styling */
    .circle-number {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background-color: var(--bs-primary-light);
        color: var(--bs-primary);
        font-weight: bold;
        text-align: center;
        font-size: 14px;
    }

    [data-bs-theme="dark"] .circle-number {
        background-color: #0F1014;
        color: #f0f0f0;
    }

    [data-bs-theme="dark"] .accordion-button {
        color: #f0f0f0;
    }

    [data-bs-theme="dark"] .lesson-button {
        color: #f0f0f0;
    }
</style>
</style>
<div class="card flex-grow-1 py-4" data-kt-sticky="true" data-kt-sticky-name="app-sidebar-menu-sticky"
    data-kt-sticky-offset="{default: false, xl: '500px'}" data-kt-sticky-width="100%" data-kt-sticky-left="auto"
    data-kt-sticky-top="125px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
    <div class="hover-scroll-y mx-3 px-1 px-lg-2" data-kt-scroll="true"
        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
        data-kt-scroll-dependencies="#kt_app_header, #kt_app_toolbar, #kt_app_footer"
        data-kt-scroll-wrappers="#kt_app_main" data-kt-scroll-offset="5px" style="height: 650px;">

        <!-- Sidebar Title -->
        <div class="menu-item">
            <div class="menu-content">
                <h3 class="fs-5 fw-bold text-center">قائمة الدروس</h3>
            </div>
        </div>

        <div class="accordion" id="kt_sidebar_accordion">
            @php
                $lessonCounter = 1;
            @endphp
            @foreach ($course->sections->sortBy('order') as $section)
                <div class="accordion-item">
                    <!-- Section Header -->
                    <h2 class="accordion-header" id="kt_sidebar_accordion_header_{{ $section->id }}">
                        <button
                            class="accordion-button fs-6  bg-transparent 
                                @if ($section->lessons->contains('id', $lesson->id)) text-primary fw-bold @endif"
                            type="button" data-bs-toggle="collapse"
                            data-bs-target="#kt_sidebar_accordion_body_{{ $section->id }}" aria-expanded="false"
                            aria-controls="kt_sidebar_accordion_body_{{ $section->id }}">
                            {{ $section->name }}
                        </button>
                    </h2>

                    <!-- Section Content -->
                    <div id="kt_sidebar_accordion_body_{{ $section->id }}"
                        class="accordion-collapse collapse @if ($section->lessons->contains('id', $lesson->id)) show @endif"
                        aria-labelledby="kt_sidebar_accordion_header_{{ $section->id }}"
                        data-bs-parent="#kt_sidebar_accordion">
                        <div class="accordion-body">
                            @foreach ($section->lessons->sortBy('order') as $index => $globallesson)
                                <div class="menu-item d-flex align-items-center py-2">
                                    <!-- Lesson Number Circle -->
                                    <div class="circle-number me-3 d-flex align-items-center justify-content-center">
                                        {{ $lessonCounter }}
                                    </div>
                                    <!-- Lesson Name -->
                                    <a class=" flex-grow-1 fs-6 fw-normal text-truncate lesson-button
                                        @if ($lesson->id == $globallesson->id) text-primary fw-bold @endif"
                                        href="{{ route('lesson.view', ['course' => $course->slug, 'lesson' => $globallesson->id]) }}">
                                        {{ $globallesson->name }}
                                    </a>
                                </div>
                                @php
                                    $lessonCounter++;
                                @endphp
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
