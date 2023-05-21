@extends('layouts.frontend')
@section('content')
    <div class="container py-5">
        <div class="card border-0">
            <div class="card-body">
                <form id="enroll">
                    @csrf
                    <div class="row">
                        @guest
                            <div class="form-group col-md-6">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Please enter your full name">
                                <div class="error"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mobile">Mobile Number</label>
                                <input type="phone" name="mobile" id="mobile" class="form-control" placeholder="Please Enter a valid mobile number">
                                <div class="error"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="(Optional)">
                                <div class="error"></div>
                            </div>
                        @endguest
                        <div class="form-group col-md-6">
                            <label for="branch">Branch Name</label>
                            <select name="branch" id="branch" class="form-control select2">
                                <option></option>
                                @foreach ($branches as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                                @endforeach
                            </select>
                            <div class="error"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="course_category">Course Category</label>
                            <select name="course_category" id="course_category" class="form-control select2">
                                <option></option>
                            </select>
                            <div class="error"></div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="course_type">Course Type</label>
                            <select name="course_type" id="course_type" class="form-control select2">
                                <option></option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->type_name }} ({{ $type->duration }} Day{{ $type->duration > 1 ? 's' : '' }})</option>
                                @endforeach
                            </select>
                            <div class="error"></div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="price">Course Fee (BDT)</label>
                            <input readonly type="number" name="price" id="price" class="form-control" placeholder="Select Course Category & Type to get the Fee">
                            <div class="error"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="payment_process">Payment Process</label>
                            <select name="payment_process" id="payment_process" class="form-control select2">
                                <option value="1" selected> Online Payment </option>
                                <option value="2"> Office Payment </option>
                            </select>
                            <div class="error"></div>
                        </div>
                        <div class="form-group col-md-6" id="paidBox" style="">
                            <label for="paid">Enter the amount you want to pay now (BDT)</label>
                            <input type="number" name="paid" id="paid" class="form-control" placeholder="Minimum paying amount - BDT 1000">
                            <div class="error"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="start_date">Start Date</label>
                            <input type="text" name="start_date" id="start_date" class="form-control datepicker" placeholder="Choose a date" autocomplete="off">
                            <div class="error"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="course_slot">Time Slot</label>
                            <select name="course_slot" id="course_slot" class="form-control select2">
                                <option></option>
                            </select>
                            <div class="error"></div>
                        </div>
                        @guest
                            <div class="form-group col-md-6">
                                <label for="password">Password</label>
                                <span id="show-password"><i class="fa-solid fa-eye"></i></span>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" autocomplete="off">
                                <div class="error"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password" autocomplete="off">
                                <div class="error"></div>
                            </div>
                        @endguest
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn primary" id="submit">Enroll Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="login-modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>
@endsection

@section('style')
    <style>
        form .error {
            font-size: .9em;
            color: #dc3545;
            display: none;
        }

        form .form-control.is-invalid {
            background-image: unset;
        }

        form #show-password {
            position: absolute;
            right: 30px;
            top: 40px;
        }
    </style>
@endsection

@section('script')
    <script>
        function getDataAjax(id) {
            let url_category = "{{ route('enroll.get.catgory', ':id') }}";
            let url_slot = "{{ route('enroll.get.slot', ':id') }}";
            $.ajax({
                method: 'get',
                url: url_category.replace(':id', id),
                success: function(response) {
                    $('#course_category').html(response);
                    if (formData.course_category) {
                        $("#course_category").val(formData.course_category).trigger('change');
                    }
                }
            });
            $.ajax({
                method: 'get',
                url: url_slot.replace(':id', id),
                success: function(response) {
                    $('#course_slot').html(response);
                    if (formData.course_category) {
                        $("#course_slot").val(formData.course_slot).trigger('change');
                    }
                }
            });
        }

        function getPriceAjax(id) {
            let url = "{{ route('enroll.get.price', ':id') }}";

            $.ajax({
                method: 'get',
                url: url.replace(':id', id),
                success: function(response) {
                    document.getElementById('price').value = response;
                }
            });
        }

        $('#course_type').change(function() {
            let category_id = $('#course_category').val();
            let type_id = $('#course_type').val();
            // alert(category_id + '.' + type_id);

            getPriceAjax(category_id + '.' + type_id);
        });

        let formData = JSON.parse(localStorage.getItem("formData"));
        if (!formData) {
            formData = {};
        }
        if (formData.branch) {
            $("#branch").val(formData.branch).trigger('change');
            getDataAjax(formData.branch);
        }
        if (formData.branch) {
            $("#course_type").val(formData.course_type).trigger('change');
        }
        if (formData.start_date) {
            $("#start_date").val(formData.start_date).trigger('change');
        }
        $('#branch').change(function() {
            let branch_id = $(this).val();
            getDataAjax(branch_id);
        });
        $('#payment_process').change(function() {
            let payment_process = $(this).val();
            if (payment_process == '1') {
                $('#paidBox').show();
            } else {
                $('#paidBox').hide();
            }
        });
        $("#enroll").submit(function(e) {

            e.preventDefault();
            let data = {
                branch: $('#branch').val(),
                course_category: $('#course_category').val(),
                course_type: $('#course_type').val(),
                start_date: $('#start_date').val(),
                course_slot: $('#course_slot').val(),
            };
            localStorage.setItem('formData', JSON.stringify(data));
            $.ajax({
                method: 'POST',
                url: "{{ route('enroll.store') }}",
                data: $(this).serialize(),
                success: function(response) {
                    $('.error').html('');
                    $('input').removeClass('is-invalid');
                    $('select').removeClass('is-invalid');
                    if (response.success) {
                        localStorage.removeItem("formData");
                        window.location.href = '{{ route('otp') }}';
                    } else if (response.errors) {
                        let errors = response.errors;
                        $.each(errors, function(key, value) {
                            let field = '#' + key;
                            $(field).addClass('is-invalid');
                            $(field).siblings('.error').html(value);
                            $(field).siblings('.error').css('display', 'block');
                        });
                    } else if (response.paidErr) {
                        Swal.fire(
                            'Oops',
                            response.paidErr,
                            'warning',
                        )
                    } else {
                        $('#login-modal').modal('show');
                        $('#login-modal .modal-content').html(response);
                    }
                }
            });
        });
        $('#show-password').click(function() {
            if ($('#password').attr('type') == 'password') {
                $('#password').attr('type', 'text');
                $('#confirm_password').attr('type', 'text');
                $('#show-password i').removeClass('fa-eye').addClass('fa-eye-slash');
            } else {
                $('#password').attr('type', 'password');
                $('#confirm_password').attr('type', 'password');
                $('#show-password i').removeClass('fa-eye-slash').addClass('fa-eye');
            }
        });
    </script>

@endsection
