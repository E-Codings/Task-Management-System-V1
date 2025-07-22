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
                        @foreach($roles as $role)
                            <div class="d-flex text-dark">
                                <div class="col-3">
                                    <ul style="list-style-type: disc">
                                        <li>{{ $role->name }}</li>
                                    </ul>
                                </div>
                                <div class="col-9 d-flex flex-wrap">
                                    @foreach($permissions as $permission)
                                        <div class="form-check me-2">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                id="{{ $role->name }}_{{ $permission->name }}"
                                                @if($role->permissions->pluck('name')->contains($permission->name)) checked @endif
                                            />
                                            <label class="form-check-label" for="{{ $role->name }}_{{ $permission->name }}">
                                                {{ $permission->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
{{--                        <div class="d-flex justify-content-end">--}}
{{--                            <button type="submit" id="btn-save-permission" class="btn btn-primary">Save </button>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script-part')
    <script>
        $(document).ready(function(){

        });

    </script>
@endpush
