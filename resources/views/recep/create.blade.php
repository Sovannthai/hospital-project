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
        <form action="{{ route('recep.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-4">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-4">
                    <label for="">Gender</label>
                    <select name="gender" id="" class="form-control">
                        <option value="">Select..</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Optional">No more...</option>
                    </select>
                </div>
                <div class="form-group col-4">
                    <label for="">DOB</label>
                    <input type="date" name="dob" class="form-control">
                    @error('dob')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col-4">
                    <label for="">Phone</label>
                    <input type="Number" name="phone" class="form-control">
                    @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-4">
                    <label for="">Disease</label>
                    <select name="disease_id" id="" class="form-control">
                        <option value="">Select Desease...</option>
                        @foreach ($disease as $diseas)
                        <option value="{{ $diseas->id }}">{{ $diseas->diseas_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-4">
                    <label for="">Dr.</label>
                    <select name="doctor_id" id="" class="form-control">
                        <option value="">Select Dr...</option>
                        @foreach ($doctors as $doctor)
                        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-4">
                    <label for="">Nrs.</label>
                    <select name="nurse_id" id="" class="form-control">
                        <option value="">Select Dr...</option>
                        @foreach ($nurses as $nurse)
                        <option value="{{ $nurse->id }}">{{ $nurse->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-4">
                    <label for="">Appointment Date</label>
                    <input type="datetime-local" class="form-control" name="appointment_date">
                </div>
                <div class="form-group col-4">
                    <label for="">Status</label>
                    <select name="status" id="" class="form-control">
                        <option value="">Select..</option>
                        <option value="Pending">Pending</option>
                        <option value="Processing">Processing</option>
                        <option value="Completed">Completed</option>
                        <option value="Canceled">Canceled</option>
                    </select>
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
