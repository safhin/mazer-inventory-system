<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return \view('products.products')->with('products', $products);
    }
    public function create()
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        return \view('products.create',[
            'categories' => $categories,
            'suppliers' => $suppliers,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
           'title' => 'required|max:255',
           'price' => 'required',
           'supplier_id' => 'required',
           'model' => 'required',
           'description' => 'nullable',
           'category_id' => 'required',
        ]);
        Product::create([
            'title' => $request->title, 
            'price' => $request->price, 
            'supplier_id' => $request->supplier_id, 
            'model' => $request->model, 
            'description' => $request->description, 
            'category_id' => $request->category_id, 
        ]);
        return redirect()->route('product.index')->with('success', 'Product create successfully');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $suppliers = Supplier::all();
        return \view('products.edit',[
            'product' => $product, 
            'categories' => $categories,
            'suppliers' => $suppliers,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required|max:255',
            'price' => 'required',
            'supplier_id' => 'required',
            'model' => 'required',
            'description' => 'nullable',
            'category_id' => 'required',
         ]);
        $product = Product::findOrFail($id);
        DB::table('products')->where('id', $product->id)->update([
            'title'=> $request->title,
            'price' => $request->price,
            'supplier_id' => $request->supplier_id,
            'model' => $request->model,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);
        return redirect()->route('product.index')->with('success', 'Product update successfully');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return back()->with('success', 'Product deleted successfully');
    }
}
