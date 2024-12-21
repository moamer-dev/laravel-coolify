  <div class="card mb-5 mb-xl-10">
      <div class="card-body pt-9 pb-0">
          <div class="d-flex flex-wrap flex-sm-nowrap mb-6">
              <div
                  class="d-flex flex-center flex-shrink-0 bg-light rounded w-100px h-100px w-lg-150px h-lg-150px me-7 mb-4">
                  <img class="mw-50px mw-lg-75px" src="{{ asset('assets') }}/media/svg/brand-logos/volicity-9.svg"
                      alt="image">
              </div>
              <div class="flex-grow-1">
                  <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                      <div class="d-flex flex-column">
                          <div class="d-flex align-items-center mb-1">
                              <a href="#" class="text-gray-800 text-hover-primary fs-2 fw-bold me-3">مصادر التعلم
                                  الخاصة بمساراتك</a>
                              <span class="badge badge-light-success me-auto">In Progress</span>
                          </div>
                          <div class="d-flex flex-wrap fw-semibold mb-4 fs-5 text-gray-500">هنا ستجد كل المصادر المتعلقة
                              بالمسارات التي قمت بتحديدها في ملفك الشخصي</div>
                      </div>
                  </div>
                  <div class="d-flex flex-wrap justify-content-start">
                      <div class="d-flex flex-wrap">
                          <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                              <div class="d-flex align-items-center">
                                  <div class="fs-4 fw-bold">{{ $pathCourses->count() }}</div>
                              </div>
                              <div class="fw-semibold fs-6 text-gray-500">دورات</div>
                          </div>
                          <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                              <div class="d-flex align-items-center">
                                  <div class="fs-4 fw-bold counted" data-kt-countup="true" data-kt-countup-value="75"
                                      data-kt-initialized="1">{{ $pathProjects->count() }}</div>
                              </div>
                              <div class="fw-semibold fs-6 text-gray-500">مشاريع</div>
                          </div>
                          <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                              <div class="d-flex align-items-center">
                                  <div class="fs-4 fw-bold counted" data-kt-countup="true" data-kt-countup-value="15000"
                                      data-kt-countup-prefix="$" data-kt-initialized="1">{{ $pathQuizzes->count() }}
                                  </div>
                              </div>
                              <div class="fw-semibold fs-6 text-gray-500">إختبارات</div>
                          </div>
                          <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                              <div class="d-flex align-items-center">
                                  <div class="fs-4 fw-bold counted" data-kt-countup="true" data-kt-countup-value="15000"
                                      data-kt-countup-prefix="$" data-kt-initialized="1">{{ $pathSeries->count() }}
                                  </div>
                              </div>
                              <div class="fw-semibold fs-6 text-gray-500">سلاسل تعليمية</div>
                          </div>
                      </div>
                      <div class="symbol-group symbol-hover mb-3">
                          <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                              data-bs-original-title="Alan Warden" data-kt-initialized="1">
                              <span class="symbol-label bg-warning text-inverse-warning fw-bold">A</span>
                          </div>
                          <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                              aria-label="Michael Eberon" data-bs-original-title="Michael Eberon"
                              data-kt-initialized="1">
                              <img alt="Pic" src="{{ asset('assets') }}/media/avatars/300-11.jpg">
                          </div>
                          <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                              aria-label="Michelle Swanston" data-bs-original-title="Michelle Swanston"
                              data-kt-initialized="1">
                              <img alt="Pic" src="{{ asset('assets') }}/media/avatars/300-7.jpg">
                          </div>
                          <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                              aria-label="Francis Mitcham" data-bs-original-title="Francis Mitcham"
                              data-kt-initialized="1">
                              <img alt="Pic" src="{{ asset('assets') }}/media/avatars/300-20.jpg">
                          </div>
                          <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                              data-bs-original-title="Susan Redwood" data-kt-initialized="1">
                              <span class="symbol-label bg-primary text-inverse-primary fw-bold">S</span>
                          </div>
                          <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                              aria-label="Melody Macy" data-bs-original-title="Melody Macy" data-kt-initialized="1">
                              <img alt="Pic" src="{{ asset('assets') }}/media/avatars/300-2.jpg">
                          </div>
                          <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                              data-bs-original-title="Perry Matthew" data-kt-initialized="1">
                              <span class="symbol-label bg-info text-inverse-info fw-bold">P</span>
                          </div>
                          <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                              aria-label="Barry Walter" data-bs-original-title="Barry Walter" data-kt-initialized="1">
                              <img alt="Pic" src="{{ asset('assets') }}/media/avatars/300-12.jpg">
                          </div>
                          <a href="#" class="symbol symbol-35px symbol-circle" data-bs-toggle="modal"
                              data-bs-target="#kt_modal_view_users">
                              <span class="symbol-label bg-dark text-inverse-dark fs-8 fw-bold"
                                  data-bs-toggle="tooltip" data-bs-trigger="hover"
                                  data-bs-original-title="View more users" data-kt-initialized="1">+42</span>
                          </a>
                      </div>
                  </div>
              </div>
          </div>
          <div class="separator"></div>
          <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
              <li class="nav-item">
                  <a class="nav-link text-active-primary py-5 me-6 {{ request()->is('user/paths') ? 'active' : '' }}"
                      href="{{ route('user.path-view') }}">المصارد التعليمية</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link text-active-primary py-5 me-6 {{ request()->is('user/paths/visualize') ? 'active' : '' }}"
                      href="{{ route('user.path-visualize') }}">مخطط مسارك التعليمي</a>
              </li>
          </ul>

      </div>
  </div>
