<div class="modal fade" id="show-{{ $emp->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <strong>Patain Detail</strong>
                    </div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-5">#</dt>
                            <dd class="col-sm-7">{{ $emp->id }}</dd>
                            <dt class="col-sm-5">Name</dt>
                            <dd class="col-sm-7">{{ $emp->name }}</dd>
                            <dt class="col-sm-5">Gender</dt>
                            <dd class="col-sm-7">{{ $emp->gender }}</dd>
                            <dt class="col-sm-5">Marital Status</dt>
                            <dd class="col-sm-7">{{ $emp->mt_status }}</dd>
                            <dt class="col-sm-5">Data Of Birth</dt>
                            <dd class="col-sm-7">{{ $emp->dob }}</dd>
                            <dt class="col-sm-5">Group</dt>
                            <dd class="col-sm-7">{{ $emp->emp_group->type_name }}</dd>
                            <dt class="col-sm-5">Phone</dt>
                            <dd class="col-sm-7">{{ $emp->phone }}</dd>
                            <dt class="col-sm-5">Join Date</dt>
                            <dd class="col-sm-7">{{ $emp->join_date }}</dd>
                            <dt class="col-sm-5">Address</dt>
                            <dd class="col-sm-7">{{ $emp->address }}</dd>
                        </dl>
                    </div>
                    <div class="card-footer" style="border: 0;">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="position: relative; left: 690px;">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
