<div class="row gy-5 g-xl-10">
    <div class="col-12">
        <div class="card h-md-100">
            <div class="card-body d-flex flex-column flex-center">
                <div class="mb-2 w-100">
                    <h1 class="fw-semibold text-gray-800 text-center lh-lg mt-4">لم تقم بتحديد مستواك بعد
                        <br>
                        <span class="fw-bolder">لتحديد مستواك يمكنك إجراء إختبار تقييمي أو إذا كنت تفضل يمكنك إختيار
                            المستوى بدون تحديد إختبار</span>
                    </h1>
                    <div class="py-10 text-center">
                        <img src="assets/media/svg/illustrations/easy/2.svg" class="theme-light-show w-200px"
                            alt="">
                        <img src="assets/media/svg/illustrations/easy/2-dark.svg" class="theme-dark-show w-200px"
                            alt="">
                    </div>
                </div>
                <div class="text-center mb-1">
                    <a href="{{ route('quiz.index', $assement_quiz->slug) }}" class="btn btn-md btn-primary me-2">إجراء
                        إختبار
                        تقييمي</a>
                </div>
                <!-- Separate Form Div -->
                <div class="text-center mt-4">
                    <h3 class="fw-bold text-gray-800 mt-3 mb-5">أو إختيار المستوى بدون إختبار</h3>
                    <form action="{{ route('profile.update-level-id') }}" method="post">
                        @csrf
                        @method('patch')
                        <select name="level_id"
                            class="form-select form-select-solid form-select-lg select2-hidden-accessible"
                            data-control="select2" data-hide-search="true" data-placeholder="إختر المستوى" required>
                            <option value="">قم بإختيار مستواك...</option>
                            <option value="1" {{ optional($user->profile)->level_id == 1 ? 'selected' : '' }}>
                                مبتدئ</option>
                            <option value="2" {{ optional($user->profile)->level_id == 2 ? 'selected' : '' }}>متوسط
                            </option>
                            <option value="3" {{ optional($user->profile)->level_id == 3 ? 'selected' : '' }}>متقدم
                            </option>
                        </select>
                        <button type="submit" class="btn btn-md btn-light mt-3">إختيار المستوى</button>
                        <a class="btn btn-md btn-light mt-3" href="account/settings.html">مركز المساعدة</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
