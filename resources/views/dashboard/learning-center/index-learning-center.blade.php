@php
    $user = Auth::user()->load('profile');
@endphp
@extends('layouts.dashboard')
@section('content')
    @if ($user->learningPaths->count() == 0)
        @include('components.paths.no-paths-selected')
    @elseif ($user->profile->level_id == null)
        @include('components.paths.no-levels-selected')
    @else
        <div class="row gx-5 gx-xl-10 align-items-center">
            <div class="col-xl-4 mb-10">
                @include('components.learning-center.learning-center-grid')
            </div>
            <div class="col-xl-8 mb-10">
                <div class="row g-5 g-xl-10">
                    <div class="col-xl-6 mb-xl-10">
                        @include('components.learning-center.learning-center-slider')
                    </div>
                    <div class="col-xl-6 mb-5 mb-xl-10">
                        @include('components.learning-center.learning-center-slider')
                    </div>
                </div>
                @include('components.learning-center.learning-center-cta')
            </div>
        </div>
        <div class="row g-5 g-xl-10">
            <div class="col-xl-4 mb-xl-10">
                @include('components.learning-center.learning-center-resources-list')
            </div>
            <div class="col-xl-4 mb-xl-10">
                @include('components.learning-center.learning-center-resources-list')
            </div>
            <div class="col-xl-4 mb-xl-10">
                @include('components.learning-center.learning-center-resources-list')
            </div>
        </div>
    @endif
@endsection
