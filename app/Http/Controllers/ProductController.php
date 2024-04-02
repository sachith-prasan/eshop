<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Item::all();

        return view('admin.updateProduct', [
            'products' => $products
        ]);
    }

    public function addCategory(Request $request){
        $data = request()->validate([
            'name' => ['required',],
        ]);

        $category = new Category();
        $category->name = $data['name'];
        $category->save();

        return response()->json([
            'status' => "success",
            'message' => 'Category Added Successfully',
        ]);
    }

    public function addProduct(){
        $data = request()->validate([
            'productName' => ['required',],
            'description' => ['required'],
            'price' => ['required'],
            'quantity' => ['required','numeric'],
            'productImage' => ['required'],
            'category' => ['required'],
            'productColor' => ['required'],
        ]); 
      
        $product =  new Item();
        $product->product_name = $data['productName'];
        $product->description = $data['description'];
        $product->price = $data['price'];
        $product->quantity = $data['quantity'];
        $product->category = $data['category'];
        $product->product_color = $data['productColor'];
        $product->image = $data['productImage'];
        $product->save();

        return response()->json([
            'status' => "success",	
            'message' => 'Product Added Successfully',
            'product' => $product
        ]);
    }

    public function deleteProduct(Request $request){
        Item::find($request->id)->delete();

        return response()->json([
            'status' => "success",
            'message' => 'Product Deleted Successfully',
        ]);
    }


public function updateProduct(Request $request){
    $data = request()->validate([
        'productName' => ['required',],
        'description' => ['required'],
        'price' => ['required'],
        'quantity' => ['required','numeric'],
        'productImage' => ['required'],
        'category' => ['required'],
        'productColor' => ['required'],
    ]); 
  
    $product =  Item::find($request->id);
    $product->product_name = $data['productName'];
    $product->description = $data['description'];
    $product->price = $data['price'];
    $product->quantity = $data['quantity'];
    $product->category = $data['category'];
    $product->product_color = $data['productColor'];
    $product->image = $data['productImage'];
    $product->save();

    return response()->json([
        'status' => "success",	
        'message' => 'Product Updated Successfully',
        'product' => $product
    ]);

    }
}
