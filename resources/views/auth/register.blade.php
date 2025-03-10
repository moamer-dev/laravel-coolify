@extends('layouts.auth')
@section('content')
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <style>
            body {
                background-image: url('{{ asset('assets') }}/media/auth/bg10.jpeg');
            }

            [data-bs-theme="dark"] body {
                background-image: url('{{ asset('assets') }}/media/auth/bg10-dark.jpeg');
            }
        </style>
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            @include('components.auth.auth-hero')
            <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
                <div class="bg-body d-flex flex-column flex-center rounded-4 w-md-600px p-10">
                    @include('components.auth.register-form')
                </div>
            </div>
        </div>
    </div>
@endsection
