@include('front.includes.header')
<style>
    .blog-tabs-inner-section .nav-tabs {
        justify-content: left;
    }

    .tab-pane h3 {
        font-size: 25px;
        margin-bottom: 25px;
    }

    .tab-content p {
        font-size: 16px;
        line-height: 24px;
        font-weight: 400;
        color: var(--e-global-color-text);
    }

    .all_button {
        font-size: 16px;
        line-height: 16px;
        font-weight: 700;
        text-align: center;
        border-radius: 5px;
        position: relative;
        display: inline-block;
        color: var(--e-global-color-white);
        background: var(--e-global-color-accent);
        font-family: "Urbanist", sans-serif;
        transition: all 0.3s ease-in-out;
        padding: 21px 33px;
    }

    .sectopbot {
        padding-top: 40px;
        padding-bottom: 40px;
    }

    .bord {
        border: 1px solid #005aaa;
        border-radius: 8px;
    }
</style>
<!-- Sub banner -->
@if (!empty($product_detail->detail_image) && $product_detail->detail_image != '')
    <section class="position-relative">
        <div class="container position-relative custome-h-container">
            <div class="row">
                <img src="{{ asset('public/upload/products/detail-banner/large/' . $product_detail->detail_image) }}"
                    alt="{{ $product_detail->name }}" class="img-fluid" style="border-radius: 20px;">
                <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                    <div class="banner_content" data-aos="fade-up">
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
@endif
<!-- BLOG MAIN SECTION START HERE -->
<style>
    .rightBtn {
        position: absolute;
        right: 0;
    }

    .rightBtn a {
        font-size: 16px;
        line-height: 8px;
        font-weight: 700;
        min-width: 140px;
        height: 40px;
        padding: 16px;
        border-radius: 25px;
        font-family: "Urbanist", sans-serif;
    }

    @media only screen and (max-width: 767px) {
        .rightBtn {
            position: relative;
            right: 0;
            text-align: center;
            margin-bottom: 20px;
        }
    }
</style>
<div class="blog-tabs-section sectopbot background-gradient">
    <div class="container" style="position: relative;">
    @if (!empty($product_detail->details) || !empty($product_detail->key_features) || !empty($product_detail->documentation))
        <div class="rightBtn">
            <a href="{{ route('enquiry', $product_detail->page_url) }}"
                class="text-decoration-none all_button get_started">Apply Now <!--<i class="fa-solid fa-arrow-right"></i>-->
			</a>
				
            <a href="{{ route('enquiry', $product_detail->page_url) }}"
                class="text-decoration-none all_button get_started"> Calculator <!--<i class="fa-solid fa-arrow-right"></i>-->
			</a>
        </div>
        @endif
        <div class="blog-tabs-inner-section" data-aos-duration="700">
            @if (!empty($product_detail->details) || !empty($product_detail->key_features) || !empty($product_detail->documentation))
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    @if (!empty($product_detail->details) && $product_detail->details != '')
                        <li class="nav-item bord">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-expanded="true">Product Details </a>
                        </li>
                    @endif

                    @if (!empty($product_detail->key_features) && $product_detail->key_features != '')
                        <li class="nav-item bord">
                            <a class="nav-link" id="announcements-tab" data-toggle="tab" href="#announcements"
                                role="tab" aria-controls="announcements">Key Features</a>
                        </li>
                    @endif

                    @if (!empty($product_detail->documentation) && $product_detail->documentation != '')
                        <li class="nav-item bord">
                            <a class="nav-link" id="news-tab" data-toggle="tab" href="#news" role="tab"
                                aria-controls="news">Documentation</a>
                        </li>
                    @endif
                </ul>
                <div class="tab-content" id="myTabContent">
                    @if (!empty($product_detail->details) && $product_detail->details != '')
                        <div class="tab-pane fade show active" id="home" role="tabpanel"
                            aria-labelledby="home-tab">
                            <div>
                                <div>
                                    {!! html_entity_decode($product_detail->details) !!}
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (!empty($product_detail->key_features) && $product_detail->key_features != '')
                        <div class="tab-pane fade" id="announcements" role="tabpanel"
                            aria-labelledby="announcements-tab">
                            <div>
                                <div>
                                    {!! html_entity_decode($product_detail->key_features) !!}
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (!empty($product_detail->documentation) && $product_detail->documentation != '')
                        <div class="tab-pane fade" id="news" role="tabpanel" aria-labelledby="news-tab">
                            <div>
                                <div>
                                    {!! html_entity_decode($product_detail->documentation) !!}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div>
                    <div>
                        <div class="text-center">
                            <a href="{{ route('enquiry', $product_detail->page_url) }}"
                                class="text-decoration-none all_button get_started">Enquiry Now<i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            @else
                <div>
                    <div>
                        <div class="text-center">
                            <p class="text text-size-16">{{ 'No Data Found !' }}</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@include('front.includes.footer')
