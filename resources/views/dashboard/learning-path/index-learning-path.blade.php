@extends('layouts.dashboard')
@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        @if ($user->learningPaths->count() == 0)
            @include('components.paths.no-paths-selected')
        @else
            @include('components.paths.path-header')
            @livewire('user.learning-paths.index')
        @endif
    </div>
@endsection
