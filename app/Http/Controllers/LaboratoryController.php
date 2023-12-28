<?php

namespace App\Http\Controllers;

use App\Models\Laboratory;
use Illuminate\Http\Request;

class LaboratoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laboratories = Laboratory::all();
        return view('laboratory.index',compact('laboratories'));
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
            $laboratory = new Laboratory();
            $laboratory->name = $request->name;
            $laboratory->save();
            return redirect()->route('laboratory.index')->with('store','laboratory added successfully !');
        }catch(\Exception $e)
        {
            return redirect()->back()->with('error','Failed to create Laboratory. Please try again.!');
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
            $laboratory = Laboratory::find($id);
            $laboratory->name = $request->name;
            $laboratory->save();
            return redirect()->route('laboratory.index')->with('update','laboratory added successfully !');
        }catch(\Exception)
        {
            return redirect()->back()->with('error','Failed to update Laboratory. Please try again.!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $laboratory = Laboratory::findOrFail($id);
        if ($laboratory->delete()) {
            return redirect()->route('laboratory.index');
        }
    }
}
