<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return \view('products.category.category')->with('categories', $categories);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'slug' => 'required',
        ]);
        Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);
        return back()->with('success', 'Category created successfully');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return \view('products.category.edit')->with('category',$category);
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $this->validate($request,[
            'name' => 'required',
            'slug' => 'required',
        ]);
        DB::table('categories')->where('id', $category->id)->update([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);
        return back()->with('success', 'Category update successfully');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return back()->with('success', 'Category deleted successfully');
    }
}
