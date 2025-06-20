@extends('master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row gy-6">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-1">Role-Permission</h5>
                        </div>
                    </div>
                    <div class="card-body pt-lg-2">
                        <div class="d-flex text-dark">
                            <div class="col-3">
                                <ul style="list-style-type: disc">
                                    <li>Admin</li>
                                </ul>
                            </div>
                            <div class="col-9 d-flex flex-wrap">
                               @foreach($permissions as $permission)
                                    <div class="form-check me-2">
                                        <input
                                                class="form-check-input"
                                                type="checkbox"
                                                value=""
                                                id="{{$permission->name}}"
                                                checked="checked"/>
                                        <label class="form-check-label" for="{{$permission->name}}"> {{$permission->name}} </label>
                                    </div>
                               @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
