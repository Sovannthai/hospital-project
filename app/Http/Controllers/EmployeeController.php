<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Employeegroup;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emp1 = Employee::count();
        $emps = Employee::all();
        $emp_groups = Employeegroup::where('status',1)->get();
        return view('employees.index', compact('emps', 'emp_groups','emp1'));
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
            'dob' => 'required',
            'phone' => 'required|max:15',
            'join_date' => 'required',
            'address' => 'required'
        ]);
        try
        {
            $emp = new Employee();
            $emp->name = $request->name;
            $emp->gender = $request->gender;
            $emp->mt_status = $request->mt_status;
            $emp->dob = $request->dob;
            $emp->phone = $request->phone;
            $emp->join_date = $request->join_date;
            $emp->address = $request->address;
            $emp->status = $request->has('status');
            $emp->emp_group_id = $request->emp_group_id;
            // dd($emp);
            $emp->save();

            return redirect()->route('employee.index')->with('store', 'Employee added successfully !');
        }catch(\Exception $e)
        {
            return redirect()->back()->with('error','Failed to create Employee. Please try again.!');
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
            $emp = Employee::findOrFail($id);
            $emp->name = $request->name;
            $emp->gender = $request->gender;
            $emp->mt_status = $request->mt_status;
            $emp->dob = $request->dob;
            $emp->phone = $request->phone;
            $emp->join_date = $request->join_date;
            $emp->address = $request->address;
            $emp->status = $request->has('status');
            $emp->emp_group_id = $request->emp_group_id;
            // dd($emp);
            $emp->save();
            return redirect()->route('employee.index')->with('update', 'Employee updated successfully !');
        }catch(\Exception $e)
        {
            return redirect()->back()->with('error','Failed to update Employee. Please try again.!');
        }
    }
    public function updateStatus($id)
    {
        $status = null;
        if (request('status') == 'true') {
            $status = 1;
        } else {
            $status = 0;
        }
        $emp = Employee::findOrFail($id);
        $emp->update(['status' => $status]);
        return response()->json(['status' => $emp->status]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $emp = Employee::findOrFail($id);
        if($emp->delete())
        {
            return redirect()->route('employee.index')->with('delete', 'Employee deleted successfully !');
        }
    }
}
