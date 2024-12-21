@include('front.includes.header')
<style>
    .contact-form-error{
        color: red;
        margin-top: -23px;
        font-size: 16px;
        margin-left: 10px;
        display: none;
    }
    .contact-form-msg-error{
        color: red;
        margin-top: -8px;
        font-size: 16px;
        margin-left: 10px;
        display: none;
    }
    .contact-btn-dis{
        display: none;
    }

    .alert-success {
        color: #FFF;
        background-color: #005aaa !important;
        border-color: #005aaa !important;
    }
</style>
    <!-- Sub banner -->
    <section class="position-relative">
        <div class="container position-relative custome-h-container">
            <div class="row">
			<img src="{{ asset('public/front/assets/images/product_list.png') }}" alt="About Us" class="img-fluid" style="border-radius: 20px;">
                <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                    <div class="banner_content" data-aos="fade-up">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Contact Info -->
<section class="contactinfo-con">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="contactinfo_content text-center">
                   <!-- <h6>Reach Us</h6>-->
                    <h2>Our Contact Information</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="contact-box">
                    <figure class="icon">
                        <img src="{{ asset('public/front/assets/images/contact-icon1.png') }}" alt="image" class="img-fluid">
                    </figure>
                    <h4>Our Location</h4>
                    <p class="text-size-16">121 King Street Melbourne, 3000, Australia</p>
                    <div class="clearfix"></div>
                    <a href="https://www.google.com/maps/place/121+King+St,+Melbourne+VIC+3000,+Australia/@-37.8172467,144.9532001,17z/data=!3m1!4b1!4m6!3m5!1s0x6ad65d4dd5a05d97:0x3e64f855a564844d!8m2!3d-37.817251!4d144.955775!16s%2Fg%2F11g0g8c54h?entry=ttu"
                        class="text-decoration-none button">Get Directions<i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="contact-box">
                    <figure class="icon">
                        <img src="{{ asset('public/front/assets/images/contact-icon2.png') }}" alt="image" class="img-fluid">
                    </figure>
                    <h4>Phone Number</h4>
                    <a href="tel:05899636995823" class="mb-0 text-decoration-none text-size-16">0-589-96369-95823</a>
                    <a href="tel:082563596471254" class="text-decoration-none text-size-16">0-825-63596-471254</a>
                    <div class="clearfix"></div>
                    <a href="tel:05899636995823" class="text-decoration-none button">Call us Now<i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="contact-box mb-0">
                    <figure class="icon">
                        <img src="{{ asset('public/front/assets/images/contact-icon3.png') }}" alt="image" class="img-fluid">
                    </figure>
                    <h4>Our Email</h4>
                    <a href="mailto:insurerity@gmail.com" class="mb-0 text-decoration-none text-size-16">insurerity@gmail.com</a>
                    <a href="mailto:info@insurerity.com" class="text-decoration-none text-size-16">info@insurerity.com</a>
                    <div class="clearfix"></div>
                    <a href="mailto:insurerity@gmail.com" class="text-decoration-none button">Email us<i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact -->
