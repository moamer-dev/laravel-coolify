<section class="py-20">
    <div class="container">
        <div class="text-center pb-10">
            <h2 class="fw-bold display-6">ميزات تعليمية فريدة في زيتونة</h2>
            <p class="fs-3 lh-lg">مع زيتونة، نقدم لك تجربة تعليمية مخصصة تبدأ بخطط تعلم منظمة، تقييم مستمر لأدائك،
                ومسارات تفاعلية تأخذك خطوة بخطوة نحو الاحتراف.</p>
        </div>
        <div class="row g-10">
            @php
                $i = 0;
            @endphp
            @for ($i = 0; $i < 4; $i++)
                <div class="col-md-3">
                    <div class="card mb-4 card-lift hover-elevate-up parent-hover">
                        <a href="blog-single.html">
                            <!-- Img  -->
                            <img src="{{ asset('assets') }}/media/stock/600x400/img-39.jpg" class="card-img-top"
                                alt="blogpost ">
                        </a>
                        <!-- Card body -->
                        <div class="card-body">
                            <a href="#" class="fs-5 mb-2 fw-semibold d-block text-gray-800">Courses</a>
                            <h3><a href="blog-single.html" class="text-gray-800">How to become
                                    modern Stack Developer
                                    in 2020</a></h3>
                            <p>Lorem ipsum dolor sit amet, accu msan in, tempor dictum nequrem ipsum...</p>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</section>
