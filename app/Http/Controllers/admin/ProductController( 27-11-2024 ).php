<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Product;
use App\Models\admin\Category;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use Session;
use DB;

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
        $data->key_features     = $request->key_features ?? "";
        $data->eligibility      = $request->eligibility ?? "";
        $data->documentation    = $request->documentation ?? "";
        $data->fees_charges     = $request->fees_charges ?? "";

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $remove_space = str_replace(' ', '-', $image->getClientOriginalName());
            $imageName = time() . $remove_space;

            // Define the destination path
            $destinationPath = public_path('upload/products');

            // Move the uploaded image to the destination path
            $image->move($destinationPath, $imageName);

            $uploadedImage = $imageName; // Save the file name in the variable
        } else {
            $uploadedImage = ""; // If no image is uploaded, set to an empty string
        }

        $data->image = $uploadedImage; // Save the file name in the database
        $data->save();
        return redirect()->route('product.index')->with('success', 'Product Added Successfully');
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
        $data->name             = $request->name;
        $data->page_url         = $request->page_url;
        $data->category_id         = $request->category_id;
        $data->key_features     = $request->key_features ?? "";
        $data->eligibility      = $request->eligibility ?? "";
        $data->documentation    = $request->documentation ?? "";
        $data->fees_charges     = $request->fees_charges ?? "";

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $remove_space = str_replace(' ', '-', $image->getClientOriginalName());
            $imageName = time() . $remove_space;

            // Define the destination path
            $destinationPath = public_path('upload/products');

            // Move the uploaded image to the destination path
            $image->move($destinationPath, $imageName);

            // Update the image field in the database
            $data->image = $imageName;
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
}
