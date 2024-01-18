<div class="modal fade" id="show-{{ $contact->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <dd class="col-sm-7">{{ $contact->id }}</dd>
                            <dt class="col-sm-5">Name</dt>
                            <dd class="col-sm-7">{{ $contact->fullName }}</dd>
                            <dt class="col-sm-5">Email</dt>
                            <dd class="col-sm-7">{{ $contact->email }}</dd>
                            <dt class="col-sm-5">Subject
                            <dd class="col-sm-7">{{ $contact->subject }}</dd>
                            <dt class="col-sm-5">Message</dt>
                            <dd class="col-sm-7">{{ $contact->message }}</dd>
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
