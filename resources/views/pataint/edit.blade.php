<style>
    .form-control {
        border-radius: 0;
        height: 35px;
    }
</style>
<div class="modal fade" id="edit-{{ $pataint->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Cerate Appointment</h5>
              </div>
              <div class="modal-body">
                <form action="{{ route('pataint.update',['pataint'=>$pataint->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-3">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $pataint->name }}">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-3">
                            <label for="">Gender</label>
                            <select name="gender" id="" class="form-control">
                                <option value="">Select..</option>
                                <option value="Male"{{ $pataint->gender == 'Male'?'selected':'' }}>Male</option>
                                <option value="Female"{{ $pataint->gender == 'Female'?'selected':'' }}>Female</option>
                                <option value="Optional"{{ $pataint->gender == 'Optional'?'selected':'' }}>No more...</option>
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <label for="">DOB</label>
                            <input type="date" name="dob" class="form-control" value="{{$pataint->dob}}">
                            @error('dob')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-3">
                            <label for="">Phone</label>
                            <input type="Number" name="phone" class="form-control" value="{{ $pataint->phone }}">
                            @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <textarea name="address" id="" rows="4" class="form-control">{{ $pataint->address }}</textarea>
                        @error('address')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
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
{{-- <script>
    document.getElementById('appointmentForm').addEventListener('submit', function (event) {
        event.preventDefault();
        fetch(this.action, {
            method: this.method,
            body: new FormData(this)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Appointment created successfully!',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    position: 'top-end'
                });

                // Optionally, you can redirect the user to another page or perform other actions
                 window.location.href = '{{ route('appointment.index') }}';
            } else {
                // Handle other cases or display an error message
                Swal.fire({
                    icon: 'error',
                    title: 'Error creating appointment',
                    text: 'Please try again later.',
                    position: 'top-end'
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
</script> --}}

