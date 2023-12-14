@extends('layouts.admin')
@section('title','Hospital')
@section('content-header','Add Appointment');
@section('content')
<style>
    .form-control {
        border-radius: 0;
        height: 35px;
    }
</style>
<div class="card">
    <div class="card-body">
        <form action="{{ route('appointment.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-4">
                    <label for="">Pataint Name</label>
                    <select name="pataint_id" id="" class="form-control">
                        <option value="">Select Pataint...</option>
                        @foreach ($pataints as $pataint)
                        <option value="{{ $pataint->id }}">{{ $pataint->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-4">
                    <label for="">Disease</label>
                    <select name="disease_id" id="" class="form-control">
                        <option value="">Select Desease...</option>
                        @foreach ($diseases as $diseas)
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
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
</div>
@endsection
