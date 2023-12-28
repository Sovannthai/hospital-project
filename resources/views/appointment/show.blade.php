  <div class="modal fade" id="show-{{ $appointment->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
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
                              <dd class="col-sm-7">{{ $appointment->id }}</dd>
                              <dt class="col-sm-5">Pataint Name</dt>
                              <dd class="col-sm-7">{{ @$appointment->pataints->name }}</dd>
                              <dt class="col-sm-5">Disease</dt>
                              <dd class="col-sm-7">{{ @$appointment->disease->diseas_name }}</dd>
                              <dt class="col-sm-5">Assigned/Dr.</dt>
                              <dd class="col-sm-7">{{ @$appointment->doctor->name }}</dd>
                              <dt class="col-sm-5">Appointment Date/Time</dt>
                              <dd class="col-sm-7">{{ $appointment->appointment_date }}</dd>
                              <dt class="col-sm-5">Status</dt>
                              <dd class="col-sm-7">
                                  @if ($appointment->status == 'pending')
                                  <button class="btn btn-warning btn-sm">{{ $appointment->status }}</button>
                                  @elseif($appointment->status == 'processing')
                                  <button class="btn btn-success btn-sm">{{ $appointment->status }}</button>
                                  @elseif($appointment->status == 'completed')
                                  <span class="btn btn-primary btn-sm">{{ $appointment->status }}</span>
                                  @elseif($appointment->status == 'canceled')
                                  <button class="btn btn-danger btn-sm">{{ $appointment->status }}</button>
                                  @else
                                  {{ $appointment->status }}
                                  @endif
                              </dd>
                              <dt class="col-sm-5">Laboratory</dt>
                              <dd class="col-sm-7">{{ $appointment->laboratory->name }}</dd>
                              <dt class="col-sm-5">Create By</dt>
                              <dd class="col-sm-7">{{ $appointment->create->name }}</dd>
                          </dl>
                      </div>
                      <div class="card-footer" style="border: 0;">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal" style="position: relative; left: 390px;">Close</button>
                      </div>
                  </div>
              </form>
          </div>
      </div>
  </div>