<section class="contact-con">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="contact_content">
                    <!--<h6>Get a Quote</h6>-->
                    <h2>Secure Your Family Future With us.</h2>
                    <p class="text-size-18 mb-0">Reiciendis voluptatibus maiores alias perferendis doloribus aseriores.</p>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="contact_form">
                    <form id="contactUsForm" method="POST">
                        <input type="hidden" name="token" id="token" value="">
                        <div class="row">
                            <div class="col-12">
                                <ul class="list-unstyled mb-0">
                                    <li class="">
                                        <div class="form-group float-left small_box position-relative">
                                            <input type="text" class="form_style" placeholder="Name" name="name" id="name">
                                            <p class="contact-form-error" id="name-error"></p>
                                        </div>
                                    </li>
                                    <li class="">
                                        <div class="form-group float-left small_box position-relative">
                                            <input type="email" class="form_style" placeholder="Email" name="email" id="email">
                                            <p class="contact-form-error" id="email-error"></p>
                                        </div>
                                    </li>
                                    <li class="">
                                        <div class="form-group float-left position-relative">
                                            <input type="tel" class="form_style" placeholder="Phone" name="phone" id="phone" onkeypress="return validateNumber(event)">
                                            <p class="contact-form-error" id="phone-error"></p>
                                        </div>
                                    </li>
                                    <li class="">
                                        <div class=" form-group message">
                                            <textarea class="form_style w-100" placeholder="Message" rows="3" name="message" id="message"></textarea>
                                            <p class="contact-form-msg-error" id="msg-error"></p>
                                        </div>
                                    </li>
                                    <li class="captcha-class">
                                        <div class="form-group message">
                                            <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}" data-callback="onSubmit" name="captachcode"></div>
                                            <p class="g-recaptcha-error contact-form-msg-error"></p>
                                        </div>
                                    </li>
                                    <li class="button">
                                        <div class="manage-button" id="contactus_btn">
                                            <button type="button" id="submit" class="submit_now text-white text-decoration-none" onclick="contactus_form();">Submit Now<i class="fa-solid fa-arrow-right"></i></button>
                                        </div>
                                        <div class="manage-button loader-btn contact-btn-dis" id="loader-btn">
                                            <button type="button" id="submit" class="submit_now text-white text-decoration-none">
                                                Please wait...
                                            </button>
                                        </div>

                                        <div id="result"></div>
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
<!-- Footer -->
@include('front.includes.footer')
<script>
    function contactus_form() {
            var name = jQuery("#name").val();
            if (name === '') {
                jQuery('#name-error').html("Please enter name").fadeIn().delay(2000).fadeOut();
                $('html, body').animate({
                    scrollTop: $('#name').offset().top - 150
                }, 1000);
                return false;
            }

            var email = jQuery("#email").val();
            if (email === '') {
                jQuery('#email-error').html("Please enter email").fadeIn().delay(2000).fadeOut();
                $('html, body').animate({
                    scrollTop: $('#email').offset().top - 150
                }, 1000);
                return false;
            }

            var emailPattern = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!emailPattern.test(email)) {
                jQuery('#email-error').html("Enter a valid email").fadeIn().delay(2000).fadeOut();
                $('html, body').animate({
                    scrollTop: $('#email').offset().top - 150
                }, 1000);
                return false;
            }

            var phoneNo = jQuery("#phone").val();
            if (phoneNo === '') {
                jQuery('#phone-error').html("Please enter your phone number").fadeIn().delay(2000).fadeOut();
                $('html, body').animate({
                    scrollTop: $('#phone').offset().top - 150
                }, 1000);
                return false;
            }

            if (phoneNo != '') {
            var filter = /^\d{10}$/;
            if (!filter.test(phoneNo)) {
                jQuery('#phone_error').html("Please Enter Valid Phone Number").fadeIn().delay(2000).fadeOut();
                $('html, body').animate({
                    scrollTop: $('#phone').offset().top - 150
                }, 1000);
                return false;
                }
            }

            var message = jQuery("#message").val();
            if (message === '') {
                jQuery('#msg-error').html("Please enter message").fadeIn().delay(2000).fadeOut();
                $('html, body').animate({
                    scrollTop: $('#message').offset().top - 150
                }, 1000);
                return false;
            }

            let checkCaptcha = googleRecaptcha();
            if (checkCaptcha === false || checkCaptcha !== true) {
                return false; // Stop form submission if captcha is not valid
            }

            // Show loader and hide button
            $("#contactus_btn").hide();
            $("#loader-btn").show();

                // Prepare form data
                var formData = {
                    name: name,
                    email: email,
                    phone_no: phoneNo,
                    message: message,
                    g_token: $('input[name="token"]').val(),
                    _token: "{{ csrf_token() }}" // CSRF token for Laravel
                };

                $.ajax({
                    type: 'POST',
                    url: '{{ route('contact-form.store') }}',
                    data: formData,
                    success: function(responses) {
                        if ($.trim(responses.message) == 'TRUE') {
                            $('#result').html(
                                '<div class="alert alert-success alert-dismissible mt-2"><a href="javascript:void(0);" class="close" data-dismiss="alert" aria-label="close" style="float: inline-end;">&times;</a><p style="color:#FFF;">Thank You. Our team will contact you soon.</p></div>'
                            );
                            $("#contactus_btn").show();
                            $("#loader-btn").hide();
                            $('#contactUsForm')[0].reset();
                            $('#token').val("");
                            grecaptcha.reset();

                        } else if ($.trim(responses.message) == 'CAPTCHA') {
                            $('#result').html(
                                '<div class="alert alert-success alert-dismissible mt-2"><a href="javascript:void(0);" class="close" data-bs-dismiss="alert" aria-label="close" style="float: inline-end;">&times;</a><p style="color:red">Invalid Captcha code.</p></div>'
                            );
                            $("#contactus_btn").show();
                            $("#loader-btn").hide();
                        } else {
                            $('#result').html(
                                '<div class="alert alert-success alert-dismissible mt-2"><a href="javascript:void(0);" class="close" data-bs-dismiss="alert" aria-label="close" style="float: inline-end;">&times;</a><p style="color:red">Message not sent.</p></div>'
                            );
                            $("#contactus_btn").show();
                            $("#loader-btn").hide();
                        }

                    }
                });
                //$("#enquiryForm").submit();

}

function googleRecaptcha(){
    if (grecaptcha.getResponse() == "") {
        var response = document.getElementById('token');
        if (response.value !== "") {
            $(".g-recaptcha-error").hide();
            return true;
        }
        if (response.value === "") {
            $(".g-recaptcha-error").show();
            $(".g-recaptcha-error").html("Please complete the reCAPTCHA.").fadeIn().delay(2000).fadeOut();
            return false;
        }
    } else {
        // If reCAPTCHA is completed, hide the error message
        $(".g-recaptcha-error").hide();
        return true;
    }
}

function onSubmit(token) {
    $(".g-recaptcha-error").hide();
    var response = document.getElementById('token');
    response.value = token;
    // document.getElementById("demo-form").submit();
}

function validateNumber(event) {
    var key = event.keyCode || event.which;
    // Allow backspace (8) and delete (46)
    if (key === 8 || key === 46) {
        return true;
    }
    // Allow only numeric keys (48-57)
    if (key >= 48 && key <= 57) {
        return true;
    }
    return false;
}
</script>
