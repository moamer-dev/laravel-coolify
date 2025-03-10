<div class="d-flex flex-lg-row-fluid position-relative">
    <div class="position-absolute top-0 start-0 p-4">
        <div class="app-navbar-item me-lg-3">
            <div class="app-navbar-item ms-1">
                <div class="btn btn-sm btn-icon btn-custom h-35px w-35px"
                    data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                    data-kt-menu-placement="bottom-end">
                    <i class="ki-outline ki-night-day theme-light-show fs-1"></i>
                    <i class="ki-outline ki-moon theme-dark-show fs-1"></i>
                </div>
                @include('components.navbar.nav-theme')
            </div>
        </div>
    </div>
    <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
        <a href="{{ route('home') }}">
            <img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
                src="{{ asset('assets') }}/media/logos/icon_light.svg" alt="" />
        </a>
        <a href="{{ route('home') }}">
            <img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
                src="{{ asset('assets') }}/media/logos/icon_dark_green.svg" alt="" />
        </a>
        <h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">مرحباً بك في زيتونة!</h1>
        <div class="text-gray-600 fs-3 text-center fw-semibold">
            <span class="opacity-75-hover me-1">بوابتك الأولى نحو تعلم مسارات علوم الحاسب والبرمجة</span>
            <br />من خلال اساليب التعلم الموجه وبإستخدام أساليب الذكاء الإصطناعي
        </div>
    </div>
</div>
