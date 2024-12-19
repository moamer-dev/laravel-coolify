<div class="container py-4">
    <div class="row g-3">
        @foreach ($userPaths as $path)
            <div class="col-md-4">
                <div class="card learning-path-box shadow-lg" data-path-id="{{ $path->id }}">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $path->name }}</h5>
                        <p class="card-text">{{ $path->description }}</p>
                    </div>
                </div>
                <div class="learning-stacks-container d-none" id="path-{{ $path->id }}">
                    @foreach ($path->learningStacks as $stack)
                        <div class="card learning-stack-box my-2" data-stack-id="{{ $stack->id }}">
                            <div class="card-body text-center">
                                <h6 class="card-title">{{ $stack->name }}</h6>
                                <p class="card-text">{{ $stack->description }}</p>
                            </div>
                        </div>
                        <div class="technology-stacks-container d-none" id="stack-{{ $stack->id }}">
                            @foreach ($stack->technologyStacks as $tech)
                                <div class="card technology-stack-box my-2" data-tech-id="{{ $tech->id }}">
                                    <div class="card-body text-center">
                                        <h6 class="card-title">{{ $tech->name }}</h6>
                                        <p class="card-text">{{ $tech->description }}</p>
                                    </div>
                                </div>
                                <div class="data-container d-none" id="tech-{{ $tech->id }}">
                                    <div class="data-buttons d-flex justify-content-around my-2">
                                        <button class="btn btn-primary show-courses"
                                            data-tech-id="{{ $tech->id }}">Courses</button>
                                        <button class="btn btn-secondary show-quizzes"
                                            data-tech-id="{{ $tech->id }}">Quizzes</button>
                                        <button class="btn btn-success show-series"
                                            data-tech-id="{{ $tech->id }}">Series</button>
                                    </div>
                                    <div class="data-content mt-3" id="data-{{ $tech->id }}">
                                        <!-- Content dynamically rendered via Livewire -->
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const learningPathBoxes = document.querySelectorAll('.learning-path-box');
            const stackBoxes = document.querySelectorAll('.learning-stack-box');
            const technologyBoxes = document.querySelectorAll('.technology-stack-box');

            // Initialize GSAP animations
            const gsap = window.gsap;

            // Handle learning path click
            learningPathBoxes.forEach(box => {
                box.addEventListener('click', () => {
                    const pathId = box.dataset.pathId;
                    const stacksContainer = document.getElementById(`path-${pathId}`);
                    if (stacksContainer.classList.contains('d-none')) {
                        gsap.to(stacksContainer, {
                            duration: 0.5,
                            opacity: 1,
                            height: 'auto',
                            display: 'block'
                        });
                        stacksContainer.classList.remove('d-none');
                    } else {
                        gsap.to(stacksContainer, {
                            duration: 0.5,
                            opacity: 0,
                            height: 0,
                            display: 'none'
                        });
                        stacksContainer.classList.add('d-none');
                    }
                });
            });

            // Handle stack click
            stackBoxes.forEach(box => {
                box.addEventListener('click', () => {
                    const stackId = box.dataset.stackId;
                    const techContainer = document.getElementById(`stack-${stackId}`);
                    if (techContainer.classList.contains('d-none')) {
                        gsap.to(techContainer, {
                            duration: 0.5,
                            opacity: 1,
                            height: 'auto',
                            display: 'block'
                        });
                        techContainer.classList.remove('d-none');
                    } else {
                        gsap.to(techContainer, {
                            duration: 0.5,
                            opacity: 0,
                            height: 0,
                            display: 'none'
                        });
                        techContainer.classList.add('d-none');
                    }
                });
            });

            // Handle technology stack click
            technologyBoxes.forEach(box => {
                box.addEventListener('click', () => {
                    const techId = box.dataset.techId;
                    const dataContainer = document.getElementById(`tech-${techId}`);
                    if (dataContainer.classList.contains('d-none')) {
                        gsap.to(dataContainer, {
                            duration: 0.5,
                            opacity: 1,
                            height: 'auto',
                            display: 'block'
                        });
                        dataContainer.classList.remove('d-none');
                    } else {
                        gsap.to(dataContainer, {
                            duration: 0.5,
                            opacity: 0,
                            height: 0,
                            display: 'none'
                        });
                        dataContainer.classList.add('d-none');
                    }
                });
            });

            // Handle data buttons click (courses, quizzes, series)
            document.querySelectorAll('.data-buttons button').forEach(button => {
                button.addEventListener('click', (event) => {
                    const techId = event.target.dataset.techId;
                    const type = event.target.classList.contains('show-courses') ? 'courses' :
                        event.target.classList.contains('show-quizzes') ? 'quizzes' : 'series';

                    // Dynamically load the content via Livewire
                    Livewire.emit('loadData', {
                        techId,
                        type
                    });
                });
            });
        });

        document.addEventListener('data-loaded', event => {
            const {
                techId,
                type,
                data
            } = event.detail;
            const container = document.getElementById(`data-${techId}`);
            container.innerHTML = data.map(item => `<div>${item.name}</div>`).join('');
        });
    </script>
@endpush
