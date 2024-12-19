{{-- @php 
dd($items);
@endphp --}}
<div class="container mt-12">
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-4 col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-3">Categories</h5>
                    <ul class="list-unstyled">
                        @foreach ($categories as $category)
                            <li wire:key={{ $category->id }}>
                                <input type="checkbox" wire:model.live="selectedCategories" value="{{ $category->id }}"
                                    id="categoryCheck{{ $category->id }}">
                                <label for="categoryCheck{{ $category->id }}">{{ $category->name }}</label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @if ($model === 'projects' || $model === 'courses')
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="mb-3">Levels</h5>
                        <ul class="list-unstyled">
                            @foreach ($levels as $level)
                                <li wire:key={{ $level->id }}>
                                    <input type="checkbox" wire:model.live="selectedLevels" value="{{ $level->id }}"
                                        id="levelCheck{{ $level->id }}">
                                    <label for="levelCheck{{ $level->id }}">{{ $level->name }}</label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            @if ($model === 'quizzes')
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="mb-3">Quiz Type</h5>
                        <ul class="list-unstyled">
                            <li>
                                <input type="checkbox" wire:model.live="selectedTypes" value="assessment"
                                    id="levelCheck-Assessment">
                                <label for="levelCheck-assessment">Assessment</label>
                            </li>
                            <li>
                                <input type="checkbox" wire:model.live="selectedTypes" value="interview"
                                    id="levelCheck-interview">
                                <label for="levelCheck-interview">interview</label>
                            </li>
                            <li>
                                <input type="checkbox" wire:model.live="selectedTypes" value="course"
                                    id="levelCheck-course">
                                <label for="levelCheck-course">course</label>
                            </li>
                            <li>
                                <input type="checkbox" wire:model.live="selectedTypes" value="challenge"
                                    id="levelCheck-challenge">
                                <label for="levelCheck-challenge">Challenge</label>
                            </li>
                        </ul>
                    </div>
                </div>
            @endif

        </div>
        <style>
            .course-image {
                max-height: 180px;
                object-fit: cover;
                width: 100%;
            }

            .card-hover {
                transition: box-shadow .25s ease;
            }
        </style>
        <div class="col-xl-9 col-lg-9 col-md-8 col-12">
            <div class="d-flex justify-content-between align-items-center mb-5">
                <div class="d-inline-flex col-md-6 col-lg-4 col-xl-3">
                    <!-- List  -->
                    <select class="form-select" wire:model.live="sortBy">
                        <option value="All">All</option>
                        <option value="Newest">Newest</option>
                        <option value="Oldest">Oldest</option>
                        <option value="A-Z">A-Z</option>
                        <option value="Z-A">Z-A</option>
                    </select>
                </div>
                <div class="d-flex gap-2">
                    <!-- Model Selection Buttons -->
                    <button class="btn btn-outline-primary {{ $model === 'courses' ? 'active' : '' }}"
                        wire:click="setModel('courses')">Courses</button>
                    <button class="btn btn-outline-primary {{ $model === 'projects' ? 'active' : '' }}"
                        wire:click="setModel('projects')">Projects</button>
                    <button class="btn btn-outline-primary {{ $model === 'series' ? 'active' : '' }}"
                        wire:click="setModel('series')">Series</button>
                    <button class="btn btn-outline-primary {{ $model === 'quizzes' ? 'active' : '' }}"
                        wire:click="setModel('quizzes')">Quizzes</button>
                </div>
            </div>
            @if ($model === 'courses' || $model === 'projects')
                <div class="row">
                    @forelse ($items as $item)
                        @livewire('courses.course-card', ['item' => $item], key($model . '-' . $item->id))
                    @empty
                        <div class="col-12">
                            <p>No {{ ucfirst($model) }} found.</p>
                        </div>
                    @endforelse
                </div>
            @endif
            @if ($model === 'series')
                <div class="row">
                    @forelse ($items as $item)
                        @include('components.courses.series-card', ['item' => $item])
                    @empty
                        <div class="col-12">
                            <p>No {{ ucfirst($model) }} found.</p>
                        </div>
                    @endforelse
                </div>
            @endif
            @if ($model === 'quizzes')
                <div class="row">
                    @forelse ($items as $item)
                        @include('components.courses.quiz-card', ['item' => $item])
                    @empty
                        <div class="col-12">
                            <p>No {{ ucfirst($model) }} found.</p>
                        </div>
                    @endforelse
                </div>
            @endif
        </div>
    </div>
</div>
