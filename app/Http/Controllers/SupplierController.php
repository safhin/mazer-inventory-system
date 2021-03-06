<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return \view('suppliers.suppliers')->with('suppliers', $suppliers);
    }
    public function create()
    {
        
        return \view('suppliers.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|unique:users',
            'address' => 'required',
            'phone' => 'required',
            'details' => 'nullable',
        ]);

        Supplier::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'details' => $request->details,
        ]);
        return back()->with('success', 'Supplier created successfully');
    }

    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return \view('suppliers.edit')->with('supplier', $supplier);
    }


    public function update(Request $request,$id)
    {
        $supplier = Supplier::findOrFail($id);
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|unique:users',
            'address' => 'required',
            'phone' => 'required',
            'details' => 'nullable',
        ]);
        DB::table('suppliers')
            ->where('id', $supplier->id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'phone' => $request->phone,
                'details' => $request->details,
        ]);
        return back()->with('success', 'Supplier updated successfully');
    }

    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return back()->with('success', 'Supplier deleted successfully');
    }
}
