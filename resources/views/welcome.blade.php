@extends('frontend.master')
@section('title')
    ADotCurve
@endsection

@section('slider')
    <div class="banner-carousel banner-carousel-1 mb-0">
        <div class="banner-carousel-item" style="background-image:url(frontend/images/slider-main/bg1.jpg)">
            <div class="slider-content">
                <div class="container h-100">
                    <div class="row align-items-center h-100">
                        <div class="col-md-12 text-center">
                            <h2 class="slide-title" data-animation-in="slideInLeft">17 Years of excellence in</h2>
                            <h3 class="slide-sub-title" data-animation-in="slideInRight">Securities Industry</h3>
                            <p data-animation-in="slideInLeft" data-duration-in="1.2">
                                <a href="/register/startup" class="slider btn btn-primary">Start as a Startup</a>
                                <a href="contact.html" class="slider btn btn-primary border">Contact Now</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="banner-carousel-item" style="background-image:url(frontend/images/slider-main/bg2.jpg)">
            <div class="slider-content text-left">
                <div class="container h-100">
                    <div class="row align-items-center h-100">
                        <div class="col-md-12">
                            <h2 class="slide-title-box" data-animation-in="slideInDown">World Class Service</h2>
                            <h3 class="slide-title" data-animation-in="fadeIn">When Service Matters</h3>
                            <h3 class="slide-sub-title" data-animation-in="slideInLeft">Your Choice is Simple</h3>
                            <p data-animation-in="slideInRight">
                                <a href="services.html" class="slider btn btn-primary border">Our Services</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="banner-carousel-item" style="background-image:url(frontend/images/slider-main/bg3.jpg)">
            <div class="slider-content text-right">
                <div class="container h-100">
                    <div class="row align-items-center h-100">
                        <div class="col-md-12">
                            <h2 class="slide-title" data-animation-in="slideInDown">Meet Our Traders</h2>
                            <h3 class="slide-sub-title" data-animation-in="fadeIn">We believe sustainability</h3>
                            <p class="slider-description lead" data-animation-in="slideInRight">We will deal with your failure that determines how you achieve success.</p>
                            <div data-animation-in="slideInLeft">
                                <a href="contact.html" class="slider btn btn-primary" aria-label="contact-with-us">Get Free Quote</a>
                                <a href="about.html" class="slider btn btn-primary border" aria-label="learn-more-about-us">Learn more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('requestQuote')
    <section class="call-to-action-box no-padding">
        <div class="container">
            <div class="action-style-box">
                <div class="row align-items-center">
                    <div class="col-md-8 text-center text-md-left">
                        <div class="call-to-action-text">
                            <h3 class="action-title">We understand your needs on Trading</h3>
                        </div>
                    </div><!-- Col end -->
                    <div class="col-md-4 text-center text-md-right mt-3 mt-md-0">
                        <div class="call-to-action-btn">
                            <a class="btn btn-dark" href="#">Request Quote</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('body')
    <section id="ts-features" class="ts-features">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ts-intro">
                        <h1 class="into-title">WHAT WE DO</h1>
                        <h3 class="into-sub-title">We deliver landmark projects</h3>
                        <p>We give support to the startups and emerging businesses to generate sustainability both early stage and seed stage.
                            We help entrepreneurs to become aware, create strategic contacts, bring their inventions to market and build successful business through a network of media and technology sector connection.
                            From inception to growth, we invest in startups, who have unique techniques. We focus on technology, healthcare, education, power, bio technology, communication, pharmaceuticals, manufacturing and fintech sectors.
                            We believe, honesty, courage, analysis, infrastructure, technology combinedly drive institution to esteemed success.
                            So, we help the startups with support, what they need……</p>
                    </div><!-- Intro box end -->

                    <div class="gap-20"></div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="ts-service-box">
                    <span class="ts-service-icon">
                      <i class="fas fa-trophy"></i>
                    </span>
                                <div class="ts-service-box-content">
                                    <h3 class="service-box-title">We've Repution for Excellence</h3>
                                </div>
                            </div><!-- Service 1 end -->
                        </div><!-- col end -->

                        <div class="col-md-6">
                            <div class="ts-service-box">
                    <span class="ts-service-icon">
                      <i class="fas fa-sliders-h"></i>
                    </span>
                                <div class="ts-service-box-content">
                                    <h3 class="service-box-title">We Build Partnerships</h3>
                                </div>
                            </div><!-- Service 2 end -->
                        </div><!-- col end -->
                    </div><!-- Content row 1 end -->

                    <div class="row">
                        <div class="col-md-6">
                            <div class="ts-service-box">
                    <span class="ts-service-icon">
                      <i class="fas fa-thumbs-up"></i>
                    </span>
                                <div class="ts-service-box-content">
                                    <h3 class="service-box-title">Guided by Commitment</h3>
                                </div>
                            </div><!-- Service 1 end -->
                        </div><!-- col end -->

                        <div class="col-md-6">
                            <div class="ts-service-box">
                    <span class="ts-service-icon">
                      <i class="fas fa-users"></i>
                    </span>
                                <div class="ts-service-box-content">
                                    <h3 class="service-box-title">A Team of Professionals</h3>
                                </div>
                            </div><!-- Service 2 end -->
                        </div><!-- col end -->
                    </div><!-- Content row 1 end -->
                </div><!-- Col end -->

                <div class="col-lg-6 mt-4 mt-lg-0">
                    <h3 class="into-sub-title">Our Values</h3>
                    <p>Minim Austin 3 wolf moon scenester aesthetic, umami odio pariatur bitters. Pop-up occaecat taxidermy street art, tattooed beard literally.</p>

                    <div class="accordion accordion-group" id="our-values-accordion">
                        <div class="card">
                            <div class="card-header p-0 bg-transparent" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Safety
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#our-values-accordion">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidata
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header p-0 bg-transparent" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Customer Service
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#our-values-accordion">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidata
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header p-0 bg-transparent" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Integrity
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#our-values-accordion">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidata
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Accordion end -->

                </div><!-- Col end -->
            </div><!-- Row end -->
        </div><!-- Container end -->
    </section><!-- Feature are end -->


    {{-- WHO WE ARE     --}}

    <section id="main-container" class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="column-title">Who We Are</h3>
                    <p>when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin.</p>
                    <blockquote><p>Semporibus autem quibusdam et aut officiis debitis aut rerum est aut optio cumque nihil necessitatibus autemn ec tincidunt nunc posuere ut</p></blockquote>
                    <p>He lay on his armour-like  back, and if he lifted. ultrices ultrices sapien, nec tincidunt nunc posuere ut. Lorem ipsum dolor sit amet, consectetur adipiscing elit. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn’t anything embarrassing.</p>

                </div><!-- Col end -->

                <div class="col-lg-6 mt-5 mt-lg-0">

                    <div id="page-slider" class="page-slider small-bg">

                        <div class="item" style="background-image:url(frontend/images/slider-pages/slide-page1.jpg)">
                            <div class="container">
                                <div class="box-slider-content">
                                    <div class="box-slider-text">
                                        <h2 class="box-slide-title">Leadership</h2>
                                    </div>
                                </div>
                            </div>
                        </div><!-- Item 1 end -->

                        <div class="item" style="background-image:url(frontend/images/slider-pages/slide-page2.jpg)">
                            <div class="container">
                                <div class="box-slider-content">
                                    <div class="box-slider-text">
                                        <h2 class="box-slide-title">Relationships</h2>
                                    </div>
                                </div>
                            </div>
                        </div><!-- Item 1 end -->

                        <div class="item" style="background-image:url(frontend/images/slider-pages/slide-page3.jpg)">
                            <div class="container">
                                <div class="box-slider-content">
                                    <div class="box-slider-text">
                                        <h2 class="box-slide-title">Performance</h2>
                                    </div>
                                </div>
                            </div>
                        </div><!-- Item 1 end -->
                    </div><!-- Page slider end-->


                </div><!-- Col end -->
            </div><!-- Content row end -->

        </div><!-- Container end -->
    </section><!-- Main container end -->
    <section id="main-container" class="main-container">

        <div class="container">
            <h3 class="column-title">Blog Post </h3>
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-md-4 col-sm-6 col-xs-12 ">
                        <div class="card">
                            <div class="card__header">
                                <img src="{{ asset('assets/blog/'.$post->image)}}" alt="card__image" class="card__image" width="600" height="350">
                            </div>
                            <div class="card__body">
                                <span class="tag tag-blue">{{ $post->title }}</span>
                                <h4>{{ $post->slug }}</h4>
                                <p>{{ $post->description }}</p>
                                <a class="btn btn-primary"  href="singleblog{{'/'}}{{$post->id}}" class="more">Continue Reading</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <section id="facts" class="facts-area dark-bg">
        <div class="container">
            <div class="facts-wrapper">
                <div class="row">
                    <div class="col-md-3 col-sm-6 ts-facts">
                        <div class="ts-facts-img">
                            <img loading="lazy" src="frontend/images/icon-image/fact1.png" alt="facts-img">
                        </div>
                        <div class="ts-facts-content">
                            <h2 class="ts-facts-num"><span class="counterUp" data-count="1789">0</span></h2>
                            <h3 class="ts-facts-title">Total Projects</h3>
                        </div>
                    </div><!-- Col end -->

                    <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-sm-0">
                        <div class="ts-facts-img">
                            <img loading="lazy" src="frontend/images/icon-image/fact2.png" alt="facts-img">
                        </div>
                        <div class="ts-facts-content">
                            <h2 class="ts-facts-num"><span class="counterUp" data-count="647">0</span></h2>
                            <h3 class="ts-facts-title">Staff Members</h3>
                        </div>
                    </div><!-- Col end -->

                    <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-md-0">
                        <div class="ts-facts-img">
                            <img loading="lazy" src="frontend/images/icon-image/fact3.png" alt="facts-img">
                        </div>
                        <div class="ts-facts-content">
                            <h2 class="ts-facts-num"><span class="counterUp" data-count="4000">0</span></h2>
                            <h3 class="ts-facts-title">Hours of Work</h3>
                        </div>
                    </div><!-- Col end -->

                    <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-md-0">
                        <div class="ts-facts-img">
                            <img loading="lazy" src="frontend/images/icon-image/fact4.png" alt="facts-img">
                        </div>
                        <div class="ts-facts-content">
                            <h2 class="ts-facts-num"><span class="counterUp" data-count="44">0</span></h2>
                            <h3 class="ts-facts-title">Countries Experience</h3>
                        </div>
                    </div><!-- Col end -->

                </div> <!-- Facts end -->
            </div>
            <!--/ Content row end -->
        </div>
        <!--/ Container end -->
    </section><!-- Facts end -->


    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="column-title">Testimonials</h3>

                    <div id="testimonial-slide" class="testimonial-slide">
                        <div class="item">
                            <div class="quote-item">
                    <span class="quote-text">
                      Question ran over her cheek When she reached the first hills of the Italic Mountains, she had a last
                      view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the
                      subline of her own road.
                    </span>

                                <div class="quote-item-footer">
                                    <img loading="lazy" class="testimonial-thumb" src="frontend/images/clients/testimonial1.png" alt="testimonial">
                                    <div class="quote-item-info">
                                        <h3 class="quote-author">Gabriel Denis</h3>
                                        <span class="quote-subtext">Chairman, OKT</span>
                                    </div>
                                </div>
                            </div><!-- Quote item end -->
                        </div>
                        <!--/ Item 1 end -->

                        <div class="item">
                            <div class="quote-item">
                    <span class="quote-text">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor inci done idunt ut
                      labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitoa tion ullamco laboris
                      nisi aliquip consequat.
                    </span>

                                <div class="quote-item-footer">
                                    <img loading="lazy" class="testimonial-thumb" src="frontend/images/clients/testimonial2.png" alt="testimonial">
                                    <div class="quote-item-info">
                                        <h3 class="quote-author">Weldon Cash</h3>
                                        <span class="quote-subtext">CFO, First Choice</span>
                                    </div>
                                </div>
                            </div><!-- Quote item end -->
                        </div>
                        <!--/ Item 2 end -->

                        <div class="item">
                            <div class="quote-item">
                    <span class="quote-text">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor inci done idunt ut
                      labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitoa tion ullamco laboris
                      nisi ut commodo consequat.
                    </span>

                                <div class="quote-item-footer">
                                    <img loading="lazy" class="testimonial-thumb" src="frontend/images/clients/testimonial3.png" alt="testimonial">
                                    <div class="quote-item-info">
                                        <h3 class="quote-author">Minter Puchan</h3>
                                        <span class="quote-subtext">Director, AKT</span>
                                    </div>
                                </div>
                            </div><!-- Quote item end -->
                        </div>
                        <!--/ Item 3 end -->

                    </div>
                    <!--/ Testimonial carousel end-->
                </div><!-- Col end -->

                <div class="col-lg-6 mt-5 mt-lg-0">

                    <h3 class="column-title">Happy Clients</h3>

                    <div class="row all-clients">
                        <div class="col-sm-4 col-6">
                            <figure class="clients-logo">
                                <a href="#!"><img loading="lazy" class="img-fluid" src="frontend/images/clients/client1.png" alt="clients-logo" /></a>
                            </figure>
                        </div><!-- Client 1 end -->

                        <div class="col-sm-4 col-6">
                            <figure class="clients-logo">
                                <a href="#!"><img loading="lazy" class="img-fluid" src="frontend/images/clients/client2.png" alt="clients-logo" /></a>
                            </figure>
                        </div><!-- Client 2 end -->

                        <div class="col-sm-4 col-6">
                            <figure class="clients-logo">
                                <a href="#!"><img loading="lazy" class="img-fluid" src="frontend/images/clients/client3.png" alt="clients-logo" /></a>
                            </figure>
                        </div><!-- Client 3 end -->

                        <div class="col-sm-4 col-6">
                            <figure class="clients-logo">
                                <a href="#!"><img loading="lazy" class="img-fluid" src="frontend/images/clients/client4.png" alt="clients-logo" /></a>
                            </figure>
                        </div><!-- Client 4 end -->

                        <div class="col-sm-4 col-6">
                            <figure class="clients-logo">
                                <a href="#!"><img loading="lazy" class="img-fluid" src="frontend/images/clients/client5.png" alt="clients-logo" /></a>
                            </figure>
                        </div><!-- Client 5 end -->

                        <div class="col-sm-4 col-6">
                            <figure class="clients-logo">
                                <a href="#!"><img loading="lazy" class="img-fluid" src="frontend/images/clients/client6.png" alt="clients-logo" /></a>
                            </figure>
                        </div><!-- Client 6 end -->

                    </div><!-- Clients row end -->

                </div><!-- Col end -->

            </div>
            <!--/ Content row end -->
        </div>
        <!--/ Container end -->
    </section><!-- Content end -->

    <section class="subscribe no-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="subscribe-call-to-acton">
                        <h3>Can We Help?</h3>
                        <h4>+8801847287653</h4>
                    </div>
                </div><!-- Col end -->

                <div class="col-md-8">
                    <div class="ts-newsletter row align-items-center">
                        <div class="col-md-5 newsletter-introtext">
                            <h4 class="text-white mb-0">Newsletter Sign-up</h4>
                            <p class="text-white">Latest updates and news</p>
                        </div>

                        <div class="col-md-7 newsletter-form">
                            <form action="#" method="post">
                                <div class="form-group">
                                    <label for="newsletter-email" class="content-hidden">Newsletter Email</label>
                                    <input type="email" name="email" id="newsletter-email" class="form-control form-control-lg" placeholder="Your your email and hit enter" autocomplete="off">
                                </div>
                            </form>
                        </div>
                    </div><!-- Newsletter end -->
                </div><!-- Col end -->

            </div><!-- Content row end -->
        </div>
        <!--/ Container end -->
    </section>
    <!--/ subscribe end -->



@endsection