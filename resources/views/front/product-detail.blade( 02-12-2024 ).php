@include('front.includes.header')
<style>
.blog-tabs-inner-section .nav-tabs {
    justify-content: left;
}
.tab-pane h3 {
    font-size: 25px;
	margin-bottom: 25px;
}
</style>
 <!-- Sub banner -->
    <section class="position-relative">
        <div class="container position-relative">
            <div class="row">
			<img src="{{ asset('public/front/assets/images/product_details.png') }}" alt="image" class="img-fluid">
                <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                    <div class="banner_content" data-aos="fade-up">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
 <!-- BLOG MAIN SECTION START HERE -->
    <div class="blog-tabs-section padding-top padding-bottom background-gradient">
        <div class="container">
            <div class="blog-tabs-inner-section" data-aos-duration="700">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-expanded="true">Details </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" id="announcements-tab" data-toggle="tab" href="#announcements" role="tab"
                            aria-controls="announcements">Key Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="news-tab" data-toggle="tab" href="#news" role="tab"
                            aria-controls="news">Documentation</a>
                    </li>
                    <!--<li class="nav-item">
                        <a class="nav-link" id="consultation-tab" data-toggle="tab" href="#consultation" role="tab"
                            aria-controls="consultation">Consultation</a>
                    </li>-->
                    <!--<li class="nav-item">
                        <a class="nav-link" id="development-tab" data-toggle="tab" href="#development" role="tab"
                            aria-controls="development">Development</a>
                    </li>-->
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div>
                            <div>
							<h3>Unsecured Business Loan</h3>
							<p class="text text-size-16">An Unsecured BusinessLoan is money you take or  borrow from Bank/NBFC for business need or Business purposes. The Bank or NBFCdoes not require you to pledge security or any mortgage, and you can repay the loan through Monthly Instalments (EMIs). So how do lenders approve loans without any collateral in exchange? Well, they assess your repayment capabilities, i.e., your credit history & Cibil record and income when approving your business Loan. Eligible borrowers can get an Unsecured Business Loan for new business requirements and business expansion, upgrading machinery, funding working Capital, revamping the business space.</p>
							</div>                           
                        </div>
                    </div>
                    
                    <div class="tab-pane fade" id="announcements" role="tabpanel" aria-labelledby="announcements-tab">
                        <div>
                            <div>
							<h3>Key Features</h3>
							<ul>
							<li>100% Unsecured Business Loan/working Capital</li>
							<li>Bankwise Unsecured Loan up to ₹ 75 Lakhs</li>
							<li>Lowest Interest-Reducing 15% onward(Flat ROI 8.5%)</li>
							<li>Collateral Free unsecured loan.</li>
							<li>Tenure: Repayment up to a maximum of 8 years.</li>
							<li>Simple Process and Basic paperwork and easy eligibility conditions</li>
							<li>Very Quick Approval and Disbursement.</li>
							<li>Login to Disbursal process 1-3 Days</li>
							<li>Age-24 Years-65 Years</li>
							<li>Minimum Business Vintage- 2-3 years & Above</li>
							<li>Turnover- 20 Lakh-500 Crore</li>
							</ul>
							<p class="text text-size-16"></p>
							</div>                            
                        </div>
                    </div>
                    <div class="tab-pane fade" id="news" role="tabpanel" aria-labelledby="news-tab">
                        <div>
                            <div>
							<h3>KYC Documents:</h3>
							<ul>
							<li>Firm / Company: PAN Card, Address Proof, GST Registration Certificate (if applicable) and other applicable registrations</li>
							<li>Proprietor / Partner / Director: PAN Card, Aadhaar Card, Electricity Bill / Rent Agreement / Index II</li>
							</ul>
							
							<h3>Income Documents:</h3>
							<ul>
							<li>Income Tax Returns along with computation for latest 2 years (wherever applicable)
							<li>Profit / Loss statement and Balance Sheet for the latest 2 years (wherever applicable)</li>
							<li>GST Returns (wherever applicable)</li>
							
							</ul>
							<p class="text text-size-16"> <b>Bank Account Statement:</b> 12 Months statement in downloaded PDF format.Current/CC/OD A/C Processing Fees, Franking, GST,Insurance- As applicable after Approval.</p>
							</div>
                        </div>
                    </div>
                    <!--<div class="tab-pane fade" id="consultation" role="tabpanel" aria-labelledby="consultation-tab">
                        <div class="single-blog-outer-con">
                            <div class="single-blog-box">
                                <figure class="mb-0">
                                    <img src="{{ asset('public/front/assets/images/single-blog-tab-img6.jpg') }}" alt="single-blog-tab-img6"
                                        loading="lazy" class="img-fluid">
                                </figure>
                                <div class="single-blog-details">
                                    <ul class="list-unstyled">
                                        <li class="position-relative"><i class="fas fa-user"></i> Posted by Admin</li>
                                        <li class="position-relative"><i class="fas fa-calendar-alt"></i> October 30,
                                            2022</li>
                                    </ul>
                                    <h4><a href="single-blog.html">How’s the Economy?</a></h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod. Lorem
                                        ipsum dolor sit amet, consectetur</p>
                                    <div class="generic-btn2">
                                        <a href="single-blog.html">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="single-blog-box">
                                <figure class="mb-0">
                                    <img src="{{ asset('public/front/assets/images/single-blog-tab-img3.jpg') }}" alt="single-blog-tab-img3"
                                        loading="lazy" class="img-fluid">
                                </figure>
                                <div class="single-blog-details">
                                    <ul class="list-unstyled">
                                        <li class="position-relative"><i class="fas fa-user"></i> Posted by Admin</li>
                                        <li class="position-relative"><i class="fas fa-calendar-alt"></i> October 30,
                                            2022</li>
                                    </ul>
                                    <h4><a href="single-blog.html">Our strength, Your Business</a></h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod. Lorem
                                        ipsum dolor sit amet, consectetur</p>
                                    <div class="generic-btn2">
                                        <a href="single-blog.html">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>-->
                    <!--<div class="tab-pane fade" id="development" role="tabpanel" aria-labelledby="development-tab">
                        <div class="single-blog-outer-con">
                            <div class="single-blog-box">
                                <figure class="mb-0">
                                    <img src="{{ asset('public/front/assets/images/single-blog-tab-img4.jpg') }}" alt="single-blog-tab-img4"
                                        loading="lazy" class="img-fluid">
                                </figure>
                                <div class="single-blog-details">
                                    <ul class="list-unstyled">
                                        <li class="position-relative"><i class="fas fa-user"></i> Posted by Admin</li>
                                        <li class="position-relative"><i class="fas fa-calendar-alt"></i> October 30,
                                            2022</li>
                                    </ul>
                                    <h4><a href="single-blog.html">How’s the Economy?</a></h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod. Lorem
                                        ipsum dolor sit amet, consectetur</p>
                                    <div class="generic-btn2">
                                        <a href="single-blog.html">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="single-blog-box">
                                <figure class="mb-0">
                                    <img src="{{ asset('public/front/assets/images/single-blog-tab-img6.jpg') }}" alt="single-blog-tab-img6"
                                        loading="lazy" class="img-fluid">
                                </figure>
                                <div class="single-blog-details">
                                    <ul class="list-unstyled">
                                        <li class="position-relative"><i class="fas fa-user"></i> Posted by Admin</li>
                                        <li class="position-relative"><i class="fas fa-calendar-alt"></i> October 30,
                                            2022</li>
                                    </ul>
                                    <h4><a href="single-blog.html">How’s the Economy?</a></h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod. Lorem
                                        ipsum dolor sit amet, consectetur</p>
                                    <div class="generic-btn2">
                                        <a href="single-blog.html">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>-->
                    <!-- <nav aria-label="...">
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-left"></i></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active">
                                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item"><a class="page-link" href="#">6</a></li>
                            <li class="page-item"><a class="page-link" href="#">7</a></li>
                            <li class="page-item"><a class="page-link" href="#">8</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fas fa-angle-right"></i></a>
                            </li>
                        </ul>
                    </nav> -->
                </div>
            </div>
        </div>
    </div>
@include('front.includes.footer')