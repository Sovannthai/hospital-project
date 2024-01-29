<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blog_categories = BlogCategory::all();
        return view('blog_category.index',compact('blog_categories'));
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
        try{
            $blog_category = new BlogCategory();
            $blog_category->name = $request->name;
            $blog_category->save();

            return redirect()->route('blog-category.index')->with('store','Category added successfully !');
        }catch(\Exception $e){
            return redirect()->route('blog-category.index')->with('error','Something went wront !');
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
        try{
            $blog_category = BlogCategory::findOrFail($id);
            $blog_category->name = $request->name;
            $blog_category->save();

            return redirect()->route('blog-category.index')->with('update','Category updated successfully !');
        }catch(\Exception $e){
            return redirect()->route('blog-category.index')->with('error','Something went wront !');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog_category = BlogCategory::findOrFail($id);
        if($blog_category->delete())
        {
            return redirect()->route('blog-category.index');
        }
    }
}
