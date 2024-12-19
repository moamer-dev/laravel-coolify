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
@section('headerScripts')
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
@endsection
