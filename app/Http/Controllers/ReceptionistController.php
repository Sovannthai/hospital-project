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
        $recep->doctor_id = $request->doctor_id;
        $recep->nurse_id = $request->nurse_id;
        $recep->appointment_date = $request->appointment_date;
        $recep->address = $request->address;
        $recep->status = $request->status;
        // dd($recep);
        $recep->save();
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
        $recep->doctor_id = $request->doctor_id;
        $recep->nurse_id = $request->nurse_id;
        $recep->appointment_date = $request->appointment_date;
        $recep->address = $request->address;
        $recep->status = $request->status;
        $recep->save();
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
