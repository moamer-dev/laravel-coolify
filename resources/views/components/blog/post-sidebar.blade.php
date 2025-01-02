<div class="mb-16">
    <h4 class="text-gray-900 mb-7">إبحث عن موضوع</h4>
    <div class="position-relative">
        <i class="ki-outline ki-magnifier fs-3 text-gray-500 position-absolute top-50 translate-middle ms-6"></i>
        <input type="text" class="form-control form-control-solid ps-10" name="search" value=""
            placeholder="Search">
    </div>
</div>
<div class="mb-16">
    <h4 class="text-gray-900 mb-7">الأقسام</h4>
    <div class="separator separator-dashed mb-9"></div>
    @foreach ($categories as $category)
        <div class="d-flex flex-stack fw-semibold fs-5 text-muted mb-4">
            <a href="#" class="text-muted text-hover-primary pe-2">
                {{ $category->name }} </a>
            <div class="m-0">
                {{ $category->posts->count() }} </div>
        </div>
    @endforeach
</div>
<div class="m-0">
    <h4 class="text-gray-900 mb-7">أحدث المواضيع المضافة</h4>
    <div class="separator separator-dashed mb-9"></div>
    @foreach ($latest_posts as $latest_post)
        <div class="d-flex flex-stack mb-7">
            <div class="symbol symbol-60px symbol-2by3 me-4">
                <div class="symbol-label"
                    style="background-image: url('{{ asset('assets') }}/media/stock/600x400/img-1.jpg')">
                </div>
            </div>
            <div class="m-0">
                <a href="#" class="text-gray-900 fw-bold text-hover-primary fs-6">{{ $latest_post->title }}</a>
                <span class="text-gray-600 fw-semibold d-block pt-1 fs-7">We’ve been a focused on making
                    a the sky</span>
            </div>
        </div>
    @endforeach
</div>
