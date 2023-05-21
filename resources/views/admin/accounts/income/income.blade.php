@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-9">
            <!-- course category -->
            <div class="card">
                <div class="card-header">
                    <h3 class="m-0 fs-5">Income Entries</h3>
                </div>
                <div class="card-body">
                    <table class="table-striped datatable table-bordered table text-center align-middle">
                        <thead>
                            <tr>
                                <th width="">SL</th>
                                <th width="">Amount</th>
                                <th width="">Branch</th>
                                <th width="">Student Name (If applicable)</th>
                                <th width="">Course Category (If applicable)</th>
                                <th width="">Course Type (If applicable)</th>
                                <th width="">Note</th>
                                <th width=''>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($incomes as $key => $income)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>BDT {{ number_format($income->amount) }}</td>
                                    <td>{{ $income->rel_to_branch->branch_name }}</td>
                                    <td>{{ $income->enroll_id ? $income->rel_to_enroll->user->name : 'N/A' }}</td>
                                    <td>{{ $income->enroll_id ? $income->rel_to_enroll->category->category_name : 'N/A' }}</td>
                                    <td>{{ $income->enroll_id ? $income->rel_to_enroll->type->type_name : 'N/A' }}</td>
                                    <td>{{ $income->note ? $income->note : '--' }}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm edit-income" data-id="{{ $income->id }}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit"><i class="fa-solid fa-pencil"></i></button>
                                        <button class="btn btn-danger btn-sm delete-income" data-id="{{ $income->id }}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No Entry Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="m-0 fs-5">Add New Entry</h3>
                </div>
                <div class="card-body">
                    <form id="add-income-form">
                        @csrf
                        <div class="mb-2">
                            <label class="form-label">Amount</label>
                            <input type="number" class="form-control @error('amount')is-invalid @enderror" name="amount" placeholder="Enter The Amount" value="{{ old('amount') }}">
                            {{-- @error('amount')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror --}}
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Branch</label>
                            <select name="branch" class="form-select select2 @error('branch')is-invalid @enderror">
                                <option value="0">-- Select A Branch --</option>
                                @foreach ($branches as $branch)
                                    <option value="{{ $branch->id }}" {{ $branch->id == old('branch') ? 'selected' : '' }}>{{ $branch->branch_name }}</option>
                                @endforeach
                            </select>
                            {{-- @error('branch_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror --}}
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Note</label>
                            <textarea class="form-control" name="note" id="" cols="30" rows="6" placeholder="Add note about the income"></textarea>
                            {{-- @error('note')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror --}}
                        </div>
                        <div class="error mb-2"></div>
                        <button class="mt-2 btn btn-primary btn-sm">Add Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Course Edit Model -->
    <div class="modal fade" id="editIncome" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="edit-income-form">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Edit Income Entry</h1>
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
        $('#add-income-form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                method: 'POST',
                url: "{{ route('admin.income.add') }}",
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        location.reload();
                    } else {
                        let errors = response.errors;
                        let errorsHtml = '<ul class="m-0 mt-2 fw-light">';
                        $.each(errors, function(key, value) {
                            errorsHtml += '<li class= "fw-bold">' + value + '</li>';
                        });
                        errorsHtml += '</ul>';
                        $('#add-income-form .error').html(errorsHtml);
                        $('#add-income-form .error').show();

                    }
                }
            });
        });

        // edit course
        $('.edit-income').click(function() {
            let id = $(this).data('id');
            let url = "{{ route('admin.income.edit', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                method: 'get',
                url: url,
                success: function(response) {
                    $('#editIncome').modal('show');
                    $('#editIncome .modal-body').html(response);
                }
            })
        });

        $('#edit-income-form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                method: 'POST',
                url: "{{ route('admin.income.update') }}",
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        location.reload();
                    } else {
                        let errors = response.errors;
                        let errorsHtml = '<ul class="m-0 mt-2 fw-light">';
                        $.each(errors, function(key, value) {
                            errorsHtml += '<li class= "fw-bold">' + value + '</li>';
                        });
                        errorsHtml += '</ul>';
                        $('#edit-income-form .error').html(errorsHtml);
                        $('#edit-income-form .error').show();

                    }
                }
            });
        });


        $('.delete-income').click(function() {
            let id = $(this).data('id');
            let url = "{{ route('admin.income.delete', ':id') }}";
            url = url.replace(':id', id);
            delete_warning(url);
        });
    </script>
@endsection
