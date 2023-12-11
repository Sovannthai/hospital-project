@extends('layouts.admin')
@section('title','Hospital')
@section('content-header','Create Pataint');
@section('content')
<style>
    .form-control{
        border-radius: 0;
        height: 35px;
    }
</style>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('recep.update',['recep'=>$recep->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group col-3">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $recep->name }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-3">
                        <label for="">Gender</label>
                        <select name="gender" id="" class="form-control">
                            <option value="">Select..</option>
                            <option value="Male"{{ $recep->gender == 'Male'?'selected':'' }}>Male</option>
                            <option value="Female"{{ $recep->gender == 'Female'?'selected':'' }}>Female</option>
                            <option value="Optional"{{ $recep->gender == 'Optional'?'selected':'' }}>No more...</option>
                        </select>
                    </div>
                    <div class="form-group col-3">
                        <label for="">DOB</label>
                        <input type="date" name="dob" class="form-control" value="{{ $recep->dob }}">
                        @error('dob')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-3">
                        <label for="">Phone</label>
                        <input type="Number" name="phone" class="form-control" value="{{ $recep->phone }}" >
                        @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-3">
                        <label for="">Disease</label>
                        <select name="disease_id" id="" class="form-control">
                            <option value="">Select Desease...</option>
                            @foreach ($disease as $diseas)
                            <option value="{{ $diseas->id }}" {{ $diseas->id == $recep->disease_id ?'selected':'' }}>{{ $diseas->diseas_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-3">
                        <label for="">Dr.</label>
                        <select name="user_doctor_id" id="" class="form-control">
                            <option value="">Select Dr...</option>
                            @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id }}" {{ $doctor->id == $recep->user_doctor_id ?'selected':'' }}>{{ $doctor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-3">
                        <label for="">Nrs.</label>
                        <select name="user_nurse_id" id="" class="form-control">
                            <option value="">Select Dr...</option>
                            @foreach ($nurses as $nurse)
                            <option value="{{ $nurse->id }}" {{ $nurse->id == $recep->user_nurse_id ?'selected':'' }}>{{ $nurse->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-3">
                        <label for="">Status</label>
                        <select name="status" id="" class="form-control">
                            <option value="">Select..</option>
                            <option value="Pending"{{ $recep->status == 'pending'?'selected':'' }}>Pending</option>
                            <option value="Processing"{{ $recep->status == 'processing'?'selected':'' }}>Processing</option>
                            <option value="Completed"{{ $recep->status == 'completed'?'selected':'' }}>Completed</option>
                            <option value="Canceled"{{ $recep->status == 'canceled'?'selected':'' }}>Canceled</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Address</label>
                    <textarea name="address" id="" rows="4" class="form-control">{{ $recep->address }}</textarea>
                    @error('address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                <button class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
@endsection
