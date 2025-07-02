@extends('master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row gy-6">
            <div class="col-xl-5 col-md-5">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-1">Current Day</h5>
                        </div>
                    </div>
                    <div class="card-body pt-lg-2">
                        <div class="">
                            <div class="d-flex justify-content-center">
                                <h2 class="mb-0" id="date"></h2>
                                <h2 id="period" class="mt-4 ms-3" style="height: fit-content"></h2>
                            </div>
                        </div>
                        <div class="mt-2">
                            <p class="mb-0">Enjoy your day</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="card h-100">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="card-title m-0 me-2">Total Task Management</h5>
                        </div>

                    </div>
                    <div class="card-body pt-lg-10">
                        <div class="row g-6">
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="avatar">
                                        <div class="avatar-initial bg-primary rounded shadow-xs">
                                            <i class="icon-base ri ri-pie-chart-2-line icon-24px"></i>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <p class="mb-0">Sales</p>
                                        <h5 class="mb-0">245k</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card overflow-hidden">
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th class="text-truncate">User</th>
                                <th class="text-truncate">Email</th>
                                <th class="text-truncate">Role</th>
                                <th class="text-truncate">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm me-4">
                                            <img src="assets/img/avatars/1.png" alt="Avatar" class="rounded-circle" />
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-truncate">Jordan Stevenson</h6>
                                            <small class="text-truncate">@amiccoo</small>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-truncate">susanna.Lind57@gmail.com</td>
                                <td class="text-truncate">
                                    <div class="d-flex align-items-center">
                                        <i class="icon-base ri ri-vip-crown-line icon-22px text-primary me-2"></i>
                                        <span>Admin</span>
                                    </div>
                                </td>
                                <td><span class="badge bg-label-warning rounded-pill">Pending</span></td>
                            </tr>
                            <tr class="border-transparent">
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm me-4">
                                            <img src="assets/img/avatars/1.png" alt="Avatar" class="rounded-circle" />
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-truncate">Breena Gallemore</h6>
                                            <small class="text-truncate">@bgallemore6</small>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-truncate">florencio.Little@hotmail.com</td>
                                <td class="text-truncate">
                                    <div class="d-flex align-items-center">
                                        <i class="icon-base ri ri-user-3-line icon-22px text-success me-2"></i>
                                        <span>Subscriber</span>
                                    </div>
                                </td>
                                <td><span class="badge bg-label-secondary rounded-pill">Inactive</span></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
