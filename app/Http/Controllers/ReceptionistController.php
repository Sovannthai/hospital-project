<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Nurse;
use App\Models\Diseas;
use App\Models\Doctor;
use App\Models\Receptionist;
use Illuminate\Http\Request;
use App\Http\Requests\ErrorRequest;
use Illuminate\Contracts\Database\Eloquent\Builder;

class ReceptionistController extends Controller
{
    public function index()
    {
        $receps = Receptionist::all();
        $disease = Diseas::all();
        $users = User::all();
        $forreceps = Receptionist::paginate(5);
        return view('recep.index', compact('receps', 'disease', 'users', 'forreceps'));
    }

    public function create()
    {
        $nurses = User::with('usertype')->where('user_type_id', 2)->get();
        $doctors = User::with('usertype')->where('user_type_id', 1)->get();

        $disease = Diseas::all();
        return view('recep.create', compact('disease', 'nurses', 'doctors'));
    }

    public function store(ErrorRequest $request)
    {

        $recep = new Receptionist();
        $recep->name = $request->name;
        $recep->gender = $request->gender;
        $recep->dob = $request->dob;
        $recep->phone = $request->phone;
        $recep->disease_id = $request->disease_id;
        $recep->user_doctor_id = $request->user_doctor_id;
        $recep->user_nurse_id = $request->user_nurse_id;
        $recep->address = $request->address;
        $recep->status = $request->status;
        // dd($recep);
        $recep->save();
        if ($request->user_doctor_id) {
            $doctor = new Doctor();
            $doctor->name = $request->name;
            $doctor->gender = $request->gender;
            $doctor->dob = $request->dob;
            $doctor->phone = $request->phone;
            $doctor->disease_id = $request->disease_id;
            $doctor->user_doctor_id = $request->user_doctor_id;
            $doctor->address = $request->address;
            $doctor->status = $request->status;
            // dd($doctor);
            $doctor->save();
        }
        elseif ($request->user_nurse_id) {
            $nurse = new Nurse();
            $nurse->name = $request->name;
            $nurse->gender = $request->gender;
            $nurse->dob = $request->dob;
            $nurse->phone = $request->phone;
            $nurse->disease_id = $request->disease_id;
            $nurse->user_nurse_id = $request->user_nurse_id;
            $nurse->address = $request->address;
            $nurse->status = $request->status;
            $nurse->save();
        }

        return redirect()->route('recep.index')->with('store', 'Your record has been added successfully!');
    }

    public function show()
    {
        //
    }

    public function edit($id)
    {
        $recep = Receptionist::find($id);
        $disease = Diseas::all();
        $nurses = User::with('usertype')->where('user_type_id', 2)->get();
        $doctors = User::with('usertype')->where('user_type_id', 1)->get();
        return view('recep.edit', compact('recep', 'disease', 'nurses', 'doctors'));
    }

    public function update(Request $request, $id)
    {
        $recep = Receptionist::findOrfail($id);
        $recep->name = $request->name;
        $recep->gender = $request->gender;
        $recep->dob = $request->dob;
        $recep->phone = $request->phone;
        $recep->disease_id = $request->disease_id;
        $recep->user_doctor_id = $request->user_doctor_id;
        $recep->user_nurse_id = $request->user_nurse_id;
        $recep->address = $request->address;
        $recep->status = $request->status;
        $recep->save();
        if ($request->user_doctor_id) {
            $doctor = Doctor::where('user_doctor_id',$request->user_doctor_id)->first();
            // dd($doctor);
            $doctor->name = $request->name;
            $doctor->gender = $request->gender;
            $doctor->dob = $request->dob;
            $doctor->phone = $request->phone;
            $doctor->disease_id = $request->disease_id;
            $doctor->user_doctor_id = $request->user_doctor_id;
            $doctor->address = $request->address;
            $doctor->status = $request->status;
            $doctor->save();
        }
        elseif ($request->user_nurse_id) {
            $nurse = Nurse::where('user_nurse_id',$request->user_nurse_id)->first();
            // dd($request->user_nurse_id);
            $nurse->name = $request->name;
            $nurse->gender = $request->gender;
            $nurse->dob = $request->dob;
            $nurse->phone = $request->phone;
            $nurse->disease_id = $request->disease_id;
            $nurse->user_nurse_id = $request->user_nurse_id;
            $nurse->address = $request->address;
            $nurse->status = $request->status;
            // dd($nurse);
            $nurse->save();
        }
        return redirect()->route('recep.index')->with('update', 'Your recorde has updated successfully !');
    }

    public function destroy($id)
    {
        $recep = Receptionist::find($id);
        if ($recep->delete()) {
            return redirect()->route('recep.index')->with('delete', 'Your recode has deleted successfully !');
        }
    }
}
