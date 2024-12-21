<div class="card mb-5 mb-xl-10">
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
        data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
        <div class="card-title m-0">
            <h3 class="fw-bold m-0">بياناتك الشخصية</h3>
        </div>
    </div>
    <div id="kt_account_settings_profile_details" class="collapse show">
        <form method="post" action="{{ route('profile.update') }}" class="form">
            @csrf
            @method('patch')
            <div class="card-body border-top p-9">
                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">صورتك</label>
                    <div class="col-lg-8">
                        <div class="image-input image-input-outline" data-kt-image-input="true"
                            style="background-image: url('{{ asset('assets') }}/media/svg/avatars/blank.svg')">
                            <div class="image-input-wrapper w-125px h-125px"
                                style="background-image: url({{ $user->profile && $user->profile->avatar ? asset('storage/' . $user->profile->avatar) : asset('assets/media/avatars/300-1.jpg') }})">
                            </div>
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                <i class="ki-outline ki-pencil fs-7"></i>
                                <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="avatar_remove" />
                            </label>
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                <i class="ki-outline ki-cross fs-2"></i>
                            </span>
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                <i class="ki-outline ki-cross fs-2"></i>
                            </span>
                        </div>
                        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                    </div>
                </div>
                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">الإسم كاملاً</label>

                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-6 fv-row">
                                <input type="text" name="name"
                                    class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                    placeholder="First name" value="{{ $user->name }}" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">البريد الإلكتروني</label>
                    <div class="col-lg-8 fv-row">
                        <input type="text" name="email" class="form-control form-control-lg form-control-solid"
                            placeholder="Company name" value="{{ $user->email }}" />
                    </div>
                </div>
                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">
                        <span class="required">رقم التواصل</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Phone number must be active">
                            <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                    </label>
                    <div class="col-lg-8 fv-row">
                        <input type="tel" name="phone" class="form-control form-control-lg form-control-solid"
                            placeholder="Phone number" value="{{ $user->profile->phone }}" />
                    </div>
                </div>
                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">نبذة عنك</label>
                    <div class="col-lg-8 fv-row">
                        <textarea name="bio" class="form-control form-control-lg form-control-solid">
                            {{ $user->profile->bio }}
                            </textarea>

                    </div>
                </div>
                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">
                        <span class="required">الدولة</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Country of origination">
                            <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                    </label>
                    <div class="col-lg-8 fv-row">
                        <select name="country_id" aria-label="Select a Country" data-control="select2"
                            data-placeholder="Select a country..."
                            class="form-select form-select-solid form-select-lg fw-semibold">
                            <option value="">قم بإختيار دولتك...</option>
                            <option data-kt-flag="flags/afghanistan.svg" value="1"
                                {{ optional($user->profile)->country_id == 1 ? 'selected' : '' }}>Afghanistan</option>
                            <option data-kt-flag="flags/aland-islands.svg" value="2"
                                {{ optional($user->profile)->country_id == 2 ? 'selected' : '' }}>Aland Islands</option>
                            <option data-kt-flag="flags/albania.svg" value="3"
                                {{ optional($user->profile)->country_id == 3 ? 'selected' : '' }}>Albania</option>
                            <option data-kt-flag="flags/algeria.svg" value="4"
                                {{ optional($user->profile)->country_id == 4 ? 'selected' : '' }}>Algeria</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-0">
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">هل تود ظهور حسابك؟</label>
                    <div class="col-lg-8 d-flex align-items-center">
                        <div class="form-check form-check-solid form-switch form-check-custom fv-row">
                            <input type="hidden" name="is_public" value="0">
                            <input name="is_public" class="form-check-input w-45px h-30px" type="checkbox"
                                id="allowmarketing" value="1" role="switch"
                                {{ $user->profile->is_public ? 'checked' : '' }}>
                            <label class="form-check-label" for="allowmarketing"></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
            </div>
        </form>
    </div>
</div>

<div class="card mb-5 mb-xl-10">
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
        data-bs-target="#kt_account_signin_method">
        <div class="card-title m-0">
            <h3 class="fw-bold m-0">Sign-in Method</h3>
        </div>
    </div>
    <div id="kt_account_settings_signin_method" class="collapse show">
        <div class="card-body border-top p-9">
            <div class="d-flex flex-wrap align-items-center">
                <div id="kt_signin_email">
                    <div class="fs-6 fw-bold mb-1">Email Address</div>
                    <div class="fw-semibold text-gray-600">support@keenthemes.com</div>
                </div>
                <div id="kt_signin_email_edit" class="flex-row-fluid d-none">
                    <form id="kt_signin_change_email" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                        novalidate="novalidate">
                        <div class="row mb-6">
                            <div class="col-lg-6 mb-4 mb-lg-0">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="emailaddress" class="form-label fs-6 fw-bold mb-3">Enter New Email
                                        Address</label>
                                    <input type="email" class="form-control form-control-lg form-control-solid"
                                        id="emailaddress" placeholder="Email Address" name="emailaddress"
                                        value="support@keenthemes.com">
                                    <div
                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="confirmemailpassword" class="form-label fs-6 fw-bold mb-3">Confirm
                                        Password</label>
                                    <input type="password" class="form-control form-control-lg form-control-solid"
                                        name="confirmemailpassword" id="confirmemailpassword">
                                    <div
                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <button id="kt_signin_submit" type="button" class="btn btn-primary me-2 px-6">Update
                                Email</button>
                            <button id="kt_signin_cancel" type="button"
                                class="btn btn-color-gray-500 btn-active-light-primary px-6">Cancel</button>
                        </div>
                    </form>
                </div>
                <div id="kt_signin_email_button" class="ms-auto">
                    <button class="btn btn-light btn-active-light-primary">Change Email</button>
                </div>
            </div>
            <div class="separator separator-dashed my-6"></div>
            <div class="d-flex flex-wrap align-items-center mb-10">
                <div id="kt_signin_password">
                    <div class="fs-6 fw-bold mb-1">Password</div>
                    <div class="fw-semibold text-gray-600">************</div>
                </div>
                <div id="kt_signin_password_edit" class="flex-row-fluid d-none">
                    <form method="post" action="{{ route('password.update') }}" id="kt_signin_change_password"
                        class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                        @csrf
                        @method('put')
                        <div class="row mb-1">
                            <div class="col-lg-4">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="currentpassword" class="form-label fs-6 fw-bold mb-3">Current
                                        Password</label>
                                    <input type="password" class="form-control form-control-lg form-control-solid"
                                        name="current_password" id="currentpassword">
                                    <div
                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="newpassword" class="form-label fs-6 fw-bold mb-3">New Password</label>
                                    <input type="password" class="form-control form-control-lg form-control-solid"
                                        name="update_password_password" id="newpassword">
                                    <div
                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="confirmpassword" class="form-label fs-6 fw-bold mb-3">Confirm New
                                        Password</label>
                                    <input type="password" class="form-control form-control-lg form-control-solid"
                                        name="password_confirmation" id="confirmpassword">
                                    <div
                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-text mb-5">Password must be at least 8 character and contain symbols</div>
                        <div class="d-flex">
                            <button type="submit" class="btn btn-primary me-2 px-6">Update
                                Password</button>
                            <button id="kt_password_cancel" type="button"
                                class="btn btn-color-gray-500 btn-active-light-primary px-6">Cancel</button>
                        </div>
                    </form>
                </div>
                <div id="kt_signin_password_button" class="ms-auto">
                    <button class="btn btn-light btn-active-light-primary">Reset Password</button>
                </div>
            </div>
            <!--end::Notice-->
        </div>
        <!--end::Card body-->
    </div>
</div>
