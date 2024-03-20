@extends('layouts.app')
@section('style')

@endsection



@section('content')

<main class="main">
    <div class="page-header text-center" style="background-image: url('styles/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">About Us</h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About Us</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content pb-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="about-text text-center mt-3">
                        <h2 class="title text-center mb-2">Who We Are</h2><!-- End .title text-center mb-2 -->
                        <p style="margin-bottom: 100px;">Hey shoppers! We’re a group of Freshmans, creative minds diving into the e-commerce scene with our Sories Thrift Shop. We believe in giving pre-loved fashion a new chapter, offering unique stories through curated vintage finds. Join us on this sustainable style journey – where every purchase tells a tale! #StoriesThriftShop #FashionWithAStory</p>

                        <img src="styles/images/about/about-2/img-1.jpg" alt="image" class="mx-auto mb-6">
                    </div><!-- End .about-text -->
                </div><!-- End .col-lg-10 offset-1 -->
            </div><!-- End .row -->
            <div style="margin-top: 100px; margin-bottom: 100px;" class="row justify-content-center">
                <div class="col-lg-4 col-sm-6">
                    <div class="icon-box icon-box-sm text-center">
                        <span class="icon-box-icon">
                            <i class="icon-puzzle-piece"></i>
                        </span>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Design Quality</h3><!-- End .icon-box-title -->
                            <p>Your online destination for vintage favorites. Explore a curated selection of fashion each item with its own story to tell. Shop securely and effortlessly for one-of-a-kind pieces that add character to your life.</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-lg-4 col-sm-6 -->

                {{-- <div class="col-lg-4 col-sm-6">
                    <div class="icon-box icon-box-sm text-center">
                        <span class="icon-box-icon">
                            <i class="icon-life-ring"></i>
                        </span>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Professional Support</h3><!-- End .icon-box-title -->
                            <p>Your premier online destination for affordable, curated thrifted treasures. Discover unique finds from clothing to home decor with ease and convenience. Shop sustainably and stylishly with us!</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-lg-4 col-sm-6 --> --}}

                <div class="col-lg-4 col-sm-6">
                    <div class="icon-box icon-box-sm text-center">
                        <span class="icon-box-icon">
                            <i class="icon-heart-o"></i>
                        </span>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Made With Love</h3><!-- End .icon-box-title -->
                            <p>Explore our curated e-commerce haven for vintage clothes and accessories. Each piece carries its own tale, waiting for you to unravel. Dive into nostalgia and style, only at StoriesThriftShop.</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-lg-4 col-sm-6 -->
            </div><!-- End .row -->
        </div><!-- End .container -->

        <div class="mb-2"></div><!-- End .mb-2 -->

        <div class="bg-light-2 pt-6 pb-7 mb-6">
            <div class="container">
                <h2 class="title text-center mb-4">Meet Our Developers</h2><!-- End .title text-center mb-2 -->

                <div class="row">
                    <div class="col-sm-6 col-lg-3">
                        <div class="member member-2 text-center">
                            <figure class="member-media">
                                <img src="styles/images/team/about-2/member-1.jpg" alt="member photo">

                                <figcaption class="member-overlay">
                                    <div class="social-icons social-icons-simple">
                                        <a href="https://www.facebook.com/janamay22" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                    </div><!-- End .soial-icons -->
                                </figcaption><!-- End .member-overlay -->
                            </figure><!-- End .member-media -->
                            <div class="member-content">
                                <h3 class="member-title">Janamay C. Abayan<span class="font-weight-bold" style="margin-top: 10px;">Frontend Developer (Web)</span></h3><!-- End .member-title -->
                            </div><!-- End .member-content -->
                        </div><!-- End .member -->
                    </div><!-- End .col-lg-3 -->

                    <div class="col-sm-6 col-lg-3">
                        <div class="member member-2 text-center">
                            <figure class="member-media">
                                <img src="styles/images/team/about-2/member-2.jpg" alt="member photo">

                                <figcaption class="member-overlay">
                                    <div class="social-icons social-icons-simple">
                                        <a href="https://www.facebook.com/MJProntoo" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                    </div><!-- End .soial-icons -->
                                </figcaption><!-- End .member-overlay -->
                            </figure><!-- End .member-media -->
                            <div class="member-content">
                                <h3 class="member-title">Mark Joshua M. Pronto<span class="font-weight-bold" style="margin-top: 10px;">Fullstack Developer (Web)</span></h3><!-- End .member-title -->
                            </div><!-- End .member-content -->
                        </div><!-- End .member -->
                    </div><!-- End .col-lg-3 -->

                    <div class="col-sm-6 col-lg-3">
                        <div class="member member-2 text-center">
                            <figure class="member-media">
                                <img src="styles/images/team/about-2/member-3.jpg" alt="member photo">

                                <figcaption class="member-overlay">
                                    <div class="social-icons social-icons-simple">
                                        <a href="https://www.facebook.com/johnoliver.ferrer.58" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                    </div><!-- End .soial-icons -->
                                </figcaption><!-- End .member-overlay -->
                            </figure><!-- End .member-media -->
                            <div class="member-content">
                                <h3 class="member-title">John Oliver I. Ferrer<span class="font-weight-bold" style="margin-top: 10px;">Fullstack Developer (App)</span></h3><!-- End .member-title -->
                            </div><!-- End .member-content -->
                        </div><!-- End .member -->
                    </div><!-- End .col-lg-3 -->

                    <div class="col-sm-6 col-lg-3">
                        <div class="member member-2 text-center">
                            <figure class="member-media">
                                <img src="styles/images/team/about-2/member-4.jpg" alt="member photo">

                                <figcaption class="member-overlay">
                                    <div class="social-icons social-icons-simple">
                                        <a href="https://www.facebook.com/Flyverk" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                    </div><!-- End .soial-icons -->
                                </figcaption><!-- End .member-overlay -->
                            </figure><!-- End .member-media -->
                            <div class="member-content" style="margin-bottom: 100px;">
                                <h3 class="member-title">Arbeck Biason<span class="font-weight-bold" style="margin-top: 10px;">Frontend Developer (App)</span></h3><!-- End .member-title -->
                            </div><!-- End .member-content -->
                        </div><!-- End .member -->
                    </div><!-- End .col-lg-3 -->
            </div><!-- End .container -->
        </div><!-- End .bg-light-2 pt-6 pb-6 -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

@endsection



@section('script')

@endsection



