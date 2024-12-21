@include('front.includes.header')
    <!-- Banner -->
    <section class=" position-relative">
        <div class="container position-relative">
            <div class="row">
			<img src="{{ asset('public/front/assets/images/banner1.png') }}" alt="image" class="img-fluid">
                <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                    <div class="banner_content" data-aos="fade-up">
                        <!--<h5>Welcome to The Fin Bank</h5>
                        <h1>Find the Perfect <span>Home Insurance</span> Coverage!</h1>
                        <p class="text-size-18">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore aeunur pariatur non proident aute irure.</p>-->
                        <!--<div class="button_wrapper">
                            <a href="./contact.html" class="text-decoration-none all_button get_started">Get Started<i class="fa-solid fa-arrow-right"></i></a>
                            <a href="./contact.html" class="text-decoration-none all_button get_quote">Get a Quote<i class="fa-solid fa-arrow-right"></i></a>
                        </div>-->
                    </div>
                </div>
                <!-- <div class="col-lg-5 col-md-12 col-sm-12 col-12 position-relative">
                    <div class="banner_wrapper">
                        <a class="video-icon popup-vimeo" href="{{ asset('public/front/assets/video/video_preview_h264.mp4') }}">
                            <div class="mb-0">
                                <img class="thumb img-fluid" style="cursor: pointer" src="{{ asset('public/front/assets/images/banner2-playicon.png') }}" alt="image">                                    
                            </div>
                        </a>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
</div>
<!-- About -->
<section class="about-con position-relative">
    <figure class="about-rightimage mb-0">
        <img src="{{ asset('public/front/assets/images/about-rightimage.png') }}" alt="image" class="img-fluid">
    </figure>
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 col-sm-12 col-12 order-lg-1 order-2 text-lg-left text-center">
                <div class="about_wrapper position-relative" data-aos="zoom-in">
                    <figure class="about-image1 image mb-0">
                        <img src="{{ asset('public/front/assets/images/about-image1.jpg') }}" alt="image" class="img-fluid">
                    </figure>
                    <figure class="about-image2 image mb-0">
                        <img src="{{ asset('public/front/assets/images/about-image2.jpg') }}" alt="image" class="img-fluid">
                    </figure>
                    <div class="box">
                        <figure class="about-quoteimage">
                            <img src="{{ asset('public/front/assets/images/about-quoteimage.png') }}" alt="image" class="img-fluid">
                        </figure>
                        <h6 class="text-white">Insurance was the best investment i ever made.</h6>
                        <span class="text-white">Rahul Sharma</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 col-sm-12 col-12 order-lg-2 order-1">
                <div class="about_content" data-aos="fade-up">
                    <h6>About Us</h6>
                    <h2>We Provide the Best Insurance Policy</h2>
                    <p class="text text-size-16">Reiciendis voluptatibus maiores alias consequatur aut 
                        perferendis doloribus asperiores repellat maxime place at facere possimus omnis volutas.
                    </p>
                    <a href="#" class="text-decoration-none all_button">Read More<i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Portfolio -->
