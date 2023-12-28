<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = Unit::all();
        return view('unit.index', compact('units'));
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
        try {
            $unit = new Unit();
            $unit->name = $request->name;
            $unit->save();

            return redirect()->route('unit.index')->with('store', 'Unit has added successfully !');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create Unit. Please try again.!');
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
            $unit = Unit::findOrFail($id);
            $unit->name = $request->name;
            $unit->save();

            return redirect()->route('unit.index')->with('update', 'Unit has added successfully !');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update Unit. Please try again.!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $unit = Unit::find($id);
        if ($unit->delete()) {
            return redirect()->route('unit.index')->with('delete', 'Unit has deleted successfully !');
        }
    }
}
