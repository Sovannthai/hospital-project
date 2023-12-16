<?php

namespace App\Http\Controllers;

use App\Http\Requests\ErrorRequest;
use App\Models\Pataint;
use Illuminate\Http\Request;

class PataintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pataints = Pataint::paginate(5);
        return view('pataint.index',compact('pataints'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pataint.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ErrorRequest $request)
    {
        $pataint = new Pataint();
        $pataint->name = $request->name;
        $pataint->gender = $request->gender;
        $pataint->dob = $request->dob;
        $pataint->phone = $request->phone;
        $pataint->address = $request->address;
        $pataint->save();

        return redirect()->route('pataint.index')->with('store','Pataint has added successfully !');
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
        $pataint = Pataint::find($id);
        return view('pataint.edit',compact('pataint'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pataint = Pataint::find($id);
        $pataint->name = $request->name;
        $pataint->gender = $request->gender;
        $pataint->dob = $request->dob;
        $pataint->phone = $request->phone;
        $pataint->address = $request->address;
        $pataint->save();

        return redirect()->route('pataint.index')->with('update','Pataint has updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pataint = Pataint::find($id);
        if ($pataint->delete())
        {
            return redirect()->route('pataint.index')->with('delete','Pataint has deleted successfully !');
        }
    }
}
