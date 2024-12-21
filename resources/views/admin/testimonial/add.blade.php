@extends('admin.includes.Template')
@section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Testimonial</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('testimonial.index') }}">Testimonial</a></li>
                        <li class="breadcrumb-item active">Add Testimonial</li>
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
                        <form id="banner_form" action="{{ route('testimonial.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input id="name" name="name" type="text" class="form-control"
                                        placeholder="Enter a Name" value="" />

                                    <p class="form-error-text" id="title_error" style="color: red; margin-top: 10px;"></p>
                                </div>
                                <div class="form-group">
                                    <label for="name">Designation</label>
                                    <input id="designation" name="designation" type="text" class="form-control"
                                        placeholder="Enter a Designation" value="" />
                                    <p class="form-error-text" id="designation_error" style="color: red; margin-top: 10px;">
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label for="name">Image (56px X 56px )</label>
                                    <input id="image" name="image" type="file" class="form-control"value="" />
                                    <p class="form-error-text" id="image_error" style="color: red; margin-top: 10px;"></p>
                                </div>
                                <div class="form-group">
                                    <label for="name">Description</label>
                                    <textarea id="description" name="description" class="form-control" placeholder="Enter a Description" /></textarea>
                                    <p class="form-error-text" id="url_error" style="color: red; margin-top: 10px;"></p>
                                </div>
                                <div class="form-group">
                                    <label for="name">Ratings</label>
                                    <select id="ratings" name="ratings" class="form-control">
                                        <option value="">Select Ratings</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                    <p class="form-error-text" id="ratings_error" style="color: red; margin-top: 10px;"></p>
                                </div>
                            </div>
                            <div class="text-end mt-4">
                                <a class="btn btn-primary" href="{{ route('testimonial.index') }}"> Cancel</a>
                                <button class="btn btn-primary mb-1" type="button" disabled id="spinner_button"
                                    style="display: none;">
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    Loading...
                                </button>
                                <button type="button" class="btn btn-primary" id="submit_button"
                                    onclick="javascript:banner_validation()">Submit</button>
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
        $(function() {
            $("#name").keyup(function() {
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
                    scrollTop: $('#name').offset().top - 150
                }, 1000);
                return false;
            }
            var designation = jQuery("#designation").val();
            if (designation == '') {
                jQuery('#designation_error').html("Please Enter a Designation");
                jQuery('#designation_error').show().delay(0).fadeIn('show');
                jQuery('#designation_error').show().delay(2000).fadeOut('show');
                $('html, body').animate({
                    scrollTop: $('#designation').offset().top - 150
                }, 1000);
                return false;
            }
            var image = jQuery("#image").val();
            if (image == '') {
                jQuery('#image_error').html("Please select image");
                jQuery('#image_error').show().delay(0).fadeIn('show');
                jQuery('#image_error').show().delay(2000).fadeOut('show');
                $('html, body').animate({
                    scrollTop: $('#image').offset().top - 150
                }, 1000);
                return false;
            }
            var ratings = jQuery("#ratings").val();
            if (ratings == '') {
                jQuery('#ratings_error').html("Please select a ratings");
                jQuery('#ratings_error').show().delay(0).fadeIn('show');
                jQuery('#ratings_error').show().delay(2000).fadeOut('show');
                $('html, body').animate({
                    scrollTop: $('#ratings').offset().top - 150
                }, 1000);
                return false;
            }

            $('#spinner_button').show();
            $('#submit_button').hide();
            $('#banner_form').submit();
        }
    </script>
@stop
