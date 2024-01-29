<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Blog;
use App\Models\User;
use App\Models\Diseas;
use App\Models\Contact;
use App\Models\Product;
use App\Models\BlogCategory;
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
        $blogs = Blog::select("*")
            ->offset(0)
            ->limit(3)
            ->get();
        $user = User::all();
        $blog_categories = BlogCategory::all();
        return view('frontend.home.index', compact('diseases', 'doctors', 'blogs', 'blog_categories','user'));
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

    public function blog(Request $request)
    {
        $query_param = [];
        $blogs = new Blog();
        if ($request->has('search')) {
            $key = explode(' ', $request['search']);
            $blogs = $blogs->where(function ($q) use ($key) {
                foreach ($key as $value) {
                    $q->Where('title', 'like', "%{$value}%")
                        ->orWhere('id', 'like', "%{$value}%");
                }
            });
            $query_param = ['search' => $request['search']];
        }
        $blogs = $blogs->paginate(8);
        $blog_categories = BlogCategory::all();
        return view('frontend.blog.index', compact('blogs', 'blog_categories','query_param'));
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

    public function profile($id)
    {
        $user = User::findOrFail($id);
        return view('frontend.profile.edit',compact('user'));
    }
    public function updatePf(Request $request, $id)
    {
        try{
            $user = User::findOrFail($id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $imageName = Carbon::now()->toDateString() . "-" . uniqid() . "." . $extension;
                $image->move(public_path('uploads/users'), $imageName);
                $user->image = $imageName;
            }

            $user->save();

            return redirect()->route('frontend.home')->with('update', 'User update successfully !');
        }catch(\Exception $e){
            return redirect()->route('frontend.home')->with('error','Something went wrong !');
        }
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
