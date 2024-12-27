<div class="row g-5 g-xxl-10">
    <div class="col-xxl-4 mb-5 mb-xl-10">
        <div class="card card-xl-stretch mb-xl-8">
            <div class="card-header align-items-center border-0 mt-4">
                <h3 class="card-title align-items-start flex-column">
                    <span class="fw-bold mb-2 text-gray-900">المهام الفرعية</span>
                    <span class="text-muted fw-semibold fs-7">عدد المهام {{ $task->subtasks->count() }}</span>
                </h3>
            </div>
            <div class="card-body pt-5">
                <div class="timeline-label">
                    @if ($task->subtasks->count() == 0)
                        <div class="timeline-item">
                            <div class="fw-mormal timeline-content text-muted ps-3">
                                <span class="fw-bold fs-6">لا توجد مهام فرعية</span>
                            </div>
                        </div>
                    @endif
                    @foreach ($task->subtasks as $subtask)
                        <div class="timeline-item">
                            <div class="timeline-badge">
                                <input type="checkbox" id="checkbox-{{ $subtask->id }}"
                                    wire:click="toggleSubtaskStatus({{ $subtask->id }})"
                                    class="form-check-input {{ $subtask_progress[$subtask->id] === 'completed' ? 'bg-success text-white border-success' : 'border-warning' }}"
                                    {{ $subtask_progress[$subtask->id] === 'completed' ? 'checked' : '' }}>

                            </div>
                            <div class="fw-mormal timeline-content text-muted ps-3">
                                <a href="{{ route('user.subtask-view', ['id' => $task->id, 'subtask' => $subtask->id]) }}"
                                    class="fw-bold fs-6 {{ $subtask->id == $subtask_to_view->id ? 'text-primary' : '' }}"
                                    style="color: inherit;">
                                    {{ $subtask->title }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-8 mb-xxl-10">
        <div class="row">
            <div class="col-xxl-9">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="text-muted">
                            <h6 class="mb-3 fw-semibold text-uppercase">تفاصيل هذه المهمة</h6>

                            <!-- Badge for Subtask Status -->
                            @if ($subtask_to_view && $subtask_to_view->id)
                                <span
                                    class="badge fw-bold fs-8 px-2 py-1 ms-2 {{ isset($subtask_progress[$subtask_to_view->id]) && $subtask_progress[$subtask_to_view->id] === 'completed' ? 'badge-light-success' : 'badge-light-warning' }}">
                                    {{ $this->format_subtask_status($subtask_to_view->id) }}
                                </span>
                                <div class="lh-lg mt-3">

                                    {!! $subtask_to_view->description !!}
                                </div>
                            @else
                                <span class="fw-bold fs-6">لا توجد مهام فرعية</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @if ($subtask_to_view && $subtask_to_view->id)
                <div class="col-xxl-9">
                    <div class="card card-flush mb-10">
                        <div class="card-body pt-0">
                            <div class="mb-6">
                                <div class="separator separator-solid"></div>
                                <ul class="nav py-3">
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-sm btn-color-gray-600 btn-active-color-primary btn-active-light-primary fw-bold px-4 me-1 collapsible active"
                                            data-bs-toggle="collapse" href="#kt_social_feeds_comments_2"
                                            aria-expanded="true">

                                            <i class="ki-outline ki-message-text-2 fs-2 me-1"></i>
                                            {{ $subtask_to_view->comments->count() }} تعليقات
                                        </a>
                                    </li>
                                </ul>
                                <div class="separator separator-solid mb-1"></div>
                                <div class="collapse show" id="kt_social_feeds_comments_2">
                                    @foreach ($subtask_to_view->comments as $comment)
                                        <div class="d-flex pt-6">
                                            <div class="symbol symbol-45px me-5">
                                                <img src="{{ get_avatar_by_id($comment->user_id) }}" alt="">
                                            </div>
                                            <div class="d-flex flex-column flex-row-fluid">
                                                <div class="d-flex align-items-center flex-wrap mb-0">
                                                    <a href="#"
                                                        class="text-gray-800 text-hover-primary fw-bold me-6">
                                                        {{ get_user_name($comment->user_id) }}
                                                    </a>
                                                    <span class="text-gray-500 fw-semibold fs-7 me-5">
                                                        {{ $comment->created_at->diffForHumans() }}
                                                    </span>
                                                    @if ($comment->user_id === Auth::id())
                                                        <div class="ms-auto">
                                                            <a href="#"
                                                                wire:click.prevent="toggleEditComment({{ $comment->id }})"
                                                                class="text-gray-500 text-hover-primary fw-semibold fs-7 me-3">
                                                                {{ $editingCommentId === $comment->id ? 'إغلاق' : 'تعديل' }}
                                                            </a>
                                                            <a href="#"
                                                                wire:click.prevent="$dispatchSelf('delete-confirm', { commentId: {{ $comment->id }} })"
                                                                class="text-gray-500 text-hover-danger fw-semibold fs-7">
                                                                حذف
                                                            </a>
                                                        </div>
                                                    @endif
                                                </div>
                                                @if ($editingCommentId === $comment->id)
                                                    <textarea wire:model="editingCommentContent" class="form-control form-control-solid border ps-5" rows="1"
                                                        placeholder="Edit your comment"></textarea>
                                                    <button wire:click.prevent="saveCommentEdit({{ $comment->id }})"
                                                        class="btn btn-primary btn-sm mt-2 max-w-1"
                                                        style="width: 80px;">
                                                        حفظ
                                                    </button>
                                                @else
                                                    <span class="text-gray-800 fs-7 fw-normal pt-1">
                                                        {{ $comment->content }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-35px me-3">
                                    <img src="{{ photo_or_default(Auth::user()->profile->avatar) }}" alt="">
                                </div>
                                <div class="position-relative w-100">
                                    <form wire:submit.prevent="addComment">
                                        <textarea wire:model="commentContent" class="form-control form-control-solid border ps-5" rows="1" rows="1"
                                            placeholder="قم بكتابة تعليقك هنا ...">
                                </textarea>
                                        <button type="submit" class="btn btn-primary btn-sm mt-3">إضافة تعليق</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

@script
    <script>
        document.addEventListener('updateStyles', (event) => {
            const checkbox = document.getElementById(`checkbox-${event.detail.id}`);
            console.log("event.detail", event.detail);
            if (checkbox) {
                checkbox.classList.toggle('bg-success', event.detail[0].status === 'completed');
                checkbox.classList.toggle('text-white', event.detail[0].status === 'completed');
                checkbox.classList.toggle('border-warning', event.detail[0].status !== 'completed');
            }
        });
        document.addEventListener('livewire:initialized', () => {
            $wire.on('delete-confirm', (event) => {
                console.log("event.detail", event.commentId);
                Swal.fire({
                    title: 'هل أنت متأكد؟',
                    text: "ستقوم بحذف هذا التعليق نهائياً!",
                    icon: 'warning',
                    showCancelButton: true,
                    //buttonsStyling: false,
                    //confirmButtonColor: '#3085d6',
                    //cancelButtonColor: '#d33',
                    confirmButtonText: 'نعم, احذفه!',
                    cancelButtonText: 'إلغاء',
                    customClass: {
                        confirmButton: "btn btn-primary btn-sm",
                        cancelButton: "btn btn-danger ms-2 btn-sm"
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        $wire.dispatchSelf('delete-comment', {
                            commentId: event.commentId
                        });
                    }
                });
            });
        });
    </script>
@endscript
