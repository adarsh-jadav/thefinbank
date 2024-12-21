@include('front.includes.header')
    <!-- Sub banner -->
    <section class="position-relative">
        <div class="container position-relative custome-h-container">
            <div class="row">
			<img src="{{ asset('public/front/assets/images/aboutbanner.jpg') }}" alt="About Us" class="img-fluid" style="border-radius: 20px;">
                <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                    <div class="banner_content" data-aos="fade-up">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- About -->
<section class="aboutpage-con position-relative">
    <figure class="about-rightimage mb-0">
        <img src="{{ asset('public/front/assets/images/about-rightimage.png') }}" alt="image" class="img-fluid">
    </figure>
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 col-sm-12 col-12 order-lg-1 order-2 text-lg-left text-center">
                <div class="about_wrapper position-relative">
                    <figure class="about-image1 image mb-0">
                        <img src="{{ asset('public/front/assets/images/aboutpage-image1.jpg') }}" alt="image" class="img-fluid">
                    </figure>
                    <figure class="about-image2 image mb-0">
                        <img src="{{ asset('public/front/assets/images/aboutpage-image2.jpg') }}" alt="image" class="img-fluid">
                    </figure>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 col-sm-12 col-12 order-lg-2 order-1">
                <div class="about_content">
                    <!--<h6>About Us</h6>-->
                    <h2>We Provide the Best Insurance Policy</h2>
                    <p class="text text-size-16">Reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat maxime place at facere possimus omnis volutas. Reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat maxime place at facere possimus omnis volutas. Reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat maxime place at facere possimus omnis volutas.
                    </p>
                   <!-- <a href="./about.html" class="text-decoration-none all_button">Read More<i class="fa-solid fa-arrow-right"></i></a>-->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Benefit -->
<section class="benefit-con aboutbenefit-con position-relative" style="background: none;">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                <div class="benefit_content">
                    <!--<h6>What We Provide</h6>-->
                    <h2>Benefits if You Have Our Insurance</h2>
                    <p class="text text-size-18 mb-0">Quisruam est qui dolorem ipsum quia dolor sit amer adipisci velit, sed nuia non numuam.</p>
                </div>
            </div>
            <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                <div class="benefit_wrapper position-relative">
                   <ul class="list-unstyled mb-0">
                       <li class="beneft-box">
                            <figure class="icon">
                                <img src="{{ asset('public/front/assets/images/benefit-icon1.png') }}" alt="image" class="img-fluid">
                            </figure>
                            <h5>Complete Insurance Solutions</h5>
                            <p class="text-size-16 mb-0">Dolorem ipsum nuia adieisci velit ruia...</p>
                       </li>
                       <li class="beneft-box">
                            <figure class="icon">
                                <img src="{{ asset('public/front/assets/images/benefit-icon2.png') }}" alt="image" class="img-fluid">
                            </figure>
                            <h5>Risk Management Solutions</h5>
                            <p class="text-size-16 mb-0">Nolorem ipsum nuia adieisci velit ruia...</p>
                       </li>
                       <li class="beneft-box">
                            <figure class="icon">
                                <img src="{{ asset('public/front/assets/images/benefit-icon3.png') }}" alt="image" class="img-fluid">
                            </figure>
                            <h5>Claims Management</h5>
                            <p class="text-size-16 mb-0">Qolorem ipsum nuia adieisci velit ruia...</p>
                        </li>
                   </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Secure -->

<!-- Testimonial -->

@include('front.includes.footer')