<section class="portfolio-con position-relative">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="portfolio_content text-center" data-aos="fade-up">
                    <h6>Our Categories</h6>
                    <h2 class="col-lg-8 col-md-10 col-12 mx-auto">Popular Product Categories</h2>
                </div>
            </div>
        </div>
        <div class="row" data-aos="fade-up">
            <div class="owl-carousel owl-theme">
                <div class="item">
                    <div class="portfolio-box">
                        <div class="upper_portion">
                            <figure class="mb-0 portfolio-image">
                                <img src="{{ asset('public/front/assets/images/portfolio-image1.jpg') }}" class="img-fluid" alt="image">
                            </figure>
                            <span class="size-text-14">Assumen</span>
                        </div>
                        <div class="lower_portion_wrapper">
                            <a href="#" class="heading text-decoration-none"><h4>Unsecured Loans</h4></a>
                            <p class="text-size-16">Dolor in reprehenderit in velit esse cillum maiores...</p>
                            <a class="learn_more text-decoration-none" href="./portfolio.html"><i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="portfolio-box">
                        <div class="upper_portion">
                            <figure class="mb-0 portfolio-image">
                                <img src="{{ asset('public/front/assets/images/portfolio-image2.jpg') }}" class="img-fluid" alt="image">
                            </figure>
                            <span class="size-text-14">Rellendus</span>
                        </div>
                        <div class="lower_portion_wrapper">
                            <a href="#" class="heading text-decoration-none"><h4>Secured Loans</h4></a>
                            <p class="text-size-16">Nolor in reprehenderit in velit esse cillum alias...</p>
                            <a class="learn_more text-decoration-none" href="./portfolio.html"><i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="portfolio-box">
                        <div class="upper_portion">
                            <figure class="mb-0 portfolio-image">
                                <img src="{{ asset('public/front/assets/images/portfolio-image3.jpg') }}" class="img-fluid" alt="image">
                            </figure>
                            <span class="size-text-14">Maiores</span>
                        </div>
                        <div class="lower_portion_wrapper">
                            <a href="#" class="heading text-decoration-none"><h4>Other Loans</h4></a>
                            <p class="text-size-16">Golor in reprehenderit in velit esse cillum maiores alias...</p>
                            <a class="learn_more text-decoration-none" href="./portfolio.html"><i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="portfolio-box">
                        <div class="upper_portion">
                            <figure class="mb-0 portfolio-image">
                                <img src="{{ asset('public/front/assets/images/portfolio-image1.jpg') }}" class="img-fluid" alt="image">
                            </figure>
                            <span class="size-text-14">Assumen</span>
                        </div>
                        <div class="lower_portion_wrapper">
                            <a href="#" class="heading text-decoration-none"><h4>Health Insurance</h4></a>
                            <p class="text-size-16">Dolor in reprehenderit in velit esse cillum maiores alias...</p>
                            <a class="learn_more text-decoration-none" href="./portfolio.html"><i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="portfolio-box">
                        <div class="upper_portion">
                            <figure class="mb-0 portfolio-image">
                                <img src="{{ asset('public/front/assets/images/portfolio-image2.jpg') }}" class="img-fluid" alt="image">
                            </figure>
                            <span class="size-text-14">Rellendus</span>
                        </div>
                        <div class="lower_portion_wrapper">
                            <a href="#" class="heading text-decoration-none"><h4>Life Ins & Investments</h4></a>
                            <p class="text-size-16">Nolor in reprehenderit in velit esse cillum maiores alias...</p>
                            <a class="learn_more text-decoration-none" href="./portfolio.html"><i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</section>

