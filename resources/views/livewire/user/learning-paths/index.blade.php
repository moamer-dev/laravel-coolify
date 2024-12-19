<div class="container">
    <button class="btn btn-primary mt-3 mb-4 {{ !$activeTechnology ? 'd-none' : '' }}" wire:click="resetSelectTechnology">
        {{ $activeTechnology ? 'Reset' : '' }}
    </button>
    <div class="row">
        <!-- Learning Paths -->
        @if (!$activeTechnology || $showLearningCards)
            <div class="col-md-4">
                <div class="card" style="max-height: 550px; overflow-y: auto;">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-900">Learning Paths</span>
                            <span class="text-muted mt-1 fw-semibold fs-7">Avg. 72% completed lessons</span>
                        </h3>
                    </div>
                    <div class="card-body pt-5">
                        @foreach ($userPaths as $path)
                            <div class="d-flex flex-stack p-4 rounded {{ $activePath === $path->id ? 'bg-light-primary' : '' }}"
                                wire:click="selectPath({{ $path->id }})" style="cursor: pointer;">
                                <div class="d-flex align-items-center me-3">
                                    <img src="http://127.0.0.1:8000/assets/media/svg/brand-logos/laravel-2.svg"
                                        class="me-4 w-30px" alt="">
                                    <div class="flex-grow-1">
                                        <a href="javascript:void(0)"
                                            class="text-gray-800 text-hover-primary fs-5 fw-bold lh-0">{{ $path->title }}</a>
                                        <span class="text-gray-500 fw-semibold d-block fs-6">Path Description</span>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-3"></div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        <!-- Learning Stacks -->
        @if ($activePath && (!$activeTechnology || $showLearningCards))
            <div class="col-md-4">
                <div class="card" style="max-height: 550px; overflow-y: auto;">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-900">Learning Stacks</span>
                            <span class="text-muted mt-1 fw-semibold fs-7">Avg. 72% completed lessons</span>
                        </h3>
                    </div>
                    <div class="card-body pt-5">
                        @foreach ($selectedPath->learningStacks as $stack)
                            <div class="d-flex flex-stack p-4 rounded {{ $activeStack === $stack->id ? 'bg-light-info' : '' }}"
                                wire:click="selectStack({{ $stack->id }})" style="cursor: pointer;">
                                <div class="d-flex align-items-center me-3">
                                    <img src="http://127.0.0.1:8000/assets/media/svg/brand-logos/laravel-2.svg"
                                        class="me-4 w-30px" alt="">
                                    <div class="flex-grow-1">
                                        <a href="javascript:void(0)"
                                            class="text-gray-800 text-hover-primary fs-5 fw-bold lh-0">{{ $stack->title }}</a>
                                        <span class="text-gray-500 fw-semibold d-block fs-6">Stack Description</span>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-3"></div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        <!-- Technology Stacks -->
        @if ($activeStack)
            <div class="col-md-4">
                <div class="card" style="max-height: 550px; overflow-y: auto;">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-900">Technologies</span>
                            <span class="text-muted mt-1 fw-semibold fs-7">Avg. 72% completed lessons</span>
                        </h3>
                    </div>
                    <div class="card-body pt-5">
                        @foreach ($selectedStack->technologyStacks as $tech)
                            <div class="d-flex flex-stack p-4 rounded {{ $activeTechnology === $tech->id ? 'bg-light-success' : '' }}"
                                wire:click="selectTechnology({{ $tech->id }})" style="cursor: pointer;">
                                <div class="d-flex align-items-center me-3">
                                    <img src="http://127.0.0.1:8000/assets/media/svg/brand-logos/laravel-2.svg"
                                        class="me-4 w-30px" alt="">
                                    <div class="flex-grow-1">
                                        <a href="javascript:void(0)"
                                            class="text-gray-800 text-hover-primary fs-5 fw-bold lh-0">{{ $tech->name }}</a>
                                        <span class="text-gray-500 fw-semibold d-block fs-6">Technology
                                            Description</span>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-3"></div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        @if ($activeTechnology)
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-900">{{ $selectedTechnology->name }} -
                                Content</span>
                            <span class="text-muted mt-1 fw-semibold fs-7">Avg. 72% completed lessons</span>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="btn-group mb-3" role="group" aria-label="Content Buttons">
                            <button class="btn btn-outline-primary {{ $contentType === 'courses' ? 'active' : '' }}"
                                wire:click="showContent('courses')">Courses</button>
                            <button class="btn btn-outline-primary {{ $contentType === 'quizzes' ? 'active' : '' }}"
                                wire:click="showContent('quizzes')">Quizzes</button>
                            <button class="btn btn-outline-primary {{ $contentType === 'series' ? 'active' : '' }}"
                                wire:click="showContent('series')">Series</button>
                        </div>

                        <div class="row g-3">
                            @if ($contentType === 'courses')
                                @foreach ($selectedTechnology->courses as $course)
                                    <div class="col-lg-4 col-md-6 mb-4">
                                        @livewire('courses.course-card', ['item' => $course], key($course->slug . '-' . $course->id))
                                    </div>
                                @endforeach
                            @elseif ($contentType === 'quizzes')
                                @foreach ($selectedTechnology->quizzes as $quiz)
                                    <div class="col-md-4">
                                        @include('components.courses.quiz-card', ['item' => $quiz])
                                    </div>
                                @endforeach
                            @elseif ($contentType === 'series')
                                @foreach ($selectedTechnology->series as $seriesItem)
                                    <div class="col-12">
                                        @include('components.courses.series-card', ['item' => $seriesItem])
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
