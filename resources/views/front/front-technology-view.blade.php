@extends('layouts.front')
@section('content')
    <style>
        .avatar-xxl {
            height: 7.5rem;
            width: 7.5rem;
        }
    </style>
    <div style="min-height: 85vh;">
        <section class="py-8" style="background: linear-gradient(270deg, #9d4eff 0%, #782af4 100%)"></section>
        <section class="bg-white shadow-sm">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                        <div class="d-md-flex align-items-center justify-content-between bg-white pt-3 pb-3 pb-lg-5">
                            <div class="d-md-flex align-items-center text-lg-start text-center">
                                <div class="me-3 mt-n8">
                                    <img src="{{ asset('storage') }}/{{ $technology->image }}"
                                        class="avatar-xxl rounded border p-4 bg-white" alt="bootstarp ">
                                </div>
                                <div class="mt-3 mt-md-0">
                                    <h1 class="mb-0 fw-bold me-3">{{ $technology->name }}</h1>
                                </div>
                                <div>
                                    <span class="ms-2 fs-5">
                                        <span class="text-dark fw-medium">{{ $technology->courses->count() }}</span>
                                        دورات
                                    </span>
                                    @php
                                        $count = $technology->courses->flatMap->projects->count();
                                    @endphp
                                    <span class="ms-2 fs-5">
                                        <span class="text-dark fw-medium">{{ $count }}</span>
                                        المشاريع
                                    </span>
                                    <span class="ms-2 fs-5">
                                        <span class="text-dark fw-medium">{{ $technology->quizzes->count() }}</span>
                                        إختبارات
                                    </span>
                                    <span class="ms-2 fs-5">
                                        <span class="text-dark fw-medium">{{ $technology->series->count() }}</span>
                                        زيتونات
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- Nav tab -->
                        {{-- <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                            <li class="nav-item mt-2">
                                <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ request()->is('profile') ? 'active' : '' }}"
                                    href="{{ route('profile.overview') }}">الدورات</a>
                            </li>
                            <li class="nav-item mt-2">
                                <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ request()->is('profile') ? 'active' : '' }}"
                                    href="{{ route('profile.overview') }}">المشاريع</a>
                            </li>
                            <li class="nav-item mt-2">
                                <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ request()->is('profile/settings*') ? 'active' : '' }}"
                                    href="{{ route('profile.settings') }}">الإختبارات</a>
                            </li>
                            <li class="nav-item mt-2">
                                <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ request()->is('profile/billing*') ? 'active' : '' }} "
                                    href="{{ route('profile.billing') }}">السلاسل التعليمية</a>
                            </li>
                            <li class="nav-item mt-2">
                                <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ request()->is('profile/learning-path*') ? 'active' : '' }} "
                                    href="{{ route('profile.learning-path') }}">المصادر الخارجية</a>
                            </li>
                        </ul> --}}
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container mt-5">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12 py-3">
                        @livewire('technologies.resources', ['technology' => $technology])
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
