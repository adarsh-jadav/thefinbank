<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Banner;
use Illuminate\Http\Request;
use Spatie\Image\Image as SpatieImage;
use Session;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['banner_data'] = Banner::orderBy('id','DESC')->get();
        return view('admin.banner.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banner.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Banner;
        $data->name      = $request->name;
        $data->url      = $request->url ?? "";
        $data->set_order = 0;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $remove_space = str_replace(' ', '-', $image->getClientOriginalName());
            $data['image'] = time() . $remove_space;
    
            // Define the destination paths
            $largeDestinationPath = public_path('upload/banner/large/' . $data['image']);
            $originalDestinationPath = public_path('upload/banner/' . $data['image']);
    
            // Resize and save large image
            $this->resizeImage($image->getRealPath(), $largeDestinationPath, 1500, 410);
    
            // Move the original image
            $image->move(public_path('upload/banner'), $data['image']);
    
            $image = $data['image'];
        } else {
            $image = "";
        }
        $data->image  = $image;
        $data->save();
        return redirect()->route('banner.index')->with('success', 'Banner Added Successfully');
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        return view('admin.banner.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Banner::find($id);
        $data->name      = $request->name;
        $data->url      = $request->url ?? ""; 
        $data->set_order = 0;
         
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $remove_space = str_replace(' ', '-', $image->getClientOriginalName());
            $data['image'] = time() . $remove_space;
    
            // Define the destination paths
            $largeDestinationPath = public_path('upload/banner/large/' . $data['image']);
            $originalDestinationPath = public_path('upload/banner/' . $data['image']);
    
            // Resize and save large image
            $this->resizeImage($image->getRealPath(), $largeDestinationPath, 1500, 410);
    
            // Move the original image
            $image->move(public_path('upload/banner'), $data['image']);
    
            $image = $data['image'];
        } else {
            $image = "";
        }
		 
        $data->save();
        return redirect()->route('banner.index')->with('success', 'Banner Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $delete_id = $request->selected;
        Banner::whereIn('id',$delete_id)->delete();
        return redirect()->route('banner.index')->with('success','Banner has been deleted successfully');
    }

    public function set_order()
    {
        $id = $_POST['id'];
        $val = $_POST['val'];
        Banner::where('id', $id)->update(array('set_order' => $val));
        echo "1";
    }
}
