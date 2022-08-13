@extends('frontend.base')
@section('title')
    {{ $blog->title }}
@endsection
@section('content')
    <div class="cover-v1 jarallax overlay" style="background-image: url({{ asset($blog->image) }});">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8 mx-auto text-center">
                    <h1 class="blog-heading" data-aos="fade-up" data-aos-delay="0">{{ $blog->title }}</h1>
                    <div class="post-meta" data-aos="fade-up" data-aos-delay="100">{{ Carbon\Carbon::parse($blog->created_at)->format('d F Y') }}</div>
                </div>
            </div>
        </div>
        <!-- dov -->
        <a href="#blog-single-section" class="mouse-wrap smoothscroll">
            <span class="mouse">
                <span class="scroll"></span>
            </span>
            <span class="mouse-label">Scroll</span>
        </a>
    </div>
    <!-- END -->
    <div class="unslate_co--section" id="blog-single-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    {!! $blog->details !!}
                </div>
            </div>
        </div>
    </div>
@endsection
