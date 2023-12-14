@extends('layouts.admin')
@section('title','Hospital')
@section('content-header','Edit Pataint');
@section('content')
<style>
    .form-control {
        border-radius: 0;
        height: 35px;
    }
</style>
<div class="card">
    <div class="card-body">
        <form action="{{ route('pataint.update',['pataint'=>$pataint->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="form-group col-3">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $pataint->name }}">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-3">
                    <label for="">Gender</label>
                    <select name="gender" id="" class="form-control">
                        <option value="">Select..</option>
                        <option value="Male"{{ $pataint->gender == 'Male'?'selected':'' }}>Male</option>
                        <option value="Female"{{ $pataint->gender == 'Female'?'selected':'' }}>Female</option>
                        <option value="Optional"{{ $pataint->gender == 'Optional'?'selected':'' }}>No more...</option>
                    </select>
                </div>
                <div class="form-group col-3">
                    <label for="">DOB</label>
                    <input type="date" name="dob" class="form-control" value="{{$pataint->dob}}">
                    @error('dob')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-3">
                    <label for="">Phone</label>
                    <input type="Number" name="phone" class="form-control" value="{{ $pataint->phone }}">
                    @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <textarea name="address" id="" rows="4" class="form-control">{{ $pataint->address }}</textarea>
                @error('address')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button class="btn btn-success">Save</button>
        </form>
    </div>
</div>
@endsection
