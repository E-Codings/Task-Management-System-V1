@extends('master')
@section('status-content')
    {{ $errors }}
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row gy-6">
            <div class="col-12">
                <div class="card overflow-hidden">
                    <div class="card-title p-2">
                        <h3>Status Account Information</h3>
                        <!-- Create Status Button -->
                        <button type="button" class="btn btn-primary" data-action="show"
                            data-modal-url="{{ route('create') }}">
                            Create Status
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th class="text-truncate">N<sup>o</sup></th>
                                    <th class="text-truncate">Name</th>
                                    <th class="text-truncate">Created By</th>
                                    <th class="text-truncate">Modified By</th>
                                    <th class="text-truncate">Remark</th>
                                    <th class="text-truncate">Created At</th>
                                    <th class="text-truncate">Updated At</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($status as $index => $s)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $s->name }}</td>
                                        <td>{{ $s->created_by }}</td>
                                        <td>{{ $s->modify_by }}</td>
                                        <td>{{ $s->remark }}</td>
                                        <td>{{ $s->created_at }}</td>
                                        <td>{{ $s->updated_at }}</td>
                                        <td class="text-end align-bottom">
                                            <button type="button" class="btn btn-outline-warning" data-action="show"
                                                data-modal-url="{{ route('edit', $s->id) }}">Edit</button>
                                            <button type="button" class="btn btn-outline-danger" data-action="show"
                                                data-modal-url="{{ route('delete', $s->id) }}">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal fade" id="createStatusModal" tabindex="-1" aria-labelledby="createStatusModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/customer.js') }}"></script>
@endsection
