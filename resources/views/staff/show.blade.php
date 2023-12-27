<div class="modal fade" id="show-{{ $staff->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <dd class="col-sm-7"><img src="{{  asset('uploads/users/'.$staff->image) }}" class=" img-thumbnail" alt="" style="width: 150px; height:200px;"></dd>
                            <dt class="col-sm-5">Name</dt>
                            <dd class="col-sm-7">{{ $staff->name }}</dd>
                            <dt class="col-sm-5">Sex</dt>
                            <dd class="col-sm-7">{{ $staff->sex }}</dd>
                            <dt class="col-sm-5">Data Of Birth</dt>
                            <dd class="col-sm-7">{{ $staff->dob }}</dd>
                            <dt class="col-sm-5">Position</dt>
                            <dd class="col-sm-7">{{ $staff->position }}</dd>
                            <dt class="col-sm-5">Phone</dt>
                            <dd class="col-sm-7">{{ $staff->phone }}</dd>
                            <dt class="col-sm-5">Salary</dt>
                            <dd class="col-sm-7">$ {{ $staff->salary }}</dd>
                            <dt class="col-sm-5">Hired Date</dt>
                            <dd class="col-sm-7">{{ $staff->hired_date }}</dd>
                            <dt class="col-sm-5">Stop Date</dt>
                            <dd class="col-sm-7">{{ $staff->stop_date }}</dd>
                            <dt class="col-sm-5">Address</dt>
                            <dd class="col-sm-7">{{ $staff->address }}</dd>
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
