  <div class="modal fade" id="show-{{ $recep->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                              <dd class="col-sm-7">{{ $recep->id }}</dd>
                              <dt class="col-sm-5">Name</dt>
                              <dd class="col-sm-7">{{ $recep->name }}</dd>
                              <dt class="col-sm-5">Gender</dt>
                              <dd class="col-sm-7">{{ $recep->gender }}</dd>
                              <dt class="col-sm-5">Data Of Birth</dt>
                              <dd class="col-sm-7">{{ $recep->dob }}</dd>
                              <dt class="col-sm-5">Phone</dt>
                              <dd class="col-sm-7">{{ $recep->phone }}</dd>
                              <dt class="col-sm-5">Disease</dt>
                              <dd class="col-sm-7">{{ $recep->disease->diseas_name }}</dd>
                              <dt class="col-sm-5">Meet Dr.</dt>
                              <dd class="col-sm-7">{{ @$recep->doctor->name  }}</dd>
                              <dt class="col-sm-5">Meet Nrs.</dt>
                              <dd class="col-sm-7">{{ @$recep->nurse->name }}</dd>
                              <dt class="col-sm-5">Address</dt>
                              <dd class="col-sm-7">{{ $recep->address }}</dd>
                              <dt class="col-sm-5">Create At</dt>
                              <dd class="col-sm-7">{{ $recep->created_at }}</dd>
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
