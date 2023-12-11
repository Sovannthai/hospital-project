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
        <form action="{{ route('doctor.update',['doctor'=>$doctor->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="form-group col-3">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $doctor->name }}">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-3">
                    <label for="">Gender</label>
                    <select name="gender" id="" class="form-control">
                        <option value="">Select..</option>
                        <option value="Male"{{ $doctor->gender == 'Male'?'selected':'' }}>Male</option>
                        <option value="Female"{{ $doctor->gender == 'Female'?'selected':'' }}>Female</option>
                        <option value="Optional"{{ $doctor->gender == 'Optional'?'selected':'' }}>No more...</option>
                    </select>
                </div>
                <div class="form-group col-3">
                    <label for="">DOB</label>
                    <input type="date" name="dob" class="form-control" value="{{ $doctor->dob }}">
                    @error('dob')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-3">
                    <label for="">Phone</label>
                    <input type="Number" name="phone" class="form-control" value="{{ $doctor->phone }}">
                    @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col-4">
                    <label for="">Dr.</label>
                    <select name="user_doctor_id" id="" class="form-control">
                        <option value="">Select Dr...</option>
                        @foreach ($doctorss as $doctors)
                            <option value="{{ $doctors->id }}" {{ $doctors->id == $doctor->user_doctor_id ?'selected':'' }}>{{ $doctor->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-4">
                    <label for="">Disease</label>
                    <select name="disease_id" id="" class="form-control">
                        <option value="">Select Desease...</option>
                        @foreach ($disease as $diseas)
                        <option value="{{ $diseas->id }}"{{ $diseas->id == $doctor->disease_id ?'selected':'' }}>{{ $diseas->diseas_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-4">
                    <label for="">Status</label>
                    <select name="status" id="" class="form-control">
                        <option value="">Select..</option>
                        <option value="Pending"{{ $doctor->status == 'pending'?'selected':'' }}>Pending</option>
                        <option value="Processing"{{ $doctor->status == 'processing'?'selected':'' }}>Processing</option>
                        <option value="Completed"{{ $doctor->status == 'completed'?'selected':'' }}>Completed</option>
                        <option value="Canceled"{{ $doctor->status == 'canceled'?'selected':'' }}>Canceled</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <textarea name="address" id="" rows="4" class="form-control">{{ $doctor->address }}</textarea>
                @error('address')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button class="btn btn-success">Save</button>
        </form>
    </div>
</div>
@endsection
