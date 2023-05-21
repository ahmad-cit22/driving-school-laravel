@extends('layouts.admin')
@section('content')
    {{-- overall report --}}
    <div class="row mb-3">
        <div class="col-2 ms-auto">
            <div class="row">
                <div class="col">
                    <select name="year" id="year" class="select2 form-select">
                        <option>Select A Year</option>
                        <option {{ $current_year == $selected_year ? 'selected' : '' }} value="{{ $current_year }}">{{ $current_year }}</option>
                        <option {{ $current_year - 1 == $selected_year ? 'selected' : '' }} value="{{ $current_year - 1 }}">{{ $current_year - 1 }}</option>
                        <option {{ $current_year - 2 == $selected_year ? 'selected' : '' }} value="{{ $current_year - 2 }}">{{ $current_year - 2 }}</option>
                        <option {{ $current_year - 3 == $selected_year ? 'selected' : '' }} value="{{ $current_year - 3 }}">{{ $current_year - 3 }}</option>
                        <option {{ $current_year - 4 == $selected_year ? 'selected' : '' }} value="{{ $current_year - 4 }}">{{ $current_year - 4 }}</option>
                        <option {{ $current_year - 5 == $selected_year ? 'selected' : '' }} value="{{ $current_year - 5 }}">{{ $current_year - 5 }}</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-lg-4 row-cols-xl-5">
        <div class="col">
            <div class="card overflow-hidden radius-10">
                <div class="card-body p-2">
                    <div class="d-flex align-items-stretch justify-content-between radius-10 overflow-hidden">
                        <div class="w-100 p-3 bg-light-pink">
                            <h5>Total Students</h5>
                            <h4 class="pt-2 text-pink">{{ $student_count }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card overflow-hidden radius-10">
                <div class="card-body p-2">
                    <div class="d-flex align-items-stretch justify-content-between radius-10 overflow-hidden">
                        <div class="w-100 p-3 bg-light-purple">
                            <h5>Total Enrolls</h5>
                            <h4 class="pt-2 text-purple">{{ $enrolls->count() }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card overflow-hidden radius-10">
                <div class="card-body p-2">
                    <div class="d-flex align-items-stretch justify-content-between radius-10 overflow-hidden">
                        <div class="w-100 p-3 bg-light-success">
                            <h5>Total Income</h5>
                            <h4 class="pt-2 text-success">&#2547; {{ $income->sum('amount') }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card overflow-hidden radius-10">
                <div class="card-body p-2">
                    <div class="d-flex align-items-stretch justify-content-between radius-10 overflow-hidden">
                        <div class="w-100 p-3 bg-light-success">
                            <h5>Total Expense</h5>
                            <h4 class="pt-2 text-success">&#2547; {{ $expense->sum('amount') }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card overflow-hidden radius-10">
                <div class="card-body p-2">
                    <div class="d-flex align-items-stretch justify-content-between radius-10 overflow-hidden">
                        <div class="w-100 p-3 bg-light-success">
                            <h5>Total Revenue</h5>
                            <h4 class="pt-2 text-success">&#2547; {{ $total_revenue }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->


    <div class="row">
        <div class="col-12 col-lg-6 col-xl-6 col-xxl-4 d-flex">
            <div class="card radius-10 bg-transparent shadow-none w-100">
                <div class="card-body p-0">

                    {{-- Enrolls in Branches --}}
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h6 class="mb-0">Enrolls in Branches</h6>

                                <div class="fs-5 ms-auto dropdown">
                                    <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></div>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row py-3">
                                <div class="col">
                                    <div class="by-device-container">
                                        <canvas id="chart5"></canvas>
                                    </div>
                                </div>

                            </div>
                            <div class="row py-1">
                                <div class="col-6 mx-auto">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex align-items-center justify-content-between border-0">
                                            <i class="fa fa-home me-2 text-orange"></i> <span>{{ $branch_one_name }} - </span> <span>{{ $branch_one_enrolls }} ({{ $enrolls->count() == 0 ? 0 : ($branch_one_enrolls * 100) / $enrolls->count() }}%)</span>
                                        </li>
                                        <li class="list-group-item d-flex align-items-center justify-content-between border-0">
                                            <i class="fa fa-home me-2 text-success"></i> <span>{{ $branch_two_name }} - </span> <span>{{ $branch_two_enrolls }} ({{ $enrolls->count() == 0 ? 0 : ($branch_two_enrolls * 100) / $enrolls->count() }}%)</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Revenues in branches --}}
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h6 class="mb-0">Revenues in Branches</h6>

                                <div class="fs-5 ms-auto dropdown">
                                    <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></div>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="row py-3">
                                    <div class="col">
                                        <div class="by-device-container">
                                            <canvas id="chart6" style="min-height: 100px"></canvas>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row py-1">
                                <div class="col-8 mx-auto">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex align-items-center justify-content-between border-0">
                                            <i class="fa fa-home me-2" style="color: #2c31b4"></i> <span>{{ $branch_one_name }} - </span> <span>&#2547; {{ $branch_one_revenues }} ({{ $total_revenue == 0 ? 0 : number_format(($branch_one_revenues * 100) / $total_revenue, 2) }}%)</span>
                                        </li>
                                        <li class="list-group-item d-flex align-items-center justify-content-between border-0">
                                            <i class="fa fa-home me-2 text-info"></i> <span>{{ $branch_two_name }} - </span> <span>&#2547; {{ $branch_two_revenues }} ({{ $total_revenue == 0 ? 0 : number_format(($branch_two_revenues * 100) / $total_revenue, 2) }}%)</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-6 col-xxl-4 d-flex">
            <div class="card radius-10 w-100 overflow-hidden">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h6 class="mb-0">Enrolls Per Month</h6>
                        <div class="fs-5 ms-auto dropdown">
                            <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></div>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                    <div id="chart7"></div>
                    <div class="d-flex align-items-center gap-5 justify-content-center mt-4 p-3 bg-light radius-10 border">
                        <div class="text-center">
                            <h2 class="mb-3 text-success">{{ $enrolls->count() }}</h2>
                            <p>Total <br> Enrolls</p>
                        </div>
                        {{-- <div class="border-end sepration"></div>
                        <div class="text-center">
                            <h2 class="mb-3">2.56</h2>
                            <p>AVG per <br> Customer</p>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-6 col-xxl-4 d-flex">
            <div class="card radius-10 w-100 overflow-hidden">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h6 class="mb-0">Income Per Month</h6>
                        <div class="fs-5 ms-auto dropdown">
                            <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></div>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                    <div id="chart8"></div>
                    <div class="d-flex align-items-center gap-5 justify-content-center mt-4 p-3 bg-light radius-10 border">
                        <div class="text-center">
                            <h2 class="mb-3 text-success">&#2547; {{ $income->sum('amount') }}</h2>
                            <p>Total <br> Income</p>
                        </div>
                        {{-- <div class="border-end sepration"></div>
                        <div class="text-center">
                            <h2 class="mb-3">2.56</h2>
                            <p>AVG per <br> Customer</p>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->

    <div class="row">
        <div class="col-12 d-flex">
            <div class="card radius-10 w-100">
                <div class="card-header bg-transparent">
                    <div class="row g-3 align-items-center">
                        <div class="col">
                            <h4 class="mb-2">Overall Report</h4>
                        </div>
                        <div class="col">
                            <div class="d-flex align-items-center justify-content-end gap-3 cursor-pointer">
                                <div class="dropdown">
                                    <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="javascript:;">Action</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table datatable align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Branch ID</th>
                                    <th>Branch Name</th>
                                    <th>Total Students</th>
                                    <th>Total Enrolls</th>
                                    <th>Total Income</th>
                                    <th>Total Expense</th>
                                    <th>Revenue</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#01</td>
                                    <td>{{ $branch_one_name }}</td>
                                    <td>{{ $branch_one_students }}</td>
                                    <td>{{ $branch_one_enrolls }}</td>
                                    <td>&#2547; {{ $branch_one_income }}</td>
                                    <td>&#2547; {{ $branch_one_expense }}</td>
                                    <td>&#2547; {{ $branch_one_revenues }}</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3 fs-6">
                                            <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                            <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                            <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#02</td>
                                    <td>{{ $branch_two_name }}</td>
                                    <td>{{ $branch_two_students }}</td>
                                    <td>{{ $branch_two_enrolls }}</td>
                                    <td>&#2547; {{ $branch_two_income }}</td>
                                    <td>&#2547; {{ $branch_two_expense }}</td>
                                    <td>&#2547; {{ $branch_two_revenues }}</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3 fs-6">
                                            <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                            <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                            <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
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


    <div class="row">
        <div class="col-12 col-lg-12 col-xl-4 d-flex">
            <div class="card w-100 radius-10">
                <div class="card-body">
                    <div class="card radius-10 border shadow-none">
                        <div class="card-body pb-0">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <h6 class="mb-0">Montly Sales</h6>
                                </div>
                                <div class="fs-5 ms-auto dropdown">
                                    <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></div>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mt-0">
                                <div class="widget-icon mx-auto mb-2 bg-light-success text-success">
                                    <i class="bi bi-bank2"></i>
                                </div>
                                <h4 class="mb-0 text-center">$45,865</h4>
                            </div>
                            <div id="chart15"></div>
                        </div>
                    </div>
                    <div class="card radius-10 border shadow-none">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <h6 class="mb-0">Total Clicks</h6>
                                </div>
                                <div class="fs-5 ms-auto dropdown">
                                    <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></div>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div id="chart14"></div>
                        </div>
                    </div>
                    <div class="card radius-10 border shadow-none mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <h6 class="mb-0">Sessions</h6>
                                </div>
                                <div class="fs-5 ms-auto dropdown">
                                    <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></div>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div id="chart16"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-12 col-xl-8 d-flex">
            <div class="w-100">
                <div class="row">
                    <div class="col-12 col-lg-12 col-xl-12">
                        <div class="card radius-10">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <h6 class="mb-0">Visitors</h6>
                                    <div class="fs-5 ms-auto dropdown">
                                        <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></div>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="d-sm-flex align-items-center gap-3 mt-3">
                                    <div class="mb-2 mb-sm-0">
                                        <h4 class="mb-0">254,852</h4>
                                        <p class="mb-0">New / Returning</p>
                                    </div>
                                    <div class="d-none d-sm-block border-end sepration-2"></div>
                                    <div class="align-self-end mb-2 mb-sm-0">
                                        <p class="mb-0">45,762 / 2,491</p>
                                    </div>
                                    <div class="align-self-end ms-auto">
                                        <div class="d-flex align-items-center gap-3">
                                            <p class="mb-0 font-13">
                                                <i class="bi bi-square-fill ms-1 text-primary"></i> New Visitors
                                            </p>
                                            <p class="mb-0 font-13">
                                                <i class="bi bi-square-fill ms-1 text-primary-3"></i> Returning Visitors
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div id="chart10"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 col-xl-4">
                        <div class="card radius-10">
                            <div class="card-body">
                                <div id="chart11"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 col-xl-4">
                        <div class="card radius-10">
                            <div class="card-body">
                                <div id="chart12"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 col-xl-4">
                        <div class="card radius-10">
                            <div class="card-body">
                                <div id="chart13"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
    <!--end row-->


    <div class="row">
        <div class="col-12 col-lg-12 col-xl-8 d-flex">
            <div class="card radius-10 w-100">
                <div class="card-header bg-transparent">
                    <div class="row g-3 align-items-center">
                        <div class="col">
                            <h5 class="mb-0">Recent Orders</h5>
                        </div>
                        <div class="col">
                            <div class="d-flex align-items-center justify-content-end gap-3 cursor-pointer">
                                <div class="dropdown">
                                    <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="javascript:;">Action</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>#ID</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#89742</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="product-box border">
                                                <img src="{{ asset('assets/backend') }}/images/products/11.png" alt="">
                                            </div>
                                            <div class="product-info">
                                                <h6 class="product-name mb-1">Smart Mobile Phone</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>2</td>
                                    <td>$214</td>
                                    <td>Apr 8, 2021</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3 fs-6">
                                            <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                            <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                            <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#68570</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="product-box border">
                                                <img src="{{ asset('assets/backend') }}/images/products/07.png" alt="">
                                            </div>
                                            <div class="product-info">
                                                <h6 class="product-name mb-1">Sports Time Watch</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>1</td>
                                    <td>$185</td>
                                    <td>Apr 9, 2021</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3 fs-6">
                                            <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                            <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                            <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#38567</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="product-box border">
                                                <img src="{{ asset('assets/backend') }}/images/products/17.png" alt="">
                                            </div>
                                            <div class="product-info">
                                                <h6 class="product-name mb-1">Women Red Heals</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>3</td>
                                    <td>$356</td>
                                    <td>Apr 10, 2021</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3 fs-6">
                                            <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                            <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                            <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#48572</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="product-box border">
                                                <img src="{{ asset('assets/backend') }}/images/products/04.png" alt="">
                                            </div>
                                            <div class="product-info">
                                                <h6 class="product-name mb-1">Yellow Winter Jacket</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>1</td>
                                    <td>$149</td>
                                    <td>Apr 11, 2021</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3 fs-6">
                                            <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                            <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                            <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#96857</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="product-box border">
                                                <img src="{{ asset('assets/backend') }}/images/products/10.png" alt="">
                                            </div>
                                            <div class="product-info">
                                                <h6 class="product-name mb-1">Orange Micro Headphone</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>2</td>
                                    <td>$199</td>
                                    <td>Apr 15, 2021</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3 fs-6">
                                            <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                            <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                            <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-12 col-xl-4 d-flex">
            <div class="card radius-10 w-100">
                <div class="card-header bg-transparent border-0">
                    <div class="row g-3 align-items-center">
                        <div class="col">
                            <h6 class="mb-0">Top Sold</h6>
                        </div>
                        <div class="col">
                            <div class="d-flex align-items-center justify-content-end gap-3 cursor-pointer">
                                <div class="dropdown">
                                    <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="javascript:;">Action</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="best-product p-2 mb-3">
                        <div class="best-product-item">
                            <div class="d-flex align-items-center gap-3">
                                <div class="product-box border">
                                    <img src="{{ asset('assets/backend') }}/images/products/01.png" alt="">
                                </div>
                                <div class="product-info flex-grow-1">
                                    <div class="progress-wrapper">
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 80%;"></div>
                                        </div>
                                    </div>
                                    <p class="product-name mb-0 mt-2 fs-6">White Polo T-Shirt <span class="float-end">245</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="best-product-item">
                            <div class="d-flex align-items-center gap-3">
                                <div class="product-box border">
                                    <img src="{{ asset('assets/backend') }}/images/products/02.png" alt="">
                                </div>
                                <div class="product-info flex-grow-1">
                                    <div class="progress-wrapper">
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 70%;"></div>
                                        </div>
                                    </div>
                                    <p class="product-name mb-0 mt-2 fs-6">Black Coat Pant <span class="float-end">245</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="best-product-item">
                            <div class="d-flex align-items-center gap-3">
                                <div class="product-box border">
                                    <img src="{{ asset('assets/backend') }}/images/products/03.png" alt="">
                                </div>
                                <div class="product-info flex-grow-1">
                                    <div class="progress-wrapper">
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 60%;"></div>
                                        </div>
                                    </div>
                                    <p class="product-name mb-0 mt-2 fs-6">Blue Shade Jeans <span class="float-end">245</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="best-product-item">
                            <div class="d-flex align-items-center gap-3">
                                <div class="product-box border">
                                    <img src="{{ asset('assets/backend') }}/images/products/04.png" alt="">
                                </div>
                                <div class="product-info flex-grow-1">
                                    <div class="progress-wrapper">
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar bg-orange" role="progressbar" style="width: 50%;"></div>
                                        </div>
                                    </div>
                                    <p class="product-name mb-0 mt-2 fs-6">Yellow Winter Jacket <span class="float-end">245</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="best-product-item">
                            <div class="d-flex align-items-center gap-3">
                                <div class="product-box border">
                                    <img src="{{ asset('assets/backend') }}/images/products/05.png" alt="">
                                </div>
                                <div class="product-info flex-grow-1">
                                    <div class="progress-wrapper">
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar bg-purple" role="progressbar" style="width: 40%;"></div>
                                        </div>
                                    </div>
                                    <p class="product-name mb-0 mt-2 fs-6">Men Sports Shoes Nike <span class="float-end">245</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="best-product-item">
                            <div class="d-flex align-items-center gap-3">
                                <div class="product-box border">
                                    <img src="{{ asset('assets/backend') }}/images/products/06.png" alt="">
                                </div>
                                <div class="product-info flex-grow-1">
                                    <div class="progress-wrapper">
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 30%;"></div>
                                        </div>
                                    </div>
                                    <p class="product-name mb-0 mt-2 fs-6">Fancy Home Sofa <span class="float-end">245</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="best-product-item">
                            <div class="d-flex align-items-center gap-3">
                                <div class="product-box border">
                                    <img src="{{ asset('assets/backend') }}/images/products/07.png" alt="">
                                </div>
                                <div class="product-info flex-grow-1">
                                    <div class="progress-wrapper">
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar bg-pink" role="progressbar" style="width: 20%;"></div>
                                        </div>
                                    </div>
                                    <p class="product-name mb-0 mt-2 fs-6">Sports Time Watch <span class="float-end">245</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="best-product-item">
                            <div class="d-flex align-items-center gap-3">
                                <div class="product-box border">
                                    <img src="{{ asset('assets/backend') }}/images/products/08.png" alt="">
                                </div>
                                <div class="product-info flex-grow-1">
                                    <div class="progress-wrapper">
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar bg-dark" role="progressbar" style="width: 10%;"></div>
                                        </div>
                                    </div>
                                    <p class="product-name mb-0 mt-2 fs-6">Women Blue Heals <span class="float-end">245</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!--end row-->
@endsection
@section('script')
    <script src="{{ asset('assets/backend') }}/plugins/chartjs/js/Chart.min.js"></script>
    <script src="{{ asset('assets/backend') }}/plugins/chartjs/js/Chart.extension.js"></script>
    <script src="{{ asset('assets/backend') }}/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
    {{-- <script src="{{ asset('assets/backend') }}/js/index2.js"></script> --}}
    <script>
        new PerfectScrollbar(".best-product")
    </script>

    <script>
        // chart 5
        new Chart(document.getElementById("chart5"), {
            type: 'doughnut',
            data: {
                labels: ["{{ $branch_one_name }}", "{{ $branch_two_name }}"],
                datasets: [{
                    label: "Enrolls in Branches ",
                    backgroundColor: ["#ff6632", "#12bf24"],
                    data: [{{ $branch_one_enrolls }}, {{ $branch_two_enrolls }}]
                }]
            },
            options: {
                maintainAspectRatio: false,
                cutoutPercentage: 77,
                legend: {
                    position: 'bottom',
                    display: false,
                    labels: {
                        boxWidth: 8
                    }
                },
                tooltips: {
                    displayColors: false,
                },
            }
        });
    </script>

    <script>
        // chart 6
        new Chart(document.getElementById("chart6"), {
            type: 'doughnut',
            data: {
                labels: ["{{ $branch_one_name }}", "{{ $branch_two_name }}"],
                datasets: [{
                    label: "Revenues in Branches",
                    backgroundColor: ["#2c31b4", "#32bfff "],
                    data: [{{ $branch_one_revenues }}, {{ $branch_two_revenues }}]
                }]
            },
            options: {
                maintainAspectRatio: false,
                cutoutPercentage: 77,
                legend: {
                    position: 'bottom',
                    display: false,
                    labels: {
                        boxWidth: 8
                    }
                },
                tooltips: {
                    displayColors: false,
                },
            }
        });
    </script>

    <script>
        //  chart 7
        var options = {
            series: [{
                name: "Enrolls",
                data: [{{ $jan }}, {{ $feb }}, {{ $mar }}, {{ $apr }}, {{ $may }}, {{ $jun }}, {{ $jul }}, {{ $aug }}, {{ $sep }}, {{ $oct }}, {{ $nov }}, {{ $dec }}]
            }],
            chart: {
                foreColor: '#9a9797',
                type: "area",
                //width: 130,
                height: 250,
                toolbar: {
                    show: !1
                },
                zoom: {
                    enabled: !1
                },
                dropShadow: {
                    enabled: 0,
                    top: 3,
                    left: 15,
                    blur: 4,
                    opacity: .22,
                    color: "#12bf24"
                },
                sparkline: {
                    enabled: !1
                }
            },
            markers: {
                size: 0,
                colors: ["#2c31b4"],
                strokeColors: "#fff",
                strokeWidth: 2,
                hover: {
                    size: 7
                }
            },
            plotOptions: {
                bar: {
                    horizontal: !1,
                    columnWidth: "35%",
                    endingShape: "rounded"
                }
            },
            dataLabels: {
                enabled: !1
            },
            stroke: {
                show: !0,
                width: 3,
                curve: "straight"
            },
            colors: ['#2c31b4'],
            xaxis: {
                categories: ["Jan", 'Feb', "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec", ]
            },
            tooltip: {
                theme: "dark",
                fixed: {
                    enabled: !1
                },
                x: {
                    show: !1
                },
                y: {
                    title: {
                        formatter: function(e) {
                            return ""
                        }
                    }
                },
                marker: {
                    show: !1
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart7"), options);
        chart.render();
    </script>

    <script>
        //  chart 8
        var options = {
            series: [{
                name: "Income",
                data: [{{ $janInc }}, {{ $febInc }}, {{ $marInc }}, {{ $aprInc }}, {{ $mayInc }}, {{ $junInc }}, {{ $julInc }}, {{ $augInc }}, {{ $sepInc }}, {{ $octInc }}, {{ $novInc }}, {{ $decInc }}]
            }],
            chart: {
                foreColor: '#9a9797',
                type: "area",
                //width: 130,
                height: 250,
                toolbar: {
                    show: !1
                },
                zoom: {
                    enabled: !1
                },
                dropShadow: {
                    enabled: 0,
                    top: 3,
                    left: 15,
                    blur: 4,
                    opacity: .22,
                    color: "#12bf24"
                },
                sparkline: {
                    enabled: !1
                }
            },
            markers: {
                size: 0,
                colors: ["#12bf24"],
                strokeColors: "#fff",
                strokeWidth: 2,
                hover: {
                    size: 7
                }
            },
            plotOptions: {
                bar: {
                    horizontal: !1,
                    columnWidth: "35%",
                    endingShape: "rounded"
                }
            },
            dataLabels: {
                enabled: !1
            },
            stroke: {
                show: !0,
                width: 3,
                curve: "straight"
            },
            colors: ['#12bf24'],
            xaxis: {
                categories: ["Jan", 'Feb', "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec", ]
            },
            tooltip: {
                theme: "dark",
                fixed: {
                    enabled: !1
                },
                x: {
                    show: !1
                },
                y: {
                    title: {
                        formatter: function(e) {
                            return ""
                        }
                    }
                },
                marker: {
                    show: !1
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart8"), options);
        chart.render();
    </script>

    <script>

        $('#year').change(function() {
            let yearName = $(this).val();

            let url = "/dashboard?y=" + yearName;
            window.location = url;
        })
    </script>
@endsection
