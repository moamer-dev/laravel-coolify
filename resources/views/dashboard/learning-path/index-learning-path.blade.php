@extends('layouts.dashboard')
@section('content')
    @if ($user->learningPaths->count() == 0)
        @include('components.paths.no-paths-selected')
    @else
        @include('components.paths.path-header')
        @livewire('user.learning-paths.index')
    @endif
@endsection
