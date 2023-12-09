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
            <form action="">
                <div class="row">
                    <div class="form-group col-4">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" required>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-4">
                        <label for="">Gender</label>
                        <select name="" id="" class="form-control" required>
                            <option value="">Select..</option>
                            <option value="">Male</option>
                            <option value="">Female</option>
                            <option value="">No more...</option>
                        </select>
                    </div>
                    <div class="form-group col-4">
                        <label for="">DOB</label>
                        <input type="date" name="dob" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-3">
                        <label for="">Phone</label>
                        <input type="Number" name="phone" class="form-control" required>
                    </div>
                    <div class="form-group col-3">
                        <label for="">Disease</label>
                        <select name="" id="" class="form-control" required>
                            <option value="">Select Desease...</option>
                            @foreach ($disease as $diseas)
                            <option value="">{{ $diseas->diseas_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-3">
                        <label for="">Dr.</label>
                        <select name="" id="" class="form-control" required>
                            <option value="">Select Dr...</option>
                            @foreach ($doctors as $doctor)
                                <option value="">{{ $doctor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-3">
                        <label for="">Nrs.</label>
                        <select name="" id="" class="form-control" required>
                            <option value="">Select Dr...</option>
                            <option value="">Dr. Savarak</option>
                            <option value="">Dr. vanara</option>
                            <option value="">Dr. Vichai</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Address</label>
                    <textarea name="" id="" rows="4" class="form-control" required></textarea>
                </div>
                <button class="btn btn-success"

                >Save</button>
            </form>
        </div>
    </div>
@endsection
