<!-- Modal -->
<div class="modal fade" id="create" data-backdrop="static" data-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Add Diseas</h5>
              </div>
              <div class="modal-body">
                  <form action="{{ route('diseas.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Diseas Name</label>
                        <input type="text" name="diseas_name" class="form-control">
                    </div>
                    <div>
                        <span>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"  style="position: relative;left:325px;">Close</button>
                        </span>
                        <button type="submit" class="btn btn-primary" style="position: relative;left:330px;">Save</button>
                    </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
