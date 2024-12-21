@include('front.includes.header')
<style>
.service-con {
    padding: 60px 0 70px;
}
.service_content h3 {
    font-size: 25px;
	margin-bottom: 25px;
}
</style>
   <!-- Sub banner -->
    <section class="position-relative">
        <div class="container position-relative">
            <div class="row">
			<img src="{{ asset('public/front/assets/images/pbanner.png') }}" alt="image" class="img-fluid">
                <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                    <div class="banner_content" data-aos="fade-up">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Service -->
<section class="service-con position-relative">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-10 col-12 mx-auto">
                <div class="service_content text-center">
                    <h3>Unsecured Loans</h3>
                </div>
            </div>
        </div>
        <div class="text-center row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="service-box">
                    <figure class="icon">
                        <img src="{{ asset('public/front/assets/images/service-icon6.png') }}" alt="image" class="img-fluid">
                    </figure>
                    <h4>Business Loan</h4>
                    <p class="text-size-16">Ensure your family's health and well - being with our extensive medical coverage...</p>
                    <a href="{{ route('product-detail') }}" class="text-decoration-none learn_more">Learn More<i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="service-box">
                    <figure class="icon">
                        <img src="{{ asset('public/front/assets/images/service-icon2.png') }}" alt="image" class="img-fluid">
                    </figure>
                    <h4>Business OD</h4>
                    <p class="text-size-16">Protect your family's most valuable asset with our flexible home insurance plans...</p>
                    <a href="{{ route('product-detail') }}" class="text-decoration-none learn_more">Learn More<i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="service-box">
                    <figure class="icon">
                        <img src="{{ asset('public/front/assets/images/service-icon3.png') }}" alt="image" class="img-fluid">
                    </figure>
                    <h4>Personal Loan</h4>
                    <p class="text-size-16">Keep your family safe on the road with our reliable auto insurance options...</p>
                    <a href="{{ route('product-detail') }}" class="text-decoration-none learn_more">Learn More<i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="service-box">
                    <figure class="icon">
                        <img src="{{ asset('public/front/assets/images/service-icon4.png') }}" alt="image" class="img-fluid">
                    </figure> 
                    <h4>Professional Loan to CA</h4>
                    <p class="text-size-16">Plan for your family's future and provide financial security with our customizable life...</p>
                    <a href="{{ route('product-detail') }}" class="text-decoration-none learn_more">Learn More<i class="fa-solid fa-arrow-right"></i></a>
                </div> 
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="service-box">
                    <figure class="icon">
                        <img src="{{ asset('public/front/assets/images/service-icon5.png') }}" alt="image" class="img-fluid">
                    </figure>
                    <h4>Professional Loan to Doctor</h4>
                    <p class="text-size-16">Extend your family's protection beyond standard policies with our umbrella insurance...</p>
                    <a href="{{ route('product-detail') }}" class="text-decoration-none learn_more">Learn More<i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">            
                <div class="service-box">
                    <figure class="icon">
                        <img src="{{ asset('public/front/assets/images/service-icon6.png') }}" alt="image" class="img-fluid">
                    </figure>
                    <h4>Architect Loan</h4>
                    <p class="text-size-16">Simplify your insurance needs and save with our bundled family insurance packages...</p>
                    <a href="{{ route('product-detail') }}" class="text-decoration-none learn_more">Learn More<i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">            
                <div class="service-box">
                    <figure class="icon">
                        <img src="{{ asset('public/front/assets/images/service-icon6.png') }}" alt="image" class="img-fluid">
                    </figure>
                    <h4>Dropline OD</h4>
                    <p class="text-size-16">Simplify your insurance needs and save with our bundled family insurance packages...</p>
                    <a href="{{ route('product-detail') }}" class="text-decoration-none learn_more">Learn More<i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">            
                <div class="service-box">
                    <figure class="icon">
                        <img src="{{ asset('public/front/assets/images/service-icon6.png') }}" alt="image" class="img-fluid">
                    </figure>
                    <h4>Fix & Dropline OD</h4>
                    <p class="text-size-16">Simplify your insurance needs and save with our bundled family insurance packages...</p>
                    <a href="{{ route('product-detail') }}" class="text-decoration-none learn_more">Learn More<i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">            
                <div class="service-box">
                    <figure class="icon">
                        <img src="{{ asset('public/front/assets/images/service-icon6.png') }}" alt="image" class="img-fluid">
                    </figure>
                    <h4>Microfinance Loans</h4>
                    <p class="text-size-16">Simplify your insurance needs and save with our bundled family insurance packages...</p>
                    <a href="{{ route('product-detail') }}" class="text-decoration-none learn_more">Learn More<i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">            
                <div class="service-box">
                    <figure class="icon">
                        <img src="{{ asset('public/front/assets/images/service-icon6.png') }}" alt="image" class="img-fluid">
                    </figure>
                    <h4>Doctor Loan</h4>
                    <p class="text-size-16">Simplify your insurance needs and save with our bundled family insurance packages...</p>
                    <a href="{{ route('product-detail') }}" class="text-decoration-none learn_more">Learn More<i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">            
                <div class="service-box">
                    <figure class="icon">
                        <img src="{{ asset('public/front/assets/images/service-icon6.png') }}" alt="image" class="img-fluid">
                    </figure>
                    <h4>Unsecured OD for Doctor</h4>
                    <p class="text-size-16">Simplify your insurance needs and save with our bundled family insurance packages...</p>
                    <a href="{{ route('product-detail') }}" class="text-decoration-none learn_more">Learn More<i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">            
                <div class="service-box">
                    <figure class="icon">
                        <img src="{{ asset('public/front/assets/images/service-icon6.png') }}" alt="image" class="img-fluid">
                    </figure>
                    <h4>Unsecured OD for CA</h4>
                    <p class="text-size-16">Simplify your insurance needs and save with our bundled family insurance packages...</p>
                    <a href="{{ route('product-detail') }}" class="text-decoration-none learn_more">Learn More<i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
@include('front.includes.footer')