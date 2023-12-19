<div class="modal fade" id="edit-{{ $emp_group->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Employyee Gruop</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('emp_group.update',['emp_group'=>$emp_group->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Type Name</label>
                        <input type="text" name="type_name" class="form-control" value="{{ $emp_group->type_name }}">
                    </div>
                    <div class=" form-group">
                        <label for="active">Active:</label>
                        <input type="hidden" name="status_old" value="{{ $emp_group->status }}">
                        <input type="checkbox" name="status" {{ $emp_group->status ? 'checked' : '' }}>
                    </div>
                    <span>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="position: relative;left:305px;">Cancel</button>
                    </span>
                    <button type="submit" class="btn btn-primary" style="position: relative;left:305px;">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
