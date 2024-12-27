@extends('layouts.dashboard')

@section('title', 'Draggable To-Do Tasks')
@push('headerScripts')
    <script src="https://cdn.jsdelivr.net/npm/@shopify/draggable@1.0.0-beta.8/lib/draggable.bundle.js"></script>
@endpush

@section('content')
    @if ($user->learningPaths->isEmpty())
        @include('components.paths.no-paths-selected')
    @else
        <!-- Tabs Navigation -->
        <ul class="nav nav-tabs" id="learningPathsTabs" role="tablist">
            @foreach ($user->learningPaths as $index => $learningPath)
                <li class="nav-item" role="presentation">
                    <button class="nav-link fs-4 {{ $index === 0 ? 'active' : '' }}" id="tab-{{ $learningPath->id }}"
                        data-bs-toggle="tab" data-bs-target="#content-{{ $learningPath->id }}" type="button" role="tab"
                        aria-controls="content-{{ $learningPath->id }}"
                        aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
                        {{ $learningPath->title }}
                    </button>
                </li>
            @endforeach
        </ul>

        <!-- Tabs Content -->
        <div class="tab-content mt-4" id="learningPathsContent">
            @foreach ($user->learningPaths as $index => $learningPath)
                @if ($learningPath->learningStacks->isEmpty())
                    <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}" id="content-{{ $learningPath->id }}"
                        role="tabpanel" aria-labelledby="tab-{{ $learningPath->id }}">
                        @include('components.shared.no-content-notification', [
                            'message' => 'لم يتم إضافة مسارات تعليمية لك بعد.',
                            'subMessage' => 'يمكنك استعراض جميع المسارات التعليمية المتاحة لك.',
                            'link' => '#',
                        ])
                    </div>
                @endif
                <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}" id="content-{{ $learningPath->id }}"
                    role="tabpanel" aria-labelledby="tab-{{ $learningPath->id }}">
                    <div class="row">
                        @foreach ($learningPath->learningStacks as $stack)
                            {{-- @if ($stack->modules->isEmpty())
                                @include('components.shared.no-content-notification', [
                                    'message' => 'لم يتم إضافة مسارات تعليمية لك بعد.',
                                    'subMessage' => 'يمكنك استعراض جميع المسارات التعليمية المتاحة لك.',
                                    'link' => '#',
                                ])
                            @endif --}}
                            @foreach ($stack->modules as $module)
                                <div class="col-12 col-md-6 col-lg-6 col-xl-3">
                                    @livewire('user.learning-paths.module-tasks', ['module' => $module], key($module->id))
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection


@push('footerScripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.querySelector('#todo-list');
            if (container.length === 0) {
                return false;
            }
            var swappable = new Draggable.Sortable(container, {
                draggable: '.list-group-item',
                mirror: {
                    constrainDimensions: true,
                },
            });

        });
    </script>
@endpush
