<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>
        @if(!empty($meta_title) && $meta_title !="")
            {{ $meta_title }}
        @else
            {{ "The Fin Bank" }}
        @endif
    </title>
    <!-- /SEO Ultimate -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta charset="utf-8">
    @php
        if ($meta_description) {
            $meta_description = $meta_description ?? '';
        } else {
            $meta_description = '';
        }
        if ($meta_keyword) {
            $meta_keyword = $meta_keyword ?? '';
        } else {
            $meta_keyword = '';
        }

    @endphp
    <meta name="description" content="{{ $meta_description }}">
    <meta name="keywords" content="{{ $meta_keyword }}">

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/front/assets/images/favicon/favicon.png') }}">
    <link rel="manifest" href="{{ asset('public/front/assets/images/favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">
    <!-- Latest compiled and minified CSS -->
    <link href="{{ asset('public/front/assets/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/front/assets/js/bootstrap.min.js') }}">
    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- StyleSheet link CSS -->
    <link href="{{ asset('public/front/assets/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/front/assets/css/responsive.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/front/assets/css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/front/assets/css/blog.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/front/assets/css/owl.theme.default.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/front/assets/css/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('public/front/assets/css/magnific-popup.css') }}" rel="stylesheet" type="text/css">
</head>
<style type="text/css">
   body {
    background-image: url("{{ asset('public/front/assets/images/finbank_bg.svg') }}");
    background-repeat: repeat-y;
    background-position: center top;
    background-size: 100% auto;
}


/* 320px — Smallest phones */
@media only screen and (max-width: 320px) {}

/* 480px — Small phones */
@media only screen and (max-width: 480px) {
    .custome-h-container{
        max-width: 1300px !important;
    }
}

/* 768px — Tablets (portrait) */
@media only screen and (max-width: 768px) {
    .custome-h-container{
        max-width: 1300px !important;
    }
}

/* 1024px — Tablets (landscape) */
@media only screen and (max-width: 1024px) {

    .custome-h-container{
        max-width: 1300px !important;
    }
}

/* 1280px — Small desktops */
@media only screen and (max-width: 1280px) {
    .custome-h-container{
        max-width: 1300px !important;
    }
}

/* 1920px — Standard HD screens */
@media only screen and (max-width: 1920px) {
    .custome-h-container{
        max-width: 1300px !important;
    }
}

.custome-nav{
    border: 1px solid #005aaa;
    border-radius: 20px;
    padding: 10px;
}
</style>
<body>
<!-- Back to top button -->
<a id="button"></a>
<div class="home_banner_outer position-relative">
    <header class="header">
        <div class="container custome-h-container custome-nav">
            <nav class="navbar navbar-expand-lg navbar-light p-0">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <figure class="logo mb-0"><img src="{{ asset('public/front/assets/images/logo.png') }}" alt="image" class="img-fluid"></figure>
                </a>
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
					<li class="nav-item active">
                            <a class="nav-link" href="{{ url('/') }}">Home</a>
                        </li>

                        @php
                        $i = 1;
                            $all_category = DB::table('categories')->orderBy('set_order')->get();
                        @endphp
                        @if(!empty($all_category) && count($all_category) > 0)
                        @foreach($all_category as $category)
                        @php
                            $all_products = DB::table('products')->where('category_id',$category->id)->get();
                        @endphp
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle dropdown-color navbar-text-color" href="#"
                                id="navbarDropdown{{ $i }}" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false"> {{ $category->name }} </a>
                            @if(!empty($all_products) && count($all_products) > 0)
                            <div class="dropdown-menu drop-down-content">
                                <ul class="list-unstyled drop-down-pages">
                                    @foreach($all_products as $index => $product)
                                    <li class="nav-item {{ $index === 0 ? 'active' : '' }}"><a class="dropdown-item nav-link" href="{{ route('loan.category', ['category_page_url' => $category->page_url, 'page_url' => $product->page_url]) }}">{{ $product->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </li>
                        @php $i++; @endphp
                        @endforeach
                        @endif





                        <li class="nav-item"><!--mobile view-->
                            <a class="nav-link" href="{{ route('contact-us') }}">Contact Us</a>
                        </li>
                    </ul>
                    <div class=""><!--website view-->
                        <a class="contact_us text-decoration-none" href="{{ route('apply-now') }}">Apply Now <!--<i class="fa-solid fa-arrow-right"></i>--></a>
                    </div>
                </div>
            </nav>
        </div>
    </header>
