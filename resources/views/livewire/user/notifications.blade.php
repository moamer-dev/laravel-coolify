<div class="card">
    <div class="card-header card-header-stretch">
        <div class="card-toolbar m-0">
            <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0 fw-bold" role="tablist">
                <!-- Tab for "إشعارات جديدة" -->
                <li class="nav-item" role="presentation">
                    <a id="kt_activity_today_tab" class="nav-link justify-content-center text-active-gray-800 active"
                        data-bs-toggle="tab" role="tab" href="#kt_activity_today" aria-controls="kt_activity_today"
                        aria-selected="true">
                        إشعارات جديدة
                    </a>
                </li>
                <!-- Tab for "تمت قراءتها" -->
                <li class="nav-item" role="presentation">
                    <a id="kt_activity_week_tab" class="nav-link justify-content-center text-active-gray-800"
                        data-bs-toggle="tab" role="tab" href="#kt_activity_week" aria-controls="kt_activity_week"
                        aria-selected="false">
                        تمت قراءتها
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="card-body">
        <div class="tab-content">
            <!-- Content for "إشعارات جديدة" -->
            <div id="kt_activity_today" class="card-body p-0 tab-pane fade show active" role="tabpanel"
                aria-labelledby="kt_activity_today_tab">
                @if ($unreadNotifications->isNotEmpty())
                    @foreach ($unreadNotifications as $notification)
                        <div class="timeline" wire:key="{{ $notification->id }}">
                            <div class="timeline-item">
                                <div class="timeline-line"></div>
                                <div class="timeline-icon">
                                    <i class="ki-outline ki-message-text-2 fs-2 text-gray-500"></i>
                                </div>
                                <div class="timeline-content mt-n1">
                                    <div class="d-flex align-items-center rounded px-7">
                                        <div class="flex-grow-1">
                                            <a href="{{ $notification->data['href'] }}"
                                                class="fs-5 text-gray-900 text-hover-primary px-2">{{ $notification->data['message'] }}</a>
                                            <div class="text-muted fs-7 mt-2">
                                                {{ $notification->created_at->diffForHumans() }}
                                            </div>
                                        </div>
                                        <a wire:click.prevent="markAsRead('{{ $notification->id }}')"
                                            class="btn btn-sm btn-light btn-active-light-primary">تعيين كمقرؤة</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="d-flex flex-center py-20">
                        <div class="text-center">
                            <div class="fs-4 text-gray-400">لا توجد إشعارات جديدة</div>
                        </div>
                    </div>
                @endif
            </div>
            <!-- Content for "تمت قراءتها" -->
            <div id="kt_activity_week" class="card-body p-0 tab-pane fade" role="tabpanel"
                aria-labelledby="kt_activity_week_tab">
                @if ($readNotifications->isNotEmpty())
                    @foreach ($readNotifications as $notification)
                        <div class="timeline" wire:key="{{ $notification->id }}">
                            <div class="timeline-item">
                                <div class="timeline-line"></div>
                                <div class="timeline-icon">
                                    <i class="ki-outline ki-message-text-2 fs-2 text-gray-500"></i>
                                </div>
                                <div class="timeline-content mb-10 mt-n1">
                                    <div class="d-flex align-items-center rounded px-7">
                                        <div class="flex-grow-1">
                                            <a href="#"
                                                class="fs-5 text-gray-900 text-hover-primary px-2">{{ $notification->data['message'] }}</a>
                                            <div class="text-muted fs-7 mt-2">
                                                {{ $notification->created_at->diffForHumans() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="d-flex flex-center py-20">
                        <div class="text-center">
                            <div class="fs-4 text-gray-400">لا توجد إشعارات</div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
