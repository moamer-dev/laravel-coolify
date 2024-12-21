<div class="card flex-grow-1 py-4" data-kt-sticky="true" data-kt-sticky-name="app-sidebar-menu-sticky"
    data-kt-sticky-offset="{default: false, xl: '500px'}" data-kt-sticky-width="225px" data-kt-sticky-left="auto"
    data-kt-sticky-top="125px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
    <div class="hover-scroll-y mx-3 px-1 px-lg-2" data-kt-scroll="true"
        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
        data-kt-scroll-dependencies="#kt_app_header, #kt_app_toolbar, #kt_app_footer"
        data-kt-scroll-wrappers="#kt_app_main" data-kt-scroll-offset="5px" style="height: 650px;">
        <div id="kt_app_sidebar_menu" data-kt-menu="true"
            class=" menu menu-sub-indention menu-rounded menu-column menu-title-gray-600 menu-icon-gray-500 menu-arrow-gray-500 fw-semibold fs-6">
            <div class="menu-item mb-3">
                <div class="menu-content">
                    <span class="menu-section fs-4 fw-bolder ps-1 py-1">{{ $series->name }}</span>
                </div>
                <div class="separator separator-dashed my-3"></div>
            </div>
            @foreach ($series->zaytonahs->sortBy('order') as $zaytonah)
                <a href="{{ route('zaytonah.view', [$series->slug, $zaytonah->id]) }}" class="text-gray-900">
                    <div class="d-flex align-items-center flex-stack flex-wrap d-grid gap-1 flex-row-fluid ps-4">
                        <div class="me-5">

                            <span
                                class="fw-bold text-hover-primary fs-6  @if ($zaytonah_to_view->id == $zaytonah->id) text-primary @endif">{{ $zaytonah->name }}</span>
                            <span
                                class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0">{{ $zaytonah->description }}</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="badge badge-light-success fs-base">
                                <i class="ki-outline ki-arrow-up fs-5 text-success ms-n1"></i>2.6%</span>
                        </div>
                    </div>
                </a>
                <div class="separator separator-dashed my-3"></div>
            @endforeach
        </div>
    </div>
</div>
