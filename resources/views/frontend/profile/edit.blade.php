@extends('layouts.frontent')
@section('title','Profile')
@section('content')
<h3 class=" text-center mt-2">Profile</h3>
<div class="card" style="width: 18cm;margin:auto;">
    <div class="card-body mx-auto">
        <form action="{{ route('frontpf.update',['id'=>auth()->user()->id]) }}" class="" method="POSt" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="form-group col-6">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                </div>
                <div class="form-group col-6">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control" value="{{ $user->email }}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="">Phone</label>
                    <input type="number" name="phone" id="" class="form-control" value="{{ $user->phone }}">
                </div>
                <div class="form-group col-6">
                    <label for="">Password</label>
                    <input type="password" name="password" id="" class="form-control" value="{{ $user->password }}">
                </div>
            </div>
            <div>
                <label for="">Address</label>
                <textarea name="address" rows="3" class="form-control">{{ $user->address }}</textarea>
            </div>
            <div>
                <label for="file">Image</label>
            </div>
            <div class="" style="border: hidden;width:100%;height:250px">
                <div class="img-preview img-thumbnail" style="border: hidden;">
                    <img src="{{ asset('uploads/users/'.$user->image) }}" style="width:200px;height:200px;">
                </div>
                <div class="form-group">
                    <input type="file" name="image" class="form-control" id="file">
                </div>
            </div>
            <div class="mt-3">
                <span>
                    <a href="{{ route('frontend.home') }}" class="btn btn-dark">Cancel</a>
                </span>
                <button type="submit" class="btn btn-primary" style="">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
