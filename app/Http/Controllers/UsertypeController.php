<?php

namespace App\Http\Controllers;

use App\Models\Usertype;
use Illuminate\Http\Request;

class UsertypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usertypes = Usertype::all();
        return view('usermanagement.usertype.index',compact('usertypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usermanagement.usertype.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usertype = new Usertype;
        $usertype->type_name = $request->input('type_name');
        $usertype->save();
        return redirect()->route('usermanagement.usertype.index');
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
    public function update(Request $request,$id)
    {
        $usertype = Usertype::find($id);
        $usertype->type_name = $request->input('type_name');
        $usertype->save();
        return redirect()->route('usermanagement.usertype.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $usertype = Usertype::find($id);
        $usertype->delete();
        return redirect()->route('usermanagement.usertype.index');
    }
}
