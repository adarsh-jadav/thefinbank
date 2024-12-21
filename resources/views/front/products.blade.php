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
			<img src="{{ asset('public/upload/product-listing/large/'.$category_data->listing_image) }}" alt="{{ $category_data->name }}" class="img-fluid">
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
                    <h3>{{ $category_data->name }}</h3>
                </div>
            </div>
        </div>
        <div class="text-center row">
            @if($products_data && !empty($products_data) && count($products_data) > 0)
            @foreach($products_data as $product)
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="service-box">
                    <figure class="icon">
                        @if(!empty($product->image) && $product->image !="")
                        <img src="{{ asset('public/upload/products/large/'.$product->image) }}" alt="{{ $product->name }}" class="img-fluid">
                        @else
                        <img src="{{ asset('public/upload/products/no-image.png') }}" alt="{{ $product->name }}" class="img-fluid">
                        @endif
                    </figure>
                    <h4>{{ $product->name }}</h4>
                    <p class="text-size-16">{!! Helper::getTwoLinesText($product->short_description) !!}</p>
                    <a href="{{ route('loan.category', ['category_page_url' => $category_data->page_url, 'page_url' => $product->page_url]) }}" class="text-decoration-none learn_more">Learn More<i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
            @endforeach
            @endif
           
        </div>
    </div>
</section>
@include('front.includes.footer')