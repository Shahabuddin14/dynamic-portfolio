@extends('frontend.base')

@section('title')
    A one page portfolio
@endsection

@section('content')

    <div class="cover-v1 jarallax" style="background-image: url({{ asset($about->background_image) }});" id="home-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7 mx-auto text-center">
                    <h1 class="heading gsap-reveal-hero">{{ $about->nick_name }}</h1>
                    <h2 class="subheading gsap-reveal-hero">{{ $about->short_description }}</h2>
                </div>
            </div>
        </div>
        <a href="#portfolio-section" class="mouse-wrap smoothscroll">
                    <span class="mouse">
                        <span class="scroll"></span>
                    </span>
            <span class="mouse-label">Scroll</span>
        </a>
    </div>
    <!-- END  -->

    <div class="unslate_co--section" id="portfolio-section">
        <div class="container">
            <div class="relative">
                <div class="loader-portfolio-wrap">
                    <div class="loader-portfolio"></div>
                </div>
            </div>
            <div id="portfolio-single-holder"></div>
            <div class="portfolio-wrapper">
                <div class="d-flex align-items-center mb-4 gsap-reveal gsap-reveal-filter">
                    <h2 class="mr-auto heading-h2"><span class="gsap-reveal">Portfolio</span></h2>
                </div>

                <div id="posts" class="row gutter-isotope-item">
                    @foreach($portfolios as $portfolio)
                        <div class="item col-sm-6 col-md-6 col-lg-4 isotope-mb-2">
                            <a href="{{ url('/portfolio/'.$portfolio->slug) }}" class="portfolio-item isotope-item gsap-reveal-img" data-id="1">
                                <div class="overlay">
                                    <div class="portfolio-item-content">
                                        <h3>{{ $portfolio->title }}</h3>
                                    </div>
                                </div>
                                <img src="{{ asset($portfolio->project_image1) }}" class="lazyload  img-fluid" alt="Images" />
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="unslate_co--section">
        <div class="container">
            <div class="owl-carousel logo-slider">
                @foreach($partners as $partner)
                    <div class="logo-v1 gsap-reveal">
                        <img src="{{ $partner->image }}" alt="Image" class="img-fluid">
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="unslate_co--section" id="about-section">
        <div class="container">
            <div class="section-heading-wrap text-center mb-5">
                <h2 class="heading-h2 text-center divider"><span class="gsap-reveal">About Me</span></h2>
                <span class="gsap-reveal">
                    <img src="{{ asset('images/divider.png') }}" alt="divider" width="76">
                </span>
            </div>
            <div class="row mt-5 justify-content-between">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <figure class="dotted-bg gsap-reveal-img ">
                        <img src="{{ asset($about->about_image) }}" alt="Image" class="img-fluid">
                    </figure>
                </div>
                <div class="col-lg-4 pr-lg-5">
                    {!! $about->details !!}
                    <p class="gsap-reveal"><a href="{{ route('cv.download') }}" class="btn btn-outline-pill btn-custom-light">Download my CV</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="unslate_co--section" id="services-section">
        <div class="container">
            <div class="section-heading-wrap text-center mb-5">
                <h2 class="heading-h2 text-center divider"><span class="gsap-reveal">My Services</span></h2>
                <span class="gsap-reveal"><img src="images/divider.png" alt="divider" width="76"></span>
            </div>
            <div class="row gutter-v3">
                @foreach($services as $service)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="feature-v1" data-aos="fade-up" data-aos-delay="0">
                            <div class="wrap-icon mb-3">
                                <img src="{{ asset($service->icon) }}" alt="Image" width="45">
                            </div>
                            <h3>{{ $service->name }}</h3>
                            <p>{!! $service->details !!}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="unslate_co--section section-counter" id="skills-section">
        <div class="container">
            <div class="section-heading-wrap text-center mb-5">
                <h2 class="heading-h2 text-center divider"><span class="gsap-reveal">My Skills</span></h2>
                <span class="gsap-reveal"><img src="{{ asset('images/divider.png') }}" alt="divider" width="76"></span>
            </div>
            <div class="row pt-5">
                @foreach($skills as $skill)
                    <div class="col-6 col-sm-6 mb-5 mb-lg-0 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="0">
                        <div class="counter-v1 text-center">
                        <span class="number-wrap">
                            <span class="number number-counter" data-number="{{ $skill->number }}">0</span>
                            <span class="append-text">%</span>
                        </span>
                            <span class="counter-label">{{ $skill->name }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- END .counter -->

    <div class="unslate_co--section" id="testimonial-section">
        <div class="container">
            <div class="section-heading-wrap text-center mb-5">
                <h2 class="heading-h2 text-center divider"><span class="gsap-reveal">My Happy Clients</span></h2>
                <span class="gsap-reveal"><img src="{{ asset('images/divider.png') }}" alt="divider" width="76"></span>
            </div>
        </div>

        <div class="owl-carousel testimonial-slider" data-aos="fade-up">
            @foreach($testimonials as $testimonial)
                <div>
                    <div class="testimonial-v1">
                        <div class="testimonial-inner-bg">
                            <span class="quote">&ldquo;</span>
                            <blockquote>
                                {{ $testimonial->review }}
                            </blockquote>
                        </div>

                        <div class="testimonial-author-info">
                            <img src="{{ asset($testimonial->image) }}" alt="Image">
                            <h3>{{ $testimonial->name }}</h3>
                            <span class="d-block position">{{ $testimonial->company }}</span>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- END testimonial -->

    <div class="unslate_co--section" id="journal-section">
        <div class="container">
            <div class="section-heading-wrap text-center mb-5">
                <h2 class="heading-h2 text-center divider"><span class="gsap-reveal">My Journal</span></h2>
                <span class="gsap-reveal"><img src="{{ asset('images/divider.png') }}" alt="divider" width="76"></span>
            </div>

            <div class="row gutter-v4 align-items-stretch">
                @foreach($blogs as $blog)
                    <div class="col-sm-6 col-md-6 col-lg-4 blog-post-entry" data-aos="fade-up" data-aos-delay="0">
                        <a href="{{ url('/blog/'.$blog->slug) }}" class="grid-item blog-item w-100 h-100">
                            <div class="overlay">
                                <div class="portfolio-item-content">
                                    <h3>{{ $blog->title }}</h3>
                                    <p class="post-meta">{{ Carbon\Carbon::parse($blog->created_at)->format('d F Y') }}</p>
                                </div>
                            </div>
                            <img src="{{ asset($blog->image) }}" class="lazyload" alt="Image" />
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="pt-3 text-center">
                {{ $blogs->links() }}
            </div>
        </div>
    </div>
    <!-- END blog posts -->

    <div class="unslate_co--section" id="contact-section">
        <div class="container">
            <div class="section-heading-wrap text-center mb-5">
                <h2 class="heading-h2 text-center divider"><span class="gsap-reveal">Get In Touch</span></h2>
                <span class="gsap-reveal"><img src="{{ asset('images/divider.png') }}" alt="divider" width="76"></span>
            </div>

            <div class="row justify-content-between">
                <div class="col-md-6">
                    @if(Session::get('message'))
                        <p class="text-center text-success">{{ Session::get('message') }}</p>
                    @endif

                    <form method="POST" action="{{ url('/contacts') }}" class="form-outline-style-v1">
                        @csrf
                        <div class="form-group row mb-0">
                            <div class="col-lg-6 form-group gsap-reveal">
                                <label for="name">Name</label>
                                <input name="name" type="text" class="form-control" id="name" required />
                            </div>
                            <div class="col-lg-6 form-group gsap-reveal">
                                <label for="email">Email</label>
                                <input name="email" type="email" class="form-control" id="email" required />
                            </div>
                            <div class="col-lg-12 form-group gsap-reveal">
                                <label for="message">Write your message...</label>
                                <textarea name="details" id="message" cols="30" rows="7" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row gsap-reveal">
                            <div class="col-md-12 d-flex align-items-center">
                                <button type="submit" class="btn btn-outline-pill btn-custom-light mr-3">Send Message</button>
                            </div>
                        </div>
                    </form>
                    <div id="form-message-warning" class="mt-4"></div>
                </div>

                <div class="col-md-4">
                    <div class="contact-info-v1">
                        <div class="gsap-reveal d-block">
                            <span class="d-block contact-info-label">Email</span>
                            <a href="#" class="contact-info-val">{{ $about->email_address }}</a>
                        </div>
                        <div class="gsap-reveal d-block">
                            <span class="d-block contact-info-label">Phone</span>
                            <a href="#" class="contact-info-val">{{ $about->phone_number }}</a>
                        </div>
                        <div class="gsap-reveal d-block">
                            <span class="d-block contact-info-label">Address</span>
                            <address class="contact-info-val">{{ $about->address }}</address>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
