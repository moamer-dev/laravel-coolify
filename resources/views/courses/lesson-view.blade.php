@extends('layouts.dashboard')
@section('content')
    <div class="row g-5 g-xxl-10">
        <div class="col-xxl-4 mb-5 mb-xl-10">
            @include('components.courses.lessons.lesson-sidebar')
        </div>
        <div class="col-xxl-8 mb-xxl-10">
            @include('components.courses.lessons.lesson-video')
        </div>
    </div>
@endsection
