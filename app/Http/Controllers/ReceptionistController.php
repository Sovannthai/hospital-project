<?php

namespace App\Http\Controllers;

use App\Models\Diseas;
use App\Models\User;
use App\Models\Usertype;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ReceptionistController extends Controller
{
    public function index()
    {
        return view('recep.index');
    }

    public function create()
    {
        $nurses=User::with('usertype')->where('user_type_id',2)->get();
        $doctors=User::with('usertype')->where('user_type_id',1)->get();

        $disease = Diseas::all();
        return view('recep.create',compact('disease','nurses','doctors'));
    }

    public function store(Request $request)
    {

    }
}
