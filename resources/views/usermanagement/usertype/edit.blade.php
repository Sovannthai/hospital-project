<div class="modal fade" id="edit-{{ $usertype->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Edit Usertype</h5>
              </div>
              <div class="modal-body">
                  <form action="{{ route('usermanagement.usertype.updates',['id'=>$usertype->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Type Name</label>
                        <input type="text" name="type_name" class="form-control" value="{{ $usertype->type_name }}">
                    </div>
                    <div>
                        <span>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"  style="position: relative;left:305px;">Cancel</button>
                        </span>
                        <button type="submit" class="btn btn-primary" style="position: relative;left:305px;">Update</button>
                    </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
