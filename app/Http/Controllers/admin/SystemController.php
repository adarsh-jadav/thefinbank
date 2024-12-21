<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;

class SystemController extends Controller
{
    public function edit($id){
             $data['system']=DB::table('system')->where('id',$id)->first();
              return view('admin.system.edit',$data);
    } 
    public function update(request $request,$id){
            // echo "<pre>";print_r($request->all());echo"</pre>";exit;
            
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $remove_space = str_replace(' ', '-', $image->getClientOriginalName());
            $data['image'] = time() . $remove_space;
    
            // Define the packages paths
            $largepackagesPath = public_path('upload/system/medium/' . $data['image']);
         
    
            // Resize and save large image
            $this->resizeImage($image->getRealPath(), $largepackagesPath, 1900,600);
    
            // Resize and save small image
       
    
            // Move the original image
            $image->move(public_path('upload/system/'), $data['image']);
    
            $image = $data['image'];
            $data['image'] = $image;
           
        } 

        
        if(!empty($data)){
        $res = DB::table('system')->where('id',$id)->update($data);
        }

       

       
        return redirect()->route('system.edit',$id)->with('success','System has been Updated successfully');


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