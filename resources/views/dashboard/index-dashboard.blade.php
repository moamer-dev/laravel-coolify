@php
    $user = Auth::user()->load('profile');
@endphp
@extends('layouts.dashboard')
@section('content')
    <div id="kt_app_content" class="app-content bg-red">
        <div class="row g-5 g-xxl-10">
            <div class="col-xxl-4 mb-xxl-10 bg-gray-100">
                @include('components.dashboard.dashboard-grid')
                @include('components.shared.need-help-cta')
            </div>
            <div class="col-xxl-8 mb-5 mb-xl-10">
                @include('components.dashboard.dashboard-hero')
                @include('components.dashboard.dashboard-table')
            </div>
        </div>
    </div>
@endsection