<!-- Service -->
<section class="service-con position-relative">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-11 col-12 mx-auto">
                <div class="service_content text-center" data-aos="fade-up">
                    <h6>Our Products</h6>
                    <h2>Most Demanding Insurance & Investment Products</h2>
                </div>
            </div>
        </div>
        <div class="row" data-aos="fade-up">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="text-center service-box">
                    <figure class="icon">
                        <img src="{{ asset('public/front/assets/images/service-icon1.png') }}" alt="image" class="img-fluid">
                    </figure>
                    <h4>Family Health Insurance</h4>
                    <p class="text-size-16">Ensure your family's health and well
                    </p>
                    <a href="#" class="text-decoration-none learn_more">Learn More<i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="text-center service-box">
                    <figure class="icon">
                        <img src="{{ asset('public/front/assets/images/service-icon2.png') }}" alt="image" class="img-fluid">
                    </figure>
                    <h4>Home Loan</h4>
                    <p class="text-size-16">Protect your family's most valuable asset</p>
                    <a href="./service.html" class="text-decoration-none learn_more">Learn More<i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="text-center service-box">
                    <figure class="icon">
                        <img src="{{ asset('public/front/assets/images/service-icon3.png') }}" alt="image" class="img-fluid">
                    </figure>
                    <h4>Car Insurance</h4>
                    <p class="text-size-16">Keep your family safe on the road with our reliable</p>
                    <a href="./service.html" class="text-decoration-none learn_more">Learn More<i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="text-center service-box">
                    <figure class="icon">
                        <img src="{{ asset('public/front/assets/images/service-icon4.png') }}" alt="image" class="img-fluid">
                    </figure> 
                    <h4>Term/Life Insurance</h4>
                    <p class="text-size-16">Plan for your family's future and provide financial security</p>
                    <a href="./service.html" class="text-decoration-none learn_more">Learn More<i class="fa-solid fa-arrow-right"></i></a>
                </div> 
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="text-center service-box">
                    <figure class="icon">
                        <img src="{{ asset('public/front/assets/images/service-icon5.png') }}" alt="image" class="img-fluid">
                    </figure>
                    <h4>Equipment Loan</h4>
                    <p class="text-size-16">Extend your family's protection beyond standard policies</p>
                    <a href="./service.html" class="text-decoration-none learn_more">Learn More<i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">            
                <div class="text-center service-box">
                    <figure class="icon">
                        <img src="{{ asset('public/front/assets/images/service-icon6.png') }}" alt="image" class="img-fluid">
                    </figure>
                    <h4>Saving Plans</h4>
                    <p class="text-size-16">Simplify your needs and save with our bundled</p>
                    <a href="./service.html" class="text-decoration-none learn_more">Learn More<i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="text-center service-box">
                    <figure class="icon">
                        <img src="{{ asset('public/front/assets/images/service-icon2.png') }}" alt="image" class="img-fluid">
                    </figure>
                    <h4>Home Insurance</h4>
                    <p class="text-size-16">Protect your family's most valuable asset</p>
                    <a href="./service.html" class="text-decoration-none learn_more">Learn More<i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="text-center service-box">
                    <figure class="icon">
                        <img src="{{ asset('public/front/assets/images/service-icon1.png') }}" alt="image" class="img-fluid">
                    </figure>
                    <h4>Group health Insurance</h4>
                    <p class="text-size-16">Ensure your Group health and well
                    </p>
                    <a href="#" class="text-decoration-none learn_more">Learn More<i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Secure -->
<section class="secure-con position-relative">
    <figure class="secure-leftimage mb-0">
        <img src="{{ asset('public/front/assets/images/choose-leftimage.png') }}" alt="image" class="image-fluid">
    </figure>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 col-12 mx-auto">
                <div class="secure_content text-center" data-aos="fade-up">
                    <h6 class="text-white">Secure Your Future</h6>
                    <h2 class="text-white">Let’s Get Started Your Insurance Now With Us</h2>
                    <a href="./contact.html" class="text-decoration-none all_button get_started">Get Started<i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Choose -->
