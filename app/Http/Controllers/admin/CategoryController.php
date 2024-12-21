<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Category;
use Illuminate\Http\Request;
use Session;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['category_data'] = Category::orderBy('id','DESC')->get();
        return view('admin.category.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('admin.category.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Category;
        $data->name      = $request->name;
        $data->page_url  = $request->page_url;
        $data->sub_title  = $request->sub_title ?? "";
        $data->short_description  = $request->short_description ?? "";
        $data->meta_title  = $request->meta_title ?? "";
        $data->meta_keyword  = $request->meta_keyword ?? "";
        $data->meta_description  = $request->meta_description ?? "";
        $data->set_order = 0;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $remove_space = str_replace(' ', '-', $image->getClientOriginalName());
            $imageName = time() . $remove_space;

            // Define the destination path
            $destinationPath = public_path('upload/category');

            // Move the uploaded image to the destination path
            $image->move($destinationPath, $imageName);

            $uploadedImage = $imageName; // Save the file name in the variable
        } else {
            $uploadedImage = ""; // If no image is uploaded, set to an empty string
        }

        if ($request->hasFile('listing_image')) {
            $listing_image = $request->file('listing_image');
            $remove_space = str_replace(' ', '-', $listing_image->getClientOriginalName());
            $data['listing_image'] = time() . $remove_space;
    
            // Define the destination paths
            $largeDestinationPath = public_path('upload/product-listing/large/' . $data['listing_image']);
            $originalDestinationPath = public_path('upload/product-listing/' . $data['listing_image']);
    
            // Resize and save large image
            $this->resizeImage($listing_image->getRealPath(), $largeDestinationPath, 1500, 300);
    
            // Move the original image
            $listing_image->move(public_path('upload/product-listing'), $data['listing_image']);
    
            $listing_image = $data['listing_image'];
        } else {
            $listing_image = "";
        }
        $data->listing_image  = $listing_image;
        $data->image = $uploadedImage; // Save the file name in the database
        $data->save();

        return redirect()->route('category.index')->with('success', 'Category Added Successfully');
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
    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Category::find($id);
        $data->name     = $request->name;
        $data->page_url = $request->page_url;
        $data->sub_title  = $request->sub_title ?? "";
        $data->short_description  = $request->short_description ?? "";
        $data->meta_title  = $request->meta_title ?? "";
        $data->meta_keyword  = $request->meta_keyword ?? "";
        $data->meta_description  = $request->meta_description ?? "";

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $remove_space = str_replace(' ', '-', $image->getClientOriginalName());
            $imageName = time() . $remove_space;

            // Define the destination path
            $destinationPath = public_path('upload/category');

            // Move the uploaded image to the destination path
            $image->move($destinationPath, $imageName);

            // Update the image field in the database
            $data->image = $imageName;
        }

        if ($request->hasFile('listing_image')) {
            $listing_image = $request->file('listing_image');
            $remove_space = str_replace(' ', '-', $listing_image->getClientOriginalName());
            $data['listing_image'] = time() . $remove_space;
    
            // Define the destination paths
            $largeDestinationPath = public_path('upload/product-listing/large/' . $data['listing_image']);
            $originalDestinationPath = public_path('upload/product-listing/' . $data['listing_image']);
    
            // Resize and save large image
            $this->resizeImage($listing_image->getRealPath(), $largeDestinationPath, 1500, 300);
    
            // Move the original image
            $listing_image->move(public_path('upload/product-listing'), $data['listing_image']);
    
            $listing_image = $data['listing_image'];
        }

        $data->save();
        return redirect()->route('category.index')->with('success', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $delete_id = $request->selected;
        Category::whereIn('id',$delete_id)->delete();
        return redirect()->route('category.index')->with('success','Category has been deleted successfully');
    }

    public function category_set_order()
    {
        $id = $_POST['id'];
        $val = $_POST['val'];
        DB::table('categories')->where('id', $id)->update(array('set_order' => $val));
        echo "1";
    }
    public function set_home_1()
    {
        $id = $_POST['id'];
        $val = $_POST['val'];
        DB::table('categories')->where('id', $id)->update(array('set_home_1' => $val));
        echo "1";
    }
    public function set_home_2()
    {
        $id = $_POST['id'];
        $val = $_POST['val'];
        DB::table('categories')->where('id', $id)->update(array('set_home_2' => $val));
        echo "1";
    }

}
