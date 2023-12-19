<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpgroupRequest;
use App\Models\Employeegroup;
use Illuminate\Http\Request;

class EmployeegroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emp_groups = Employeegroup::all();
        return view('employee_group.index', compact('emp_groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('employee_group.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $emp_group = new Employeegroup();
        $emp_group->type_name = $request->type_name;
        $emp_group->status = $request->has('status');
        $emp_group->save();
        return redirect()->route('emp_group.index')->with('store', 'Employee group added successfully !');
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
        $emp_group =  Employeegroup::find($id);
        $emp_group->type_name = $request->type_name;
        $emp_group->status = $request->has('status');
        $emp_group->save();
        return redirect()->route('emp_group.index')->with('update', 'Employee group added successfully !');
    }

    public function updateStatus($id)
    {
        $status = null;
        if (request('status') == 'true') {
            $status = 1;
        } else {
            $status = 0;
        }
        $emp_group = Employeegroup::findOrFail($id);
        $emp_group->update(['status' => $status]);
        return response()->json(['status' => $emp_group->status]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $emp_group = Employeegroup::findOrFail($id);
        if ($emp_group->delete()) {
            return redirect()->route('emp_group.index');
        }
    }
}
