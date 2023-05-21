@extends('layouts.admin')
@if (auth()->user()->hasRole(1))
    @section('top-btn')
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addUser">
            <i class="fa-solid fa-user-plus"></i> Add Student</button>
    @endsection
@endif
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered align-middle text-center" style="width:100%">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile No</th>
                            <th>ID Card</th>
                            <th>Joining Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>
                                    <div class="user-active">
                                        <img src="{{ $user->image ? asset('uploads/users/' . $user->image) : Avatar::create($user->name)->toBase64() }}" class="user-profile" alt="{{ $user->name }}">
                                    </div>
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->mobile }}</td>
                                <td>
                                    @if ($user->idcard)
                                        <button class="btn btn-primary btn-sm download-id" data-id="{{ $user->id }}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Download"><i class="fa-solid fa-download"></i></button>
                                    @else
                                        <button class="btn btn-primary btn-sm generate-id" data-id="{{ $user->id }}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Generate"><i class="fa-solid fa-plus"></i></button>
                                    @endif
                                </td>
                                <td>{{ $user->created_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View"><i class="fa-solid fa-eye"></i></a>
                                    <button class="btn btn-danger btn-sm delete" data-id="{{ $user->id }}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if (auth()->user()->hasRole(1))
        <!-- Add User Modal -->
        @include('admin.madals.add-student')
    @endif
@endsection

@section('script')
    <script>
        $('#add-user').submit(function(e) {
            e.preventDefault();
            $.ajax({
                method: 'POST',
                url: "{{ route('admin.users.add') }}",
                data: $(this).serialize(),
                success: function(response) {
                    if (response.success) {
                        $('#addUser').modal('hide');
                        location.reload();
                    } else {
                        let errors = response.errors;
                        let errorsHtml = '<div class="alert alert-danger alert-dismissible fade show"><ul class="m-0">';

                        $.each(errors, function(key, value) {
                            errorsHtml += '<li>' + value + '</li>';
                        });
                        errorsHtml += '</ul><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';

                        $('#form-errors').html(errorsHtml);
                    }
                }
            });
        });

        $('#password-show').click(function() {
            if ($('#password').attr('type') == 'password') {
                $('#password').attr('type', 'text');
                $('#password-show i').removeClass('fa-eye').addClass('fa-eye-slash');
            } else {
                $('#password').attr('type', 'password');
                $('#password-show i').removeClass('fa-eye-slash').addClass('fa-eye');
            }
        });

        $('.delete').click(function() {
            let id = $(this).data('id');
            let url = "{{ route('admin.users.delete', ':id') }}";
            url = url.replace(':id', id);
            delete_warning(url);
        });

        $('.generate-id').click(function() {
            let id = $(this).data('id');
            let url = "{{ route('admin.students.generate', ':id') }}";
            url = url.replace(':id', id);
            warning(url);
        });
    </script>
@endsection
