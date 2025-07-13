@extends('master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row gy-6">
            <div class="col-12">
                <div class="card overflow-hidden">
                    <div class="card-title p-2">
                        <h3>User Account Information</h3>
                        <a href="#" data-url="{{ route('user.create') }}" data-modal-title="Create User"
                            class="btn btn-primary open-modal">Create User</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th class="text-truncate">N<sup>o</sup></th>
                                    <th class="text-truncate">Profile</th>
                                    <th class="text-truncate">Full Name</th>
                                    <th class="text-truncate">Email</th>
                                    <th class="text-truncate">Created At</th>
                                    <th class="text-truncate">Updated At</th>
                                    <th class="text-truncate">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $index => $user)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <img class="rounded-circle" style="width:70px;"
                                                src="{{ asset('assets/img/profile/' . $user->profile) }}" alt="">
                                        </td>
                                        <td>{{ $user->fullName() }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>{{ $user->updated_at }}</td>
                                        <td>
                                            <button data-url="{{ route('user.edit', $user->id) }}"
                                                class="btn btn-warning my-1 open-modal" data-modal-title="Update USER"><i
                                                    class="bi bi-pen"></i>
                                            </button>
                                            <button class="btn btn-danger" id="btn-remove"
                                                data-remove-id="{{ $user->id }}" data-bs-toggle="modal"
                                                data-bs-target="#removeModal"><i class="bi bi-x-lg"></i>
                                            </button>
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

    <!-- Modal delete User-->
    <div class="modal fade" id="removeModal" tabindex="-1" aria-labelledby="removeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="removeModalLabel">Remove student</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="p-4">
                    <form action="{{ route('user.delete') }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <label class="h4">Do you want to remove this user?</label>
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
        $(document).ready(function() {
            $(document).on('click', '.preview-profile', function() {
                $('#profile').click();
            });
            $(document).on('change', '#profile', function() {
                var formData = new FormData();

                var profile = $('#profile')[0].files[0];
                console.log(profile);

                formData.append('profile', profile)
                console.log(formData);

                $.ajax({
                    url: "{{ route('uploadFile') }}",
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    caches: false,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        console.log(response);
                        console.log($('#show-profile'));

                        $('#show-profile').attr('src', response);
                        console.log($('#show-profile').attr('src'));

                        $('#profile_name').val(response);
                    },
                    error: function(xhr) {
                        console.error("Error:", xhr
                            .responseText);
                    },
                })
            });
        });
    </script>
    <script>
        $(document).on('click', '#btn-remove', function() {
            var id = $(this).data('remove-id');
            $('#remove-id').val(id);
        });
    </script>
@endpush
