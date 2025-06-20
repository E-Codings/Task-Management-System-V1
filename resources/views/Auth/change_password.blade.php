@extends('master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row gy-6">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-1">Change password form</h5>
                        </div>
                    </div>
                    <div class="card-body pt-lg-2">
                        <div class="">
                            <div class="d-flex justify-content-center">
                                <form action="{{route('change-password')}}" method="POST" class="col-12 row">
                                    @csrf
                                    <div class="col-lg-4 col-md-12 d-flex">
                                        <div
                                            class="form-floating form-floating-outline mb-5 form-control-validation col-12">
                                            <input
                                                type="password"
                                                class="form-control"
                                                id="password"
                                                name="password"
                                                placeholder="Enter your current password"
                                                autofocus/>
                                            <label for="password">Current Password</label>
                                            @error('password') <span class="text-danger"
                                                                             style="font-size: 12px"> {{$message}} </span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 d-flex">
                                        <div
                                            class="form-floating form-floating-outline mb-5 form-control-validation col-12">
                                            <input
                                                type="password"
                                                class="form-control"
                                                id="new_password"
                                                name="new_password"
                                                placeholder="Enter your new password"
                                                autofocus/>
                                            <label for="new_password">New Password</label>
                                            @error('new_password') <span class="text-danger"
                                                                         style="font-size: 12px"> {{$message}} </span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 d-flex">
                                        <div
                                            class="form-floating form-floating-outline mb-5 form-control-validation col-12">
                                            <input
                                                type="password"
                                                class="form-control"
                                                id="confirm_new_password"
                                                name="confirm_new_password"
                                                placeholder="Enter your confirm password"
                                                autofocus/>
                                            <label for="confirm_new_password">Confirm Password</label>
                                            @error('confirm_new_password') <span class="text-danger"
                                                                             style="font-size: 12px"> {{$message}} </span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                                <h2 id="period" class="mt-4 ms-3" style="height: fit-content"></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
