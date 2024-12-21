@extends('layouts.dashboard')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_content" class="app-content">
            <div class=" d-flex">
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <div class="d-flex flex-column flex-column-fluid">
                        <style>
                            .menu .menu-item.hover:not(.here)>.menu-link:not(.disabled):not(.active):not(.here) .menu-title,
                            .app-sidebar .menu .menu-item:not(.here) .menu-link:hover:not(.disabled):not(.active):not(.here) .menu-title {
                                color: var(--bs-component-active-bg);
                            }

                            .menu-title-gray-600 .menu-item .menu-link .menu-title {
                                color: #151617;
                            }
                        </style>
                        <div id="kt_app_content" class="app-content container">
                            <div class="row g-5 g-xxl-10">
                                <div class="col-xxl-4 mb-5 mb-xl-10">
                                    @include('components.series.zaytonah-sidebar')
                                </div>
                                <div class="col-xxl-8 mb-xxl-10">
                                    @include('components.series.zaytonah-video')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
