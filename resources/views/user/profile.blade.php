@extends('master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row gy-6  card border-0 rounded-3 shadow-sm">
            <div class="col-12">
                <main class="col-md-9 col-lg-10 p-4 p-md-5">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="mb-0 fw-bold">User Profile</h3>
                    </div>

                    <div class="d-flex align-items-center mb-5">
                        <div class="position-relative me-3">
                            <img src="{{ Auth::user()->profile ? asset('assets/img/profile/' . Auth::user()->profile) : asset('assets/img/avatars/1.png') }}" alt="User Profile Picture"
                                class="rounded-circle" style="width: 180px; height: 180px; object-fit: cover;">
                        </div>
                        <div class="ms-3 title">
                            <h3 class="mb-1">{{ Auth::user()->first_name.' '.Auth::user()->last_name }}</h3>
                        </div>
                    </div>

                    <div class="card-body p-8">
                        <div class="row g-2">
                            <div class="col-md-6">
                                <p class="text-muted mb-1">First Name</p>
                                <p class="fw-bold mb-0">{{ Auth::user()->first_name }}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-muted mb-1">Last Name</p>
                                <p class="fw-bold mb-0">{{ Auth::user()->last_name }}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-muted mb-1">Gender</p>
                                <p class="fw-bold mb-0">{{ Auth::user()->gender }}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-muted mb-1">Email Address</p>
                                <p class="fw-bold mb-0">{{ Auth::user()->email }} </p>
                            </div>
                        </div>

                    </div>
                </main>
            </div>
        </div>
    </div>
@endsection