<section class="servicechoose-con position-relative">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 col-12 order-lg-1 order-2">
                <div class="choose_content" data-aos="fade-up">
                    <h6>Why Choose Us</h6>
                    <h2>Why We’re Better than Others</h2>
                    <p class="text-size-18">Reiciendis voluptatibus maiores alias consequatu perferendis doloribus asperiores.</p>
                </div>
                <div class="content" data-aos="fade-up">
                    <div class="upper_portion">
                        <div class="choose-box">
                            <figure class="mb-0 icon icon1">
                                <img src="{{ asset('public/front/assets/images/choose-icon1.png') }}" alt="image" class="img-fluid">
                            </figure>
                            <div class="box-content">
                                <span class="value"><span class="number counter">95</span>+</span>
                                <span class="text">Awards Win</span>
                            </div>
                        </div>
                        <div class="choose-box mb-0">
                            <figure class="mb-0 icon icon2">
                                <img src="{{ asset('public/front/assets/images/choose-icon2.png') }}" alt="image" class="img-fluid">
                            </figure>
                            <div class="box-content">
                                <span class="value"><span class="number counter">100</span>%</span>
                                <span class="text">Satisfied Clients</span>
                            </div>
                        </div>
                    </div>
                    <div class="lower_portion">
                        <div class="choose-box">
                            <figure class="mb-0 icon icon2">
                                <img src="{{ asset('public/front/assets/images/choose-icon3.png') }}" alt="image" class="img-fluid">
                            </figure>
                            <div class="box-content">
                                <span class="value"><span class="number counter">320</span>+</span>
                                <span class="text">Insurance Policies</span>
                            </div>
                        </div>
                        <div class="choose-box mb-0">
                            <figure class="mb-0 icon icon1">
                                <img src="{{ asset('public/front/assets/images/choose-icon4.png') }}" alt="image" class="img-fluid">
                            </figure>
                            <div class="box-content">
                                <span class="value"><span class="number counter">150</span>+</span>
                                <span class="text">Employees Working</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-12 order-lg-2 order-1">
                <div class="choose_wrapper position-relative" data-aos="zoom-in">
                    <figure class="choose-image mb-0">
                        <img src="{{ asset('public/front/assets/images/choose-image.jpg') }}" alt="image" class="image-fluid">
                    </figure>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonial -->
