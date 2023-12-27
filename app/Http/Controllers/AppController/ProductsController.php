<?php

namespace App\Http\Controllers\AppController;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    public function list()
    {
        $product = Product::all();
        $data = [
            'status' => 200,
            'product' => $product
        ];
        return response()->json($data, 200);
    }

    public function upload(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'code' => 'required|unique:products,code',
                'category_id' => 'required',
                'unit_id' => 'required',
                'price' => 'required'
            ]
        );
        if ($validate->fails()) {
            $data = [
                'status' => 422,
                'errors' => $validate->errors()
            ];
            return response()->json($data, 422);
        } else {
            $product = new Product();
            $product->name = $request->name;
            $product->code = $request->code;
            $product->category_id = $request->category_id;
            $product->unit_id = $request->unit_id;
            $product->price = $request->price;
            $product->description = $request->description;
            $product->status = $request->has('status');
            if ($request->has('image')) {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $imageName = Carbon::now()->toDateString() . "-" . uniqid() . "." . $extension;
                $image->move(public_path('uploads/product'), $imageName);
                $product->image = $imageName;
            }
            $product->save();
            $data = [
                'status' => 200,
                'message' => 'Product created successfully',
                'product' => $product
            ];
        }
        return response()->json($data, 200);
    }

    public function change(Request $request, $id)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'code' => 'required|unique:products,code',
                'category_id' => 'required',
                'unit_id' => 'required',
                'price' => 'required'
            ]
        );
        if ($validate->fails()) {
            $data = [
                'status' => 422,
                'errors' => $validate->errors()
            ];
            return response()->json($data, 422);
        } else {
            $product = Product::find($id);
            $product->name = $request->name;
            $product->code = $request->code;
            $product->category_id = $request->category_id;
            $product->unit_id = $request->unit_id;
            $product->price = $request->price;
            $product->description = $request->description;
            $product->status = $request->has('status');
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $imageName = Carbon::now()->toDateString() . "-" . uniqid() . "." . $extension;
                $image->move(public_path('uploads/product'), $imageName);
                $product->image = $imageName;
            }
            $product->save();
            $data = [
                'status' => 200,
                'message' => 'Product updated successfully',
                'product' => $product
            ];
        }
        return response()->json($data, 200);
    }

    public function deleted($id)
    {
        $product = Product::find($id);
        $product->delete();
        $data = [
            'status' => 200,
            'message' => 'Product deleted successfully'
        ];
        return response()->json($data, 200);
    }
}
