@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered align-middle text-center" style="width:100%">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Student Name</th>
                            <th>Branch</th>
                            <th>Start Date</th>
                            <th>Course Category</th>
                            <th>Course Type</th>
                            {{-- <th>Slot</th> --}}
                            <th>Payment Status</th>
                            <th>Status</th>
                            <th>Action</th>
                            @hasrole([1, 2])
                                <th>Attendance</th>
                                <th>Certificate</th>
                            @endhasrole
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($enrolls as $enroll)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><a href="{{ route('admin.users.edit', $enroll->user->id) }}" class="text-dark">{{ $enroll->user->name }}</a></td>
                                <td>{{ $enroll->branch->branch_name }}</td>
                                <td>{{ $enroll->start_date->format('d-m-Y') }}</td>
                                <td>{{ $enroll->category->category_name }}</td>
                                <td>{{ $enroll->type->type_name }} ({{ $enroll->type->duration }} Days)</td>
                                {{-- <td>{{ Carbon\Carbon::parse($enroll->slot->start_time)->format('h:i A') }}-{{ Carbon\Carbon::parse($enroll->slot->end_time)->format('h:i A') }}</td> --}}
                                @if ($enroll->paid == $enroll->price)
                                    <td class="fw-bold text-success">Paid</td>
                                @else
                                    @if ($enroll->paid == 0)
                                        <td class="fw-bold text-danger">Not Paid</td>
                                    @else
                                        <td class="fw-bold text-warning">Has Due (&#2547;{{ $enroll->price - $enroll->paid }})</td>
                                    @endif
                                @endif
                                <td>
                                    <span class="badge rounded-pill {{ $enroll->status == 1 ? 'bg-success' : 'bg-danger' }}">{{ $enroll->status == 0 ? 'Pending' : ($enroll->status == 1 ? 'Approved' : 'Finished') }}</span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.enroll.show', $enroll->id) }}" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View"><i class="fa-solid fa-eye"></i></a>
                                    @if (auth()->user()->hasRole([1, 2]))
                                        @if ($enroll->status == 0)
                                            <button class="btn btn-success btn-sm approve" data-id="{{ $enroll->id }}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Approve"><i class="fa-solid fa-check"></i></button>
                                        @endif
                                        @if ($enroll->status == 0)
                                            <button class="btn btn-danger btn-sm delete" data-id="{{ $enroll->id }}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete"><i class="fa-solid fa-trash"></i></button>
                                        @endif
                                    @endif
                                </td>
                                @hasrole([1, 2, 3])
                                    <td>
                                        <button class="btn btn-info text-white btn-sm attendance-btn" data-id="{{ $enroll->id }}" {{ $enroll->status == '1' ? '' : 'disabled' }} data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Give Attendance">
                                            <i class="fas fa-plus-square"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <button class="btn btn-info text-white btn-sm certificate-btn" value="{{ $enroll->status == '1' ? route('admin.certificate.view', $enroll->id) : '#' }}" {{ $enroll->status == '1' ? '' : 'disabled' }} data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Generate Certificate">
                                            <i class="far fa-credit-card"></i>
                                        </button>{{-- course status needs to be checked --}}
                                    </td>
                                @endhasrole
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10">No enrollment found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- attendance Model -->
    <div class="modal fade" id="attendance" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="attendance-form">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Give Attendance</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h3>...</h3>
                        <div class="error"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @if (auth()->user()->hasRole([1, 2, 3]))
        <script>
            $('.approve').click(function() {
                let id = $(this).data('id');
                let url = "{{ route('admin.enroll.approve', ':id') }}";
                url = url.replace(':id', id);
                warning(url);
            });

            $('.delete').click(function() {
                let id = $(this).data('id');
                let url = "{{ route('admin.enroll.delete', ':id') }}";
                url = url.replace(':id', id);
                delete_warning(url);
            });

            $('.attendance-btn').click(function() {
                let id = $(this).data('id');
                let url = "{{ route('admin.attendance', ':id') }}";
                url = url.replace(':id', id);
                $.ajax({
                    method: 'get',
                    url: url,
                    success: function(response) {
                        $('#attendance').modal('show');
                        $('#attendance .modal-body').html(response);
                    }
                })
            });

            $('#attendance-form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    method: 'POST',
                    url: "{{ route('admin.attendance.add') }}",
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        if (response.success) {
                            $('#attendance').modal('hide');
                            location.reload();
                        } else {
                            let errors = response.errors;
                            let errorsHtml = '<ul class="my-2 fw-bold text-danger">';
                            $.each(errors, function(key, value) {
                                errorsHtml += '<li>' + value + '</li>';
                            });
                            errorsHtml += '</ul>';
                            $('#attendance-form .error').html(errorsHtml);
                            $('#attendance-form .error').show();
                        }
                    }
                });
            });
        </script>

        <script>
            $('.certificate-btn').click(function() {
                let link = $(this).val();
                Swal.fire({
                    title: 'Are you sure to generate the certificate now?',
                    text: "Generate it if the student has completed the classes & passed the quizzes.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "Yes, I'm sure!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link;
                    }
                })
            })
        </script>
    @endif
@endsection
