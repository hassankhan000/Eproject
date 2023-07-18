<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('dashboard.product.product',compact('products'));
    }

    public function addProduct(){
        return view('dashboard.product.add-product');
    }

public function storeProduct(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|unique:product_category',
        'description' => 'required',
        'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $category = new Product();
    $category->name = $validatedData['name'];
    $category->description = $validatedData['description'];

    $img = $validatedData['img'];
    $imgName = time() . '_' . $img->getClientOriginalName();
    $destinationPath = public_path('product_category_image');
    $img->move($destinationPath, $imgName);

    $category->img = 'public/product_category_image/' . $imgName;
    $category->save();

    return redirect('dashboard/product');
}

    // Retrieve a specific category
    public function editProduct($id)
    {
        $category = Product::find($id);
        return view('dashboard.product.edit-product',compact('category'));
    }

    // Update a specific category
    function updateProduct(Request $request,$id){
      $categories =Product::find($id);

      $categories->name = $request->name;
      $categories->description = $request->description;

      if($request->img){
        $img = $request->img;
    $imgName = time() . '_' . $img->getClientOriginalName();
    $destinationPath = public_path('product_category_image');
    $img->move($destinationPath, $imgName);
    $categories->img = 'public/product_category_image/' . $imgName;
    unlink( $request->old_img);
      }else{
        $imgName =$request->old_img;
      }
      $categories->save();

      return redirect('dashboard/product');
    }

    public function deleteProductCategory($id)
    {
       $category= Product::find($id);
       if($category){
        unlink($category->img);
       }
       $category->delete();
        return redirect('dashboard/product');
    }

}
