<div class="card border-0 mb-5 mb-xl-11">
    <div class="card-body py-7">
        <div class="row align-items-center lh-1 h-100">
            <div class="col-7 ps-xl-10 pe-5">
                <div class="fs-2 fw-bold mb-6">
                    مرحباً بك {{ $user->name }}
                </div>
                <span class="lh-lg fw-semibold  fs-6 mb-10 d-block opacity-75">لديك العديد من المصادر الذي
                    يمكنك
                    التعلم منها اليوم. قم بإكتشافها ونتمنى لك تجربة تعلم ممعة مع زيتونة!</span>
                <div class="d-flex align-items-center flex-wrap d-grid gap-2 mb-9">
                    <div class="d-flex align-items-center me-5 me-xl-13">
                        <div class="symbol symbol-30px symbol-circle me-3">
                            <span class="symbol-label">
                                <i class="ki-outline ki-abstract-41 fs-5 "></i>
                            </span>
                        </div>
                        <div class="">
                            <span class="fw-semibold d-block fs-8 opacity-75 mb-2">الدورات</span>
                            <span class="fw-bold fs-7">{{ $data['courses'] }}</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center me-5 me-xl-13">
                        <div class="symbol symbol-30px symbol-circle me-3">
                            <span class="symbol-label">
                                <i class="ki-outline ki-abstract-26 fs-5 "></i>
                            </span>
                        </div>
                        <div class="">
                            <span class="fw-semibold opacity-75 d-block fs-8 mb-2">المشاريع</span>
                            <span class="fw-bold fs-7">{{ $data['projects'] }}</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="symbol symbol-30px symbol-circle me-3">
                            <span class="symbol-label">
                                <i class="ki-outline ki-abstract-26 fs-5 "></i>
                            </span>
                        </div>
                        <div class="">
                            <span class="fw-semibold opacity-75 d-block fs-8 mb-2">الإختبارات</span>
                            <span class="fw-bold fs-7">{{ $data['quizzes'] }}</span>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center flex-wrap d-grid gap-2 mb-9">
                    <span class="ms-4 d-none d-md-block">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect x="3" y="8" width="2" height="6" rx="1" fill="#DBD8E9">
                            </rect>
                            <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9">
                            </rect>
                            <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9">
                            </rect>
                        </svg>
                        <span class="align-middle">{{ $data['level'] }}</span>
                    </span>
                </div>
                <div class="d-flex d-grid gap-2 mt-7">
                    <a href="{{ route('user.path-todo') }}" class="btn btn-primary btn-sm me-lg-2">مشاهدة خطتك
                        التعليمية</a>
                </div>
            </div>
            <div class="col-5 pt-5 pt-lg-15">
                <div class="bgi-no-repeat bgi-size-contain bgi-position-x-end bgi-position-y-bottom h-200px"
                    style="background-image:url('{{ asset('assets') }}/media/svg/illustrations/easy/8.svg">
                </div>
            </div>
        </div>
    </div>
</div>
