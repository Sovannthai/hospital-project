@extends('layouts.admin')
@section('title','Profile')
@section('content-header','Profile')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('profile.update',['id'=>auth()->user()->id]) }}" class="" method="POSt" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="form-group col-4">
                    <label for="">Prefix</label>
                    <input type="text" name="prefix" class="form-control" value="{{ $user->prefix }}">
                </div>
                <div class="form-group col-4">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-4">
                    <label for="">Email</label>
                    <input type="email" name="email" id="" class="form-control" value="{{ $user->email }}">
                </div>
                <div class="form-group col-4">
                    <label for="">Password</label>
                    <input type="password" name="password" id="" class="form-control" value="{{ $user->password }}">
                </div>
            </div>
            <div>
                <label for="file">File</label>
            </div>
            <div class="card" style="border: hidden;width:66%;height:250px">
                <div class="img-preview img-banner">
                    <img src="{{ asset('uploads/users/'.$user->image) }}" style="width:auto;height:100%;">
                </div>
                <div class="form-group">
                    <input type="file" name="image" class="form-control" id="file">
                </div>
            </div>
            <div>
                <span>
                    <a href="{{ route('home') }}" class="btn btn-secondary">Back</a>
                </span>
                <button type="submit" class="btn btn-primary" style="">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
