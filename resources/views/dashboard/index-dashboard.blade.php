@php
    $user = Auth::user()->load('profile');
@endphp
@extends('layouts.dashboard')
@section('content')
    <div class="row g-5 g-xxl-10">
        <div class="col-xxl-4 mb-xxl-10">
            @include('components.dashboard.dashboard-grid')
            @include('components.shared.need-help-cta', [
                'title' => 'تعرف علي طريقة التعلم في زيتونة',
                'btn_text' => 'طريقة التعلم',
                'btn_href' => route('user.path-todo'),
                'btn_secondary_text' => 'شاهد الفيديو',
                'btn_secondary_href' => '#',
            ])
        </div>
        <div class="col-xxl-8 mb-5 mb-xl-10">
            @include('components.dashboard.dashboard-hero')
            @include('components.dashboard.dashboard-plan')
        </div>
    </div>
@endsection
