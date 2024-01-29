<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Nette\Utils\Strings;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
        $blog_category = BlogCategory::all();
        return view('blog.index', compact('blogs', 'blog_category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blog_categories =  BlogCategory::all();
        return view('blog.create', compact('blog_categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required'
        ]);
        try {
            $blog = new Blog();
            $blog->title = $request->title;
            $blog->category_id = $request->category_id;
            $blog->description = $request->description;
            $blog->created_by = auth()->user()->id;
            if ($request->has('image')) {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $imageName = Carbon::now()->toDateString() . "-" . uniqid() . "." . $extension;
                $image->move(public_path('uploads/blogs'), $imageName);
                $blog->image = $imageName;
            }
            $blog->save();
            return redirect()->route('blog.index')->with('store', 'Blog added successfully !');
        } catch (\Exception $e) {
            // dd($blog);
            return redirect()->route('blog.index')->with('error','Something went wrong !');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $blog = Blog::find($id);
        $blog_categories =  BlogCategory::all();
        return view('blog.edit',compact('blog','blog_categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $blog = Blog::find($id);
            $blog->title = $request->title;
            $blog->category_id = $request->category_id;
            $blog->description = $request->description;
            $blog->created_by = auth()->user()->id;

            if ($request->has('image')) {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $imageName = Carbon::now()->toDateString() . "-" . uniqid() . "." . $extension;
                $image->move(public_path('uploads/blogs'), $imageName);
                $blog->image = $imageName;
            }
            $blog->save();
            return redirect()->route('blog.index')->with('update', 'Blog updated successfully !');
        } catch (\Exception $e) {
            // dd($blog);
            return redirect()->route('blog.index')->with('error','Something went wrong !');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);
        if($blog->delete())
        {
            return redirect()->route('blog.index');
        }
    }
}
