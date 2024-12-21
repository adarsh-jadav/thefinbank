@include('front.includes.header')
<style>
.blog-tabs-inner-section .nav-tabs {
    justify-content: left;
}
.tab-pane h3 {
    font-size: 25px;
	margin-bottom: 25px;
}
.tab-content p{
    font-size: 16px;
    line-height: 24px;
    font-weight: 400;
    color: var(--e-global-color-text);
}
.contact-con{
    background: inherit !important;
}
.enquiry-btn-dis{
    display: none;
}
.form-error{color: red;}
.contact-con .contact_form span {
    font-size: 16px;
    line-height: 12px;
    font-weight: 400;
    bottom: 0;
    left: 0;
    display: block;
    position: absolute;
    color: var(--e-global-color-pure-red);
}
.contact-con .contact_form .form-group {
    margin-bottom: 14px;
}
.message-error {
    font-size: 16px !important;
    line-height: 12px !important;
    font-weight: 400 !important;
    bottom: 180px !important;
    left: 18px !important;
    display: block;
    position: absolute !important;
    color: red !important;
}
.g-recaptcha-error {
    font-size: 16px !important;
    line-height: 12px !important;
    font-weight: 400 !important;
    bottom: 70px !important;
    left: 14px !important;
    display: block;
    position: absolute !important;
    color: var(--e-global-color-pure-red);
}
.captcha-class{
    margin-top: 28px;
}
.enquiry-submit-btn{margin-top: 30px;}
.alert-success {
    color: #FFF;
    background-color: #005aaa !important;
    border-color: #005aaa !important;
}
</style>
 <!-- Sub banner -->
    <!-- Sub banner -->
    <section class="position-relative">
        <div class="container position-relative">
            <div class="row">
			<img src="https://hnrtechnologies.com/thefinbank/public/upload/product-listing/1733131343product_details.png" alt="Product Listing" class="img-fluid">
                <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                    <div class="banner_content" data-aos="fade-up">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
 <!-- Contact -->
<section class="contact-con">
    <div class="container">
        <div class="row">
           {{--  <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="contact_content">
                    <h6 class="text-white">Get a Quote</h6>
                    <h2 class="text-white">Secure Your Family Future With us.</h2>
                    <p class="text-white text-size-18 mb-0">Reiciendis voluptatibus maiores alias perferendis doloribus aseriores.</p>
                </div>
            </div> --}}
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="contact_form">
                    <form id="enquiryForm" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product_detail->id }}">
                        <input type="hidden" name="category_id" value="{{ $product_detail->category_id }}">
                        <input type="hidden" name="token" id="token" value="">
                        <div class="row">
                            <div class="col-12">
                                <ul class="list-unstyled mb-0">
                                    <li class="">
                                        <div class="form-group float-left small_box position-relative">
                                            <input type="text" class="form_style" placeholder="Name" name="name" id="name">
                                            <span class="form-error" id="name_error" style="display: none;"></span>
                                        </div>
                                    </li>
                                    <li class="">
                                        <div class="form-group float-left small_box position-relative">
                                            <input type="email" class="form_style" placeholder="Email" name="email" id="email">
                                            <span class="form-error" id="email_error" style="display: none;"></span>
                                        </div>
                                    </li>
                                    <li class="">
                                        <div class="form-group float-left small_box position-relative">
                                            <input type="text" class="form_style" placeholder="Phone No" name="phone_no" id="phone_no" onkeypress="return validateNumber(event)">
                                            <span class="form-error" id="phone_error" style="display: none;"></span>
                                        </div>
                                    </li>
                                    {{-- <li class="">
                                        <div class="form-group float-left position-relative">
                                            <select class="form-control" required>
                                                <option value="" disabled selected hidden>Insurance Type</option>
                                                <option value="Insurance Type">Insurance Type</option>
                                                <option value="Healty Insurance">Healty Insurance</option>
                                                <option value="Auto Insurance">Auto Insurance</option>
                                                <option value="Life Insurance">Life Insurance</option>
                                            </select>
                                        </div>
                                    </li> --}}
                                    <li class="">
                                        <div class="form-group message">
                                            <textarea class="form_style w-100" placeholder="Message" rows="3" name="message" id="message"></textarea>
                                        </div>
                                        <span class="message-error" id="message_error" style="display: none;"></span>
                                    </li>

                                    <li class="captcha-class">
                                        <div class="form-group message">
                                            <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}" data-callback="onSubmit" name="captachcode"></div>
                                            <span class="g-recaptcha-error" style="color: red;display: none;"></span>
                                        </div>
                                    </li>
                                    <li class="button enquiry-submit-btn">
                                        <div class="manage-button">
                                            <button type="button" id="enquiry_now_btn" class="submit_now text-white text-decoration-none loader-btn" onclick="enquiry_now_form();">Submit Now<i class="fa-solid fa-arrow-right"></i></button>
                                        </div>
                                        <div class="manage-button loader-btn enquiry-btn-dis" id="loader-btn">
                                            <button type="button" class="submit_now text-white text-decoration-none">Please wait...</button>
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
@include('front.includes.footer')

