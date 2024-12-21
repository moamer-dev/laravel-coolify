<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
    <div class="card-header cursor-pointer">
        <ul class="nav nav-stretch nav-line-tabs fw-bold fs-6 p-0 p-lg-10 flex-nowrap flex-grow-1">
            <li class="nav-item mx-lg-1">
                <a class="nav-link py-3 py-lg-6 text-active-primary active" data-bs-toggle="tab" href="#kt_tab_pane_4">وصف
                    الدورة</a>
            </li>
            <li class="nav-item mx-lg-1">
                <a class="nav-link py-3 py-lg-6 text-active-primary" data-bs-toggle="tab" href="#kt_tab_pane_5">محتوى
                    الدورة</a>
            </li>
            <li class="nav-item mx-lg-1">
                <a class="nav-link py-3 py-lg-6 text-active-primary" data-bs-toggle="tab" href="#kt_tab_pane_6">الإسئلة
                    المتكررة</a>
            </li>
        </ul>
    </div>
    <div class="card-body p-9">
        <div class="tab-content  px-lg-7">
            <div class="tab-content" id="myTabContent">
                @include('components.courses.tabs.course-discription-tab')
                @include('components.courses.tabs.course-curriculum-tab')
                @include('components.courses.tabs.course-faq-tab')
            </div>
        </div>
    </div>
</div>
