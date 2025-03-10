<div class="accordion mb-3" id="moduleAccordion">
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading{{ $module->id }}">
            <button class="accordion-button fw-bold text-gray-900" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapse{{ $module->id }}" aria-expanded="true"
                aria-controls="collapse{{ $module->id }}">
                {{ $module->title }}
            </button>
        </h2>
        <div id="collapse{{ $module->id }}" class="accordion-collapse collapse "
            aria-labelledby="heading{{ $module->id }}" data-bs-parent="#moduleAccordion">
            <div class="accordion-body">
                @foreach ($module->tasks as $task)
                    <div class="d-flex align-items-center mb-8">
                        <span class="bullet bullet-vertical h-40px {{ $this->get_task_color($task) }}"></span>
                        <div class="form-check form-check-custom form-check-solid mx-5">
                            <input
                                class="form-check-input {{ $this->get_task_status($task) === 'completed' ? 'checked bg-success text-white border-success' : '' }}"
                                type="checkbox" disabled
                                {{ $this->get_task_status($task) === 'completed' ? 'checked' : '' }}>
                        </div>
                        <div class="flex-grow-1">
                            <a href="{{ route('user.subtask-view', ['id' => $task->id, 'subtask' => $task->subtasks->isNotEmpty() ? $task->subtasks->first()->id : null]) }}"
                                class="text-gray-800 text-hover-primary fw-bold fs-6">
                                {{ $task->title }}
                            </a>
                            <span class="text-muted fw-semibold d-block">
                                Subtasks: {{ $task->subtasks->count() }}
                            </span>
                        </div>
                        <span
                            class="badge 
                        @if ($this->get_task_status($task) === 'completed') badge-light-success 
                        @elseif($this->get_task_status($task) === 'in_progress') badge-light-warning 
                        @else badge-light-danger @endif 
                        fs-8 fw-bold">
                            {{ ucfirst($this->get_task_status($task)) }}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
