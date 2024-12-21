<!-- Footer -->
<section class="footer-con position-relative" style="background: none;border-top: 1px solid #005aaa;">
    <div class="container position-relative">
        <div class="middle_portion">
            <div class="row">
                <div class="col-xl-10 col-12 mx-auto">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                            <div class="logo-content">
                                <a href="{{ url('/')}}" class="footer-logo">
                                    <figure class="mb-0"><img src="{{ asset('public/front/assets/images/logo.png') }}" alt="image"></figure>
                                </a>
                                <!-- <p class="text-size-14 mb-0" style="color: #005aaa;">Duis aute irure dolor in reprehenderit in voluptate velit cillum dolore eu fugiat nulla pariatur.</p> -->
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-4 col-6">
                            <div class="links">
                                <h4 class="heading" style="color: #005aaa;">Useful Links</h4>
                                <ul class="list-unstyled mb-0">
                                    <li><i class="fa-solid fa-circle" style="color: #005aaa;"></i><a href="{{ url('/') }}" class="text-decoration-none" style="color: #005aaa;">Home</a></li>
                                    <li><i class="fa-solid fa-circle" style="color: #005aaa;"></i><a href="{{ route('about-us') }}" class="text-decoration-none" style="color: #005aaa;">About</a></li>
                                    <li><i class="fa-solid fa-circle" style="color: #005aaa;"></i><a href="{{ route('product-all') }}" class="text-decoration-none" style="color: #005aaa;">Product</a></li>
                                    <li><i class="fa-solid fa-circle" style="color: #005aaa;"></i><a href="{{ route('contact-us') }}" class="text-decoration-none" style="color: #005aaa;">Contact Us</a></li>
                                    {{-- <li><i class="fa-solid fa-circle"></i><a href="./blog.html" class="text-decoration-none">Blog</a></li> --}}
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-4 col-6">
                            <div class="contact">
                                <h4 class="heading" style="color: #005aaa;">Contact Info</h4>
                                <ul class="list-unstyled mb-0">
                                    <!-- <li class="text">
                                        <i class="fa-solid fa-phone"></i>
                                        <a href="tel:+61383766284" class="text-decoration-none" style="color: #005aaa;">+61 3 8376 6284</a>
                                    </li> -->
                                    <li class="text">
                                        <i class="fa-solid fa-envelope"></i>
                                        <a href="mailto:info@finanzocom" class="text-decoration-none" style="color: #005aaa;">Info@thefinbank.com</a>
                                    </li>
                                    <li class="text">
                                        <i class="fa-solid fa-location-dot"></i>
                                        <p class="address mb-0" style="color: #005aaa;">21 King Street, SV road,  Mumbai, India</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-4 col-6">
                            <div class="icon">
                                <h4 class="heading" style="color: #005aaa;">Social Networks</h4>
                                <ul class="list-unstyled mb-0 social-icons">
                                    <li><a href="#" class="text-decoration-none"><i class="fa-brands fa-facebook-f social-networks" style="color: #005aaa;"></i></a></li>
                                    <li><a href="#" class="text-decoration-none"><i class="fa-brands fa-x-twitter social-networks"  style="color: #005aaa;" aria-hidden="true"></i></a></li>
                                    <li><a href="#" class="text-decoration-none"><i class="fa-brands fa-linkedin-in social-networks" style="color: #005aaa;"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <p class="mb-0" style="color: #005aaa;">Copyright 2024, theFinBank All Rights Reserved.</p>
    </div>
</section>
<!-- PRE LOADER -->
<!-- <div class="loader-mask">
    <div class="loader">
        <div></div>
        <div></div>
    </div>
</div> -->
<!-- Latest compiled JavaScript -->
<script src="{{ asset('public/front/assets/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('public/front/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('public/front/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/front/assets/js/aos.js') }}"></script>
<script src="{{ asset('public/front/assets/js/owl.carousel.js') }}"></script>
<script src="{{ asset('public/front/assets/js/carousel.js') }}"></script>
<script src="{{ asset('public/front/assets/js/animation.js') }}"></script>
<script src="{{ asset('public/front/assets/js/back-to-top-button.js') }}"></script>
<script src="{{ asset('public/front/assets/js/preloader.js') }}"></script>
<script src="{{ asset('public/front/assets/js/contact-form.js') }}"></script>
<script src="{{ asset('public/front/assets/js/contact-validate.js') }}"></script>
<script src="{{ asset('public/front/assets/js/counter.js') }}"></script>
<script src="{{ asset('public/front/assets/js/video-popup.js') }}"></script>
<script src="{{ asset('public/front/assets/js/video.js') }}"></script>
<!-- Include Google reCAPTCHA script -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>
