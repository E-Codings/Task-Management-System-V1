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
                                <div class="form-check me-2">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        value=""
                                        id="defaultCheck3"
                                        checked="checked" />
                                    <label class="form-check-label" for="defaultCheck3"> Checked </label>
                                </div><div class="form-check me-2">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        value=""
                                        id="defaultCheck3"
                                        checked="checked" />
                                    <label class="form-check-label" for="defaultCheck3"> Checked </label>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
