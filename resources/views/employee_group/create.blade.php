<!-- Modal -->
<div class="modal fade" id="create" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Create Group</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('emp_group.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Type Name</label>
                        <input type="text" name="type_name" class="form-control">
                    </div>
                    <div class=" form-group">
                        <label for="active">Active:</label>
                        <input type="checkbox" name="status" value="Active">
                    </div>
                        <span>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="position: relative;left:325px;">Close</button>
                        </span>
                        <button type="submit" class="btn btn-primary" style="position: relative;left:330px;">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
