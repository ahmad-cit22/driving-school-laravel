@extends('layouts.admin')
@section('content')
    {{-- overall report --}}
    <div class="row mb-5">
        <div class="col">
            <table class="table table-striped table-bordered">
                <tr class="fs-6">
                    <th colspan="2">Student Name: {{ $student->name }}</th>
                </tr>
                <tr>
                    <td>Courses Enrolled: {{ $enrolls_count }}</td>
                    <td>Courses Completed: {{ $courses_completed }}</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col">
            <div class="mb-3">
                <h4 class="text-center">Enrolled Courses</h4>
            </div>
            <table class="table datatable table-striped table-bordered">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Course Category</th>
                        <th>Course Type</th>
                        <th>Course Slot</th>
                        {{-- <th>Course Price</th> --}}
                        <th>Payment Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($enrolls as $key => $enroll)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $enroll->category->category_name }}</td>
                            <td>{{ $enroll->type->type_name }} ({{ $enroll->type->duration }} Days)</td>
                            <td>{{ Carbon\Carbon::parse($enroll->slot->start_time)->format('h:i A') }} - {{ Carbon\Carbon::parse($enroll->slot->end_time)->format('h:i A') }}</td>
                            <td class="{{ $enroll->paid == $enroll->price ? 'text-success' : 'text-danger' }}"> {{ $enroll->paid == $enroll->price ? 'Paid' : 'Not Paid (Due Amount: BDT ' . $enroll->price - $enroll->paid . ')' }} </td>
                            <td> <a href="{{ route('admin.view.details', $enroll->id) }}" class="btn btn-sm btn-info text-white">View Details</a> </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col text-center">
            <a href="{{ route('courses.view') }}" class="btn btn-info text-white">Browse More Courses</a>
        </div>
    </div>
@endsection

@section('script')
    @if (session('notApproved'))
        <script>
            Swal.fire(
                'Sorry!',
                "{{ session('notApproved') }}",
                'error',
            )
        </script>
    @endif
@endsection
