<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    
    // This method will  show products page
    public function index()
    {
      return view('products.list');
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

      $validator = Validator::make($request->all(), $ruls);
      
      if($validator->fails()){
        return redirect()->route('products.create')->withInput()->withErrors($validator);
      }


      $product = new Product();
      $product->name         = $request->name;
      $product->sku          = $request->sku;
      $product->price        = $request->price;
      $product->description  = $request->description;
      $product->save();

    }



      // This method will  edit products page
      public function edit()
      {
        
      }

        // This method will  update products page
    public function update()
    {
      
    }


      // This method will  delete products page
      public function destroy()
      {
        
      }
}
