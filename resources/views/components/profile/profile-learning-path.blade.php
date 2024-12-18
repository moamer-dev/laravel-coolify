{{-- @php
    dd($user->learningPaths->pluck('id')->toArray());
@endphp --}}
<div class="card d-flex flex-row-fluid flex-center">
    <form method="post" action="{{ route('profile.update-path') }}"
        class="card-body py-20 w-100 px-9 fv-plugins-bootstrap5 fv-plugins-framework">
        @csrf
        @method('patch')
        <div class="current" data-kt-stepper-element="content">
            <div class="w-100">
                <div class="pb-10 pb-lg-15">
                    <h2 class="fw-bold d-flex align-items-center text-gray-900">Choose Learning Paths</h2>
                    <div class="text-muted fw-semibold fs-6">Select one or more learning paths.</div>
                </div>
                <div class="fv-row fv-plugins-icon-container">
                    <div class="row">
                        @foreach ($learningPaths as $learningPath)
                            <div class="col-12 col-md-6 col-lg-4">
                                <input type="checkbox" class="btn-check" name="learning_paths[]"
                                    value="{{ $learningPath->id }}" id="learning_path_{{ $learningPath->id }}"
                                    {{ in_array($learningPath->id, $user->learningPaths->pluck('id')->toArray()) ? 'checked' : '' }}>
                                <label for="learning_path_{{ $learningPath->id }}"
                                    class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center mb-10">
                                    <i class="ki-outline ki-badge fs-3x me-5"></i>
                                    <span class="d-block fw-semibold text-start">
                                        <span
                                            class="text-gray-900 fw-bold d-block fs-4 mb-2">{{ $learningPath->title }}</span>
                                        <span
                                            class="text-muted fw-semibold fs-6">{{ $learningPath->description }}</span>
                                    </span>
                                </label>
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
    </form>
</div>
