<style>
    .card-link-hover:hover .card-header {
        color: var(--bs-primary) !important;
        text-decoration: none;
    }
</style>

<section class="py-10" id="paths">
    <div class="container">
        <div class="text-center pb-10">
            <h2 class="fw-bold display-6">مسارات التعليم المتاحة</h2>
        </div>
        <div class="row gy-4 justify-content-center">
            @foreach ($paths as $path)
                <div class="col-xxl-3 col-md-3 col-6" data-aos="fade-up" data-aos-duration="800">
                    {{-- <a href="{{ route('path-front-view', $path->slug) }}"
                        class="card card-border-primary hover-elevate-up parent-hover">
                        <div class="card-body d-flex flex-column gap-4 text-center">
                            <div>
                                <div class="icon-shape icon-xxl bg-light-primary rounded-circle">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" class="bi bi-gear text-primary" viewBox="0 0 16 16">
                                        <path
                                            d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0">
                                        </path>
                                        <path
                                            d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="">{{ $path->title }}</h3>
                                <span class="fs-6 pt-3">21 مصدر تعليمي</span>
                            </div>
                        </div>
                    </a> --}}
                    <a href="{{ route('path-front-view', $path->slug) }}" class="text-decoration-none card-link-hover">
                        <div class="card shadow-sm fw-semibold border-0 mx-auto card-lift hover-elevate-up parent-hover"
                            style="max-width: 22rem;">
                            <div class="card-header text-uppercase d-flex align-items-center justify-content-center"
                                style="min-height: 60px !important">
                                {{-- <i class="bi bi-mortarboard-fill fs-2 px-2 text-primary"></i> --}}
                                <span class="fs-4 fw-bold text-hover-primary">{{ $path->title }}</span>
                            </div>

                            <div class="card-body"
                                style="
                            background-image:  url('{{ feature_image_or_default($path->image) }}'); 
                            background-size: 100px; 
                            background-repeat: no-repeat; 
                            background-position: left bottom;
                            position: relative;">
                                <div class="btn btn-link text-decoration-none d-flex align-items-center">
                                    <i class="bi bi-signpost-2 fs-3 text-primary"></i>
                                    <span class="fs-6">{{ $path->learningStacks->count() }} مسار فرعي</span>
                                </div>
                                <div class="btn btn-link text-decoration-none d-flex align-items-center">
                                    <i class="bi bi-boxes fs-3 text-primary"></i>
                                    <span
                                        class="fs-6">{{ $path->learningStacks->flatMap(fn($stack) => $stack->modules)->count() }}
                                        موديول</span>
                                </div>
                                <div class="btn btn-link text-decoration-none d-flex align-items-center">
                                    <i class="bi bi-list-task fs-3 text-primary"></i>
                                    <span
                                        class="fs-6">{{ $path->learningStacks->flatMap(fn($stack) => $stack->modules)->flatMap(fn($module) => $module->tasks)->count() }}
                                        مهام</span>
                                </div>
                                <div class="btn btn-link text-decoration-none d-flex align-items-center">
                                    <i class="bi bi-list-nested fs-3 text-primary"></i>
                                    <span
                                        class="fs-6">{{ $path->learningStacks->flatMap(fn($stack) => $stack->modules)->flatMap(fn($module) => $module->tasks)->flatMap(fn($task) => $task->subtasks)->count() }}
                                        مهام فرعية</span>
                                </div>
                            </div>

                            {{-- <div class="card-footer px-8 py-5 d-flex justify-content-between flex-wrap">
                                <button class="btn btn-primary">التسجيل</button>
                            </div> --}}
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
