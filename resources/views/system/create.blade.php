@extends('master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row gy-6">
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header">System Settings</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <form action="{{route('system.store')}}" method="POST" class="row">
                            @csrf
                            <div class="col-12">
                                <div class="form-floating form-floating-outline mb-6">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Your system name" />
                                    <label for="name">System Name</label>
                                    @error('name') <span class="text-danger" style="font-size: 12px"> {{$message}} </span> @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating form-floating-outline mb-6">
                                    <input type="file" class="form-control" id="profile" name="profile" />
                                    <label for="profile">Profile</label>
                                    @error('profile') <span class="text-danger" style="font-size: 12px"> {{$message}} </span> @enderror
                                    <img src="{{asset('assets/img/placeholder.jpg')}}" alt="" width="200px" class="mt-2 cursor-pointer">
                                    <input type="text" name="profile_name" id="">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating form-floating-outline mb-6">
                                    <input type="file" class="form-control" id="favicon" name="profile" />
                                    <label for="favicon">Favicon</label>
                                    @error('favicon') <span class="text-danger" style="font-size: 12px"> {{$message}} </span> @enderror
                                    <img src="{{asset('assets/img/placeholder.jpg')}}" alt="" width="200px" class="mt-2 cursor-pointer">
                                    <input type="text" name="favicon_name" id="">
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button class="btn btn-primary" style="width: fit-content">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
