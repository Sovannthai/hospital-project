<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use App\Models\Diseas;
use App\Models\Product;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $diseases = Diseas::all();
    //     return view('layouts.frontent',compact('diseases'));
    // }

    public function home()
    {
        $doctors = User::with('usertype')->where('user_type_id', 1)->get();
        $diseases = Diseas::all();
        return view('frontend.home.index', compact('diseases', 'doctors'));
    }

    public function aboutus()
    {
        $doctors = User::with('usertype')->where('user_type_id', 1)->limit(3)->get();
        return view('frontend.about.index', compact('doctors'));
    }

    public function doctor()
    {
        $doctors = User::with('usertype')->where('user_type_id', 1)->get();
        return view('frontend.doctor.index', compact('doctors'));
    }

    public function blog()
    {
        return view('frontend.blog.index');
    }

    public function contact()
    {
        return view('frontend.contact.index');
    }

    public function contactStore(Request $request)
    {
        try {
            $contact = new Contact();
            $contact->fullName = $request->fullName;
            $contact->email = $request->email;
            $contact->subject = $request->subject;
            $contact->message = $request->message;
            $contact->save();
            return redirect()->route('frontend.contact')->with('store', 'Your contact has been send successfully');
        } catch (\Exception $e) {
            return redirect()->route('frontend.contact')->with('error', 'Something went wrong!');
        }
    }

    public function product()
    {
        $products = Product::where('status', 1)->get();
        return view('frontend.product.index', compact('products'));
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
