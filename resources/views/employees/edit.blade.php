<style>
    .checkbox{
        width: 20px;
        height: 20px;
    }
</style>
<!-- Modal -->
<div class="modal fade" id="edit-{{ $emp->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Employee</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('employee.update',['employee'=>$emp->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-3">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $emp->name }}">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-3">
                            <label for="">Gender</label>
                            <select name="gender" id="" class="form-control">
                                <option value="">Select..</option>
                                <option value="Male"{{ $emp->gender == 'Male'?'selected':'' }}>Male</option>
                                <option value="Female"{{ $emp->gender == 'Female'?'selected':'' }}>Female</option>
                                <option value="Optional"{{ $emp->gender == 'Optional'?'selected':'' }}>Onptional</option>
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <label for="">Marital Status</label>
                            <select name="mt_status" id="" class="form-control">
                                <option value="">Select..</option>
                                <option value="Single"{{ $emp->mt_status == 'Single'?'selected':'' }}>Single</option>
                                <option value="Married" {{ $emp->mt_status == 'Married'?'selected':'' }}>Married</option>
                                <option value="Widow" {{ $emp->mt_status == 'Widow'?'selected':'' }}>Widow</option>
                                <option value="Optional" {{ $emp->mt_status == 'Optional'?'selected':'' }}>Optional</option>
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <label for="">Group</label>
                            <select name="emp_group_id" id="" class="form-control">
                                <option value="">Select..</option>
                                @foreach ($emp_groups as $emp_group)
                                <option value="{{ $emp_group->id }}" {{ $emp_group->id == $emp->emp_group_id ?'selected':'' }}>{{ $emp_group->type_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-3">
                            <label for="">Phone</label>
                            <input type="Number" name="phone" class="form-control" value="{{ $emp->phone }}">
                            @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-3">
                            <label for="">Salary</label>
                            <input type="Number" name="salary" class="form-control" value="{{ $emp->salary }}">
                            @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-3">
                            <label for="">DOB</label>
                            <input type="date" name="dob" class="form-control" value="{{ $emp->dob }}">
                            @error('dob')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-3">
                            <label for="">Join Date</label>
                            <input type="date" name="join_date" class="form-control" value="{{ $emp->join_date }}">
                            @error('dob')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <textarea name="address" id="" rows="4" class="form-control">{{ $emp->address }}</textarea>
                        @error('address')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class=" form-group">
                        <label for="active">Active:</label>
                        <input type="hidden" name="status_old" value="{{ $emp->status }}">
                        <input type="checkbox" name="status" {{ $emp->status ? 'checked' : '' }}>
                    </div>
                    <div>
                        <span>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"  style="position: relative;left:945px;">Cancel</button>
                        </span>
                        <button type="submit" class="btn btn-primary" style="position: relative;left:950px;">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
