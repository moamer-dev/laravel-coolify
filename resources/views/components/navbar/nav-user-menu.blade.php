<div class="app-navbar-item ms-1">
    <!--begin::Menu wrapper-->
    <div class="cursor-pointer symbol position-relative symbol-35px"
        data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
        data-kt-menu-placement="bottom-end">
        <img src="{{ get_avatar_by_id(Auth::id()) }}" alt="user" />
        <span
            class="bullet bullet-dot bg-success h-6px w-6px position-absolute translate-middle mb-1 bottom-0 start-100 animation-blink"></span>
    </div>
    <!--begin::User account menu-->
    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
        data-kt-menu="true">
        <!--begin::Menu item-->
        <div class="menu-item px-3">
            <div class="menu-content d-flex align-items-center px-3">
                <!--begin::Avatar-->
                <div class="symbol symbol-50px me-5">
                    <img alt="Logo" src="{{ get_avatar_by_id(Auth::id()) }}" />
                </div>
                <!--end::Avatar-->
                <!--begin::Username-->
                <div class="d-flex flex-column">
                    <div class="fw-bold d-flex align-items-center fs-5">{{ $user->name }}
                        <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">موثق</span>
                    </div>
                    <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">{{ $user->email }}</a>
                </div>
                <!--end::Username-->
            </div>
        </div>
        <div class="separator my-2"></div>
        <div class="menu-item px-5">
            <a href="{{ route('dashboard') }}" class="menu-link px-5">لوحة التحكم</a>
        </div>
        <div class="menu-item px-5">
            <a href="{{ route('learn') }}" class="menu-link px-5">الدورات</a>
        </div>
        <div class="menu-item px-5">
            <a href="{{ route('profile.overview') }}" class="menu-link px-5">حسابي</a>
        </div>
        <div class="menu-item px-5">
            <a href="{{ route('profile.learningCenter') }}" class="menu-link px-5">مركز التعلم</a>
        </div>
        <div class="menu-item px-5">
            <a href="{{ route('profile.learning-path') }}" class="menu-link px-5">المسارات التعليمية</a>
        </div>
        <div class="menu-item px-5">
            <a href="{{ route('user.quiz-attempts') }}" class="menu-link px-5">محاولات الإختبارات</a>
        </div>
        <div class="separator my-2"></div>
        <div class="menu-item px-5 my-1">
            <a href="{{ route('profile.settings') }}" class="menu-link px-5">إعدادات الحساب</a>
        </div>
        <div class="menu-item px-5">
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <a :href="route('logout')" class="menu-link px-5"
                    onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    خروج
                </a>
            </form>
        </div>
    </div>
    <!--end::User account menu-->
    <!--end::Menu wrapper-->
</div>
