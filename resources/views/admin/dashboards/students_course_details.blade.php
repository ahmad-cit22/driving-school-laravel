@extends('layouts.admin')
@section('content')
    {{-- overall report --}}
    <div class="row mb-5">
        <div class="col">
            <table class="fs-6 table table-striped table-bordered">
                <tr>
                    <th>Course Category: {{ $enroll->category->category_name }}</th>
                    <th>Course Type: {{ $enroll->type->type_name }} ({{ $enroll->type->duration }} Days)</th>
                    <th>Course Slot: {{ Carbon\Carbon::parse($enroll->slot->start_time)->format('h:i A') }} - {{ Carbon\Carbon::parse($enroll->slot->end_time)->format('h:i A') }}</th>

                </tr>
                <tr>
                    <th>Course Price: &#2547; {{ $course->price }}</th>
                    <th class="{{ $enroll->paid == $enroll->price ? 'text-success' : 'text-danger' }}">Payment Status: {{ $enroll->paid == $enroll->price ? 'Paid' : 'Not Paid (Due Amount: BDT ' . $enroll->price - $enroll->paid . ')' }}</th>
                    <th class="{{ $enroll->paid == $enroll->price ? 'text-success' : 'text-danger' }}">Payment Due: {{ $enroll->paid == $enroll->price ? 'No Due' : 'BDT ' . $enroll->price - $enroll->paid }}</th>
                </tr>
            </table>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-7 mx-auto">
            <h4 class="text-center mb-2">Course Progress</h4>
            <div class="mt-5 row justify-content-between">
                <div class="col-5 rounded-3 pb-4 bg-white">
                    <h5 class="text-center mb-4 mt-4">Classes Completed</h5>
                    <div class="by-device-container">
                        <canvas id="classProgress"></canvas>
                    </div>
                    <div class="row py-1">
                        <div class="col-8 px-4 mx-auto">
                            <h4 class="text-center py-3">{{ $class_count == 0 ? 0 : $class_attended_per }}%</h4>
                            <ul class="list-group list-group-flush">
                                <li class="mb-2 d-flex align-items-center justify-content-between border-0">
                                    <i class="fa fa-note me-2 text-orange"></i> <span>Total Classes - </span> <span>{{ $enroll->type->duration }}</span>
                                </li>
                                <li class="mb-2 d-flex align-items-center justify-content-between border-0">
                                    <i class="fa fa-note me-2 text-success"></i> <span>Class Completed - </span> <span>{{ $class_attended }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-5 rounded-3 pb-4 bg-white">
                    <h5 class="text-center mb-4 mt-4">Quizzes Completed</h5>
                    @if ($quiz_count > 0)
                        <div class="by-device-container">
                            <canvas id="quizProgress"></canvas>
                        </div>
                        <div class="row py-1">
                            <div class="col-8 px-4 mx-auto">
                                <h4 class="text-center py-3">{{ $quiz_count == 0 ? 0 : $passed_quiz_per }}%</h4>
                                <ul class="list-group list-group-flush">
                                    <li class="mb-2 d-flex align-items-center justify-content-between border-0">
                                        <i class="fa fa-note me-2 text-orange"></i> <span>Total Quizzes - </span> <span>{{ $quiz_count }}</span>
                                    </li>
                                    <li class="mb-2 d-flex align-items-center justify-content-between border-0">
                                        <i class="fa fa-note me-2 text-success"></i> <span>Quizzes Passed - </span> <span>{{ $passed_quiz_count }}</span>
                                    </li>
                                </ul>
                                <div class="row justify-content-center pt-3">
                                    <div class="col-9 mx-auto d-flex justify-content-center">
                                        <a href="{{ route('admin.quiz.list', $enroll->id) }}" class="btn btn-sm btn-info text-white">Go to Quizzes</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <p class="text-orange text-center">There is no quiz available yet for this course.</p>
                    @endif
                </div>
            </div>
            <div class="row justify-content-center pt-5">
                <div class="col-9 d-flex justify-content-center mx-auto">
                    @if (App\Models\VideoCourse::where('course_category', $enroll->course_category)->where('course_type', $enroll->course_type)->exists())
                        <a href="{{ route('admin.student.vid_courses') }}" class="btn bg-orange text-white" style="width: 36%;">Browse Video Courses</a>
                    @endif
                    @if ($class_attended_per == 100 && $passed_quiz_per >= 60)
                        <a href="{{ route('admin.certificate.view', $enroll->id) }}" class="btn site-bg-primary text-white ms-3" style="width: 30%;">Get Certificate</a>
                    @else
                        <button class="btn btn-secondary text-white ms-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="You can't get the certificate until you have attended all the classes & passed all the quizzes.">
                            Get Certificate
                        </button>
                        {{-- <a href="#" class="btn bg-dark text-white ms-3" style="width: 30%;"></a> --}}
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/backend') }}/plugins/chartjs/js/Chart.min.js"></script>
    <script src="{{ asset('assets/backend') }}/plugins/chartjs/js/Chart.extension.js"></script>
    <script src="{{ asset('assets/backend') }}/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
    <script>
        // classProgress
        new Chart(document.getElementById("classProgress"), {
            type: 'doughnut',
            data: {
                labels: ["Classes Completed", "Remaining Classes"],
                datasets: [{
                    label: "Course Progress",
                    backgroundColor: ["#12bf24", "#88888850"],
                    data: [{{ $class_attended }}, {{ $enroll->type->duration - $class_attended }}]
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
        // quizProgress
        new Chart(document.getElementById("quizProgress"), {
            type: 'doughnut',
            data: {
                labels: ["Quizzes Passed", "Remaining Quizzes"],
                datasets: [{
                    label: "Quiz Progress",
                    backgroundColor: ["#12bf24", "#88888850"],
                    data: [{{ $passed_quiz_count }}, {{ $quiz_count - $passed_quiz_count }}]
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
@endsection