<script>
    function enquiry_now_form() {
            var name = jQuery("#name").val().trim();
            if (name === '') {
                jQuery('#name_error').html("Please enter name").fadeIn().delay(2000).fadeOut();
                $('html, body').animate({
                    scrollTop: $('#name').offset().top - 150
                }, 1000);
                return false;
            }

            var email = jQuery("#email").val().trim();
            if (email === '') {
                jQuery('#email_error').html("Please enter email").fadeIn().delay(2000).fadeOut();
                $('html, body').animate({
                    scrollTop: $('#email').offset().top - 150
                }, 1000);
                return false;
            }

            var emailPattern = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!emailPattern.test(email)) {
                jQuery('#email_error').html("Enter a valid email").fadeIn().delay(2000).fadeOut();
                $('html, body').animate({
                    scrollTop: $('#email').offset().top - 150
                }, 1000);
                return false;
            }

            var phoneNo = jQuery("#phone_no").val().trim();
            if (phoneNo === '') {
                jQuery('#phone_error').html("Please enter your phone number").fadeIn().delay(2000).fadeOut();
                $('html, body').animate({
                    scrollTop: $('#phone_no').offset().top - 150
                }, 1000);
                return false;
            }

            if (phoneNo != '') {
            var filter = /^\d{10}$/;
            if (!filter.test(phoneNo)) {
                jQuery('#phone_error').html("Please Enter Valid Phone Number").fadeIn().delay(2000).fadeOut();
                $('html, body').animate({
                    scrollTop: $('#phone_no').offset().top - 150
                }, 1000);
                return false;
                }
            }

            var message = jQuery("#message").val().trim();
            if (message === '') {
                jQuery('#message_error').html("Please enter message").fadeIn().delay(2000).fadeOut();
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
            $("#enquiry_now_btn").hide();
            $("#loader-btn").show();

                // Prepare form data
                var formData = {
                    name: name,
                    email: email,
                    phone_no: phoneNo,
                    message: message,
                    product_id: $('input[name="product_id"]').val(),
                    category_id: $('input[name="category_id"]').val(),
                    g_token: $('input[name="token"]').val(),
                    _token: "{{ csrf_token() }}" // CSRF token for Laravel
                };

                $.ajax({
                    type: 'POST',
                    url: '{{ route('enquiry-form.store') }}',
                    data: formData,
                    success: function(responses) {
                        if ($.trim(responses.message) == 'TRUE') {
                            $('#result').html(
                                '<div class="alert alert-success alert-dismissible mt-2"><a href="javascript:void(0);" class="close" data-dismiss="alert" aria-label="close" style="float: inline-end;">&times;</a><p style="color:#FFF;">Thank You. Enquiry has been sent successfully.</p></div>'
                            );
                            $("#enquiry_now_btn").show();
                            $("#loader-btn").hide();
                            $('#enquiryForm')[0].reset();
                            $('#token').val("");
                            grecaptcha.reset();

                        } else if ($.trim(responses.message) == 'CAPTCHA') {
                            $('#result').html(
                                '<div class="alert alert-success alert-dismissible mt-2"><a href="javascript:void(0);" class="close" data-bs-dismiss="alert" aria-label="close" style="float: inline-end;">&times;</a><span style="color:red">Invalid Captcha code.</span></div>'
                            );
                            $("#enquiry_now_btn").show();
                            $("#loader-btn").hide();
                        } else {
                            $('#result').html(
                                '<div class="alert alert-success alert-dismissible mt-2"><a href="javascript:void(0);" class="close" data-bs-dismiss="alert" aria-label="close" style="float: inline-end;">&times;</a><span style="color:red">Message not sent.</span></div>'
                            );
                            $("#enquiry_now_btn").show();
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
