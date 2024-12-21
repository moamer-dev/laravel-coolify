@php
    $quizAttempts = $user->quizAttempts->sortByDesc('created_at');
@endphp
<div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bold fs-3 mb-1">محاولات الإختبارات</span>
            <span class="text-muted mt-1 fw-semibold fs-7">هذه هي قائمة المحاولات الخاصة بالإختبارات التي قمت بها</span>
        </h3>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body pt-3">
        <!--begin::Table container-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4"
                id="kt_datatable_zero_configuration">
                <!--begin::Table head-->
                <thead>
                    <tr class="fw-bold text-muted bg-light">
                        <th class="p-0 text-gray-900 fw-bolder fs-5">الإختبار</th>
                        <th class="p-0 min-w-150px text-gray-900 fw-bolder fs-5">التصنيف</th>
                        <th class="p-0 min-w-150px text-gray-900 fw-bolder fs-5">الدرجة</th>
                        <th class="p-0 min-w-150px text-gray-900 fw-bolder fs-5">التاريخ</th>
                        <th class="p-0 min-w-150px text-gray-900 fw-bolder fs-5">الحالة</th>
                        <th class="p-0 min-w-100px text-gray-900 fw-bolder fs-5">المزيد</th>
                    </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>
                    @foreach ($quizAttempts as $quizAttempt)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-45px me-5">
                                        <img alt="Pic" src="assets/media/avatars/300-6.jpg">
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Name-->
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="{{ route('quiz.index', $quizAttempt->quiz->slug) }}"
                                            class="text-gray-900 fw-bold text-hover-primary mb-1 fs-6">
                                            {{ $quizAttempt->quiz->title }}</a>
                                        <a href="#"
                                            class="text-muted text-hover-primary fw-semibold text-muted d-block fs-7">
                                            <span class="text-gray-900">{{ $quizAttempt->quiz->type }}</span></a>
                                    </div>
                                    <!--end::Name-->
                                </div>
                            </td>
                            <td class="">
                                <a href="#"
                                    class="text-gray-900 fw-bold text-hover-primary d-block mb-1 fs-6">{{ $quizAttempt->quiz->category->name }}</a>
                            </td>
                            <td class="">
                                <a href="#"
                                    class="text-gray-900 fw-bold text-hover-primary d-block mb-1 fs-6">{{ $quizAttempt->score }}
                                    / {{ $quizAttempt->quiz->passing_score }}</a>
                            </td>
                            <td class="text-muted fw-semibold ">{{ $quizAttempt->created_at->diffForHumans() }}
                            </td>
                            <td class="">
                                <span>
                                    @if ($quizAttempt->score >= $quizAttempt->quiz->passing_score)
                                        <span class="badge badge-light-success">تم الاجتياز</span>
                                    @else
                                        <span class="badge badge-light-danger">لم يتم الإجتياز</span>
                                    @endif
                                </span>
                            </td>
                            <td class="">
                                <a href="{{ route('quiz.attempt.show', ['attemptId' => $quizAttempt->id]) }}"
                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                    <i class="ki-outline ki-switch fs-2"></i>
                                </a>
                                <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                    <i class="ki-outline ki-trash fs-2"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Table container-->
    </div>
    <!--begin::Body-->
</div>
