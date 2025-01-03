<style>
    #career-path .card {
        transition: transform 0.3s, box-shadow 0.3s;
    }

    #career-path .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
    }

    #career-path .icon {
        font-size: 2.5rem;
    }

    .card-img-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        border-bottom: 1px solid #e9ecef;
    }

    .card-img {
        width: 100%;
        object-fit: contain;
    }
</style>
<section id="career-path" class="py-5 bg-light">
    <div class="container text-center">
        <h2 class="mb-7 fw-bold display-6">رحلتك المهنية مع زيتونة</h2>
        <p class="mb-7 fs-5">نساعدك في الانتقال بسلاسة من المستوى المبتدئ إلى المستوى الاحترافي بخطوات واضحة وموجهة.</p>

        <div class="row justify-content-center">
            <div class="col-md-3" data-aos="fade-up" data-aos-duration="800">
                <div class="card shadow-sm border-0 text-center">
                    <div class="card-header ribbon ribbon-end">
                        <div class="ribbon-label bg-primary fs-4 fw-semibold"> Fresh <i
                                class="fas fa-user-graduate fa-3x fs-2 text-white px-3"></i>
                        </div>
                    </div>
                    <div class="card-img-wrapper d-flex justify-content-center align-items-center ">
                        <img src="{{ asset('assets') }}/media/front/4.png" class="card-img rounded-0" alt="Fresh Level">
                    </div>
                    <div class="card-body">
                        <p class="card-text fs-3 fw-semibold">ابدأ رحلتك
                            <br>بأساسيات البرمجة
                        </p>
                    </div>
                    <div class="card-footer border-0">
                        <a href="#" class="btn btn-primary w-100">تعرف على البداية</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                <div class="card shadow-sm border-0 text-center">
                    <div class="card-header ribbon ribbon-end">
                        <div class="ribbon-label bg-primary fs-4 fw-semibold">Junior <i
                                class="fas fa-seedling fa-3x text-white px-3 fs-2"></i></div>
                    </div>
                    <div class="card-img-wrapper d-flex justify-content-center align-items-center">
                        <img src="{{ asset('assets') }}/media/front/5.png" class="card-img  rounded-0"
                            alt="Fresh Level">
                    </div>
                    <div class="card-body">
                        <p class="card-text fs-3 fw-semibold">تعلم بناء المشاريع العملية
                            <br>والتعامل مع الفرق.
                        </p>
                    </div>
                    <div class="card-footer border-0">
                        <a href="#" class="btn btn-primary w-100">كن Developer متميز</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
                <div class="card shadow-sm border-0 text-center">
                    <div class="card-header ribbon ribbon-end">
                        <div class="ribbon-label bg-primary fs-4 fw-semibold">Mid-Senior <i
                                class="fas fa-briefcase fa-3x text-white px-3 fs-2"></i></div>
                    </div>
                    <div class="card-img-wrapper d-flex justify-content-center align-items-center">
                        <img src="{{ asset('assets') }}/media/front/6.png" class="card-img  rounded-0"
                            alt="Fresh Level">
                    </div>
                    <div class="card-body">
                        <p class="card-text fs-3 fw-semibold">تصميم أنظمة متقدمة
                            <br>وحلول احترافية.
                        </p>
                    </div>
                    <div class="card-footer border-0">
                        <a href="#" class="btn btn-primary w-100">مثل ماذا؟</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
