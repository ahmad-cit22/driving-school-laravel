@extends('layouts.frontend')
@section('content')
    <!-- Course Category -->
    <div id="course-area" class="course-area bg-white pt-90 pb-60">
        <div class="container">
            <!-- Section Title -->
            <div class="row">
                <div class="text-center col-12 mb-45">
                    <h2 class="mb-3 heading">Course Categories</h2>
                    <div class="excerpt">
                        <p>Lorem ipsum dolor sit amet, consectetur maksu rez do eiusmod tempor magna aliqua</p>
                    </div>
                    <i class="icofont icofont-traffic-light  site-text-primary"></i>
                </div>
            </div>
            <!-- Course Wrapper -->
            <div class="course-wrapper row justify-content-center">
                @foreach ($categories as $category)
                    <div class="col-lg-3 col-md-6 col-12 mb-30 fix">
                        <div class="text-center course-cat-box" style="">
                            <div class="course-cat-img">
                                <img class="" src="{{ asset('assets/frontend/images/category/' . $category->image) }}" alt="">
                                <div class="course-cat-overlay">
                                </div>
                            </div>
                            <div class="course-cat-line mx-auto mt-4"></div>
                            <div class="mt-3 pb-20 course-cat-text">
                                <h4 class="fw-bold">{{ $category->category_name }}</h4>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- <div class="col-lg-3 col-md-6 col-12 mb-30 fix">
                    <div class="course-item text-center">
                        <i class="icofont icofont-ambulance-cross"></i>
                        <h4>Car (Auto)</h4>

                        <p>There are many variations of items passag LoIpsum available the majority ratomised </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 mb-30 fix">
                    <div class="course-item text-center">
                        <i class="icofont icofont-fast-delivery"></i>
                        <h4>Bike</h4>
                        <p>There are many variations of items passag LoIpsum available the majority ratomised </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 mb-30 fix">
                    <div class="course-item text-center">
                        <i class="icofont icofont-rocket-alt-2"></i>
                        <h4>Scooter</h4>
                        <p>There are many variations of items passag LoIpsum available the majority ratomised </p>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

    {{-- courses area  --}}
    <div id="" class="courses-area bg-gray pt-60 pb-60">
        <div class="container justify-content-center" style=" flex-wrap: wrap;">
            <!-- Section Title -->
            <div class="row">
                <div class="text-center col-12 mb-45">
                    <h2 class="mb-3 heading">Our Courses</h2>
                    <div class="excerpt">
                        <p>Lorem ipsum dolor sit amet, consectetur maksu rez do eiusmod tempor magna aliqua</p>
                    </div>
                    <i class="icofont icofont-traffic-light  site-text-primary"></i>
                </div>
            </div>
            <div class="row mt-2 course-container">
                @foreach ($courses as $key => $course)
                    <div class="single-course-box">
                        <div class="single-popular single-course" style="border-radius: 9px; ">
                            <div class="mx-auto" style="margin-bottom: 20px;">
                                <a href="#"><img src="{{ asset('assets/frontend/img/courses/' . $course->image) }}" class="img-responsive" alt=""></a>
                            </div>
                            <div class="popular-course-content text-center">
                                <h4 class="" style="font-weight: 700"><a href="#">{{ $course->rel_to_course_cat->category_name . ' - ' . $course->rel_to_course_type->type_name }}</a></h4>
                                <p class="reviews pt-1">
                                    <i class="fa text-orange fa-star"></i>
                                    <i class="fa text-orange fa-star"></i>
                                    <i class="fa text-orange fa-star"></i>
                                    <i class="fa text-orange fa-star"></i>
                                    <i class="fa text-ash fa-star"></i>
                                    <span class="review-count">20 Reviews</span>
                                </p>
                                <div class="pt-2" style="padding-bottom: 25px; display: flex; flex-direction: column; justify-content: space-between; height: 165px;">
                                    <ul>
                                        <li><i class="fa text-orange fa-caret-right mb-2" style="margin-right: 6px;"></i>Course Duration: <span class="fw-bold">{{ $course->rel_to_course_type->duration . ' Days' }}</span></li>
                                        {{-- <li><i class="fa text-orange fa-caret-right mb-2" style="margin-right: 6px;"></i><span>Course Fee: BDT {{ number_format($course->price) }}</span></li> --}}
                                        {{-- <li><i class="fa text-orange fa-caret-right mb-2" style="margin-right: 6px;"></i><span>Every {{ $course->days }}</span></li> --}}
                                        {{-- <li><i class="fa text-orange fa-caret-right mb-2" style="margin-right: 6px;"></i><span>Class Time: {{ \Carbon\Carbon::createFromFormat('H:i:s', $course->start)->format('g:i A') }} To {{ \Carbon\Carbon::createFromFormat('H:i:s', $course->end)->format('g:i A') }}</span></li> --}}
                                    </ul>
                                    <h4 class="site-text-primary" style="font-weight: 600">BDT {{ number_format($course->price) }}</h4>
                                    <div class="button-group mt-3">
                                        <a href="{{ route('enroll.index') }}" class="courseBtn enrollBtn site-bg-primary-hov" style="border-radius: 4px;">Enroll</a>
                                        <a href="#" class="courseBtn site-bg-primary detailsBtn" style="border-radius: 4px">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- FAQ Area ============================================ -->
    <div id="faq-area" class="faq-area bg-white pt-90 pb-60">
        <div class="container">
            <!-- Section Title -->
            <div class="row">
                <div class="section-title text-center col-12 mb-45">
                    <h2 class="mb-3 heading">Frequently Asked Questions</h2>
                    <div class="excerpt">
                        <p>Lorem ipsum dolor sit amet, consectetur maksu rez do eiusmod tempor magna aliqua</p>
                    </div>
                    <i class="icofont icofont-traffic-light  site-text-primary"></i>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="panel-group" id="faq">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a data-toggle="collapse" aria-expanded="true" href="#faq-1">There are many variations of passages of Lorem Ipsum?</a></h4>
                            </div>
                            <div id="faq-1" class="panel-collapse collapse show" data-parent="#faq">
                                <div class="panel-body">
                                    <p>It is a long established fact that a reader will be distracted by the readaible is an
                                        content of the page when looking at its layout. The point of using Lorem Ipsum is
                                        that it has a more less normal.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a data-toggle="collapse" aria-expanded="false" href="#faq-2">There are many variations of passages of Lorem Ipsum?</a></h4>
                            </div>
                            <div id="faq-2" class="panel-collapse collapse" data-parent="#faq">
                                <div class="panel-body">
                                    <p>It is a long established fact that a reader will be distracted by the readaible is an
                                        content of the page when looking at its layout. The point of using Lorem Ipsum is
                                        that it has a more less normal.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a data-toggle="collapse" aria-expanded="false" href="#faq-3">There are many variations of passages of Lorem Ipsum?</a></h4>
                            </div>
                            <div id="faq-3" class="panel-collapse collapse" data-parent="#faq">
                                <div class="panel-body">
                                    <p>It is a long established fact that a reader will be distracted by the readaible is an
                                        content of the page when looking at its layout. The point of using Lorem Ipsum is
                                        that it has a more less normal.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a data-toggle="collapse" aria-expanded="false" href="#faq-4">There are many variations of passages of Lorem Ipsum?</a></h4>
                            </div>
                            <div id="faq-4" class="panel-collapse collapse" data-parent="#faq">
                                <div class="panel-body">
                                    <p>It is a long established fact that a reader will be distracted by the readaible is an
                                        content of the page when looking at its layout. The point of using Lorem Ipsum is
                                        that it has a more less normal.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="faq-image col-lg-6 col-12 pl-4">
                    <img src="{{ asset('assets/frontend/img/faq.jpg') }}" alt="" />
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
@endsection

@section('script')
@endsection
