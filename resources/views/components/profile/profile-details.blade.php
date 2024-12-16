 <!--begin::details View-->
 <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
     <!--begin::Card header-->
     <div class="card-header cursor-pointer">
         <!--begin::Card title-->
         <div class="card-title m-0">
             <h3 class="fw-bold m-0">Profile Details</h3>
         </div>
         <!--end::Card title-->
         <!--begin::Action-->
         <a href="{{ route('profile.settings') }}" class="btn btn-sm btn-primary align-self-center">Edit Profile</a>
         <!--end::Action-->
     </div>
     <!--begin::Card header-->
     <!--begin::Card body-->
     <div class="card-body p-9">
         <!--begin::Row-->
         <div class="row mb-7">
             <!--begin::Label-->
             <label class="col-lg-4 fw-semibold text-muted">Full Name</label>
             <!--end::Label-->
             <!--begin::Col-->
             <div class="col-lg-8">
                 <span class="fw-bold fs-6 text-gray-800">{{ $user->name }}</span>
             </div>
             <!--end::Col-->
         </div>
         <!--end::Row-->
         <!--begin::Input group-->
         <div class="row mb-7">
             <!--begin::Label-->
             <label class="col-lg-4 fw-semibold text-muted">Email</label>
             <!--end::Label-->
             <!--begin::Col-->
             <div class="col-lg-8">
                 <a href="#" class="fw-semibold fs-6 text-gray-800 text-hover-primary">{{ $user->email }}</a>
             </div>
             <!--end::Col-->
         </div>
         <!--end::Input group-->
         @if ($user->profile->phone != null)
             <div class="row mb-7">
                 <!--begin::Label-->
                 <label class="col-lg-4 fw-semibold text-muted">Contact Phone
                     <span class="ms-1" data-bs-toggle="tooltip" aria-label="Phone number must be active"
                         data-bs-original-title="Phone number must be active" data-kt-initialized="1">
                         <i class="ki-outline ki-information fs-7"></i>
                     </span></label>
                 <!--end::Label-->
                 <!--begin::Col-->
                 <div class="col-lg-8 d-flex align-items-center">
                     <span class="fw-bold fs-6 text-gray-800 me-2">{{ $user->profile->phone }}</span>
                     <span class="badge badge-success">Verified</span>
                 </div>
                 <!--end::Col-->
             </div>
         @endif
         @if ($user->profile->country?->name)
            <div class="row mb-7">
                <!-- Label -->
                <label class="col-lg-4 fw-semibold text-muted">
                    Country
                    <span class="ms-1" data-bs-toggle="tooltip" title="Country of origination">
                        <i class="ki-outline ki-information fs-7"></i>
                    </span>
                </label>
                <!-- Value -->
                <div class="col-lg-8">
                    <span class="fw-bold fs-6 text-gray-800">{{ $user->profile->country->name }}</span>
                </div>
            </div>
        @endif 
         @if ($user->profile->bio != null)
             <div class="row mb-7">
                 <!--begin::Label-->
                 <label class="col-lg-4 fw-semibold text-muted">Bio</label>
                 <!--end::Label-->
                 <!--begin::Col-->
                 <div class="col-lg-8">
                     <span class="fw-bold fs-6 text-gray-800">{{ $user->profile->bio }}</span>
                 </div>
                 <!--end::Col-->
             </div>
         @endif
         <!--begin::Notice-->
         <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
             <!--begin::Icon-->
             <i class="ki-outline ki-information fs-2tx text-warning me-4"></i>
             <!--end::Icon-->
             <!--begin::Wrapper-->
             <div class="d-flex flex-stack flex-grow-1">
                 <!--begin::Content-->
                 <div class="fw-semibold">
                     <h4 class="text-gray-900 fw-bold">We need your attention!</h4>
                     <div class="fs-6 text-gray-700">Your payment was declined. To start using tools, please
                         <a class="fw-bold" href="account/billing.html">Add Payment Method</a>.
                     </div>
                 </div>
                 <!--end::Content-->
             </div>
             <!--end::Wrapper-->
         </div>
         <!--end::Notice-->
     </div>
     <!--end::Card body-->
 </div>
 <!--end::details View-->
