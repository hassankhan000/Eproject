<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ProductCategoryController extends Controller
{
    // Retrieve all categories
    public function index()
    {
        $categories = ProductCategory::all();
        return view('dashboard.productcategory.product-category',compact('categories'));
    }

    public function addProductCategory(){
        return view('dashboard.productcategory.add-product-category');
    }

public function storeProductCategory(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|unique:product_category',
        'description' => 'required',
        'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $category = new ProductCategory();
    $category->name = $validatedData['name'];
    $category->description = $validatedData['description'];

    $img = $validatedData['img'];
    $imgName = time() . '_' . $img->getClientOriginalName();
    $destinationPath = public_path('product_category_image');
    $img->move($destinationPath, $imgName);

    $category->img = 'public/product_category_image/' . $imgName;
    $category->save();

    return redirect('dashboard/product-category');
}

    // Retrieve a specific category
    public function editProductCategory($id)
    {
        $category = ProductCategory::find($id);
        return view('dashboard.productcategory.edit-product-category',compact('category'));
    }

    // Update a specific category
    function updateProductCategory(Request $request,$id){
      $categories =ProductCategory::find($id);

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

      return redirect('dashboard/product-category');
    }

    public function deleteProductCategory($id)
    {
       $category= ProductCategory::find($id);
       if($category){
        unlink($category->img);
       }
       $category->delete();
        return redirect('dashboard/product-category');
    }
}
