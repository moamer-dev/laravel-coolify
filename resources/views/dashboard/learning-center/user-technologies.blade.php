@php
    $user = Auth::user()->load('profile');
@endphp
@extends('layouts.dashboard')
@section('content')
    <style>
        .avatar-md {
            height: 3.5rem;
            width: 3.5rem;
        }

        [data-bs-theme="dark"] .nav {
            --bs-nav-link-color: none !important;
        }
    </style>
    <div class="row align-items-center">
        @if ($user_technologies->isEmpty())
            <div class="col-12">
                @include('components.paths.no-paths-selected')
            </div>
        @endif
        @foreach ($user_technologies as $technology)
            <div class="col-xl-3 col-lg-6 col-md-6 col-6 align-items-center" data-aos="fade-up" data-aos-duration="800"
                style="direction: rtl;">
                @include('components.shared.technology-card', ['item' => $technology])
            </div>
        @endforeach
    </div>
@endsection