<section class="hometestimonial-con position-relative">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="testimonial_content text-center" data-aos="fade-up">
                    <h6>Testimonials</h6>
                    <h2>What Our Clients are Saying</h2>
                </div>
            </div>
        </div>
        <div class="row" data-aos="fade-up">
            <div class="col-12">
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="testimonial-box float-left w-100">
                            <ul class="list-unstyled">
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                            </ul>
                            <p class="text text-size-16">Repudiandae sint et molestiae non recusandae Itaque earum 
                                rerum hic tenetur a sapiente delectus, ut aut reiciendis volupta
                                maiores alias consequatur aut perferendis.
                            </p>
                            <div class="info position-relative float-left w-100">
                                <figure class="user-img mb-0">
                                    <img class="img-fluid" src="{{ asset('public/front/assets/images/testimonial2-personimage1.jpg') }}" alt="image">
                                </figure>
                                <div class="designation-outer">
                                    <span class="name">Alina Parker</span>
                                    <span class="mb-0 position">CEO, Global Tech</span>
                                </div>
                                <figure class="quote-img position-absolute mb-0">
                                    <img class="img-fluid" src="{{ asset('public/front/assets/images/testimonial2-quoteimg.png') }}" alt="image">
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-box float-left w-100">
                            <ul class="list-unstyled">
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                            </ul>
                            <p class="text text-size-16">Quisquam est, qui dolorem ipsum quia dolor sit amet, consecte
                                adipisci velit, sed quia non numquam eius modi tempora incidunt 
                                labore dolore magnam aliquam.
                            </p>
                            <div class="info position-relative float-left w-100">
                                <figure class="user-img mb-0">
                                    <img class="img-fluid" src="{{ asset('public/front/assets/images/testimonial2-personimage2.jpg') }}" alt="image">
                                </figure>
                                <div class="designation-outer">
                                    <span class="name">Kevin Andrew</span>
                                    <span class="mb-0 position">Company Manager</span>
                                </div>
                                <figure class="quote-img position-absolute mb-0">
                                    <img class="img-fluid" src="{{ asset('public/front/assets/images/testimonial2-quoteimg.png') }}" alt="image">
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-box float-left w-100">
                            <ul class="list-unstyled">
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                            </ul>
                            <p class="text text-size-16">Repudiandae sint et molestiae non recusandae Itaque earum 
                                rerum hic tenetur a sapiente delectus, ut aut reiciendis volupta
                                maiores alias consequatur aut perferendis.
                            </p>
                            <div class="info position-relative float-left w-100">
                                <figure class="user-img mb-0">
                                    <img class="img-fluid" src="{{ asset('public/front/assets/images/testimonial2-personimage1.jpg') }}" alt="image">
                                </figure>
                                <div class="designation-outer">
                                    <span class="name">Alina Parker</span>
                                    <span class="mb-0 position">CEO, Global Tech</span>
                                </div>
                                <figure class="quote-img position-absolute mb-0">
                                    <img class="img-fluid" src="{{ asset('public/front/assets/images/testimonial2-quoteimg.png') }}" alt="image">
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-box float-left w-100">
                            <ul class="list-unstyled">
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                            </ul>
                            <p class="text text-size-16">Quisquam est, qui dolorem ipsum quia dolor sit amet, consecte
                                adipisci velit, sed quia non numquam eius modi tempora incidunt 
                                labore dolore magnam aliquam.
                            </p>
                            <div class="info position-relative float-left w-100">
                                <figure class="user-img mb-0">
                                    <img class="img-fluid" src="{{ asset('public/front/assets/images/testimonial2-personimage2.jpg') }}" alt="image">
                                </figure>
                                <div class="designation-outer">
                                    <span class="name">Kevin Andrew</span>
                                    <span class="mb-0 position">Company Manager</span>
                                </div>
                                <figure class="quote-img position-absolute mb-0">
                                    <img class="img-fluid" src="{{ asset('public/front/assets/images/testimonial2-quoteimg.png') }}" alt="image">
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-box float-left w-100">
                            <ul class="list-unstyled">
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                            </ul>
                            <p class="text text-size-16">Repudiandae sint et molestiae non recusandae Itaque earum 
                                rerum hic tenetur a sapiente delectus, ut aut reiciendis volupta
                                maiores alias consequatur aut perferendis.
                            </p>
                            <div class="info position-relative float-left w-100">
                                <figure class="user-img mb-0">
                                    <img class="img-fluid" src="{{ asset('public/front/assets/images/testimonial2-personimage1.jpg') }}" alt="image">
                                </figure>
                                <div class="designation-outer">
                                    <span class="name">Alina Parker</span>
                                    <span class="mb-0 position">CEO, Global Tech</span>
                                </div>
                                <figure class="quote-img position-absolute mb-0">
                                    <img class="img-fluid" src="{{ asset('public/front/assets/images/testimonial2-quoteimg.png') }}" alt="image">
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-box float-left w-100">
                            <ul class="list-unstyled">
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                            </ul>
                            <p class="text text-size-16">Quisquam est, qui dolorem ipsum quia dolor sit amet, consecte
                                adipisci velit, sed quia non numquam eius modi tempora incidunt 
                                labore dolore magnam aliquam.
                            </p>
                            <div class="info position-relative float-left w-100">
                                <figure class="user-img mb-0">
                                    <img class="img-fluid" src="{{ asset('public/front/assets/images/testimonial2-personimage2.jpg') }}" alt="image">
                                </figure>
                                <div class="designation-outer">
                                    <span class="name">Kevin Andrew</span>
                                    <span class="mb-0 position">Company Manager</span>
                                </div>
                                <figure class="quote-img position-absolute mb-0">
                                    <img class="img-fluid" src="{{ asset('public/front/assets/images/testimonial2-quoteimg.png') }}" alt="image">
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Faq -->
<section class="homefaq-con position-relative">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 col-12 order-lg-1 order-2 text-lg-left text-center">
                <div class="faq_wrapper position-relative" data-aos="zoom-in">
                    <figure class="faq-image mb-0">
                        <img src="{{ asset('public/front/assets/images/faq2-image.png') }}" alt="image" class="">
                    </figure>
                    <figure class="faq-logoimage mb-0">
                        <img src="{{ asset('public/front/assets/images/faq2-logoimage.png') }}" alt="image" class="img-fluid">
                    </figure>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-12 order-lg-2 order-1">
                <div class="faq_content" data-aos="fade-up">
                    <h6>Faq’s</h6>
                    <h2>Frequently Asked Questions</h2>
                    <div class="accordian-section-inner position-relative">
                        <div class="accordian-inner">
                            <div id="faq_accordion">
                                <div class="accordion-card">
                                    <div class="card-header" id="headingOne">
                                        <a href="#" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                            <h4>What types of homes do you insure?</h4>
                                        </a>
                                    </div>
                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#faq_accordion">
                                        <div class="card-body">
                                            <p class="text-size-14 text-left mb-0">Our experienced insurance agents can help you assess your family's
                                                needs and recommend the appropriate coverage options based on factors such as your family size
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-card">
                                    <div class="card-header" id="headingTwo">
                                        <a href="#" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            <h4>What does home insurance typically cover?</h4>
                                        </a>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faq_accordion">
                                        <div class="card-body">
                                            <p class="text-size-14 text-left mb-0">Our experienced insurance agents can help you assess your family's
                                                needs and recommend the appropriate coverage options based on factors such as your family size
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-card">
                                    <div class="card-header" id="headingThree">
                                        <a href="#" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            <h4>How do I determine the right coverage for my home?</h4>
                                        </a>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faq_accordion">
                                        <div class="card-body">
                                            <p class="text-size-14 text-left mb-0">Our experienced insurance agents can help you assess your family's
                                                needs and recommend the appropriate coverage options based on factors such as your family size
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-card">
                                    <div class="card-header" id="headingFour">
                                        <a href="#" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            <h4>How do I file a home insurance claim?</h4>
                                        </a>
                                    </div>
                                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#faq_accordion">
                                        <div class="card-body">
                                            <p class="text-size-14 text-left mb-0">Our experienced insurance agents can help you assess your family's
                                                needs and recommend the appropriate coverage options based on factors such as your family size
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <figure class="faq-image mb-0">
        <img src="{{ asset('public/front/assets/images/faq2-image.png') }}" alt="image" class="">
    </figure>
