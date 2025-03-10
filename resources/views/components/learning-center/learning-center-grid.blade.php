<div class="card card-flush h-xl-100"
    style="background-image:url('{{ asset('assets/media/logos/icon_35.png') }}'); background-size: 250px; 
        background-repeat: no-repeat; 
        background-position: left top;
        position: relative;">
    <div
        class="card-header rounded bgi-no-repeat bgi-size-cover bgi-position-y-top bgi-position-x-center align-items-start">
        <h3 class="card-title align-items-start flex-column pt-6">
            <span class="fw-bold fs-2 mb-3">مصادر تعليمية بإنتظارك</span>
            <div class="fs-5">
                <span class="opacity-75">لديك </span>
                <span class="position-relative d-inline-block">
                    <span class="link-white opacity-75-hover fw-bold d-block mb-1">{{ $tasksCount }}
                        مصادر تعليمية</span>
                    <span
                        class="position-absolute opacity-50 bottom-0 start-0 border-2 border-body border-bottom w-100"></span>
                </span>
                <span class="opacity-75">تنتظرك لإكمالها</span>
            </div>
        </h3>
    </div>
    <div class="card-body">
        <div class="position-relative">
            <div class="row g-3 g-lg-6">
                @foreach ($statistic_data as $key => $value)
                    <div class="col-6">
                        <div
                            class="border border-gray-300 bg-gray-100 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="ki-outline ki-arrow-up fs-3 text-success me-2"></i>
                                <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="4500"
                                    data-kt-countup-prefix="$" data-kt-initialized="1">{{ $value }}</div>
                            </div>
                            <div class="fw-semibold fs-6 text-gray-500">{{ $key }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
