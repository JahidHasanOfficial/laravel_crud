<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    
    // This method will  show products page
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
      return view('products.list', compact('products'));
    }

      // This method will  create products page
      public function create()
      {
        return view('products.create');
      }


        // This method will  store products page
    public function store(Request $request)
    {
      $ruls = [
        'name' => 'required',
        'sku' => 'required',
        'price' => 'required|numeric',
        
      ];

      if($request->image != ''){
        $ruls['image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
      }

      $validator = Validator::make($request->all(), $ruls);
      
      if($validator->fails()){
        return redirect()->route('products.create')->withInput()->withErrors($validator);
      }

      // Here we will store data in database
      $product = new Product();
      $product->name         = $request->name;
      $product->sku          = $request->sku;
      $product->price        = $request->price;
      $product->description  = $request->description;
      $product->save();

      if($request->image != ''){

        // Here we will upload image
        $image = $request->image;
        $ext = $image->getClientOriginalExtension();
        $imageName = time().'.'.$ext; //unique image name

        //save image to public/uploads
        $image->move(public_path('uploads/products'), $imageName);
       
       // save image name in database
        $product->image = $imageName;
        $product->save();
      }

      return redirect()->route('products.index')->with('success', 'Product Created Successfully');

    }



      // This method will  edit products page
      public function edit($id)
      {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
      }

        // This method will  update products page
    public function update(Request $request, $id)
    { 
       $product = Product::findOrFail($id);

      $ruls = [
        'name' => 'required',
        'sku' => 'required',
        'price' => 'required|numeric',
        
      ];

      if($request->image != ''){
        $ruls['image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
      }

      $validator = Validator::make($request->all(), $ruls);
      
      if($validator->fails()){
        return redirect()->route('products.edit')->withInput()->withErrors($validator);
      }

      // Here we will store data in database
   
      $product->name         = $request->name;
      $product->sku          = $request->sku;
      $product->price        = $request->price;
      $product->description  = $request->description;
      $product->save();

      if($request->image != ''){
        // delete old image

        File::delete(public_path('uploads/products/'.$product->image));
        // Here we will upload image
        $image = $request->image;
        $ext = $image->getClientOriginalExtension();
        $imageName = time().'.'.$ext; //unique image name

        //save image to public/uploads
        $image->move(public_path('uploads/products'), $imageName);
       
       // save image name in database
        $product->image = $imageName;
        $product->save();
      }

      return redirect()->route('products.index')->with('success', 'Product Updated Successfully');
    }


    // This method will  view products page
    public function view($id)
    {
      $product = Product::findOrFail($id);
      return view('products.view', compact('product'));
    }


      // This method will  delete products page
      public function destroy($id)
      {
         $product = Product::findOrFail($id);

        // delete old image
        File::delete(public_path('uploads/products/'.$product->image));


        //delete product from database
         $product->delete();
         return redirect()->route('products.index')->with('success', 'Product Deleted Successfully');
      }
}
