<?php

namespace App\Http\Controllers;

use App\Models\Diseas;
use Illuminate\Http\Request;

class DiseasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $diseass = Diseas::all();
        $diseases = Diseas::paginate(5);
        return view('diseas.index',compact('diseases'));
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
        $diseas = new Diseas();
        $diseas->diseas_name = $request->diseas_name;
        $diseas->save();
        return redirect()->route('diseas.index')->with('store','Your record has added successfully !');

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
        $diseas = Diseas::find($id);
        $diseas->diseas_name = $request->input('diseas_name');
        $diseas->save();
        return redirect()->route('diseas.index')->with('update','Your record has update successfully !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $diseas = Diseas::find($id);
        if($diseas->delete()){
            return redirect()->route('diseas.index')->with('delete','Your record has deleted !');
        }
    }
}
