<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ProductCategory::all();
        return view('product_category.index',compact('categories'));
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
        try
        {
            $category = new ProductCategory();
            $category->name = $request->name;
            $category->save();
            return redirect()->route('categories.index')->with('store','Category added successfully !');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error','Failed to create Category. Please try again.!');
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
        try
        {
            $category = ProductCategory::find($id);
            $category->name = $request->name;
            $category->save();
            return redirect()->route('categories.index')->with('update','Category added successfully !');
        }catch(\Exception $e)
        {
            return redirect()->back()->with('error','Failed to update Category. Please try again.!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = ProductCategory::find($id);
        if ($category->delete())
        {
            return redirect()->route('categories.index')->with('delete','Category added successfully !');
        }
    }
}
