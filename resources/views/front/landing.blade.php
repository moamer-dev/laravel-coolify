@extends('layouts.front')
<style>
    .icon-shape {
        align-items: center;
        display: inline-flex;
        justify-content: center;
        text-align: center;
        vertical-align: middle;
    }

    .icon-sm {
        height: 2rem;
        line-height: 2rem;
        width: 2rem;
    }

    .card-lift {
        border-radius: .75rem;
    }

    .card-lift:hover {
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, .1), 0 4px 6px -2px rgba(0, 0, 0, .05) !important;
    }

    .card-border-primary {
        border: 1px solid transparent;
    }

    .card-border-primary:hover {
        border-color: #754ffe;
        transform: translateY(-.25rem);
    }

    .rounded-circle {
        border-radius: 50% !important;
    }

    .bg-light-primary {
        --gk-bg-opacity: 1;
        background-color: #ede9fe !important;
    }

    .icon-shape {
        align-items: center;
        display: inline-flex;
        justify-content: center;
        text-align: center;
        vertical-align: middle;
    }

    .icon-xxl {
        height: 6rem;
        line-height: 6rem;
        width: 6rem;
    }

    .border-end-md {
        border-right: gray !important;
    }

    .border-top-md {
        border-top: gray !important;
    }

    .avatar {
        display: inline-block;
        height: 3rem;
        position: relative;
        width: 3rem;
    }

    .avatar-lg {
        height: 3.5rem;
        width: 3.5rem;
    }

    .custom-card {
        height: 350px;
        /* Increase card height */
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .slider-nav button {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        font-size: 1.5rem;
        padding: 10px 20px;
        border-radius: 5px;
    }

    .tns-ovh {
        overflow: hidden;
    }

    .pt-40 {
        padding-top: 7rem !important;
    }
</style>

@section('content')
    <div style="min-height: 78vh;">
        @include('components.front.landing.landing-hero')
        @include('components.front.landing.landing-features-1')
        @include('components.front.landing.landing-paths')
        @include('components.front.landing.landing-video')
        @include('components.front.landing.landing-features-2')
        @include('components.front.landing.landing-statistics')
        @include('components.front.landing.landing-testimonials')
        @include('components.front.landing.landing-blogs')
    </div>
@endsection
