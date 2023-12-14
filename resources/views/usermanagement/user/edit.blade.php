<!-- Modal -->
<style>

</style>
<div class="modal fade" id="edit-{{ $user->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Create User</h5>
              </div>
              <div class="modal-body">
                  <form action="{{ route('usermanagement.user.update',['id'=>$user->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-4">
                            <label for="">Prefix</label>
                            <input type="text" name="prefix" class="form-control" value="{{ $user->prefix }}">
                        </div>
                        <div class="form-group col-4">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                        </div>
                        <div class="form-group col-4">
                            <label for="">Salary</label>
                            <input type="text" name="salary" class="form-control" value="{{ $user->salary }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-4">
                            <label for="">Email</label>
                            <input type="email" name="email" id="" class="form-control" value="{{ $user->email }}">
                        </div>
                        <div class="form-group col-4">
                            <label for="">Password</label>
                            <input type="password" name="password" id="" class="form-control">
                        </div>
                        <div class="form-group col-4">
                            <label for="">User Type</label>
                            <select name="user_type_id" id="" class="form-control">
                                <option value="">Select type...</option>
                                @foreach ($usertypes as $usertype )
                                <option value="{{ $usertype->id }}"{{ $usertype->id == $user->user_type_id ?'selected':'' }}>{{ $usertype->type_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="file">File</label>
                        <input type="file" name="image" class="form-control" id="file">
                    </div>
                    <div>
                        <span>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"  style="position: relative;left:630px;">Close</button>
                        </span>
                        <button type="submit" class="btn btn-primary" style="position: relative;left:635px;">Save</button>
                    </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
