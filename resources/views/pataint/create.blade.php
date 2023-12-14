@extends('layouts.admin')
@section('title','Hospital')
@section('content-header','Create Pataint');
@section('content')
<style>
    .form-control {
        border-radius: 0;
        height: 35px;
    }
</style>
<div class="card">
    <div class="card-body">
        <form action="{{ route('pataint.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-3">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-3">
                    <label for="">Gender</label>
                    <select name="gender" id="" class="form-control">
                        <option value="">Select..</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Optional">No more...</option>
                    </select>
                </div>
                <div class="form-group col-3">
                    <label for="">DOB</label>
                    <input type="date" name="dob" class="form-control">
                    @error('dob')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-3">
                    <label for="">Phone</label>
                    <input type="Number" name="phone" class="form-control">
                    @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <textarea name="address" id="" rows="4" class="form-control"></textarea>
                @error('address')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button class="btn btn-success">Save</button>
        </form>
    </div>
</div>
@endsection
