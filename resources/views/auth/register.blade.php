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
                        src="{{ asset('assets') }}/media/auth/agency.png" alt="" />
                    <img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
                        src="{{ asset('assets') }}/media/auth/agency-dark.png" alt="" />
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
                            <form method="POST" action="{{ route('register') }}" class="form w-100"
                                novalidate="novalidate">
                                @csrf
                                <div class="text-center mb-11">
                                    <h1 class="text-gray-900 fw-bolder mb-3">تسجيل الددخول</h1>
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
                                    <input id="name" name="name" :value="old('name')" required autocomplete="name"
                                        type="text" placeholder="ادخل إسمك كاملاً" class="form-control bg-transparent" />
                                </div>
                                <div class="fv-row mb-8">
                                    <input id="email" name="email" :value="old('email')" required
                                        autocomplete="username" type="text" placeholder="بريدك الإلكتروني"
                                        autocomplete="off" class="form-control bg-transparent" />
                                </div>
                                <div class="fv-row mb-8" data-kt-password-meter="true">
                                    <div class="mb-1">
                                        <div class="position-relative mb-3">
                                            <input class="form-control bg-transparent" type="password"
                                                placeholder="كلمة المرور" name="password" id="password" autocomplete="off"
                                                required autocomplete="new-password" />
                                            <span
                                                class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                                data-kt-password-meter-control="visibility">
                                                <i class="ki-outline ki-eye-slash fs-2"></i>
                                                <i class="ki-outline ki-eye fs-2 d-none"></i>
                                            </span>
                                        </div>
                                        <div class="d-flex align-items-center mb-3"
                                            data-kt-password-meter-control="highlight">
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                            </div>
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                            </div>
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                            </div>
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-muted">قم بإستخداك على الأقل ٨ احرف تحتوى على ارقام ورموز</div>
                                </div>
                                <div class="fv-row mb-8">
                                    <input placeholder="تأكيد كلمة المرور" name="confirm-password" type="password"
                                        autocomplete="off" class="form-control bg-transparent" />
                                </div>
                                <div class="fv-row mb-8">
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="toc" value="1" />
                                        <span class="form-check-label fw-semibold text-gray-700 fs-base ms-1">أوافق على
                                            <a href="#" class="ms-1 link-primary">الشروط والأحكام</a></span>
                                    </label>
                                </div>
                                <div class="d-grid mb-10">
                                    <button class="btn btn-primary">
                                        <span class="indicator-label">تسجيل حساب</span>
                                        <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div>
                                <div class="text-gray-500 text-center fw-semibold fs-6">هل لديك حساب بالفعل؟
                                    <a href="{{ route('login') }}" class="link-primary fw-semibold px-2">تسجيل الدخول</a>
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
