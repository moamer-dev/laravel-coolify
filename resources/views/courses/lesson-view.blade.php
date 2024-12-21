@extends('layouts.dashboard')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_content" class="app-content">
            <div class=" d-flex">
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <div class="d-flex flex-column flex-column-fluid">
                        <div id="kt_app_content" class="app-content container">
                            <div class="row g-5 g-xxl-10">
                                <div class="col-xxl-4 mb-5 mb-xl-10">
                                    @include('components.courses.lessons.lesson-sidebar')
                                </div>
                                <div class="col-xxl-8 mb-xxl-10">
                                    @include('components.courses.lessons.lesson-video')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
