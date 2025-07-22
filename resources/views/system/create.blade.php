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
                                        placeholder="Your system name" value="{{$system->name}}" />
                                    <label for="name">System Name</label>
                                    @error('name') <span class="text-danger" style="font-size: 12px"> {{$message}} </span> @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating form-floating-outline mb-6">
                                    <input type="file" class="form-control" id="profile" data-hidden="profile_name" data-show-image="profile_image" name="profile" />
                                    <label for="profile">Profile</label>
                                    @error('profile') <span class="text-danger" style="font-size: 12px"> {{$message}} </span> @enderror
                                    <img src="{{asset($system->profile == null ? 'assets/img/placeholder.jpg' : 'assets/img/system/'.$system->profile)}}" data-target-file="profile" alt="" id="profile_image" width="200px" class="mt-2 cursor-pointer preview-profile">
                                    <input type="text" value="{{asset($system->profile == null ? 'assets/img/placeholder.jpg' : 'assets/img/system/'.$system->profile)}}" name="profile_name" id="profile_name">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating form-floating-outline mb-6">
                                    <input type="file" class="form-control" id="favicon" data-hidden="favicon_name" data-show-image="favicon_image" name="favicon" />
                                    <label for="favicon">Favicon</label>
                                    @error('favicon') <span class="text-danger" style="font-size: 12px"> {{$message}} </span> @enderror
                                    <img src="{{asset($system->favicon == null ? 'assets/img/placeholder.jpg' : 'assets/img/favicon/favicon.ico')}}" alt="" data-target-file="favicon" id="favicon_image" width="200px" class="mt-2 cursor-pointer preview-profile">
                                    <input type="text" value="{{asset($system->favicon == null ? '' : 'assets/img/favicon/favicon.ico')}}" name="favicon_name" id="favicon_name">
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
