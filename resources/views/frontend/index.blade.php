@extends('layouts.frontend')

@section('style')
    <style>

    </style>
@endsection

@section('content')
    <!-- Hero Slide Area ========================================= -->
    <div class="hearo-area hero-static overlay overlay-black overlay-60 fix" data-parallax="scroll" data-bleed="10" data-speed="0.5" data-image-src="{{ asset('assets/frontend/img/banners/' . $banner_part->banner_img) }}">
        <div class="container">
            <div class="hero-slide-content text-left">
                <h3>{{ $banner_part->subtitle }}</h3>
                <h1 style="width: 70%"><span class="">{{ $banner_part->title }}</span></h1>
                <p style="width: 500px">{{ $banner_part->bottom_text }}</p>
                <div class="button-group">
                    <a href="{{ $banner_part->button_one_link }}" class="btn transparent">{{ $banner_part->button_one_name }}</a>
                    <a href="{{ $banner_part->button_two_link }}" class="btn site-bg-primary">{{ $banner_part->button_two_name }}</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Feature Area ======================================== -->
    <div id="feature-area" class="feature-area bg-gray pt-90 pb-90">
        <div class="container justify-content-center" style=" flex-wrap: wrap;">
            <!-- Section Title -->
            <div class="row">
                <div class="text-center col-12 mb-45">
                    <h2 class="mb-3 heading">{{ $featurePart->title }}</h2>
                    <div class="excerpt">
                        <p>{{ $featurePart->subtitle }}</p>
                    </div>
                    <i class="icofont icofont-traffic-light  site-text-primary"></i>
                </div>
            </div>
            <div class="row mt-2 feature-container" style="justify-content: space-between; row-gap: 50px;">
                @foreach ($features as $feature)
                    <div class="single-feature p-4 rounded-lg">
                        <div class="icon"><i class="{{ $feature->icon }} site-text-primary"></i></div>
                        <div class="text fix">
                            <h4 class="">{{ $feature->title }}</h4>
                            <p>{{ $feature->text }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Funfact Area ============================================ -->
    <div class="funfact-area overlay overlay-white overlay-80 pt-90 pb-60">
        <div class="container">
            <div class="row">
                @foreach ($counters as $counter)
                    <div class="single-facts text-center col-md-3 col-sm-6 col-12 mb-30">
                        <i class="icofont icofont-hat-alt"></i>
                        <h1 class="counter {{ $counter->amount > 100 ? 'plus' : '' }}">{{ $counter->amount }}</h1>
                        <p>{{ $counter->text }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Course Category -->
    <div id="course-area" class="course-area bg-gray pt-90 pb-60">
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

    <!-- Video Area ============================================ -->
    <div class="video-area overlay overlay-black overlay-50">
        <div class="container">
            <div class="row">
                <div class="video-content text-center col-12">
                    <a class="video-popup" href="{{ $video->link }}"><i class="icofont icofont-play-alt-2 site-text-primary-hov"></i></a>
                    <h3>{{ $video->title }}</h3>
                </div>
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
                                <h4><a href="#">{{ $course->rel_to_course_cat->category_name . ' - ' . $course->rel_to_course_type->type_name }}</a></h4>
                                <p class="reviews pt-1">
                                    <i class="fa text-orange fa-star"></i>
                                    <i class="fa text-orange fa-star"></i>
                                    <i class="fa text-orange fa-star"></i>
                                    <i class="fa text-orange fa-star"></i>
                                    <i class="fa text-ash fa-star"></i>
                                    <span class="review-count">20 Reviews</span>
                                </p>
                                <div class="pt-2" style="padding-bottom: 25px; display: flex; flex-direction: column; justify-content: space-between; height: 175px;">
                                    <ul>
                                        <li><i class="fa text-orange fa-caret-right mb-2" style="margin-right: 6px;"></i><span>Course Duration: {{ $course->rel_to_course_type->duration . ' Days' }}</span></li>
                                        <li><i class="fa text-orange fa-caret-right mb-2" style="margin-right: 6px;"></i><span>Course Fee: BDT {{ number_format($course->price) }}</span></li>
                                        {{-- <li><i class="fa text-orange fa-caret-right mb-2" style="margin-right: 6px;"></i><span>Every {{ $course->days }}</span></li>
                                        <li><i class="fa text-orange fa-caret-right mb-2" style="margin-right: 6px;"></i><span>Class Time: {{ \Carbon\Carbon::createFromFormat('H:i:s', $course->start)->format('g:i A') }} To {{ \Carbon\Carbon::createFromFormat('H:i:s', $course->end)->format('g:i A') }}</span></li> --}}
                                    </ul>
                                    <div class="button-group">
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

    <!-- Testimonial Area -->
    <div id="testimonial-area" class="testimonial-area overlay overlay-white overlay-40 text-center pt-50 pb-90">
        <div class="container">
            <!-- Section Title -->
            <div class="row">
                <div class="section-title text-center col-12 mb-45">
                    <h2 class="mb-3 heading">Testimonials</h2>
                    <div class="excerpt">
                        <p>Lorem ipsum dolor sit amet, consectetur maksu rez do eiusmod tempor magna aliqua</p>
                    </div>
                    <i class="icofont icofont-traffic-light  site-text-primary site-text-primary"></i>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-12 mx-auto">
                    <!-- Testimonial Image Slider -->
                    <div class="ti-slider mb-40">
                        <div class="single-slide">
                            <div class="image fix"><img src="{{ asset('assets/frontend') }}/img/testimonial/1.jpg" alt="" /></div>
                        </div>
                        <div class="single-slide">
                            <div class="image fix"><img src="{{ asset('assets/frontend') }}/img/testimonial/2.jpg" alt="" /></div>
                        </div>
                        <div class="single-slide">
                            <div class="image fix"><img src="{{ asset('assets/frontend') }}/img/testimonial/3.jpg" alt="" /></div>
                        </div>
                        <div class="single-slide">
                            <div class="image fix"><img src="{{ asset('assets/frontend') }}/img/testimonial/4.jpg" alt="" /></div>
                        </div>
                    </div>
                    <!-- Testimonial Content Slider -->
                    <div class="tc-slider">
                        <div class="single-slide">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur beatae reprehenderit itaque inventore sed vitae consectetur
                                suffered alteration in some form, by hum domised words which is don't look believable.</p>
                            <h5>momen bhuiyan</h5>
                            <span>Graphic Designer</span>
                        </div>
                        <div class="single-slide">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur beatae reprehenderit itaque inventore sed vitae consectetur
                                suffered alteration in some form, by hum domised words which is don't look believable.</p>
                            <h5>Tasnim Akter</h5>
                            <span>Graphic Designer</span>
                        </div>
                        <div class="single-slide">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur beatae reprehenderit itaque inventore sed vitae consectetur
                                suffered alteration in some form, by hum domised words which is don't look believable.</p>
                            <h5>momen bhuiyan</h5>
                            <span>Graphic Designer</span>
                        </div>
                        <div class="single-slide">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur beatae reprehenderit itaque inventore sed vitae consectetur
                                suffered alteration in some form, by hum domised words which is don't look believable.</p>
                            <h5>Tasnim Akter</h5>
                            <span>Graphic Designer</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slider Arrows -->
        <button class="ts-arrows ts-prev"><i class="icofont icofont-caret-left site-text-primary-hov"></i></button>
        <button class="ts-arrows ts-next"><i class="icofont icofont-caret-right site-text-primary-hov"></i></button>
    </div>

    <!-- Gallery Area ============================================ -->
    <div id="gallery-area" class="gallery-area bg- pt-90 pb-60">
        <div class="container">
            <!-- Section Title -->
            <div class="row">
                <div class="section-title text-center col-12 mb-45">
                    <h2 class="mb-3 heading">Photo Gallery</h2>
                    <div class="excerpt">
                        <p>Lorem ipsum dolor sit amet, consectetur maksu rez do eiusmod tempor magna aliqua</p>
                    </div>
                    <i class="icofont icofont-traffic-light  site-text-primary site-text-primary"></i>
                </div>
            </div>
            <!-- Gallery Filter -->
            <div class="gallery-filter text-center">
                <button class="active" data-filter="*">all</button>
                <button data-filter=".cars">cars</button>
                <button data-filter=".students">students</button>
                <button data-filter=".classroom">classroom</button>
                <button data-filter=".exam">exam</button>
            </div>
            <!-- Gallery Grid -->
            <div class="gallery-grid row">
                <div class="gallery-item cars col-lg-3 col-md-4 col-12">
                    <a href="img/gallery/1.jpg" class="gallery-image image-popup">
                        <img src="{{ asset('assets/frontend') }}/img/gallery/1.jpg" alt="" />
                        <div class="content">
                            <i class="icofont icofont-search"></i>
                            <h4>Class Test</h4>
                        </div>
                    </a>
                </div>
                <div class="gallery-item cars exam col-lg-3 col-md-4 col-12">
                    <a href="img/gallery/2.jpg" class="gallery-image image-popup">
                        <img src="{{ asset('assets/frontend') }}/img/gallery/2.jpg" alt="" />
                        <div class="content">
                            <i class="icofont icofont-search"></i>
                            <h4>Class Test</h4>
                        </div>
                    </a>
                </div>
                <div class="gallery-item classroom col-lg-3 col-md-4 col-12">
                    <a href="img/gallery/3.jpg" class="gallery-image image-popup">
                        <img src="{{ asset('assets/frontend') }}/img/gallery/3.jpg" alt="" />
                        <div class="content">
                            <i class="icofont icofont-search"></i>
                            <h4>Class Test</h4>
                        </div>
                    </a>
                </div>
                <div class="gallery-item cars students exam col-lg-3 col-md-4 col-12">
                    <a href="img/gallery/4.jpg" class="gallery-image image-popup">
                        <img src="{{ asset('assets/frontend') }}/img/gallery/4.jpg" alt="" />
                        <div class="content">
                            <i class="icofont icofont-search"></i>
                            <h4>Class Test</h4>
                        </div>
                    </a>
                </div>
                <div class="gallery-item cars students col-lg-3 col-md-4 col-12">
                    <a href="img/gallery/5.jpg" class="gallery-image image-popup">
                        <img src="{{ asset('assets/frontend') }}/img/gallery/5.jpg" alt="" />
                        <div class="content">
                            <i class="icofont icofont-search"></i>
                            <h4>Class Test</h4>
                        </div>
                    </a>
                </div>
                <div class="gallery-item students classroom col-lg-3 col-md-4 col-12">
                    <a href="img/gallery/6.jpg" class="gallery-image image-popup">
                        <img src="{{ asset('assets/frontend') }}/img/gallery/6.jpg" alt="" />
                        <div class="content">
                            <i class="icofont icofont-search"></i>
                            <h4>Class Test</h4>
                        </div>
                    </a>
                </div>
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
                        @foreach ($faq_questions as $key => $faq_question)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" aria-expanded="{{ $key == '0' ? 'true' : 'false' }}" href="{{ '#faq-' . $key + 1 }}">{{ $faq_question->question }}</a></h4>
                                </div>
                                <div id="{{ 'faq-' . $key + 1 }}" class="panel-collapse collapse {{ $key == '0' ? 'show' : '' }}" data-parent="#faq">
                                    <div class="panel-body">
                                        <p>{{ $faq_question->answer }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="faq-image col-lg-6 col-12 pl-4">
                    <img src="{{ asset('assets/frontend/img/faq.jpg') }}" alt="" />
                </div>
            </div>
        </div>
    </div>
@endsection
