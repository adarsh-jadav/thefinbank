<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CMSController extends Controller
{
    //
    public function index(){
         $data['cms']=DB::table('cms')->orderBy('id','DESC')->get();
         return view('admin.list_cms',$data);
    }
    public function create(){
        return view('admin.add_cms');
    }
    public function store(request $request){
           $data['name']=$request->name;
           $data['description']=$request->description;
           $data['meta_title']=$request->meta_title;
           $data['meta_keyword']=$request->meta_keyword;
           $data['meta_description']=$request->meta_description;
           $res = DB::table('cms')->insert($data);
           return redirect()->route('cms.index')->with('success', 'CMS added Successfully');


    }
    public function edit($id){
        $data['cms']=DB::table('cms')->where('id',$id)->first();
        return view('admin.edit_cms',$data);

    }
    public function update(request $request,$id){
        $data['name']=$request->name;
        $data['description']=$request->description;
        $data['meta_title']=$request->meta_title;
        $data['meta_keyword']=$request->meta_keyword;
        $data['meta_description']=$request->meta_description;
        $res = DB::table('cms')->where('id',$id)->update($data);
        return redirect()->route('cms.index')->with('success', 'CMS Updated Successfully');
    }
    public function destroy(request $request){
          $id = $request->selected;
          $res = DB::table('cms')->where('id',$id)->delete();
          return redirect()->route('cms.index')->with('success', 'CMS has been deleted Successfully');

    }

}
