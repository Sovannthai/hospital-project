<style>
    .checkbox{
        width: 20px;
        height: 20px;
    }
</style>
<!-- Modal -->
<div class="modal fade" id="create" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Create Employee</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('employee.store') }}" method="POST">
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
                            <label for="">Marital Status</label>
                            <select name="mt_status" id="" class="form-control">
                                <option value="">Select..</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Widow">Widow</option>
                                <option value="Optional">Optional</option>
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <label for="">Group</label>
                            <select name="emp_group_id" id="" class="form-control">
                                <option value="">Select..</option>
                                @foreach ($emp_groups as $emp_group)
                                <option value="{{ $emp_group->id }}">{{ $emp_group->type_name }}</option>
                                @endforeach
                            </select>
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
                            <label for="">DOB</label>
                            <input type="date" name="dob" class="form-control">
                            @error('dob')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-4">
                            <label for="">Join Date</label>
                            <input type="date" name="join_date" class="form-control">
                            @error('dob')
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
                    <div class=" form-group">
                        <label for="active">Active:</label>
                        <input type="checkbox" name="status" value="Active">
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
