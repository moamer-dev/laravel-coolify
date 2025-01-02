<section class="py-20">
    <div class="container">
        <div class="text-center pb-10">
            <h2 class="fw-bold display-6">ميزات تعليمية فريدة في زيتونة</h2>
            <p class="fs-3 lh-lg">مع زيتونة، نقدم لك تجربة تعليمية مخصصة تبدأ بخطط تعلم منظمة، تقييم مستمر لأدائك،
                ومسارات تفاعلية تأخذك خطوة بخطوة نحو الاحتراف.</p>
        </div>
        <div class="row g-10">
            @foreach ($posts as $post)
                <div class="col-md-3">
                    @include('components.blog.post-card')
                </div>
            @endforeach
        </div>
    </div>
</section>
