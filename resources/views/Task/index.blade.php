@extends('master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row gy-6">

            <div class="col-12">
                <h2 class="text-center">Task Account</h2>
                <div class="card overflow-hidden">
                    <div class="card-title p-2">
                        <button data-url="{{ route('task.create') }}" class="btn btn-primary open-modal"
                            data-modal-title="Create Task">Create Task</button>
                    </div>
                    <div class="table-responsive text-center">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th class="text-truncate">N<sup>o</sup></th>
                                    <th class="text-truncate">Title</th>
                                    <th class="text-truncate">Duration</th>
                                    <th class="text-truncate">Remark</th>
                                    <th class="text-truncate">Project</th>
                                    <th class="text-truncate">Created_by</th>
                                    <th class="text-truncate">Modify_by</th>
                                    <th class="text-truncate">Status</th>
                                    <th class="text-truncate">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $index => $task)
                                    @php
                                        $parts = explode(':', $task->duration);
                                        $hours = (int) $parts[0];
                                        $minutes = (int) $parts[1];
                                    @endphp
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $task->title }}</td>
                                        <td>
                                            @if ($hours > 0)
                                                {{ $hours }} {{ Str::plural('hour', $hours) }}
                                            @endif
                                            @if ($minutes > 0)
                                                {{ $minutes }} {{ Str::plural('minute', $minutes) }}
                                            @endif
                                            @if ($hours === 0 && $minutes === 0)
                                                0 minute
                                            @endif
                                        </td>
                                        <td>{{ $task->remark }}</td>
                                        <td>{{ $task->project->name ?? 'Null' }}</td>
                                        <td>{{ $task->creator->fullName() }}</td>
                                        <td>{{ $task->modifier?->fullName() }}</td>
                                        <td>{{ $task->status->name ?? 'Null' }}</td>
                                        <td class="">
                                            <button class="btn btn-success open-modal" data-url="{{ route('task.edit', $task->id) }}"
                            id="btn-open-create" data-modal-title="Edit course Form" data-id="{{ $task->id }}" >Update</button>
                                            <button class="btn btn-danger" id="btn-remove" data-remove-id="{{ $task->id }}" data-bs-toggle="modal" data-bs-target="#removeModal">Delete</button>
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
                    <h1 class="modal-title fs-5" id="removeModalLabel">Remove Task</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('task.delete') }}" method="POST">
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
