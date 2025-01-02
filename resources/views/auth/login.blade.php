@extends('layouts.auth')
@section('content')
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <style>
            body {
                background-image: url('{{ asset('assets') }}/media/auth/bg10.jpeg');
            }

            [data-bs-theme="dark"] body {
                background-image: url('{{ asset('assets') }}/media/auth/bg10-dark.jpeg');
            }
        </style>
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <div class="d-flex flex-lg-row-fluid">
                <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
                    <img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
                        src="{{ asset('assets') }}/media/logos/icon_light.svg" alt="" />
                    <img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
                        src="{{ asset('assets') }}/media/logos/icon_dark_green.svg" alt="" />
                    <h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">مرحباً بك في زيتونة!</h1>
                    <div class="text-gray-600 fs-3 text-center fw-semibold">
                        <span class="opacity-75-hover me-1">بوابتك الأولى نحو تعلم مسارات علوم الحاسب والبرمجة</span>
                        <br />من خلال اساليب التعلم الموجه وبإستخدام أساليب الذكاء الإصطناعي
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
                <div class="bg-body d-flex flex-column flex-center rounded-4 w-md-600px p-10">
                    <div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">
                        <div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">
                            <form method="POST" action="{{ route('login') }}" class="form w-100" novalidate="novalidate"
                                id="kt_sign_in_form">
                                @csrf
                                <div class="text-center mb-11">
                                    <h1 class="text-gray-900 fw-bolder mb-3">تسجيل الدخول</h1>
                                    <div class="text-gray-500 fw-semibold fs-6">عبر الحسابات التالية</div>
                                </div>
                                <div class="row g-3 mb-9">
                                    <div class="col-md-6">
                                        <a href="#"
                                            class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                                            <img alt="Logo"
                                                src="{{ asset('assets') }}/media/svg/brand-logos/google-icon.svg"
                                                class="h-15px me-3" />الدخول عبر جوجل</a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="#"
                                            class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                                            <img alt="Logo"
                                                src="{{ asset('assets') }}/media/svg/brand-logos/apple-black.svg"
                                                class="theme-light-show h-15px me-3" />
                                            <img alt="Logo"
                                                src="{{ asset('assets') }}/media/svg/brand-logos/apple-black-dark.svg"
                                                class="theme-dark-show h-15px me-3" />الدخول عبر أبل باي</a>
                                    </div>
                                </div>
                                <div class="separator separator-content my-14">
                                    <span class="w-125px text-gray-500 fw-semibold fs-7">أو بإستخدام البريد
                                        الإلكتروني</span>
                                </div>
                                <div class="fv-row mb-8">
                                    <input id="login" type="text" name="email" required autofocus
                                        placeholder="ادخل بريدك الإلكتروني" name="email" autocomplete="off"
                                        class="form-control bg-transparent @error('email') is-invalid @enderror" />
                                    <span class="mt-2"> {{ $errors->first('email') }} </span>
                                    @error('login')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="fv-row mb-3">
                                    <input id="password" type="password" name="password" required
                                        autocomplete="current-password" placeholder="كلمة المرور" autocomplete="off"
                                        class="form-control bg-transparent" />
                                </div>
                                <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                                    <div></div>
                                    <a href="authentication/layouts/overlay/reset-password.html" class="link-primary">فقدت
                                        كلمة المرور؟</a>
                                </div>
                                <div class="d-grid mb-10">
                                    <button class="btn btn-primary">
                                        <span class="indicator-label">تسجيل الدخول</span>
                                        <span class="indicator-progress">جاري التسجيل...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div>
                                <div class="text-gray-500 text-center fw-semibold fs-6">ليس لديك حساب؟
                                    <a href="{{ route('register') }}" class="link-primary px-2">فتح حساب جديد</a>
                                </div>
                            </form>
                        </div>
                        <div class="d-flex flex-stack justify-content-center">
                            <div class="d-flex fw-semibold text-primary fs-base gap-5">
                                <a href="pages/pricing/column.html" target="_blank">تعرف علينا</a>
                                <a href="pages/contact.html" target="_blank">تواصل معنا</a>
                                <a href="pages/team.html" target="_blank">الشروط والأحكام</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
