@extends('master')
@section('status-content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row gy-6">
            <div class="col-12">
                <div class="card overflow-hidden">
                    <div class="card-title p-2">
                        <h3>Status Account Information</h3>
                        <!-- Create Status Button -->
                        <button type="button" class="btn btn-primary open-modal" data-modal-title="Create New Status"
                            data-url="{{ route('status.create') }}">
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
                                @foreach ($status as $index => $status)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $status->name }}</td>
                                        <td>{{ $status->createdBy->fullName() }}</td>
                                        {{-- <td>{{ $status->created_by }}</td> --}}
                                        <td>{{ $status->updatedBy->fullName() }}</td>
                                        {{-- <td>{{ $status->modify_by }}</td> --}}
                                        <td>{!! $status->remark !!}</td>
                                        <td>{{ $status->created_at }}</td>
                                        <td>{{ $status->updated_at }}</td>
                                        <td class="text-end align-bottom">
                                            <button type="button" class="btn btn-outline-warning open-modal"
                                                data-modal-title="Edit Status"
                                                data-url="{{ route('status.edit', $status->id) }}">Edit</button>
                                            <button type="button" class="btn btn-outline-danger" id="btn-remove"
                                                data-remove-id="{{ $status->id }}" data-bs-toggle="modal"
                                                data-bs-target="#removeModal">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="removeModal" tabindex="-1" aria-labelledby="removeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createStatusModalLabel">Delete Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('status.delete') }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <label for="" class="h4">Do you want to remove this task?</label>
                        <input type="hidden" id="remove-id" name="remove_id">
                        <div class="mt-2">
                            <button type="button" data-bs-dismiss="modal" class="btn btn-success">No</button>
                            <button class="btn btn-danger">Yes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script-path')
    <script>
        $(document).on('click', '#btn-remove', function() {
            var id = $(this).data('remove-id');
            $('#remove-id').val(id)
        })
    </script>
@endpush
