@extends('admin.includes.Template')
@section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Change Password</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Change Password</a></li>
                        <!-- <li class="breadcrumb-item active">Add Change Password</li> -->
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
         @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <strong>Success!</strong> {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        <div id="validate" class="alert alert-danger alert-dismissible fade show" style="display: none;">
            <span id="login_error"></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <!-- <h4 class="card-title">Basic Info</h4> -->
                        <form id="changePasswordForm" action="{{ route('change-password-form') }}" method="POST">
                            @csrf
                            <input type="hidden" name="action" id="action" value="change-password-action">
                            <div class="row form-group">
                                <label for="current_password" class="col-sm-3">Current Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Enter current password">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="new_password" class="col-sm-3">New Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter new password">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="confirm_password" class="col-sm-3">Confirm New Password</label>
                                <div class="col-sm-9">
                                    <div class="mb-3">
                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm your new password">
                                    </div>
                                </div>
                            </div>
                            <div class="text-end">
                                 <button class="btn btn-primary" type="button" disabled id="spinner_button" style="display: none;">
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    Loading...
                                </button>
                                <button type="button" id="submit_button" class="btn btn-primary" onclick="javascript:category_validation()">Save Changes</button>
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
        function category_validation() {
            var current_password = jQuery("#current_password").val();
            if (current_password == '') {
                jQuery('#validate').html("Please Enter Current Password");
                jQuery('#validate').show().delay(0).fadeIn('show');
                jQuery('#validate').show().delay(2000).fadeOut('show');
                $('html, body').animate({
                    scrollTop: $('#validate').offset().top - 150
                }, 1000);
                return false;
            }

            $.ajax({
                type: 'POST',
                url: "{{ url('check-current-password') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "current_password": current_password
                },
                success: function(response) {
                    if ($.trim(response) == "incorrect!")
                    {   $("#validate").html("Incorrect Current Password !");
                        $('#validate').show().delay(0).fadeIn('show');
                        $('#validate').show().delay(2000).fadeOut('show');
                        return false;
                    }else{
                        var new_password = jQuery("#new_password").val();
                        if (new_password == '') {
                            jQuery('#validate').html("Please Enter New Password");
                            jQuery('#validate').show().delay(0).fadeIn('show');
                            jQuery('#validate').show().delay(2000).fadeOut('show');
                            $('html, body').animate({
                                scrollTop: $('#validate').offset().top - 150
                            }, 1000);
                            return false;
                        }
                        
                        var confirm_password = jQuery("#confirm_password").val();
                        if (confirm_password == '') {
                            jQuery('#validate').html("Please Enter Confirm Password");
                            jQuery('#validate').show().delay(0).fadeIn('show');
                            jQuery('#validate').show().delay(2000).fadeOut('show');
                            $('html, body').animate({
                                scrollTop: $('#validate').offset().top - 150
                            }, 1000);
                            return false;
                        }
                        if (confirm_password != new_password) {
                            jQuery('#validate').html("Confirm Password Doesn't Match New Password");
                            jQuery('#validate').show().delay(0).fadeIn('show');
                            jQuery('#validate').show().delay(2000).fadeOut('show');
                            $('html, body').animate({
                                scrollTop: $('#validate').offset().top - 150
                            }, 1000);
                            return false;
                        }

                        $('#spinner_button').show();
                        $('#submit_button').hide();
                        $('#changePasswordForm').submit();
                    }
                }
            });
        }
    </script>
    <script type="text/javascript">
        function validateNumber(event) {
            var key = window.event ? event.keyCode : event.which;
            if (event.keyCode === 8 || event.keyCode === 46) {
                return true;
            } else if (key < 48 || key > 57) {
                return false;
            } else {
                return true;
            }
        }
    </script>
@stop
