<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\PopularProducts;
use Illuminate\Http\Request;
use Spatie\Image\Image as SpatieImage;
use Session;

class PopularProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['popular_products_data'] = PopularProducts::orderBy('id','DESC')->get();
        return view('admin.popular-products.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.popular-products.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // echo "<pre>";print_r($request->all());echo "</pre>";exit;
        $data = new PopularProducts;
        $data->name      = $request->name;
        $data->sub_title  = $request->sub_title ?? "";
        $data->link  = $request->link ?? "";
        $data->short_description  = $request->short_description ?? "";

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $remove_space = str_replace(' ', '-', $image->getClientOriginalName());
            $data['image'] = time() . $remove_space;

            // Define the destination paths
            $largeDestinationPath = public_path('upload/popular-products/large/' . $data['image']);
            $originalDestinationPath = public_path('upload/popular-products/' . $data['image']);

            // Resize and save large image
            $this->resizeImage($image->getRealPath(), $largeDestinationPath, 360, 295);

            // Move the original image
            $image->move(public_path('upload/popular-products'), $data['image']);

            $image = $data['image'];
        }else{
            $image = "";
        }
        $data->image  = $image;
        $data->save();
        return redirect()->route('popularproducts.index')->with('success', 'Popular Products Added Successfully');
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
    public function edit($id)
    {
        $popularProducts = PopularProducts::findOrFail($id);
        return view('admin.popular-products.edit',compact('popularProducts'));
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = PopularProducts::find($id);
        $data->name     = $request->name;
        $data->sub_title  = $request->sub_title ?? "";
        $data->link  = $request->link ?? "";
        $data->short_description  = $request->short_description ?? "";

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $remove_space = str_replace(' ', '-', $image->getClientOriginalName());
            $data['image'] = time() . $remove_space;

            // Define the destination paths
            $largeDestinationPath = public_path('upload/popular-products/large/' . $data['image']);
            $originalDestinationPath = public_path('upload/popular-products/' . $data['image']);

            // Resize and save large image
            $this->resizeImage($image->getRealPath(), $largeDestinationPath, 360, 295);

            // Move the original image
            $image->move(public_path('upload/popular-products'), $data['image']);

            $image = $data['image'];
            $data->image  = $image;
        }
        
        $data->save();
        return redirect()->route('popularproducts.index')->with('success', 'Popular Products Added Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $delete_id = $request->selected;
        PopularProducts::whereIn('id',$delete_id)->delete();
        return redirect()->route('popularproducts.index')->with('success','Popular Products has been deleted successfully');
    }

    public function set_order()
    {
        $id = $_POST['id'];
        $val = $_POST['val'];
        PopularProducts::where('id', $id)->update(array('set_order' => $val));
        echo "1";
    }
    public function set_home_1()
    {
        $id = $_POST['id'];
        $val = $_POST['val'];
        PopularProducts::where('id', $id)->update(array('set_home_1' => $val));
        echo "1";
    }
    public function set_home_2()
    {
        $id = $_POST['id'];
        $val = $_POST['val'];
        PopularProducts::where('id', $id)->update(array('set_home_2' => $val));
        echo "1";
    }


}
