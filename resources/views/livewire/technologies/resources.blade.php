<div>
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div class="d-inline-flex col-md-6 col-lg-4 col-xl-3">
            <!-- List  -->
            <select class="form-select" wire:model.live="sortBy">
                <option value="All">الكل</option>
                <option value="Newest">الأحدث</option>
                <option value="Oldest">الأقدم</option>
                <option value="A-Z">أبجدياً - تصاعدياً</option>
                <option value="Z-A">أبجدياً - تنازلياً</option>
            </select>
        </div>
        <div class="d-flex gap-2">
            <!-- Model Selection Buttons -->
            <button class="btn btn-outline-primary {{ $model === 'courses' ? 'active' : '' }}"
                wire:click="setModel('courses')">الدورات</button>
            <button class="btn btn-outline-primary {{ $model === 'projects' ? 'active' : '' }}"
                wire:click="setModel('projects')">المشاريع</button>
            <button class="btn btn-outline-primary {{ $model === 'series' ? 'active' : '' }}"
                wire:click="setModel('series')">السلاسل</button>
            <button class="btn btn-outline-primary {{ $model === 'quizzes' ? 'active' : '' }}"
                wire:click="setModel('quizzes')">الإختبارات</button>
        </div>
    </div>
    @if ($model === 'courses' || $model === 'projects')
        <div class="row">
            @forelse ($items as $item)
                <div class="col-lg-3 col-md-6 mb-4">
                    @livewire('courses.course-card', ['item' => $item], key($model . '-' . $item->id))
                </div>
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
                <div class="col-6 mb-4">
                    @include('components.courses.series-card', ['item' => $item])
                </div>
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
                <div class="col-lg-3 col-md-6 mb-4">
                    @include('components.courses.quiz-card', ['item' => $item])
                </div>
            @empty
                <div class="col-12">
                    <p>No {{ ucfirst($model) }} found.</p>
                </div>
            @endforelse
        </div>
    @endif
</div>
