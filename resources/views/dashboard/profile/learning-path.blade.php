@extends('layouts.dashboard')
@section('content')
    @include('components.profile.profile-header')
    @include('components.profile.profile-learning-path')
@endsection

@section('scripts')
    <script src="{{ asset('assets') }}/js/custom/account/settings/signin-methods.js"></script>
@endsection
