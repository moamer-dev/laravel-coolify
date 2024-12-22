@extends('layouts.dashboard')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_content" class="app-content flex-column-fluid">
            @include('components.profile.profile-header')
            @include('components.profile.profile-billing')
        </div>
    </div>
@endsection
