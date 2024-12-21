<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Image\Image as SpatieImage;
use DB;

class TestimonialController extends Controller
{
    public function index(){
          $data['testimonial']=DB::table('testimonial')->orderBy('id','DESC')->get();
        return view('admin.testimonial.list',$data);
    }
       public function create(){
        return view('admin.testimonial.add');
       }
       public function store(request $request){
             $data['name']=$request->name;
             $data['designation']=$request->designation;
             if ($request->hasFile('image')) {
                $image = $request->file('image');
                $remove_space = str_replace(' ', '-', $image->getClientOriginalName());
                $data['image'] = time() . $remove_space;
    
                // Define the destination paths
                $largeDestinationPath = public_path('upload/testimonial/medium/' . $data['image']);
                $smallDestinationPath = public_path('upload/testimonial/' . $data['image']);
    
                // Resize and save large image
                $this->resizeImage($image->getRealPath(), $largeDestinationPath, 56, 56);
                
    
                // Move the original image
                $image->move(public_path('upload/testimonial/'), $data['image']);
    
                $image = $data['image'];
            } else {
                $image = "";
            }
            $data['short_description']=$request->description;
            $data['ratings']=$request->ratings;
            $res = DB::table('testimonial')->insert($data);
            return redirect()->route('testimonial.index')->with('success', 'Testimonial Added Successfully');
            
       }
       public function edit($id){
        $data['testimonial'] = DB::table('testimonial')->where('id',$id)->first();
        return view('admin.testimonial.edit',$data);
       }
       public function update(request $request,$id){
        $data['name']=$request->name;
        $data['designation']=$request->designation;
        if ($request->hasFile('image')) {
           $image = $request->file('image');
           $remove_space = str_replace(' ', '-', $image->getClientOriginalName());
           $data['image'] = time() . $remove_space;

           // Define the destination paths
           $largeDestinationPath = public_path('upload/testimonial/medium/' . $data['image']);
           $smallDestinationPath = public_path('upload/testimonial/' . $data['image']);

           // Resize and save large image
           $this->resizeImage($image->getRealPath(), $largeDestinationPath, 56, 56);
           

           // Move the original image
           $image->move(public_path('upload/testimonial/'), $data['image']);

           $image = $data['image'];
       } else {
           $image = "";
       }
       $data['short_description']=$request->description;
       $data['ratings']=$request->ratings;
       $res = DB::table('testimonial')->where('id',$id)->update($data);
       return redirect()->route('testimonial.index')->with('success', 'Testimonial Updated Successfully');
       }
       public function destroy(request $request){
        $delete_id = $request->selected;
        $res = DB::table('testimonial')->whereIn('id',$delete_id)->delete();
        return redirect()->route('testimonial.index')->with('success', 'Testimonial has been deleted Successfully');
       }
       private function resizeImage($sourcePath, $destinationPath, $newWidth, $newHeight)
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
                   imagejpeg($dst, $destinationPath);
                   break;
               case IMAGETYPE_PNG:
                   imagepng($dst, $destinationPath);
                   break;
               case IMAGETYPE_GIF:
                   imagegif($dst, $destinationPath);
                   break;
           }
           imagedestroy($src);
           imagedestroy($dst);
       }
}