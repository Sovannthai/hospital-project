<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Diseas;
use App\Models\Doctor;
use App\Models\Receptionist;
use Illuminate\Http\Request;
use App\Http\Requests\ErrorRequest;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recep = Receptionist::all();
        $doctors = Doctor::all();
        $doctorss = Doctor::paginate(5);
        return view('doctor.index',compact('doctors','recep','doctorss'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $disease = Diseas::all();
        $doctors = Doctor::all();
        return view('doctor.create',compact('disease','doctors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ErrorRequest $request)
    {
        $doctor = new Doctor();
        $doctor->name = $request->name;
        $doctor->gender = $request->gender;
        $doctor->dob = $request->dob;
        $doctor->phone = $request->phone;
        $doctor->disease_id = $request->disease_id;
        $doctor->address = $request->address;
        $doctor->status = $request->status;
        $doctor->save();

        $recep = new Receptionist();
        $recep->name = $request->name;
        $recep->gender = $request->gender;
        $recep->dob = $request->dob;
        $recep->phone = $request->phone;
        $recep->disease_id = $request->disease_id;
        $recep->doctor_id = $request->doctor_id;
        $recep->nurse_id = $request->nurse_id;
        $recep->address = $request->address;
        $recep->status = $request->status;
        $recep->save();

        return redirect()->route('doctor.index')->with('store','Your record has added successfully !');
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
        $doctor = Doctor::find($id);
        $disease = Diseas::all();
        $doctorss = User::with('usertype')->where('user_type_id', 1)->get();
        return view('doctor.edit',compact('doctor','disease','doctorss'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $doctor = Doctor::find($id);
        $doctor->name = $request->name;
        $doctor->gender = $request->gender;
        $doctor->dob = $request->dob;
        $doctor->phone = $request->phone;
        $doctor->disease_id = $request->disease_id;
        $doctor->address = $request->address;
        $doctor->status = $request->status;
        $doctor->save();

        // $recep = Receptionist::find($id);
        $recep = Receptionist::where('user_nurse_id', $doctor->id)->first();
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

        return redirect()->route('doctor.index')->with('update','Your recode has updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
