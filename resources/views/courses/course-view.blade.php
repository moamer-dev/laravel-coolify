@extends('layouts.dashboard')
<style>
    .bg-primary-inverted {
        background-color: var(--bs-primary) !important;
    }

    [data-bs-theme="dark"] .bg-primary-inverted {
        background-color: #000 !important;
    }
</style>
@section('content')
    <section class="pt-lg-8 pb-8 bg-primary-inverted rounded">
        <div class="container pb-lg-8">
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-7 col-md-12">
                    @include('components.courses.course-header2')
                </div>
            </div>
        </div>
    </section>
    <section class="pb-8">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12 mt-n8 mb-4 mb-lg-0">
                    <!-- Card -->
                    @include('components.courses.course-tabs')
                </div>
                <div class="col-lg-4 col-md-12 col-12 mt-lg-n8">
                    <!-- Card -->
                    @include('components.courses.course-meta-card2')
                    <!-- Card -->
                    @include('components.courses.course-objectives-card')
                    <!-- Card -->
                    @include('components.shared.need-help-cta')
                </div>
            </div>
            <!-- Related Courses -->
            {{-- <div class="pt-8 pb-3">
                    <div class="row d-md-flex align-items-center mb-4">
                        <div class="col-12">
                            <h2 class="mb-0">Related Courses</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Card -->
                            <div class="card mb-4 card-hover">
                                <a href="course-single.html"><img src="../assets/images/course/course-react.jpg"
                                        alt="course" class="card-img-top"></a>
                                <!-- Card body -->
                                <div class="card-body">
                                    <h4 class="mb-2 text-truncate-line-2">
                                        <a href="course-single.html" class="text-inherit">How to easily create a
                                            website with React</a>
                                    </h4>
                                    <ul class="mb-3 list-inline">
                                        <li class="list-inline-item">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                    fill="currentColor" class="bi bi-clock align-baseline"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z">
                                                    </path>
                                                    <path
                                                        d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z">
                                                    </path>
                                                </svg>
                                            </span>
                                            <span>3h 56m</span>
                                        </li>
                                        <li class="list-inline-item">
                                            <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="3" y="8" width="2" height="6" rx="1"
                                                    fill="#754FFE"></rect>
                                                <rect x="7" y="5" width="2" height="9" rx="1"
                                                    fill="#DBD8E9"></rect>
                                                <rect x="11" y="2" width="2" height="12" rx="1"
                                                    fill="#DBD8E9"></rect>
                                            </svg>
                                            Beginner
                                        </li>
                                    </ul>
                                    <div class="mt-3 d-flex align-baseline lh-1">
                                        <span class="fs-6">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                        </span>
                                        <span class="text-warning mx-1">4.5</span>
                                        <span class="fs-6">(7.700)</span>
                                    </div>
                                </div>
                                <!-- Card footer -->
                                <div class="card-footer">
                                    <div class="row align-items-center g-0">
                                        <div class="col-auto">
                                            <img src="../assets/images/avatar/avatar-1.jpg" class="rounded-circle avatar-xs"
                                                alt="avatar">
                                        </div>
                                        <div class="col ms-2">
                                            <span>Morris Mccoy</span>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#" class="text-reset bookmark">
                                                <i class="fe fe-bookmark fs-4"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Card -->
                            <div class="card mb-4 card-hover">
                                <a href="course-single.html"><img src="../assets/images/course/course-graphql.jpg"
                                        alt="course" class="card-img-top"></a>
                                <!-- Card body -->
                                <div class="card-body">
                                    <h4 class="mb-2 text-truncate-line-2">
                                        <a href="course-single.html" class="text-inherit">GraphQL: introduction
                                            to graphQL for beginners</a>
                                    </h4>
                                    <ul class="mb-3 list-inline">
                                        <li class="list-inline-item">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                    fill="currentColor" class="bi bi-clock align-baseline"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z">
                                                    </path>
                                                    <path
                                                        d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z">
                                                    </path>
                                                </svg>
                                            </span>
                                            <span>2h 46m</span>
                                        </li>
                                        <li class="list-inline-item">
                                            <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="3" y="8" width="2" height="6" rx="1"
                                                    fill="#754FFE"></rect>
                                                <rect x="7" y="5" width="2" height="9" rx="1"
                                                    fill="#754FFE"></rect>
                                                <rect x="11" y="2" width="2" height="12" rx="1"
                                                    fill="#754FFE"></rect>
                                            </svg>
                                            Advance
                                        </li>
                                    </ul>
                                    <div class="mt-3 d-flex align-baseline lh-1">
                                        <span class="fs-6">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                        </span>
                                        <span class="text-warning mx-1">4.5</span>
                                        <span class="fs-6">(9,300)</span>
                                    </div>
                                </div>
                                <!-- Card footer -->
                                <div class="card-footer">
                                    <div class="row align-items-center g-0">
                                        <div class="col-auto">
                                            <img src="../assets/images/avatar/avatar-2.jpg"
                                                class="rounded-circle avatar-xs" alt="avatar">
                                        </div>
                                        <div class="col ms-2">
                                            <span>Ted Hawkins</span>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#" class="text-reset bookmark">
                                                <i class="fe fe-bookmark fs-4"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Card -->
                            <div class="card mb-4 card-hover">
                                <a href="course-single.html"><img src="../assets/images/course/course-angular.jpg"
                                        alt="course" class="card-img-top"></a>
                                <div class="card-body">
                                    <h4 class="mb-2 text-truncate-line-2">
                                        <a href="course-single.html" class="text-inherit">Angular - the complete
                                            guide for beginner</a>
                                    </h4>
                                    <ul class="mb-3 list-inline">
                                        <li class="list-inline-item">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                    fill="currentColor" class="bi bi-clock align-baseline"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z">
                                                    </path>
                                                    <path
                                                        d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z">
                                                    </path>
                                                </svg>
                                            </span>
                                            <span>3h 56m</span>
                                        </li>
                                        <li class="list-inline-item">
                                            <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="3" y="8" width="2" height="6" rx="1"
                                                    fill="#754FFE"></rect>
                                                <rect x="7" y="5" width="2" height="9" rx="1"
                                                    fill="#DBD8E9"></rect>
                                                <rect x="11" y="2" width="2" height="12" rx="1"
                                                    fill="#DBD8E9"></rect>
                                            </svg>
                                            Beginner
                                        </li>
                                    </ul>
                                    <div class="mt-3 d-flex align-baseline lh-1">
                                        <span class="fs-6">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                        </span>
                                        <span class="text-warning mx-1">4.5</span>
                                        <span class="fs-6">(8,890)</span>
                                    </div>
                                </div>
                                <!-- Card footer -->
                                <div class="card-footer">
                                    <div class="row align-items-center g-0">
                                        <div class="col-auto">
                                            <img src="../assets/images/avatar/avatar-3.jpg"
                                                class="rounded-circle avatar-xs" alt="avatar">
                                        </div>
                                        <div class="col ms-2">
                                            <span>Juanita Bell</span>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#" class="text-reset bookmark">
                                                <i class="fe fe-bookmark fs-4"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="card mb-4 card-hover">
                                <a href="course-single.html"><img src="../assets/images/course/course-python.jpg"
                                        alt="course" class="card-img-top"></a>
                                <div class="card-body">
                                    <h4 class="mb-2 text-truncate-line-2">
                                        <a href="course-single.html" class="text-inherit">The Python Course:
                                            build web application</a>
                                    </h4>
                                    <ul class="mb-3 list-inline">
                                        <li class="list-inline-item">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                    fill="currentColor" class="bi bi-clock align-baseline"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z">
                                                    </path>
                                                    <path
                                                        d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z">
                                                    </path>
                                                </svg>
                                            </span>
                                            <span>2h 30m</span>
                                        </li>
                                        <li class="list-inline-item">
                                            <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="3" y="8" width="2" height="6" rx="1"
                                                    fill="#754FFE"></rect>
                                                <rect x="7" y="5" width="2" height="9" rx="1"
                                                    fill="#754FFE"></rect>
                                                <rect x="11" y="2" width="2" height="12" rx="1"
                                                    fill="#DBD8E9"></rect>
                                            </svg>
                                            Intermediate
                                        </li>
                                    </ul>
                                    <div class="mt-3 d-flex align-baseline lh-1">
                                        <span class="fs-6">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                        </span>
                                        <span class="text-warning mx-1">4.5</span>
                                        <span class="fs-6">(13,245)</span>
                                    </div>
                                </div>
                                <!-- Card footer -->
                                <div class="card-footer">
                                    <div class="row align-items-center g-0">
                                        <div class="col-auto">
                                            <img src="../assets/images/avatar/avatar-4.jpg"
                                                class="rounded-circle avatar-xs" alt="avatar">
                                        </div>
                                        <div class="col ms-2">
                                            <span>Claire Robertson</span>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#" class="text-reset bookmark">
                                                <i class="fe fe-bookmark fs-4"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
        </div>
    </section>
@endsection
