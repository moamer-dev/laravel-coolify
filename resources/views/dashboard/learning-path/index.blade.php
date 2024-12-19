@php
    $user = Auth::user()->load('profile');
@endphp
@extends('layouts.dashboard')
@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        @include('components.paths.path-header')
        @livewire('user.learning-paths.index')
    </div>
@endsection
