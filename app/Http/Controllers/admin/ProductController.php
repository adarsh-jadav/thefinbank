<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Product;
use App\Models\admin\Category;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use Spatie\Image\Image as SpatieImage;
use Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['products_data'] = Product::orderBy('id','DESC')->get();
        return view('admin.product.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.product.add',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Product;
        $data->name             = $request->name;
        $data->page_url         = $request->page_url;
        $data->category_id      = $request->category_id;
        $data->short_description     = $request->short_description ?? "";
        $data->key_features     = $request->key_features ?? "";
        $data->details      = $request->details ?? "";
        $data->documentation    = $request->documentation ?? "";
        $data->fees_charges     = $request->fees_charges ?? "";
        $data->meta_title       = $request->meta_title ?? "";
        $data->meta_keyword     = $request->meta_keyword ?? "";
        $data->meta_description = $request->meta_description ?? "";
        $data->set_home = 0;
        $data->set_order = 0;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $remove_space = str_replace(' ', '-', $image->getClientOriginalName());
            $data['image'] = time() . $remove_space;

            // Define the destination paths
            $largeDestinationPath = public_path('upload/products/large/' . $data['image']);
            $originalDestinationPath = public_path('upload/products/' . $data['image']);

            // Resize and save large image
            $this->resizeImage($image->getRealPath(), $largeDestinationPath, 60, 60);

            // Move the original image
            $image->move(public_path('upload/products'), $data['image']);

            $image = $data['image'];
        } else {
            $image = "";
        }

        if ($request->hasFile('detail_image')) {
            $image = $request->file('detail_image');
            $remove_space = str_replace(' ', '-', $image->getClientOriginalName());
            $data['detail_image'] = time() . $remove_space;

            // Define the destination paths
            $largeDestinationPath = public_path('upload/products/detail-banner/large/' . $data['detail_image']);
            $originalDestinationPath = public_path('upload/products/detail-banner/' . $data['detail_image']);

            // Resize and save large image
            $this->resizeImage($image->getRealPath(), $largeDestinationPath, 1500, 300);

            // Move the original image
            $image->move(public_path('upload/products/detail-banner'), $data['detail_image']);

            $detail_image = $data['detail_image'];
        } else {
            $detail_image = "";
        }

        $data->image = $image; // Save the file name in the database
        $data->detail_image = $detail_image; // Save the file name in the database
        $data->save();
        return redirect()->route('product.index')->with('success', 'Product Added Successfully');
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
    public function edit(Product $product)
    {
        $category = Category::all();
        return view('admin.product.edit',compact('product','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Product::find($id);
        $data->name              = $request->name;
        $data->page_url          = $request->page_url;
        $data->category_id       = $request->category_id;
        $data->short_description = $request->short_description ?? "";
        $data->key_features      = $request->key_features ?? "";
        $data->details           = $request->details ?? "";
        $data->documentation     = $request->documentation ?? "";
        $data->fees_charges      = $request->fees_charges ?? "";
        $data->meta_title        = $request->meta_title ?? "";
        $data->meta_keyword      = $request->meta_keyword ?? "";
        $data->meta_description  = $request->meta_description ?? "";

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $remove_space = str_replace(' ', '-', $image->getClientOriginalName());
            $data['image'] = time() . $remove_space;

            // Define the destination paths
            $largeDestinationPath = public_path('upload/products/large/' . $data['image']);
            $originalDestinationPath = public_path('upload/products/' . $data['image']);

            // Resize and save large image
            $this->resizeImage($image->getRealPath(), $largeDestinationPath, 60, 60);

            // Move the original image
            $image->move(public_path('upload/products'), $data['image']);

            $image = $data['image'];
            $data->image = $image;
        }

        if ($request->hasFile('detail_image')) {
            $image = $request->file('detail_image');
            $remove_space = str_replace(' ', '-', $image->getClientOriginalName());
            $data['detail_image'] = time() . $remove_space;

            // Define the destination paths
            $largeDestinationPath = public_path('upload/products/detail-banner/large/' . $data['detail_image']);
            $originalDestinationPath = public_path('upload/products/detail-banner/' . $data['detail_image']);

            // Resize and save large image
            $this->resizeImage($image->getRealPath(), $largeDestinationPath, 1500, 300);

            // Move the original image
            $image->move(public_path('upload/products/detail-banner'), $data['detail_image']);

            $detail_image = $data['detail_image'];
            $data->detail_image = $detail_image;
        }

        $data->save();

        return redirect()->route('product.index')->with('success', 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $delete_id = $request->selected;
        Product::whereIn('id',$delete_id)->delete();
        return redirect()->route('product.index')->with('success','Product has been deleted successfully');
    }

    public function upload(Request $request): JsonResponse
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('upload'), $fileName);

            $url = asset('public/upload/' . $fileName);

            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
        }
    }

    public function set_order()
    {
        $id = $_POST['id'];
        $val = $_POST['val'];
        DB::table('products')->where('id', $id)->update(array('set_order' => $val));
        echo "1";
    }
    public function set_home()
    {
        $id = $_POST['id'];
        $val = $_POST['val'];
        DB::table('products')->where('id', $id)->update(array('set_home' => $val));
        echo "1";
    }
}