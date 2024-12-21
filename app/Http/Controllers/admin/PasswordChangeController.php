<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;

class PasswordChangeController extends Controller
{
    public function index(){
        return view('admin.change_password');
    }
    public function check_current_password(Request $request)
    {       
        // echo"<pre>" ;  print_r($request->post());  echo"</pre>";exit;
        $current_password = $request->current_password;
        $user = Auth::user()->toArray();
        // echo"<pre>" ;  print_r($user);  echo"</pre>";exit;
        $userdata = DB::table('users')->where('email',$user['email'])->first();
       

        if (Hash::check($current_password, $userdata->password)) {
            // Passwords match
            echo "correct!";die();
        } else {
            // Passwords don't match
            echo "incorrect!";die();
        }

        // echo "<pre>";print_r($userdata);echo "</pre><br>";exit;
       
        return view('admin.change_password');
    } 
    public function change_password_form(Request $request)
    {   
        if ($request->action === 'change-password-action') {

            $currentPassword = $request->action;
            $currentPassword = $request->current_password;
            $new_password    = $request->new_password;

            $hashNewPassword['password'] = Hash::make($new_password);   

            $userdata = Auth::user()->toArray();
            DB::table('users')->where('email',$userdata['email'])->update($hashNewPassword);
            return redirect()->to('password_change')->with('success','Password changed successfully.');
        }
    }
}
