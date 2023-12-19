<?php

namespace App\Http\Controllers;

use auth;
use App\Models\User;
use App\Models\Diseas;
use App\Models\Pataint;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Requests\AppointmentRequest;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $appointments = Appointment::all();
        $diseases = Diseas::all();
        $pataints = Pataint::all();
        $users = User::all();
        $appointments = Appointment::paginate(5);
        $app = Appointment::count();
        return view('appointment.index', compact('appointments', 'diseases', 'pataints', 'users','app'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $appointment = Appointment::all();
        $diseases = Diseas::all();
        $pataints = Pataint::all();
        // $nurses = User::with('usertype')->where('user_type_id', 2)->get();
        $doctors = User::with('usertype')->where('user_type_id', 1)->get();

        return view('appointment.create', compact('appointment', 'diseases', 'pataints', 'doctors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $appointment = new Appointment();
        $appointment->pataint_id = $request->pataint_id;
        $appointment->disease_id = $request->disease_id;
        $appointment->doctor_id = $request->doctor_id;
        $appointment->appointment_date = $request->appointment_date;
        $appointment->status = $request->status;
        $appointment->created_by = auth()->user()->id;
        $appointment->save();
        return redirect()->route('appointment.index')->with('store', 'Appointment create successfully !');
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
        $appointment = Appointment::find($id);
        $diseases = Diseas::all();
        $pataints = Pataint::all();
        $doctors = User::with('usertype')->where('user_type_id', 1)->get();
        return view('appointment.edit', compact('appointment', 'diseases', 'pataints', 'doctors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $appointment = Appointment::find($id);
        $appointment->pataint_id = $request->pataint_id;
        $appointment->disease_id = $request->disease_id;
        $appointment->doctor_id = $request->doctor_id;
        $appointment->appointment_date = $request->appointment_date;
        $appointment->status = $request->status;
        $appointment->created_by = auth()->user()->id;
        $appointment->save();

        return redirect()->route('appointment.index')->with('update', 'Appointment update successfully !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $appointment = Appointment::find($id);
        if ($appointment->delete()) {
            return redirect()->route('appointment.index')->with('delete', 'Appointment has delete successfully !');
        }
    }
}
