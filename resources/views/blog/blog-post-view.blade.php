@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-body p-lg-20 pb-lg-0">
            <div class="d-flex flex-column flex-xl-row">
                <div class="flex-lg-row-fluid me-xl-15">
                    @include('components.blog.post-body')
                </div>
                <div class="flex-column flex-lg-row-auto w-100 w-xl-300px mb-10">
                    @include('components.blog.post-sidebar')
                </div>
            </div>
            @if ($related_posts->count() > 0)
                @include('components.blog.post-related-posts')
            @endif
        </div>
    @endsection
