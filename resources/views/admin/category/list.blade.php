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
                       <h3 class="page-title">Category</h3>
                       <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a>
                           </li>
                           <li class="breadcrumb-item active">Category</li>
                       </ul>
                   </div>
                  
                       <div class="col-auto">
                        
                            @if (in_array('4', $add_perm))
                                <a class="btn btn-primary me-1" href="{{ route('category.create') }}">
                                    <i class="fas fa-plus"></i> Add Category
                                </a>
                            @endif
                            @if (in_array('4', $edit_perm))
                                <a class="btn btn-danger me-1" href="javascript:void('0');" onclick="delete_category();">
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
                           <form id="form" action="{{ route('delete-category') }}" enctype="multipart/form-data">
                               <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand(); ?>">
                               @csrf
                               <div class="table-responsive">
                                   <table class="table table-center table-hover datatable" id="example">
                                       <thead class="thead-light">
                                           <tr>
                                            @if (in_array('4', $edit_perm))
                                               <th>Select</th>
                                               @endif
                                               <th>Name</th>
                                               <th>Page Url</th>
                                               @if (in_array('4', $edit_perm))
                                               {{-- <th>Set Home 1</th>
                                               <th>Set Home 2</th> --}}
                                               <th>Set Order</th>
                                               <th class="text-right">Actions</th>
                                               @endif
                                           </tr>
                                       </thead>
                                       <tbody>
                                           @foreach ($category_data as $data)
                                               <tr>
                                                @if (in_array('4', $edit_perm))
                                                   <td><input name="selected[]" id="selected[]" value="{{ $data->id }}"
                                                           type="checkbox" class="minimal-red"
                                                           style="height: 20px;width: 20px;border-radius: 0px;color: red;">
                                                   </td>
                                                   @endif
                                                   <td>
                                                       {{ $data->name }}
                                                   </td>
                                                   <td>{{ $data->page_url }}</td>
                                                   
                                                   @if (in_array('4', $edit_perm))
                                                   {{-- <td>
                                                    <input type="checkbox" id="set_home_1" name="set_home_1"
                                                        value="1"
                                                        onclick="set_home_popup_1('{{ $data->id }}',this);"
                                                        <?php if ($data->set_home_1 == '1') {
                                                            echo 'checked';
                                                        } ?>>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" id="set_home_2" name="set_home_2"
                                                            value="1"
                                                            onclick="set_home_popup_2('{{ $data->id }}',this);"
                                                            <?php if ($data->set_home_2 == '1') {
                                                                echo 'checked';
                                                            } ?>>
                                                    </td> --}}

                                                <td class="left"><input type="text" value="{{ $data->set_order }}"
                                                    onchange="updateorder_popup(this.value, '{{ $data->id }}');"
                                                    class="form-control" /></td>


                                                       <td class="text-right">
                                                           <a class="btn btn-primary"
                                                               href="{{ route('category.edit', $data->id) }}"><i
                                                                   class="far fa-edit"></i></a>
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
                        <h3>Are you sure you want to Set order of Category</h3>
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
    <div class="modal custom-modal fade custom_css_model" id="sale_model_1" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-text text-center">
                        <h3 id="sale_poup_text_1"></h3>
                        <input type="hidden" name="sale_val_1" id="sale_val_1" value="">
                        <input type="hidden" name="sale_id_1" id="sale_id_1" value="">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <button type="button" class="btn btn-primary" onclick="sale_product_1();">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /sale Modal -->
    <!-- sale Modal 2-->
    <div class="modal custom-modal fade custom_css_model" id="sale_model_2" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-text text-center">
                        <h3 id="sale_poup_text_2"></h3>
                        <input type="hidden" name="sale_val_2" id="sale_val_2" value="">
                        <input type="hidden" name="sale_id_2" id="sale_id_2" value="">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <button type="button" class="btn btn-primary" onclick="sale_product_2();">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /sale Modal 2 -->
   <script>
       function delete_category() {
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
       function updateorder_popup(val, id) {
           $('#set_order_val').val(val);
           $('#set_order_id').val(id);
           $('#set_order_model').modal('show');
       }
       function updateorder(val, id) {
           var id = $('#set_order_id').val();
           var val = $('#set_order_val').val();
           $.ajax({
               type: "POST",
               url: "{{ url('set_order_category') }}",
               data: {
                   "_token": "{{ csrf_token() }}",
                   "id": id,
                   "val": val
               },
               success: function(returnedData) {
                   // alert(returnedData);
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
           $('#set_order_val').val(val);
           $('#set_order_id').val(id);
           $('#set_order_model').modal('show');
       }

       function updateorder(val, id) {
           var id = $('#set_order_id').val();
           var val = $('#set_order_val').val();

           $.ajax({
               type: "POST",
               url: "{{ url('category-set-order') }}",
               data: {
                   "_token": "{{ csrf_token() }}",
                   "id": id,
                   "val": val
               },
               success: function(returnedData) {
                   // alert(returnedData);
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

       function set_home_popup_1(id, value) {
           $('#sale_id_1').val(id);
           if (value.checked) {
               $('#sale_val_1').val('1');
               $('#sale_poup_text_1').text("Are you sure you want add set home 1 category");
               $('#sale_model_1').modal('show');
           } else {
               $('#sale_val_1').val('0');
               $('#sale_poup_text_1').text("Are you sure you want remove From set home 1 category");
               $('#sale_model_1').modal('show');
           }
       }

       function set_home_popup_2(id, value) {
           $('#sale_id_2').val(id);
           if (value.checked) {
               $('#sale_val_2').val('1');
               $('#sale_poup_text_2').text("Are you sure you want add set home 2 category");
               $('#sale_model_2').modal('show');
           } else {
               $('#sale_val_2').val('0');
               $('#sale_poup_text_2').text("Are you sure you want remove From set home 2 category");
               $('#sale_model_2').modal('show');
           }
       }

       function sale_product_1() {
           var val_new = $('#sale_val_1').val();
           var id = $('#sale_id_1').val();
           $.ajax({
               type: "POST",
               url: "{{ url('category-set-home-1') }}",
               data: {
                   "_token": "{{ csrf_token() }}",
                   "id": id,
                   "val": val_new
               },
               success: function(returnedData) {
                   if (returnedData == 1) {
                       $('#success_message').text("Set home 1 category has been Updated successfully");
                       $('.success_show').show().delay(0).fadeIn('show');
                       $('.success_show').show().delay(5000).fadeOut('show');
                       $('#sale_model_1').modal('hide');
                   }
               }
           });
       }

       function sale_product_2() {
           var val_new = $('#sale_val_2').val();
           var id = $('#sale_id_2').val();
           $.ajax({
               type: "POST",
               url: "{{ url('category-set-home-2') }}",
               data: {
                   "_token": "{{ csrf_token() }}",
                   "id": id,
                   "val": val_new
               },
               success: function(returnedData) {
                   if (returnedData == 1) {
                       $('#success_message').text("Set home 2 category has been Updated successfully");
                       $('.success_show').show().delay(0).fadeIn('show');
                       $('.success_show').show().delay(5000).fadeOut('show');
                       $('#sale_model_2').modal('hide');
                   }
               }
           });
       }
   </script>
   <script>
    if ($.fn.DataTable.isDataTable('#example')) {
        $('#example').DataTable().destroy();
    }
    $(document).ready(function() {
        $('#example').dataTable({
            "searching": true
        });
    })
</script>
@stop