<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use App\Models\Users;
use App\Models\Usertype;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usertypes = Usertype::all();
        $users = User::all();
        return view('usermanagement.user.index', compact('usertypes', 'users'));
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
        $users = new User;
        $users->prefix = $request->prefix;
        $users->name = $request->name;
        $users->user_type_id = $request->user_type_id;
        $users->salary = $request->salary;

        if ($request->has('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $imageName = Carbon::now()->toDateString() . "-" . uniqid() . "." . $extension;
            $image->move(public_path('uploads/users'), $imageName);
            $users->image = $imageName;
        }

        $users->save();
        return redirect()->route('usermanagement.user.index');
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
        $usertypes = Usertype::all();
        $user = User::find($id);
        return view('usermanagement.user.edit', compact('usertypes', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->prefix = $request->input('prefix');
        $user->name = $request->input('name');
        $user->user_type_id = $request->input('user_type_id');
        $user->salary = $request->input('salary');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $imageName = Carbon::now()->toDateString() . "-" . uniqid() . "." . $extension;
            $image->move(public_path('uploads/users'), $imageName);
            $user->image = $imageName;
        }

        $user->save();

        return redirect()->route('usermanagement.user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        if ($user->delete()) {
            return redirect()->route('usermanagement.user.index')->with('success', 'User deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to delete user.');
        }
    }
}
