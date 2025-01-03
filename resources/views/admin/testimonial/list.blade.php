   @extends('admin.includes.Template')
   @section('content')
       @php
           $userId = Auth::id();

           $get_user_data = Helper::get_user_data($userId);

           $get_permission_data = Helper::get_permission_data($get_user_data->role_id);

           $edit_perm = [];

           if ($get_permission_data->editperm != '') {
               $edit_perm = $get_permission_data->editperm;
               $edit_perm = explode(',', $edit_perm);
           }
           $add_perm = [];
           if ($get_permission_data->addperm != '') {
               $add_perm = $get_permission_data->addperm;
               $add_perm = explode(',', $add_perm);
           }

       @endphp
       <div class="content container-fluid">
           <!-- Page Header -->
           <div class="page-header">
               <div class="row align-items-center">
                   <div class="col">
                       <h3 class="page-title">Testimonial</h3>
                       <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a>
                           </li>
                           <li class="breadcrumb-item active">Testimonial</li>
                       </ul>
                   </div>

                   <div class="col-auto">

                       @if (in_array('11', $add_perm))
                           <a class="btn btn-primary me-1" href="{{ route('testimonial.create') }}">
                               <i class="fas fa-plus"></i> Add Testimonial
                           </a>
                       @endif
                       @if (in_array('11', $edit_perm))
                           <a class="btn btn-danger me-1" href="javascript:void('0');" onclick="delete_banner();">
                               <i class="fas fa-trash"></i> Delete
                           </a>
                       @endif
                       <!--  <a class="btn btn-primary filter-btn" href="javascript:void(0);" id="filter_search">
                                                                                                                                                                 <i class="fas fa-filter"></i> Filter
                                                                                                                                                                 </a> -->
                   </div>

               </div>
           </div>
           <!-- /Page Header -->
           <!-- @if ($message = Session::get('success'))
    <div class="alert alert-success">
                                                                                                                                                                 <p>{{ $message }}</p>
                                                                                                                                                                </div>
    @endif -->
           @if ($message = Session::get('success'))
               <div class="alert alert-success alert-dismissible fade show">
                   <strong>Success!</strong> {{ $message }}
                   <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
               </div>
           @endif
           <div class="alert alert-success alert-dismissible fade show success_show" style="display: none;">
               <strong>Success! </strong><span id="success_message"></span>
               <!-- <button type="button" class="btn-close" data-bs-dismiss="alert"></button> -->
           </div>
           <!-- Search Filter -->
           <div id="filter_inputs" class="card filter-card">
               <div class="card-body pb-0">
                   <div class="row">
                       <div class="col-sm-6 col-md-3">
                           <div class="form-group">
                               <label>Name</label>
                               <input type="text" class="form-control">
                           </div>
                       </div>
                       <div class="col-sm-6 col-md-3">
                           <div class="form-group">
                               <label>Email</label>
                               <input type="text" class="form-control">
                           </div>
                       </div>
                       <div class="col-sm-6 col-md-3">
                           <div class="form-group">
                               <label>Phone</label>
                               <input type="text" class="form-control">
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <!-- /Search Filter -->
           <div class="row">
               <div class="col-sm-12">
                   <div class="card card-table">
                       <div class="card-body">
                           <form id="form" action="{{ route('delete-testimonial') }}" enctype="multipart/form-data">
                               <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand(); ?>">
                               @csrf
                               <div class="table-responsive">
                                   <table class="table table-center table-hover datatable">
                                       <thead class="thead-light">
                                           <tr>
                                               <th>Select</th>
                                               <th>Name</th>
                                               <th>Designation</th>
                                               <th>Image</th>
                                               <th>Ratings</th>
                                               {{-- <th>Ratings</th> --}}
                                               @if (in_array('11', $edit_perm))
                                                   {{-- <th>Set Order</th> --}}
                                                   <th class="text-right">Actions</th>
                                               @endif
                                           </tr>
                                       </thead>
                                       <tbody>
                                           @foreach ($testimonial as $data)
                                               <tr>
                                                   <td><input name="selected[]" id="selected[]" value="{{ $data->id }}"
                                                           type="checkbox" class="minimal-red"
                                                           style="height: 20px;width: 20px;border-radius: 0px;color: red;">
                                                   </td>
                                                   <td>
                                                       {{ $data->name }}
                                                   </td>
                                                   <td>
                                                       {{ $data->designation }}
                                                   </td>

                                                   <td>
                                                       @if ($data->image != '')
                                                           <img src="{{ url('public/upload/testimonial/medium/' . $data->image) }}"
                                                               width="50px" height="50px">
                                                       @else
                                                           {{ '-' }}
                                                       @endif
                                                   </td>
                                                   <td>
                                                       {{ $data->ratings }}
                                                   </td>


                                                   @if (in_array('11', $edit_perm))
                                                       {{-- <td class="left">
                                                           <input type="text" value="{{ $data->set_order }}"
                                                               onchange='updateorder_popup(this.value, "{{ $data->id }}");'
                                                               class="form-control" onkeydown="handleEnter(event, this)" />
                                                       </td> --}}

                                                       <td class="text-right">
                                                           <a class="btn btn-primary"
                                                               href="{{ route('testimonial.edit', $data->id) }}">
                                                               <i class="far fa-edit"></i></a>
                                                       </td>
                                                   @endif
                                               </tr>
                                           @endforeach
                                       </tbody>
                                   </table>
                               </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   @stop
   @section('footer_js')
       <!-- Delete  Modal -->
       <div class="modal custom-modal fade" id="delete_model" role="dialog">
           <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content">
                   <div class="modal-body">
                       <div class="modal-icon text-center mb-3">
                           <i class="fas fa-trash-alt text-danger"></i>
                       </div>
                       <div class="modal-text text-center">
                           <!-- <h3>Delete Expense Category</h3> -->
                           <p>Are you sure want to delete?</p>
                       </div>
                   </div>
                   <div class="modal-footer text-center">
                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                       <button type="button" class="btn btn-primary" onclick="form_sub();">Delete</button>
                   </div>
               </div>
           </div>
       </div>
       <!-- /Delete Modal -->
       <!-- Select one record Category Modal -->
       <div class="modal custom-modal fade" id="select_one_record" role="dialog">
           <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content">
                   <div class="modal-body">
                       <div class="modal-text text-center">
                           <h3>Please select at least one record to delete</h3>
                           <!-- <p>Are you sure want to delete?</p> -->
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!-- /Select one record Category Modal -->
       <!-- set order Modal -->
       <div class="modal custom-modal fade" id="set_order_model" role="dialog">
           <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content">
                   <div class="modal-body">
                       <div class="modal-text text-center">
                           <h3>Are you sure you want to Set order of Banner?</h3>
                           <input type="hidden" name="set_order_val" id="set_order_val" value="">
                           <input type="hidden" name="set_order_id" id="set_order_id" value="">
                           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                           <button type="button" class="btn btn-primary" onclick="updateorder();">Yes</button>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!-- /set orderModal -->

       <!-- sale Modal -->
       <div class="modal custom-modal fade custom_css_model" id="sale_model" role="dialog">
           <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content">
                   <div class="modal-body">
                       <div class="modal-text text-center">
                           <h3 id="sale_poup_text"></h3>
                           <input type="hidden" name="sale_val" id="sale_val" value="">
                           <input type="hidden" name="sale_id" id="sale_id" value="">
                           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                           <button type="button" class="btn btn-primary" onclick="sale_product();">Yes</button>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!-- /sale Modal -->
       <script>
           function delete_banner() {
               // alert('test');
               var checked = $("#form input:checked").length > 0;
               if (!checked) {
                   $('#select_one_record').modal('show');
               } else {
                   $('#delete_model').modal('show');
               }
           }

           function form_sub() {
               $('#form').submit();
           }

           function updateorder(val, id) {
               var id = $('#set_order_id').val();
               var val = $('#set_order_val').val();
               $.ajax({
                   type: "POST",
                   url: "{{ url('banner-set-order') }}",
                   data: {
                       "_token": "{{ csrf_token() }}",
                       "id": id,
                       "val": val
                   },
                   success: function(returnedData) {
                       //alert(returnedData);
                       if (returnedData == 1) {
                           //alert('yes');
                           $('#success_message').text("Set Order has been Updated successfully");
                           //$('.success_show').show();
                           $('.success_show').show().delay(0).fadeIn('show');
                           $('.success_show').show().delay(5000).fadeOut('show');
                           $('#set_order_model').modal('hide');
                       }
                   }
               });
           }

           function updateorder_popup(val, id) {
               //alert(123);return false;
               $('#set_order_val').val(val);
               $('#set_order_id').val(id);
               $('#set_order_model').modal('show');
           }

           function set_home_popup(id, value) {
               $('#sale_id').val(id);
               if (value.checked) {
                   $('#sale_val').val('1');
                   $('#sale_poup_text').text("Are you sure you want add set home banner");
                   $('#sale_model').modal('show');
               } else {
                   $('#sale_val').val('0');
                   $('#sale_poup_text').text("Are you sure you want remove From set home banner");
                   $('#sale_model').modal('show');
               }
           }

           function sale_product() {
               var val_new = $('#sale_val').val();
               var id = $('#sale_id').val();
               $.ajax({
                   type: "POST",
                   url: "{{ url('banner-set-home') }}",
                   data: {
                       "_token": "{{ csrf_token() }}",
                       "id": id,
                       "val": val_new
                   },
                   success: function(returnedData) {
                       if (returnedData == 1) {
                           $('#success_message').text("Set home banner has been Updated successfully");
                           $('.success_show').show().delay(0).fadeIn('show');
                           $('.success_show').show().delay(5000).fadeOut('show');
                           $('#sale_model').modal('hide');
                       }
                   }
               });
           }

           function handleEnter(event, inputElement) {
               if (event.key === "Enter") {
                   event.preventDefault(); // Prevent form submission
                   updateorder_popup(inputElement.value, inputElement.getAttribute("data-id"));
               }
           }
       </script>
   @stop
