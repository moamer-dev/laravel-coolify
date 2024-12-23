@extends('layouts.dashboard')

@section('title', 'Draggable To-Do Tasks')

@push('headerScripts')
    <script src="https://cdn.jsdelivr.net/npm/@shopify/draggable@1.0.0-beta.8/lib/draggable.bundle.js"></script>
@endpush

@section('content')
    <div class="row">
        @foreach ($user->learningPaths as $learningPath)
            @foreach ($learningPath->learningStacks as $stack)
                @foreach ($stack->modules as $module)
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card tasks-box">
                            <div class="card-body">
                                <div class="d-flex mb-2">
                                    <h6 class="fs-15 mb-0 flex-grow-1 text-truncate task-title"><a
                                            href="apps-tasks-details.html" class="d-block">{{ $module->title }}</a></h6>
                                </div>
                                <p class="text-muted">Profile Page means a web page accessible to the public or to guests.
                                </p>
                                <ul id="todo-list" class="list-group">
                                    @foreach ($module->tasks as $task)
                                        <li class="list-group-item lh-large py-4" data-id="{{ $task->id }}">
                                            {{ $task->title }}
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="mb-3 my-5">
                                    <div class="d-flex mb-1">
                                        <div class="flex-grow-1">
                                            <h6 class="text-muted mb-0"><span class="text-secondary">15%</span> of 100%</h6>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <span class="text-muted">03 Jan, 2022</span>
                                        </div>
                                    </div>
                                    <div class="progress rounded-3 progress-sm">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 15%"
                                            aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <span class="badge bg-primary-subtle text-primary">Admin</span>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="avatar-group">
                                            <a href="javascript: void(0);" class="avatar-group-item material-shadow"
                                                data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top"
                                                aria-label="Alexis" data-bs-original-title="Alexis">
                                                <img src="assets/images/users/avatar-6.jpg" alt=""
                                                    class="rounded-circle avatar-xxs">
                                            </a>
                                            <a href="javascript: void(0);" class="avatar-group-item material-shadow"
                                                data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top"
                                                aria-label="Nancy" data-bs-original-title="Nancy">
                                                <img src="assets/images/users/avatar-5.jpg" alt=""
                                                    class="rounded-circle avatar-xxs">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer border-top-dashed">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <h6 class="text-muted mb-0">#VL2436</h6>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <ul class="link-inline mb-0">
                                            <li class="list-inline-item">
                                                <a href="javascript:void(0)" class="text-muted"><i
                                                        class="ri-eye-line align-bottom"></i> 04</a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript:void(0)" class="text-muted"><i
                                                        class="ri-question-answer-line align-bottom"></i> 19</a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript:void(0)" class="text-muted"><i
                                                        class="ri-attachment-2 align-bottom"></i> 02</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--end card-body-->
                        </div>
                    </div>
                @endforeach
            @endforeach
        @endforeach
    </div>
@endsection

@push('footerScripts')
    <script>
        // Initialize Draggable.js
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
