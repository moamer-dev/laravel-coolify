@extends('layouts.dashboard')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_content" class="app-content">
            <div class="row g-5 g-xxl-10">
                <div class="col-xxl-4 mb-xxl-10">
                    @include('components.courses.course-meta-card')
                    @include('components.courses.course-objectives-card')
                    @include('components.shared.need-help-cta')
                </div>
                <div class="col-xxl-8 mb-5 mb-xl-10">
                    @include('components.courses.course-header')
                    @include('components.courses.course-tabs')
                </div>
            </div>
        </div>
    </div>
@endsection
