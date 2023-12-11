<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Nurse;
use App\Models\Diseas;
use App\Models\Receptionist;
use Illuminate\Http\Request;

class NurseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nurses = Nurse::all();
        $disease = Diseas::all();
        return view('nurse.index',compact('disease','nurses'));
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
        //
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
        $nursess = User::with('usertype')->where('user_type_id', 2)->get();
        $nurse = Nurse::find($id);
        $disease = Diseas::all();
        return view('nurse.edit',compact('disease','nurse','nursess'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $nurse = Nurse::find($id);
        $nurse->name = $request->name;
        $nurse->gender = $request->gender;
        $nurse->dob = $request->dob;
        $nurse->phone = $request->phone;
        $nurse->disease_id = $request->disease_id;
        $nurse->address = $request->address;
        $nurse->status = $request->status;
        $nurse->save();

        $recep = Receptionist::where('user_nurse_id', $nurse->id)->first();
        // dd($recep);
        $recep->name = $request->name;
        $recep->gender = $request->gender;
        $recep->dob = $request->dob;
        $recep->phone = $request->phone;
        $recep->disease_id = $request->disease_id;
        $recep->address = $request->address;
        $recep->status = $request->status;
        // dd($recep);
        $recep->save();

        return redirect()->route('nurse.index')->with('update','Your recode has updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
