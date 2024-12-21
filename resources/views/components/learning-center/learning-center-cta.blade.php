<div class="card border-transparent" data-bs-theme="light" style="background-color: #7239ea;">
    <div class="card-body d-flex ps-xl-15">
        <div class="m-0">
            <div class="position-relative fs-1 z-index-2 fw-bold text-white mb-7">
                <span class="me-2">يمكنك بدء رحلتك الآن بإستكشاف المصادر التعليمية الخاصة بك
                    <br>
                    <span class="text-muted mt-1 fw-semibold fs-6">من أجل تجربة مخصصة نقوم بإظهار المصادر التعليمية
                        بناءاً على مسارات التعلم <br>
                        التي قمت بإختيارها مسبقاً
                        <a href="{{ route('profile.learning-path') }}" class="text-white text-hover-dark ">من
                            هنا</a></span>
                </span>
            </div>
            <div class="mb-3">
                <a href="{{ route('user.path-view') }}"
                    class="btn btn-color-white bg-white bg-opacity-15 bg-hover-opacity-25 fw-semibold me-2">الذهاب إلى
                    المصادر التعليمية</a>
                <a href="apps/support-center/overview.html"
                    class="btn btn-color-white bg-white bg-opacity-15 bg-hover-opacity-25 fw-semibold">مركز المساعدة</a>
            </div>
        </div>
        <img src="{{ asset('assets') }}/media/illustrations/sigma-1/17-dark.png"
            class="position-absolute me-3 bottom-0 end-0 h-200px" alt="">
    </div>
</div>
