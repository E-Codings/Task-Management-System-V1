@extends('master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row gy-6">
            <div class="col-12">
                <div class="card overflow-hidden">
                    <div class="d-flex justify-content-between align-content-center  mb-3 ">
                        <div class="card-title p-2 col-5">
                            <h3>Project Information</h3>
                            @can('create project')
                                <a href="#" data-url="{{ route('project.create') }}" data-modal-title="Create Project"
                                    class="btn btn-primary open-modal">Create Project</a>
                            @endcan
                        </div>

                        <form action="{{ route('project.index') }}" method="GET"
                            class=" d-flex align-items-center p-2 gap-2 col-5">
                            <input type="text" name="search" placeholder="Search..." class="form-control p-3"
                                value="{{ request('search') }}">
                            <button type="submit" class="btn btn-outline-primary">Search</button>
                        </form>

                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>

                                <tr>
                                    <th class="text-truncate">N<sup>o</sup></th>
                                    <th class="text-truncate">Name</th>
                                    <th class="text-truncate">Created By</th>
                                    <th class="text-truncate">Modify By</th>
                                    <th class="text-truncate">Remark</th>
                                    <th class="text-truncate">Created At</th>
                                    <th class="text-truncate ">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($projects) && count($projects) > 0)
                                    @foreach ($projects as $index => $project)
                                        <tr>
                                            <td>{{ ($page - 1) * 5 + $index + 1 }}</td>
                                            <td>{{ $project->name }}</td>
                                            <td>{{ $project->creator?->fullName() ?? 'N/A' }}</td>
                                            <td>{{ $project->modifier?->fullName() ?? 'N/A' }}</td>
                                            <td>{{ $project->remark }}</td>
                                            <td>{{ $project->created_at }}</td>
                                            <td>
                                                <a href="#" data-url="{{ route('project.edit', $project->id) }}"
                                                    data-modal-title="Update Project"
                                                    class="btn btn-warning open-modal">Update
                                                    Project</a>

                                                <button class="btn btn-danger" id="btn-remove"
                                                    data-remove-id="{{ $project->id }}" data-bs-target="#removeModal"
                                                    data-bs-toggle="modal">
                                                    Remove</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8" class="text-center text-danger">No projects found.</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td colspan="12">
                                        <div class="d-flex col-12 justify-content-end">
                                            @for ($i = 1; $i <= $total_pages; $i++)
                                                <a href="{{ route('project.index', ['page' => $i, 'search' => request('search')]) }}"
                                                    class="btn {{ request()->get('page', 1) == $i ? 'btn-primary' : 'btn-secondary' }} me-2">
                                                    {{ $i }}
                                                </a>
                                            @endfor
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="removeModal" tabindex="-1" aria-labelledby="removeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="removeModalLabel">Remove Project</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                @if (isset($project) && count($projects) > 0)
                    <div class="modal-body">
                        <form id="remove-form" method="POST">
                            @method('DELETE')
                            @csrf
                            <label for="">
                                <h3>Do you want to remove this project?</h3>
                            </label>
                            <br>
                            <button class="btn btn-success" type="button" data-bs-dismiss="modal">NO</button>
                            <button class="btn btn-danger">Yes</button>
                        </form>
                    </div>
                @else
                    <tr>
                        <td colspan="8" class="text-danger text-center">No Project Found!</td>
                    </tr>
                @endif
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
@push('script-path')
    <script>
        $(document).on('click', '#btn-remove', function() {
            const id = $(this).data('remove-id');
            const actionUrl = "{{ url('project') }}/" + id;

            $('#remove-form').attr('action', actionUrl);
        });
    </script>
@endpush
