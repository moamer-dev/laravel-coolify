@extends('layouts.dashboard')
@section('content')
    {{-- @php
        dd($course);
    @endphp --}}
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_content" class="app-content">
            <div class="row g-5 g-xxl-10">
                <div class="col-xxl-4 mb-xxl-10">
                    @include('components.courses.meta')
                </div>
                <div class="col-xxl-8 mb-5 mb-xl-10">
                    @include('components.courses.courseHeader')
                    @include('components.courses.tabs')
                </div>
            </div>
        </div>
    </div>
@endsection
