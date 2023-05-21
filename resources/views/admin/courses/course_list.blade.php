@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <!-- course category -->
            <div class="card">
                <div class="card-header">
                    <h3 class="m-0 fs-5">Course List</h3>
                </div>
                <div class="card-body">
                    <table class="table-striped table-bordered table text-center align-middle">
                        <tr>
                            <th width="">Course Name</th>
                            <th width="">Course Thumbnail</th>
                            <th width="">Course Duration</th>
                            <th width="">Course Fee</th>
                            <th width="">Discount</th>
                            {{-- <th width="">Class Time</th> --}}
                            {{-- <th width="">Class Days</th> --}}
                            <th width="">Sorting Priority</th>
                            <th width='11%'>Action</th>
                        </tr>
                        @forelse ($courses as $course)
                            <tr>
                                <td>{{ $course->rel_to_course_cat->category_name . ' - ' . $course->rel_to_course_type->type_name }}</td>
                                <td><img class="" src="{{ asset('assets/frontend/img/courses/' . $course->image) }}" alt="" width="100"></td>
                                <td>{{ $course->rel_to_course_type->duration . ' Days' }}</td>
                                {{-- <td>{{ \Carbon\Carbon::createFromFormat('H:i:s', $course->start)->format('g:i A') }} To {{ \Carbon\Carbon::createFromFormat('H:i:s', $course->end)->format('g:i A') }}</td> --}}
                                {{-- <td>Every {{ $course->days }}</td> --}}
                                <td>BDT {{ number_format($course->price) }}</td>
                                <td>BDT {{ number_format($course->discount) }}</td>
                                <td>{{ $course->priority }}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm edit-course" data-id="{{ $course->id }}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit"><i class="fa-solid fa-pencil"></i></button>
                                    <button class="btn btn-danger btn-sm delete-course" data-id="{{ $course->id }}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">No Course Found</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>

        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="m-0 fs-5">Add New Course</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.courses.add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <label class="form-label">Course Category</label>
                            <select name="category_id" class="form-select select2 @error('category_id')is-invalid @enderror">
                                <option></option>
                                @foreach ($course_categories as $course_category)
                                    <option value="{{ $course_category->id }}" {{ $course_category->id == old('category_id') ? 'selected' : '' }}>{{ $course_category->category_name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Course Type</label>
                            <select name="type_id" class="form-select select2 @error('type_id')is-invalid @enderror">
                                <option></option>
                                @foreach ($course_types as $course_type)
                                    <option value="{{ $course_type->id }}" {{ $course_type->id == old('type_id') ? 'selected' : '' }}>{{ $course_type->type_name }}</option>
                                @endforeach
                            </select>
                            @error('type_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Course Thumbnail</label>
                            <input type="file" class="form-control @error('image')is-invalid @enderror" name="image">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Course Fee</label>
                            <input type="number" class="form-control @error('price')is-invalid @enderror" name="price" value="{{ old('price') }}" placeholder="Enter The Course Fee (BDT)">
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Discount</label>
                            <input type="number" class="form-control @error('discount')is-invalid @enderror" name="discount" value="{{ old('discount') }}" placeholder="Enter Discount in Percentage (If Available)">
                            @error('discount')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Sorting Priority</label>
                            <input type="number" class="form-control @error('priority')is-invalid @enderror" name="priority" value="{{ old('priority') }}" placeholder="Enter The Priority Num">
                            @error('priority')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button class="mt-2 btn btn-primary btn-sm">Add Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Course Edit Model -->
    <div class="modal fade" id="editCourse" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="edit-course-form" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Edit Course Category</h1>
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

@section('style')
    <style>
        .slot-day {
            display: none;
        }

        form .error {
            font-size: .9em;
            color: #dc3545;
            display: none;
        }
    </style>
@endsection

@section('script')
    <script>
        //edit course
        $('.edit-course').click(function() {
            let id = $(this).data('id');
            let url = "{{ route('admin.course.edit', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                method: 'get',
                url: url,
                success: function(response) {
                    $('#editCourse').modal('show');
                    $('#editCourse .modal-body').html(response);
                }
            })
        });

        $('#edit-course-form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                method: 'POST',
                url: "{{ route('admin.course.update') }}",
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        $('#editCourse').modal('hide');
                        location.reload();
                    } else {
                        let errors = response.errors;
                        let errorsHtml = '<ul class="m-0 mt-2 fw-light">';
                        $.each(errors, function(key, value) {
                            errorsHtml += '<li>' + value + '</li>';
                        });
                        errorsHtml += '</ul>';
                        $('#edit-course-form .error').html(errorsHtml);
                        $('#edit-course-form .error').show();

                    }
                }
            });
        });

        $('.delete-course').click(function() {
            let id = $(this).data('id');
            let url = "{{ route('admin.course.delete', ':id') }}";
            url = url.replace(':id', id);
            delete_warning(url);
        });
    </script>
@endsection
