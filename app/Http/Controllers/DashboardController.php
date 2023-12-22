<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pataint;
use App\Models\Employee;
use App\Models\Appointment;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emp = Employee::count();
        $appointment = Appointment::count();
        $pataint = Pataint::count();
        $doctors = User::with('usertype')->where('user_type_id', 1)->count();
        $nurses = User::with('usertype')->where('user_type_id', 2)->count();
        $users = User::count();
        $product = Product::count();
        return view('home',compact('appointment','pataint','doctors','nurses','users','emp','product'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
