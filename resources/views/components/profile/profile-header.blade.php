 <!--begin::Navbar-->
 <div class="card mb-5 mb-xl-10">
     <div class="card-body pt-9 pb-0">
         <!--begin::Details-->
         <div class="d-flex flex-wrap flex-sm-nowrap">
             <!--begin: Pic-->
             <div class="me-7 mb-4">
                 <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                     <img src="{{ $user->profile && $user->profile->avatar ? asset('storage/' . $user->profile->avatar) : asset('assets/media/avatars/300-1.jpg') }}"
                         alt="image">
                     <div
                         class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px">
                     </div>
                 </div>
             </div>
             <!--end::Pic-->
             <!--begin::Info-->
             <div class="flex-grow-1">
                 <!--begin::Title-->
                 <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                     <!--begin::User-->
                     <div class="d-flex flex-column">
                         <!--begin::Name-->
                         <div class="d-flex align-items-center mb-2">
                             <a href="#"
                                 class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{ $user->name }}</a>
                             <a href="#">
                                 <i class="ki-outline ki-verify fs-1 text-primary"></i>
                             </a>
                         </div>
                         <!--end::Name-->
                         <!--begin::Info-->
                         <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                             <a href="#"
                                 class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                 <i class="ki-outline ki-profile-circle fs-4 me-1"></i>Developer</a>
                             <a href="#"
                                 class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                 <i
                                     class="ki-outline ki-geolocation fs-4 me-1"></i>{{ optional($user->profile->country)->name ?? '' }}
                             </a>


                             <a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary mb-2">
                                 <i class="ki-outline ki-sms fs-4"></i>{{ $user->email }}</a>
                         </div>
                         <!--end::Info-->
                     </div>
                     <!--end::User-->
                 </div>
                 <!--end::Title-->
                 <!--begin::Stats-->
                 <div class="d-flex flex-wrap flex-stack">
                     <!--begin::Progress-->
                     <div class="d-flex align-items-center w-200px w-sm-300px flex-column mt-3">
                         <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                             <span class="fw-semibold fs-6 text-gray-500">Profile Compleation</span>
                             <span class="fw-bold fs-6">50%</span>
                         </div>
                         <div class="h-5px mx-3 w-100 bg-light mb-3">
                             <div class="bg-success rounded h-5px" role="progressbar" style="width: 50%;"
                                 aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                         </div>
                     </div>
                     <!--end::Progress-->
                 </div>
                 <!--end::Stats-->
             </div>
             <!--end::Info-->
         </div>
         <!--end::Details-->
         <!--begin::Navs-->
         <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
             <li class="nav-item mt-2">
                 <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ request()->is('profile') ? 'active' : '' }}"
                     href="{{ route('profile.overview') }}">Overview</a>
             </li>
             <li class="nav-item mt-2">
                 <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ request()->is('profile/settings*') ? 'active' : '' }}"
                     href="{{ route('profile.settings') }}">Settings</a>
             </li>
             <li class="nav-item mt-2">
                 <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ request()->is('profile/billing*') ? 'active' : '' }} "
                     href="{{ route('profile.billing') }}">Billing</a>
             </li>
         </ul>
     </div>
 </div>
 <!--end::Navbar-->
