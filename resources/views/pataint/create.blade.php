<style>
    .form-control {
        border-radius: 0;
        height: 35px;
    }
</style>
<div class="modal fade" id="create" data-backdrop="static" data-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Cerate Appointment</h5>
              </div>
              <div class="modal-body">
                <form action="{{ route('pataint.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-3">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-3">
                            <label for="">Gender</label>
                            <select name="gender" id="" class="form-control">
                                <option value="">Select..</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Optional">No more...</option>
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <label for="">DOB</label>
                            <input type="date" name="dob" class="form-control">
                            @error('dob')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-3">
                            <label for="">Phone</label>
                            <input type="Number" name="phone" class="form-control">
                            @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <textarea name="address" id="" rows="4" class="form-control"></textarea>
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
