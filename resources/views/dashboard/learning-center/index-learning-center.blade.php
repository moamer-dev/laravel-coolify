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
    @if ($user->learningPaths->count() == 0)
        @include('components.paths.no-paths-selected')
    @elseif ($user->profile->level_id == null)
        @include('components.paths.no-levels-selected')
    @else
        <div class="row gx-5 gx-xl-10 mb-2">
            <div class="col-xl-4 mb-10">
                @include('components.learning-center.learning-center-grid')
            </div>
            <div class="col-xl-4 mb-10">
                <div class="row">
                    @foreach ($userTechnologies as $technology)
                        <div class="col-xl-6 col-lg-6 col-md-6 col-6 align-items-center" data-aos="fade-up"
                            data-aos-duration="800" style="direction: rtl;">
                            @include('components.shared.technology-card', ['item' => $technology])
                        </div>
                    @endforeach
                    <a href='{{ route('user.teschnologies') }}' class="btn btn-primary btn-sm btn-block mt-2">
                        <i class="fas fa-plus"></i>جميع التكنولوجيات</a>
                </div>
            </div>
            <div class="col-xl-4 mb-10">
                @include('components.shared.need-help-cta', [
                    'title' => 'إبدأ رحلة التعلم بزيارة خطتك التعليمية',
                    'btn_text' => 'خطة التعلم',
                    'btn_href' => route('user.path-todo'),
                    'btn_secondary_text' => 'شاهد الفيديو',
                    'btn_secondary_href' => '#',
                ])
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
