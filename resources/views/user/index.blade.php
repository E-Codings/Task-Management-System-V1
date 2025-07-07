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
                                    <th class="text-truncate">Full Name</th>
                                    <th class="text-truncate">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $index => $user)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $user->fullName() }}</td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
                // console.log($('#profile'));
                // console.log($('#profile')[0]);
                // console.log($('#profile')[0].files);
                // console.log($('#profile')[0].files[0]);

                var profile = $('#profile')[0].files[0];
                formData.append('profile', profile)

                $.ajax({
                    //url: '/upload-file';
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
                        // console.log(response);
                        $('#show-profile').attr('src', '{{ asset('assets/img/profile') }}' +
                            "/" + response);
                        $('#profile_name').val(response);
                    },
                    error: function(xhr) {
                        console.error("Error:", xhr
                        .responseText); // This will show the error message
                    },
                })
            });
        });
    </script>
@endpush
