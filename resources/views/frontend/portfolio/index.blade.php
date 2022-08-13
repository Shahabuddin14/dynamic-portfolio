@extends('frontend.base')
@section('title')
    Portfolio
@endsection
@section('content')
    <div class="cover-v1 gradient-bottom-black jarallax">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-10 mx-auto text-center">
                    <h1 class="heading" data-aos="fade-up">{{ $portfolio->title }}</h1>
                </div>
            </div>
        </div>
        <!-- dov -->
        <a href="#portfolio-single-section" class="mouse-wrap smoothscroll">
            <span class="mouse">
                <span class="scroll"></span>
            </span>
            <span class="mouse-label">Scroll</span>
        </a>
    </div>
    <!-- END .cover-v1 -->
    <div class="container">
        <div class="portfolio-single-wrap unslate_co--section" id="portfolio-single-section">
            <div class="portfolio-single-inner">
                <h2 class="heading-portfolio-single-h2">{{ $portfolio->title }}</h2>
                <div class="row justify-content-between align-items-stretch">
                    <div class="col-lg-8">
                        <p><a href="{{ asset($portfolio->project_image1) }}" data-fancybox="gal"><img src="{{ asset($portfolio->project_image1) }}" alt="Image" class="img-fluid"></a></p>
                        <p><a href="{{ asset($portfolio->project_image2) }}" data-fancybox="gal"><img src="{{ asset($portfolio->project_image2) }}" alt="Image" class="img-fluid"></a></p>
                    </div>
                    <div class="col-lg-4 pl-lg-5">
                        <div class="unslate_co--sticky">
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <div class="detail-v1">
                                        <span class="detail-label">Project Description</span>
                                        {!! $portfolio->description !!}
                                    </div>
                                </div>

                                <div class="col-md-12 mb-4">
                                    <div class="detail-v1">
                                        <span class="detail-label">Project Date</span>
                                        <span class="detail-val">{{ Carbon\Carbon::parse($portfolio->start_date)->format('d F Y') }}</span>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-4">
                                    <div class="detail-v1">
                                        <span class="detail-label">Client</span>
                                        <span class="detail-val">{{ $portfolio->client_name }}</span>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <div class="detail-v1">
                                        <span class="detail-label">Visit</span>
                                        <span class="detail-val"><a href="{{ $portfolio->project_link }}"></a>{{ $portfolio->project_link }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
