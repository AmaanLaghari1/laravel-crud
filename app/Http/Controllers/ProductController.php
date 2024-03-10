<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $allProducts = Product::latest()->get();
        return view('index', ['products' => $allProducts]);
    }

    public function create(){
        return view('create');
    }
   
    public function update($id){
        $product = Product::where('id', $id)->first();
        return view('update', ['product' => $product]);
    }

    public function save(Request $req){
        // dd($req->all());

        // Validations
        $req->validate([
            'title' => 'required',
            'desc' => 'required',
            'img' => 'required',
        ]);

        // Handle Images Upload
        $imgName = time() .".". $req->img->extension();
        $req->img->move(public_path('uploads'), $imgName);

        // Save into database
        $newProduct = new Product();

        $newProduct->name = $req->title;
        $newProduct->description = $req->desc;
        $newProduct->image = $imgName;
        $newProduct->save();

        return back()->withSuccess("Product created successfully...");
    }

    public function updSave(Request $req, $id){
        // dd($req->all());

        // Validations
        $req->validate([
            'title' => 'required',
            'desc' => 'required',
            'img' => 'nullable',
        ]);

        // Update Product
        $product = Product::where('id', $id)->first();
        
        // Handle Images Upload
        if(isset($req->img)){
            $imgName = time() .".". $req->img->extension();
            $req->img->move(public_path('uploads'), $imgName);
            $product->image = $imgName;
        }
        
        $product->name = $req->title;
        $product->description = $req->desc;
        $product->save();
        
        return back()->withSuccess("Product updated successfully...");
    }
    
    public function delete($id){
        $product = Product::where('id', $id)->first();
        $product->delete();
        return back()->withSuccess("Product deleted successfully...");
    }
}
