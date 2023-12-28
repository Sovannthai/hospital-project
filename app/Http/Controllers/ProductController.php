<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\ProductCategory;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $units = Unit::all();
        $categorys = ProductCategory::all();
        return view('product.index', compact('categorys', 'units', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:products,code',
            'category_id' => 'required',
            'unit_id' => 'required',
            'price' => 'required'
        ]);
        try {
            $product = new Product();
            $product->name = $request->name;
            $product->code = $request->code;
            $product->category_id = $request->category_id;
            $product->unit_id = $request->unit_id;
            $product->price = $request->price;
            $product->description = $request->description;
            $product->status = $request->has('status');
            if ($request->has('image')) {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $imageName = Carbon::now()->toDateString() . "-" . uniqid() . "." . $extension;
                $image->move(public_path('uploads/product'), $imageName);
                $product->image = $imageName;
            }
            $product->save();
            return redirect()->route('product.index')->with('store', 'Product added successfully !');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create Product. Please try again.!');
        }
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $product = Product::find($id);
            $product->name = $request->name;
            $product->code = $request->code;
            $product->category_id = $request->category_id;
            $product->unit_id = $request->unit_id;
            $product->price = $request->price;
            $product->description = $request->description;
            $product->status = $request->has('status');
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $imageName = Carbon::now()->toDateString() . "-" . uniqid() . "." . $extension;
                $image->move(public_path('uploads/product'), $imageName);
                $product->image = $imageName;
            }
            $product->save();
            return redirect()->route('product.index')->with('update', 'Product added successfully !');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update Product. Please try again.!');
        }
    }
    public function updateStatus($id)
    {
        $status = null;
        if (request('status') == 'true') {
            $status = 1;
        } else {
            $status = 0;
        }
        $product = Product::find($id);
        $product->update(['status' => $status]);
        return response()->json(['status' => $product->status]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        if ($product->delete()) {
            return redirect()->route('product.index')->with('delete', 'Product deleted successfully !');
        }
    }
}
