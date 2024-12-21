<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\admin\UserPermission;
use Illuminate\Support\Facades\Hash;
use DB;
class Admin_userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['user_data'] = DB::table('users')->orderBy('id','DESC')->get();           
        return view('admin.admin_user.list',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_data['user_category'] =UserPermission::get();            
        return view('admin.admin_user.add',$user_data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data =new User;
        // $data->role_id      = $request->user_id;
        // $data->name      = $request->name;
        // //$data->user_name      = $request->user_name;
        // $data->email      = $request->email;
        // $data->password      = Hash::make($request->password);     
        // $data->mobile      = $request->mobile;
        // $data->save(); 

        $data['role_id'] = $request->user_id; 
        $data['name'] = $request->name; 
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);  
        $data['mobile'] = $request->mobile;
        $data['added_date'] = date('Y-m-d');
        DB::table('users')->insert($data);
             
        return redirect()->route('adminuser.index')->with('success','User Added Successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {     
        $adminuser = DB::table('users')->where('id' , '=' , $id)->first();       
        $data['user_category'] = DB::select('select * from user_permissions');
        return view('admin.admin_user.edit',compact('adminuser'),$data);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data['role_id'] = $request->user_id; 
        $data['name'] = $request->name; 
        // $data['email'] = $request->email;
        // $data['password'] = Hash::make($request->password);  
        $data['mobile'] = $request->mobile;
        //$data->vendor=0; 


        DB::table('users')->where('id', $id)->update($data);
        return redirect()->route('adminuser.index')->with('success','User Updated Successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {         
        $delete_id = $request->selected;         
        DB::table('users')->whereIn('id',$delete_id)->delete();
        return redirect()->route('adminuser.index')->with('success','User Deleted Successfully.');
    }

    function check_mail(){

        $email = $_POST['email']; // Replace with the email you want to search for

        $result = DB::table('users')
            ->select('*')
            ->where('email', $email)
            ->first();

        if ($result) {
            return 1;
        } else {
            return 0;
        }

            echo $result;
    }
}