@extends('layouts.dashboard')
@section('content')
    <div class="d-flex flex-grow-1 flex-stack flex-wrap gap-2 my-10" id="kt_toolbar">
        @include('components.profile.breadcrumb', ['title' => 'Courses', 'active' => 'Learn'])
    </div>
    @livewire('Courses.learn')
@endsection
