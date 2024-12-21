@extends('admin.includes.Template')
@section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Product</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product</a></li>
                        <li class="breadcrumb-item active">Add Product</li>
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
                        <form id="product_form" action="{{ route('product.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select id="category_id" name="category_id" class="form-control select">
                                        <option value="" selected>Select Category</option>
                                        @foreach ($category as $cat_data)
                                            <option value="{{ $cat_data->id }}">{{ $cat_data->name }}</option>
                                        @endforeach
                                    </select>
                                    <p class="form-error-text" id="category_id_error" style="color: red; margin-top: 10px;">
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input id="name" name="name" type="text" class="form-control"
                                        placeholder="Enter Name" value="" />

                                    <p class="form-error-text" id="title_error" style="color: red; margin-top: 10px;"></p>
                                </div>
                                <div class="form-group">
                                    <label for="name">Page Url</label>
                                    <input id="page_url" name="page_url" type="text" class="form-control"
                                        placeholder="Enter Page Url" value="" />
                                    <p class="form-error-text" id="page_url_error" style="color: red; margin-top: 10px;">
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label for="name">Image ( 60px X 60px )</label>
                                    <input id="image" name="image" type="file" class="form-control"value="" />
                                    <p class="form-error-text" id="image_error" style="color: red; margin-top: 10px;"></p>
                                </div>

                                <div class="form-group">
                                    <label for="name">Detail Image ( 1500px X 300px )</label>
                                    <input id="detail_image" name="detail_image" type="file"
                                        class="form-control"value="" />
                                    <p class="form-error-text" id="detail_image_error"
                                        style="color: red; margin-top: 10px;"></p>
                                </div>

                                <div class="form-group">
                                    <label for="name">Short Description</label>
                                    <textarea type="text" id="short_description" name="short_description" class="form-control"
                                        placeholder="Enter Short Description"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="name">Key Features</label>
                                    <textarea type="text" id="key-features" name="key_features" class="form-control" placeholder="Enter Key Features"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="name">Details</label>
                                    <textarea type="text" id="details" name="details" class="form-control" placeholder="Enter Details"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="name">Documentation</label>
                                    <textarea type="text" id="documentation" name="documentation" class="form-control"
                                        placeholder="Enter Documentation"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="name">Fees & Charges</label>
                                    <textarea type="text" id="fees_charges" name="fees_charges" class="form-control"
                                        placeholder="Enter Fees & Charges"></textarea>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Meta Title </label>
                                        <input id="meta_title" name="meta_title" type="text" class="form-control"
                                            placeholder="Enter Meta Title" value="" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Meta Keyword </label>
                                        <input id="meta_keyword" name="meta_keyword" type="text" class="form-control"
                                            placeholder="Enter Meta Keyword" value="" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Meta Description</label>
                                        <textarea class="form-control" id="meta_description" name="meta_description" placeholder="Enter Short Description"></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="text-end mt-4">
                                <a class="btn btn-primary" href="{{ route('product.index') }}"> Cancel</a>
                                <button class="btn btn-primary mb-1" type="button" disabled id="spinner_button"
                                    style="display: none;">
                                    <span class="spinner-border spinner-border-sm" role="status"
                                        aria-hidden="true"></span>
                                    Loading...
                                </button>
                                <button type="button" class="btn btn-primary" id="submit_button"
                                    onclick="javascript:product_validation()">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('footer_js')
    {{-- CKEditor CDN --}}
    <script src="{{ asset('public/admin/assets/build/ckeditor.js') }}"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#key-features'), {
                ckfinder: {
                    uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}',
                }
            })
            .catch(error => {

            });

        ClassicEditor
            .create(document.querySelector('#details'), {
                ckfinder: {
                    uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}',
                }
            })
            .catch(error => {

            });

        ClassicEditor
            .create(document.querySelector('#documentation'), {
                ckfinder: {
                    uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}',
                }
            })
            .catch(error => {

            });

        ClassicEditor
            .create(document.querySelector('#fees_charges'), {
                ckfinder: {
                    uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}',
                }
            })
            .catch(error => {

            });
    </script>
    <script>
        $(function() {
            $("#name").keyup(function() {
                var Text = $(this).val();
                Text = Text.toLowerCase();
                Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
                $("#page_url").val(Text);
            });
        });

        function product_validation() {
            var category_id = jQuery("#category_id").val();
            if (category_id == '') {
                jQuery('#category_id_error').html("Please Select Category");
                jQuery('#category_id_error').show().delay(0).fadeIn('show');
                jQuery('#category_id_error').show().delay(2000).fadeOut('show');
                $('html, body').animate({
                    scrollTop: $('#category_id').offset().top - 150
                }, 1000);
                return false;
            }
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
            $('#product_form').submit();
        }
    </script>
@stop
