<div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-400px" data-kt-menu="true" id="kt_menu_notifications"
    style="">
    <div class="d-flex flex-column bgi-no-repeat rounded-top"
        style="background-image:url('/assets/media/misc/menu-header-bg.jpg')">
        <h3 class="text-white fw-semibold px-9 mt-10 mb-6 fs-5">
            إشعارات <span class="fs-8 opacity-75 ps-3">{{ $notifications->count() }}</span>
        </h3>
    </div>
    <div class="scroll-y mh-325px my-5 px-8">
        @foreach ($notifications as $notification)
            <div class="d-flex flex-stack py-4">
                <!--begin::Section-->
                <div class="d-flex align-items-center">
                    <!--begin::Symbol-->
                    <div class="symbol symbol-35px me-4">
                        <span class="symbol-label bg-light-primary">
                            <i class="ki-outline ki-abstract-28 fs-2 text-primary"></i>
                        </span>
                    </div>
                    <!--end::Symbol-->

                    <!--begin::Title-->
                    <div class="mb-0 me-2">
                        <a href="#"
                            class="fs-7 text-gray-800 text-hover-primary fw-bold">{{ $notification->data['message'] }}</a>
                        <div class="text-gray-500 fs-7">Phase 1 development</div>
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Section-->

                <!--begin::Label-->
                <span class="badge badge-light fs-8">
                    {{ $notification->created_at->diffForHumans() }}</span>
                <!--end::Label-->
            </div>
        @endforeach
    </div>
    <div class="py-3 text-center border-top">
        <a href="/metronic8/demo60/pages/user-profile/activity.html"
            class="btn btn-color-gray-600 btn-active-color-primary">
            View All
            <i class="ki-outline ki-arrow-right fs-5"></i> </a>
    </div>
</div>
