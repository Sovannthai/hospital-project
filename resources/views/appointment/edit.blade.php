<style>
    .form-control {
        border-radius: 0;
        height: 35px;
    }

</style>
<div class="modal fade" id="edit-{{ $appointment->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Cerate Appointment</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('appointment.update',['id'=>$appointment->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-4">
                            <label for="">Pataint Name</label>
                            <select name="pataint_id" id="" class="form-control">
                                <option value="">Select Pataint...</option>
                                @foreach ($pataints as $pataint)
                                <option value="{{ $pataint->id }}" {{ $pataint->id == $appointment->pataint_id ? 'selected':'' }}>{{ $pataint->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-4">
                            <label for="">Disease</label>
                            <select name="disease_id" id="" class="form-control">
                                <option value="">Select Desease...</option>
                                @foreach ($diseases as $diseas)
                                <option value="{{ $diseas->id }}" {{ $diseas->id == $appointment->disease_id ? 'selected':'' }}>{{ $diseas->diseas_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-4">
                            <label for="">Dr.</label>
                            <select name="doctor_id" id="" class="form-control">
                                <option value="">Select Dr...</option>
                                @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id }}" {{ $doctor->id == $appointment->doctor_id ?'selected':'' }}>{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-4">
                            <label for="">Appointment Date</label>
                            <input type="datetime-local" class="form-control" name="appointment_date" value="{{ $appointment->appointment_date }}">
                        </div>
                        <div class="form-group col-4">
                            <label for="">Status</label>
                            <select name="status" id="" class="form-control">
                                <option value="">Select..</option>
                                <option value="Pending" {{ $appointment->status == 'pending'?'selected':'' }}>Pending</option>
                                <option value="Processing" {{ $appointment->status == 'processing'?'selected':'' }}>Processing</option>
                                <option value="Completed" {{ $appointment->status == 'completed'?'selected':'' }}>Completed</option>
                                <option value="Canceled" {{ $appointment->status == 'canceled'?'selected':'' }}>Canceled</option>
                            </select>
                        </div>
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