</section>
<!-- Contact -->
<section class="contact-con homecontact-con">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="contact_content" data-aos="fade-up">
                    <h6 class="text-white">Get a Quote</h6>
                    <h2 class="text-white">Secure Your Family Future With us.</h2>
                    <p class="text-white text-size-18 mb-0">Reiciendis voluptatibus maiores alias perferendis doloribus aseriores.</p>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="contact_form" data-aos="fade-up">
                    <form id="contactpage" method="POST">
                        <div class="row">
                            <div class="col-12">
                                <ul class="list-unstyled mb-0">
                                    <li class="">
                                        <div class="form-group float-left small_box position-relative">
                                            <input type="text" class="form_style" placeholder="Name" name="fname" id="fname"> 
                                        </div>
                                    </li>
                                    <li class="">
                                        <div class="form-group float-left small_box position-relative">
                                            <input type="email" class="form_style" placeholder="Email" name="email" id="email">
                                        </div>
                                    </li> 
                                    <li class="">
                                        <div class="form-group float-left position-relative">
                                            <select class="form-control" required>
                                                <option value="" disabled selected hidden>Insurance Type</option>
                                                <option value="Insurance Type">Insurance Type</option>
                                                <option value="Healty Insurance">Healty Insurance</option>
                                                <option value="Auto Insurance">Auto Insurance</option>
                                                <option value="Life Insurance">Life Insurance</option>
                                            </select>
                                        </div>
                                    </li>
                                    <li class="">
                                        <div class=" form-group message">
                                            <textarea class="form_style w-100" placeholder="Message" rows="3" name="msg"></textarea>
                                        </div>
                                    </li>
                                    <li class="button">
                                        <div class="manage-button">
                                            <button type="submit" id="submit" class="submit_now text-white text-decoration-none">Submit Now<i class="fa-solid fa-arrow-right"></i></button>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>            
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@include('front.includes.footer')