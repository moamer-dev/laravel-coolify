<style>
    .accordion-button[aria-expanded="true"] {
        background-color: #f8f9fa;
        font-weight: bold;
    }
</style>
<div class="tab-pane fade" id="kt_tab_pane_5" role="tabpanel">
    @if ($course->sections->isEmpty())
        <div class="">
            <div class="alert alert-dismissible bg-light-primary d-flex flex-column flex-sm-row p-5 ">
                <i class="ki-duotone ki-notification-bing fs-2hx text-primary me-4 mb-5 mb-sm-0"><span
                        class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                <div class="d-flex flex-column pe-0 pe-sm-10">
                    <h5 class="fw-semibold">لم يتم إضافة أقسام لهذه الدورة بعد.
                    </h5>
                    <a href="#"
                        class="d-flex align-items-center text-primary opacity-75-hover fs-6 fw-semibold">بناء منهج
                        الدورة
                        <i class="ki-outline ki-exit-right-corner fs-4 ms-1"></i></a>
                </div>
            </div>
        </div>
    @endif
    <div class="accordion" id="kt_accordion_1">
        @foreach ($course->sections->sortBy('order') as $key => $section)
            <div class="accordion-item">
                <h2 class="accordion-header" id="kt_accordion_1_header_{{ $section->id }}">
                    <button
                        class="accordion-button fs-4 fw-semibold bg-transparent {{ $loop->first ? '' : 'collapsed' }}"
                        type="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_accordion_1_body_{{ $section->id }}"
                        aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                        aria-controls="kt_accordion_1_body_{{ $section->id }}">
                        {{ $section->name }}
                    </button>
                </h2>
                <div id="kt_accordion_1_body_{{ $section->id }}"
                    class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                    aria-labelledby="kt_accordion_1_header_{{ $section->id }}" data-bs-parent="#kt_accordion_1">
                    <div class="accordion-body">
                        @if ($section->lessons->isEmpty())
                            <div class="">
                                <div
                                    class="alert alert-dismissible bg-light-primary d-flex flex-column flex-sm-row p-5">
                                    <i
                                        class="ki-duotone ki-notification-bing fs-2hx text-primary me-4 mb-5 mb-sm-0"></i>
                                    <div class="d-flex flex-column pe-0 pe-sm-10">
                                        <h5 class="fw-semibold">لم يتم إضافة دروس لهذا القسم بعد.</h5>
                                        <a href="#"
                                            class="align-items-center text-primary opacity-75-hover fs-6 fw-semibold">
                                            إضافة دروس لهذا القسم
                                            <i class="ki-outline ki-exit-right-corner fs-4 ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @else
                            @foreach ($section->lessons->sortBy('order') as $key => $lesson)
                                <div class="my-2 d-flex justify-content-between align-items-center text-inherit">
                                    <div class="text-truncate">
                                        <span class="me-2">
                                            @if ($lesson->is_preview)
                                                <i class="bi bi-unlock fs-3 me-2" style="color: #844aff"></i>
                                            @else
                                                <i class="bi bi-lock fs-3 me-2" style="color: #844aff"></i>
                                            @endif
                                        </span>
                                        <span class="fs-4 text-truncate">
                                            @if ($lesson->is_preview)
                                                <a
                                                    href="{{ route('lesson.view', ['course' => $course->slug, 'lesson' => $lesson->id]) }}">
                                                    {{ $lesson->name }}
                                                </a>
                                            @else
                                                {{ $lesson->name }}
                                            @endif
                                        </span>
                                    </div>
                                    @if ($lesson->video_duration)
                                        <div class="text-truncate d-flex align-items-center">
                                            <span class="fs-5 me-9">{{ $lesson->video_duration }} دقيقة</span>
                                        </div>
                                    @endif
                                </div>
                                @if (!$loop->last)
                                    <div class="separator my-1"></div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
