<style>
    .checkbox{
        width: 20px;
        height: 20px;
    }
</style>
<!-- Modal -->
<div class="modal fade" id="edit-{{ $staff->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Create Staff</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('staff.update',['staff'=>$staff->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-3">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $staff->name }}">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-3">
                            <label for="">Sex</label>
                            <select name="sex" id="" class="form-control">
                                <option value="">Select..</option>
                                <option value="Male"{{ $staff->sex == 'Male'?'selected':'' }}>Male</option>
                                <option value="Female"{{ $staff->sex == 'Female'?'selected':'' }}>Female</option>
                                <option value="Optional"{{ $staff->sex == 'Optional'?'selected':'' }}>No more...</option>
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <label for="">DOB</label>
                            <input type="date" name="dob" class="form-control" value="{{ $staff->dob }}">
                            @error('dob')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-3">
                            <label for="">Phone</label>
                            <input type="Number" name="phone" class="form-control" value="{{ $staff->phone }}">
                            @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-3">
                            <label for="">Salary</label>
                            <input type="Number" name="salary" class="form-control" value="{{ $staff->salary }}">
                            @error('salary')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-3">
                            <label for="">Position</label>
                            <select name="position" id="" class="form-control">
                                <option value="">Select..</option>
                                <option value="Cleaner"{{ $staff->position == 'Cleaner'?'selected':'' }}>Cleaner</option>
                                <option value="Security"{{ $staff->position == 'Security'?'selected':'' }}>Security</option>
                                <option value="Driver"{{ $staff->position == 'Driver'?'selected':'' }}>Driver</option>
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <label for="">Hired Date</label>
                            <input type="date" name="hired_date" class="form-control" value="{{ $staff->hired_date }}">
                            @error('dob')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-3">
                            <label for="">Stop Date</label>
                            <input type="date" name="stop_date" class="form-control" value="{{ $staff->stop_date }}">
                            @error('dob')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="file">File</label>
                        <input type="file" name="image" class="form-control" id="file">
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <textarea name="address" id="" rows="4" class="form-control">{{ $staff->address }}</textarea>
                        @error('address')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <span>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"  style="position: relative;left:970px;">Close</button>
                        </span>
                        <button type="submit" class="btn btn-primary" style="position: relative;left:975px;">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
