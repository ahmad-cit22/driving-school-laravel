@extends('layouts.frontend')
@section('content')
    <!-- about company ======================================== -->
    <div class="certification-area overlay overlay-white overlay-90 pt-60 pb-60">
        <div class="container">
            <!-- Section Title -->
            <div class="row">
                <div class="section-title text-center col-12 mb-45">
                    <h2 class="mb-3 heading text-center">Who Are We</h2>
                    <i class="icofont icofont-traffic-light  site-text-primary"></i>
                </div>
            </div>
            <div class="row text-center px-5">
                <div class="about-vid">
                    <iframe width="460" height="255" src="{{ $about_part->about_video_link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                <p class="about-text">{{ $about_part->about_text }}</p>
            </div>

            <!-- director's peech ======================================== -->
            <div class="row mt-5">
                <div class="section-title text-center col-12 mb-45">
                    <h3 class="mb-3 heading text-center">Director's Speech</h3>
                    <i class="icofont icofont-traffic-light  site-text-primary"></i>
                </div>
            </div>
            <div class="row px-5 director-box">
                <div class="col-12 col-lg-5 director-pic-box">
                    <img class="director-pic" src="{{ asset('assets/frontend/img/about/' . $director_speech_part->director_image) }}" alt="director-pic" style="width: 340px">
                </div>
                <div class="col-12 col-lg-7 director-text">
                    <p>{{ $director_speech_part->director_speech }}</p>
                    <p>{{ $director_speech_part->director_name }} <br> Executive Director, Pathway</p>
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

    <!-- Video Area ============================================ -->
    <div class="video-area overlay overlay-black overlay-50">
        <div class="container">
            <div class="row">
                <div class="video-content text-center col-12">
                    <a class="video-popup" href="https://www.youtube.com/watch?v=ngaeb1jARAY"><i class="icofont icofont-play-alt-2 site-text-primary-hov"></i></a>
                    <h3>Our Training Process</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Certification Area ============================================ -->
    <div class="certification-area overlay overlay-white overlay-90 pt-60 pb-60">
        <div class="container">
            <!-- Section Title -->
            <div class="row">
                <div class="section-title text-center col-12 mb-45">
                    <h2 class="mb-3 heading text-center">We Are Certified By</h2>
                    <i class="icofont icofont-traffic-light  site-text-primary"></i>
                </div>
            </div>
            <div class="row certification-row">
                @foreach ($certified_by_parts as $certified_by_part)
                    <div class="single-cert text-center col-md-3 col-sm-6 col-12 mb-30">
                        <div>
                            <img class="certificate-logo" src="{{ asset('assets/frontend/img/footer/' . $certified_by_part->certificate_image) }}" alt="{{ $certified_by_part->certificate_image }}" style="width: 180px">
                        </div>
                        <h5 class="mt-3">{{ $certified_by_part->certified_by }}</h5>
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

    {{-- <!-- Modal -->
    <div class="modal fade" id="login-modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div> --}}
@endsection

@section('style')
@endsection

@section('script')
@endsection
