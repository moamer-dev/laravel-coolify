<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
    <!--begin::Card header-->
    <div class="card-header cursor-pointer">
        <ul class="nav nav-stretch nav-line-tabs fw-bold fs-6 p-0 p-lg-10 flex-nowrap flex-grow-1">
            <li class="nav-item mx-lg-1">
                <a class="nav-link py-3 py-lg-6 text-active-primary active" data-bs-toggle="tab"
                    href="#kt_tab_pane_4">Description</a>
            </li>
            <li class="nav-item mx-lg-1">
                <a class="nav-link py-3 py-lg-6 text-active-primary" data-bs-toggle="tab"
                    href="#kt_tab_pane_5">Curriculum</a>
            </li>
            <li class="nav-item mx-lg-1">
                <a class="nav-link py-3 py-lg-6 text-active-primary" data-bs-toggle="tab" href="#kt_tab_pane_6">FAQ</a>
            </li>
        </ul>
    </div>
    <!--begin::Card header-->
    <!--begin::Card body-->
    <div class="card-body p-9">
        <div class="tab-content  px-lg-7">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="kt_tab_pane_4" role="tabpanel">
                    {!! $course->description !!}
                </div>
                <div class="tab-pane fade" id="kt_tab_pane_5" role="tabpanel">
                    @if ($course->sections->isEmpty())
                        <div class="">
                            <!--begin::Alert-->
                            <div class="alert alert-dismissible bg-light-primary d-flex flex-column flex-sm-row p-5 ">
                                <!--begin::Icon-->
                                <i class="ki-duotone ki-notification-bing fs-2hx text-primary me-4 mb-5 mb-sm-0"><span
                                        class="path1"></span><span class="path2"></span><span
                                        class="path3"></span></i>
                                <!--end::Icon-->

                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column pe-0 pe-sm-10">
                                    <!--begin::Title-->
                                    <h5 class="fw-semibold">This Lesson has no content yet.
                                    </h5>
                                    <a href="#"
                                        class="d-flex align-items-center text-primary opacity-75-hover fs-6 fw-semibold">Build
                                        a Curriculum
                                        <i class="ki-outline ki-exit-right-corner fs-4 ms-1"></i></a>
                                </div>
                                <!--end::Wrapper-->

                            </div>
                            <!--end::Alert-->
                        </div>
                    @endif
                    <!--begin::Accordion-->
                    <div class="accordion accordion-icon-toggle" id="kt_accordion_2">
                        @foreach ($course->sections as $key => $section)
                            <!--begin::Item-->
                            <div class="mb-5">
                                <!--begin::Header-->
                                <div class="accordion-header py-3 d-flex" data-bs-toggle="collapse"
                                    data-bs-target="#kt_accordion_2_item_{{ $key + 1 }}">
                                    <span class="accordion-icon">
                                        <i class="ki-duotone ki-arrow-right fs-4"><span class="path1"></span><span
                                                class="path2"></span></i>
                                    </span>
                                    <h3 class="fs-4 fw-semibold mb-0 ms-4">{{ $section->name }}</h3>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                @if ($section->lessons->isEmpty())
                                    <div class="">
                                        <!--begin::Alert-->
                                        <div
                                            class="alert alert-dismissible bg-light-primary d-flex flex-column flex-sm-row p-5 ">
                                            <!--begin::Icon-->
                                            <i
                                                class="ki-duotone ki-notification-bing fs-2hx text-primary me-4 mb-5 mb-sm-0"><span
                                                    class="path1"></span><span class="path2"></span><span
                                                    class="path3"></span></i>
                                            <!--end::Icon-->

                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-column pe-0 pe-sm-10">
                                                <!--begin::Title-->
                                                <h5 class="fw-semibold">This Section has no lessons yet.
                                                </h5>
                                                <a href="#"
                                                    class="align-items-center text-primary opacity-75-hover fs-6 fw-semibold">Build
                                                    a Curriculum
                                                    <i class="ki-outline ki-exit-right-corner fs-4 ms-1"></i></a>
                                            </div>
                                            <!--end::Wrapper-->

                                        </div>
                                        <!--end::Alert-->
                                    </div>
                                @endif
                                <div id="kt_accordion_2_item_{{ $key + 1 }}" class="fs-6 collapse ps-5"
                                    data-bs-parent="#kt_accordion_2">
                                    @foreach ($section->lessons as $key => $lesson)
                                        <div
                                            class="my-5 d-flex justify-content-between align-items-center text-inherit">
                                            <div class="text-truncate">
                                                <span class="me-2">
                                                    <i class="bi bi-lock fs-3 me-2" style="color: #844aff"
                                                        data-section-id="19"></i>
                                                </span>
                                                <span class="fs-3">
                                                    {{ $lesson->name }}
                                                    {{-- <a
                                                        href="{{ route('lesson.show', ['course' => $course->slug, 'lesson' => $lesson->slug]) }}">{{ $lesson->name }}</a> --}}
                                                </span>
                                            </div>
                                            <div class="text-truncate d-flex align-items-center">
                                                <span class="fs-5 me-9">{{ $lesson->duration }}</span>
                                            </div>
                                        </div>
                                        @if (!$loop->last)
                                            <div class="separator my-1"></div>
                                        @endif
                                    @endforeach

                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Item-->
                            <div class="separator my-1"></div>
                        @endforeach
                    </div>
                    <!--end::Accordion-->
                </div>
                <div class="tab-pane fade" id="kt_tab_pane_6" role="tabpanel">
                    3
                </div>
            </div>
        </div>
    </div>
    <!--end::Card body-->
</div>
