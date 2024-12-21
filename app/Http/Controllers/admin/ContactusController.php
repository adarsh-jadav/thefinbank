<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;

class ContactusController extends Controller
{
    public function index(){
        $data['contact_us'] = Contact::orderBy('id','DESC')->get();
        return view('admin.contact-us.list',$data);
    }
    public function destroy(request $request){
         $id = $request->selected;
         $res = Contact::whereIn('id',$id)->delete();

        return redirect()->route('contact-us.index')->with('success','Contact us Data has been deleted successfully');
    }
}
