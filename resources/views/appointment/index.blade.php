@extends('layouts.admin')
@section('title', 'Hospital')
@section('content-header', 'List Appointment')
@section('content')
<style>
    .table {
        white-space: nowrap;
    }

</style>
<a href="{{ route('appointment.create') }}" class="btn btn-primary mb-2">+ Add Pataints</a>
@if (session()->has('store'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Success!</strong> {{ session('store') ?? '' }}
</div>
</div>
@endif
@if (session()->has('update'))
<div class="alert alert-info alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Success!</strong> {{ session('update') ?? '' }}
</div>
</div>
@endif
@if (session()->has('delete'))
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Success!</strong> {{ session('delete') ?? '' }}
</div>
</div>
@endif
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Pataint Name</th>
                        <th scope="col">Disease</th>
                        <th scope="col">Doctor</th>
                        <th scope="col">Appointment Date/Time</th>
                        <th scope="col">Status</th>
                        <th scope="col">Created By</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->id }}</td>
                        <td>{{ $appointment->pataints->name }}</td>
                        <td>{{ $appointment->disease->diseas_name }}</td>
                        <td>{{ $appointment->doctor->name }}</td>
                        <td>{{ $appointment->appointment_date }}</td>
                        <td>
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
                        </td>
                        <td>{{ $appointment->create->name }}</td>
                        <td>{{ $appointment->created_at }}</td>
                        <td>
                            <a href="{{ route('appointment.edit',['id'=>$appointment->id]) }}" class="btn btn-primary btn-sm"><i class="icon-copy dw dw-edit1"></i></a>
                            <a href="" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#show-{{ $appointment->id }}"><i class="icon-copy dw dw-eye"></i></a>
                            @include('appointment.show')
                            <form action="{{ route('appointment.destroy',['id'=>$appointment->id]) }}" method="POST" class="d-inline-block" id="delete-form-{{ $appointment->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $appointment->id }})"><i class="icon-copy dw dw-trash1"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8">
                            <h4>No data</h4>
                        </td>
                    </tr>
                </tbody>
                @endforelse
            </table>
            <div class="d-flex">
                {{-- {!! $forreceps->links() !!} --}}
                {{-- {!! $forreceps->appends(['sort' => 'name'])->links() !!} --}}
            </div>
        </div>
    </div>
</div>
<script>
    function confirmDelete(appointment) {
        Swal.fire({
            title: "Are you sure?"
            , text: "You want to delete thid record !"
            , icon: "warning"
            , showCancelButton: true
            , confirmButtonColor: "#3085d6"
            , cancelButtonColor: "#d33"
            , confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + appointment).submit();
            }
        });
    }
</script>
@endsection
