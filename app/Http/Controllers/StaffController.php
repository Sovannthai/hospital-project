<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffs = Staff::all();
        return view('staff.index',compact('staffs'));
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
        $request->validate([
            'name' => 'required|min:5',
            'sex' => 'required',
            'phone' => 'required|max:15',
            'salary' => 'required',
            'address' => 'required'
        ]);
        $staff = new Staff();
        $staff->name = $request->name;
        $staff->sex = $request->sex;
        $staff->dob = $request->dob;
        $staff->phone = $request->phone;
        $staff->position = $request->position;
        $staff->salary = $request->salary;
        $staff->hired_date = $request->hired_date;
        $staff->stop_date = $request->stop_date;
        $staff->address = $request->address;
        if ($request->has('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $imageName = Carbon::now()->toDateString() . "-" . uniqid() . "." . $extension;
            $image->move(public_path('uploads/users'), $imageName);
            $staff->image = $imageName;
        }
        // dd($staff);
        $staff->save();
        return redirect()->route('staff.index')->with('store', 'Staff added successfully !');
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
        $staff = Staff::find($id);
        $staff->name = $request->name;
        $staff->sex = $request->sex;
        $staff->dob = $request->dob;
        $staff->phone = $request->phone;
        $staff->position = $request->position;
        $staff->salary = $request->salary;
        $staff->hired_date = $request->hired_date;
        $staff->stop_date = $request->stop_date;
        $staff->address = $request->address;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $imageName = Carbon::now()->toDateString() . "-" . uniqid() . "." . $extension;
            $image->move(public_path('uploads/users'), $imageName);
            $staff->image = $imageName;
        }
        $staff->save();
        return redirect()->route('staff.index')->with('update', 'Staff updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $staff = Staff::find($id);
        if($staff->delete())
        {
            return redirect()->route('staff.index')->with('delete','Staff deleted successfully !');
        }
    }
}
