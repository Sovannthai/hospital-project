<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use App\Models\Users;
use App\Models\Usertype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usertypes = Usertype::all();
        $users = User::paginate(3);
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
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->password = $request->input('password');
        $users->prefix = $request->input('prefix');
        $users->user_type_id = $request->input('user_type_id');
        $users->salary = $request->input('salary');

        if ($request->has('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $imageName = Carbon::now()->toDateString() . "-" . uniqid() . "." . $extension;
            $image->move(public_path('uploads/users'), $imageName);
            $users->image = $imageName;
        }

        $users->save();
        return redirect()->route('usermanagement.user.index')->with('store','User create successfully !');
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
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->prefix = $request->input('prefix');
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

        return redirect()->route('usermanagement.user.index')->with('update','User update successfully !');
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
            return redirect()->route('usermanagement.user.index')->with('delete', 'User deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to delete user.');
        }
    }
}
