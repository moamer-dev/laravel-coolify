@extends('layouts.dashboard')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar d-flex flex-stack py-4 py-lg-8">
            <div class="d-flex flex-grow-1 flex-stack flex-wrap gap-2 mb-n10" id="kt_toolbar">
                @include('components.profile.breadcrumb', [
                    'title' => 'الحساب الشخصي',
                    'active' => Auth::user()->name,
                ])
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            @include('components.profile.profile-header')
            @include('components.profile.profile-learning-path')
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets') }}/js/custom/account/settings/signin-methods.js"></script>
@endsection
