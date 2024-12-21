@extends('admin.includes.Template')
@section('content')
	<div class="content container-fluid">
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Edit Banner</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="{{ route('banner.index') }}">Banner</a></li>
						<li class="breadcrumb-item active">Edit Banner</li>
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
						<form id="banner_form" action="{{ route('banner.update',$banner->id) }}" method="POST" enctype="multipart/form-data">
							@csrf
							@method('PUT')
							<div class="row">
								<div class="form-group">
									<label for="name">Name</label>
									<input id="name" name="name" type="text" class="form-control" placeholder="Enter Name" value="{{$banner->name}}" />
									<p class="form-error-text" id="title_error" style="color: red; margin-top: 10px;"></p>
								</div>
								
								<div class="form-group">
									<label for="name">Image ( 1500px X 410px )</label>
									<input id="image" name="image" type="file" class="form-control"value="" />
									<p class="form-error-text" id="image_error" style="color: red; margin-top: 10px;"></p>
									@if($banner->image != '')
										<img src="{{ asset('public/upload/banner/'.$banner->image) }}" style="width: 10%;margin-top: -11px;"/>
									@endif
								</div>

								<div class="form-group">
                                    <label for="name">Url</label>
                                    <input id="url" name="url" type="text" class="form-control"
                                        placeholder="Enter Url" value="{{$banner->url}}" />
                                        <p class="form-error-text" id="url_error" style="color: red; margin-top: 10px;"></p>
                                </div>
							</div>
							<div class="text-end mt-4">
								<a class="btn btn-primary" href="{{ route('banner.index') }}"> Cancel</a>
								
								<button class="btn btn-primary mb-1" type="button" disabled id="spinner_button" style="display: none;">
										<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
										Loading...
								</button>
								
								<button type="button" class="btn btn-primary" id="submit_button"  onclick="javascript:banner_validation()">Submit</button>
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

        function banner_validation() {
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
            $('#banner_form').submit();
        }
    </script>
@stop