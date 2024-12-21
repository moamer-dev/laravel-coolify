<style>
    .menu .menu-item.hover:not(.here)>.menu-link:not(.disabled):not(.active):not(.here) .menu-title,
    .app-sidebar .menu .menu-item:not(.here) .menu-link:hover:not(.disabled):not(.active):not(.here) .menu-title {
        color: var(--bs-component-active-bg);
    }

    .menu-title-gray-600 .menu-item .menu-link .menu-title {
        color: #151617;
    }
</style>
<div class="card flex-grow-1 py-4" data-kt-sticky="true" data-kt-sticky-name="app-sidebar-menu-sticky"
    data-kt-sticky-offset="{default: false, xl: '500px'}" data-kt-sticky-width="225px" data-kt-sticky-left="auto"
    data-kt-sticky-top="125px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
    <div class="hover-scroll-y mx-3 px-1 px-lg-2" data-kt-scroll="true"
        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
        data-kt-scroll-dependencies="#kt_app_header, #kt_app_toolbar, #kt_app_footer"
        data-kt-scroll-wrappers="#kt_app_main" data-kt-scroll-offset="5px" style="height: 650px;">
        <div id="kt_app_sidebar_menu" data-kt-menu="true"
            class=" menu menu-sub-indention menu-rounded menu-column menu-title-gray-600 menu-icon-gray-500 menu-arrow-gray-500 fw-semibold fs-6">
            <div class="menu-item">
                <div class="menu-content">
                    <span class="menu-section fs-5 fw-bolder ps-1 py-1">قائمة الدروس</span>
                </div>
            </div>
            @foreach ($course->sections->sortBy('order') as $section)
                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion menu-sub-indention @if ($section->lessons->contains('id', $lesson->id)) show @endif">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i
                                class="ki-outline ki-rocket fs-2 @if ($section->lessons->contains('id', $lesson->id)) text-primary @endif "></i>
                        </span>
                        <span
                            class=" fw-bold text-hover-primary  @if ($section->lessons->contains('id', $lesson->id)) text-primary @endif">{{ $section->name }}</span>
                        <span class="menu-arrow"></span>
                    </span>
                    @foreach ($section->lessons->sortBy('order') as $globallesson)
                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link active"
                                    href="{{ route('lesson.view', ['course' => $course->slug, 'lesson' => $globallesson->id]) }}">
                                    <span class="menu-bullet  @if ($section->lessons->contains('id', $lesson->id)) text-primary @endif">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span
                                        class=" @if ($lesson->id == $globallesson->id) text-primary @endif">{{ $globallesson->name }}</span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>
