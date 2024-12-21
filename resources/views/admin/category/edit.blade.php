@extends('admin.includes.Template')
@section('content')
	<div class="content container-fluid">
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Edit Category</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category</a></li>
						<li class="breadcrumb-item active">Edit Category</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		<div id="validate" class="alert alert-danger alert-dismissible fade show" style="display: none;">
			<span id="login_error"></span>
				<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<!-- <h4 class="card-title">Basic Info</h4> -->
						<form id="category_form" action="{{ route('category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
							@csrf
							@method('PUT')
							<div class="row">
								<div class="form-group">
									<label for="name">Name</label>
									<input id="name" name="name" type="text" class="form-control" placeholder="Enter Name" value="{{$category->name}}" />
									<p class="form-error-text" id="title_error" style="color: red; margin-top: 10px;"></p>
								</div>
								<div class="form-group">
									<label for="name">Page Url</label>
									<input id="page_url" name="page_url" type="text" class="form-control" placeholder="Enter Page Url" value="{{$category->page_url}}" />
									<p class="form-error-text" id="sub_title_error" style="color: red; margin-top: 10px;"></p>
								</div>
								<div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Sub Title </label>
                                        <input id="sub_title" name="sub_title" type="text" class="form-control"
                                            placeholder="Enter Sub Title" value="{{ $category->sub_title }}" />
                                    </div>
                                </div>
								<div class="form-group">
									<label for="name">Image</label>
									<input id="image" name="image" type="file" class="form-control"value="" />
									<p class="form-error-text" id="image_error" style="color: red; margin-top: 10px;"></p>
									@if($category->image != '')
										<img src="{{ asset('public/upload/category/'.$category->image) }}" style="width: 10%;margin-top: -11px;"/>
									@endif
								</div>
								<div class="form-group">
									<label for="name">Listing Image  (1500px X 300px)</label>
									<input id="listing_image" name="listing_image" type="file" class="form-control"value="" />
									<p class="form-error-text" id="listing_image_error" style="color: red; margin-top: 10px;"></p>
									@if($category->listing_image != '')
										<img src="{{ asset('public/upload/product-listing/'.$category->listing_image) }}" style="width: 10%;margin-top: -11px;"/>
									@endif
								</div>
								<div class="col-md-12">
                                    <div class="form-group">
                                        <label>Short Description</label>
                                        <textarea class="form-control" id="short_description" name="short_description" placeholder="Enter Short Description">{{ $category->short_description }}</textarea>
                                    </div>
                                </div>
								<div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Meta Title </label>
                                        <input id="meta_title" name="meta_title" type="text" class="form-control"
                                            placeholder="Enter Meta Title" value="{{ $category->meta_title }}" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Meta Keyword </label>
                                        <input id="meta_keyword" name="meta_keyword" type="text" class="form-control"
                                            placeholder="Enter Meta Keyword" value="{{ $category->meta_keyword }}" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Meta Description</label>
                                        <textarea class="form-control" id="meta_description" name="meta_description" placeholder="Enter Short Description">{{ $category->meta_description }}</textarea>
                                    </div>
                                </div>
							</div>
							<div class="text-end mt-4">
								<a class="btn btn-primary" href="{{ route('category.index') }}"> Cancel</a>
								
								<button class="btn btn-primary mb-1" type="button" disabled id="spinner_button" style="display: none;">
										<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
										Loading...
								</button>
								
								<button type="button" class="btn btn-primary" id="submit_button"  onclick="javascript:category_validation()">Submit</button>
								<!-- <input type="submit" name="submit" value="Submit" class="btn btn-primary"> -->
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
@section('footer_js')
<script>
	 $(function() 
        {
            $("#name").keyup(function()
            {
                var Text = $(this).val();
                Text = Text.toLowerCase();
                Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
                $("#page_url").val(Text);
            });
        });

        function category_validation() {
             var title = jQuery("#name").val();
             if (title == '') {
                jQuery('#title_error').html("Please Enter Name");
                jQuery('#title_error').show().delay(0).fadeIn('show');
                jQuery('#title_error').show().delay(2000).fadeOut('show');
                $('html, body').animate({
                    scrollTop: $('#title').offset().top - 150
                }, 1000);
                return false;
             }
             var page_url = jQuery("#page_url").val();
             if (page_url == '') {
                jQuery('#page_url_error').html("Please Enter Page Url");
                jQuery('#page_url_error').show().delay(0).fadeIn('show');
                jQuery('#page_url_error').show().delay(2000).fadeOut('show');
                $('html, body').animate({
                    scrollTop: $('#page_url').offset().top - 150
                }, 1000);
                return false;
             }
             
            $('#spinner_button').show();
            $('#submit_button').hide();
            $('#category_form').submit();
        }
    </script>
@stop