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
                <h5 class="modal-title" id="staticBackdropLabel">Create Staff</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('staff.store') }}" method="POST" enctype="multipart/form-data">
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
                            <label for="">Sex</label>
                            <select name="sex" id="" class="form-control">
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
                    <div class="row">
                        <div class="form-group col-3">
                            <label for="">Salary</label>
                            <input type="Number" name="salary" class="form-control">
                            @error('salary')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-3">
                            <label for="">Position</label>
                            <select name="position" id="" class="form-control">
                                <option value="">Select..</option>
                                <option value="Cleaner">Cleaner</option>
                                <option value="Security">Security</option>
                                <option value="Driver">Driver</option>
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <label for="">Hired Date</label>
                            <input type="date" name="hired_date" class="form-control">
                            @error('dob')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-3">
                            <label for="">Stop Date</label>
                            <input type="date" name="stop_date" class="form-control">
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
                        <textarea name="address" id="" rows="4" class="form-control"></textarea>
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
