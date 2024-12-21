<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;

class TeamsController extends Controller
{
    public function index(){
        $data['team']=DB::table('team')->orderBy('id','DESC')->get();
         return view('admin.list_team',$data);
    }
    public function create(){
        return view('admin.add_team');
    }
    public function store(request $request){
        //   echo "<pre>"; print_r($request->all());  echo"</pre>"; exit;
          $data['name']=$request->name;
          $data['designation']=$request->designation;
          $data['description']=$request->description;
          if ($request->hasFile('image')) {
            $image = $request->file('image');
            $remove_space = str_replace(' ', '-', $image->getClientOriginalName());
            $data['image'] = time() . $remove_space;
    
            // Define the packages paths
            $largepackagesPath = public_path('upload/team/medium/' . $data['image']);
            $smallpackagesPath = public_path('upload/team/small/' . $data['image']);
            $originalpackagesPath = public_path('upload/team/' . $data['image']);
    
            // Resize and save large image
            $this->resizeImage($image->getRealPath(), $largepackagesPath, 100, 100);
    
            // Resize and save small image
            $this->resizeImage($image->getRealPath(), $smallpackagesPath, 50, 50);
    
            // Move the original image
            $image->move(public_path('upload/testimonial'), $data['image']);
    
            $image = $data['image'];
            $data['image'] = $image;
        } 

        $res = DB::table('team')->insert($data);
        return redirect()->route('team.index')->with('success' , 'Team added Successfully');
       
    }
     public function edit($id){
             $data['team']=DB::table('team')->where('id',$id)->first();
             return view('admin.edit_team',$data);

     }
     public function update(request $request,$id){
        $data['name']=$request->name;
        $data['designation']=$request->designation;
        $data['description']=$request->description;
        if ($request->hasFile('image')) {
          $image = $request->file('image');
          $remove_space = str_replace(' ', '-', $image->getClientOriginalName());
          $data['image'] = time() . $remove_space;
  
          // Define the packages paths
          $largepackagesPath = public_path('upload/team/medium/' . $data['image']);
          $smallpackagesPath = public_path('upload/team/small/' . $data['image']);
          $originalpackagesPath = public_path('upload/team/' . $data['image']);
  
          // Resize and save large image
          $this->resizeImage($image->getRealPath(), $largepackagesPath, 100, 100);
  
          // Resize and save small image
          $this->resizeImage($image->getRealPath(), $smallpackagesPath, 50, 50);
  
          // Move the original image
          $image->move(public_path('upload/testimonial'), $data['image']);
  
          $image = $data['image'];
          $data['image'] = $image;
      } 

      $res = DB::table('team')->where('id',$id)->update($data);
      return redirect()->route('team.index')->with('success' , 'Team Updated Successfully');
             
     }
     public function destroy(request $request){
             $id = $request->selected;
             $res = DB::table('team')->whereIn('id',$id)->delete();
             return redirect()->route('team.index')->with('success' , 'Team has been deleted Successfully');

     }
    private function resizeImage($sourcePath, $packagesPath, $newWidth, $newHeight)
    {
        list($width, $height, $type) = getimagesize($sourcePath);

        switch ($type) {
            case IMAGETYPE_JPEG:
                $src = imagecreatefromjpeg($sourcePath);
                break;
            case IMAGETYPE_PNG:
                $src = imagecreatefrompng($sourcePath);
                break;
            case IMAGETYPE_GIF:
                $src = imagecreatefromgif($sourcePath);
                break;
            default:
                throw new \Exception('Unsupported image type');
        }

        $dst = imagecreatetruecolor($newWidth, $newHeight);

        // Preserve transparency for PNG and GIF images
        if ($type == IMAGETYPE_PNG || $type == IMAGETYPE_GIF) {
            imagecolortransparent($dst, imagecolorallocatealpha($dst, 0, 0, 0, 127));
            imagealphablending($dst, false);
            imagesavealpha($dst, true);
        }

        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

        switch ($type) {
            case IMAGETYPE_JPEG:
                imagejpeg($dst, $packagesPath);
                break;
            case IMAGETYPE_PNG:
                imagepng($dst, $packagesPath);
                break;
            case IMAGETYPE_GIF:
                imagegif($dst, $packagesPath);
                break;
        }

        imagedestroy($src);
        imagedestroy($dst);
    }
}
