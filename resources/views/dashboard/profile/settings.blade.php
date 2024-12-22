@extends('layouts.dashboard')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_content" class="app-content flex-column-fluid">
            @include('components.profile.profile-header')
            @include('components.profile.profile-settings')
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets') }}/js/custom/account/settings/signin-methods.js"></script>
@endsection
