@extends('layouts.admin')
@section('title', 'Hospital')
@section('content-header', 'List Pataint')
@section('content')
<style>
    .table {
        display: block;
        overflow-x: auto;
        white-space: nowrap;
    }

</style>
@if (session()->has('store'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Success!</strong> {{ session('store') ?? '' }}
</div>
</div>
@endif
@if (session()->has('error-recep'))
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Table receptionist can not update!</strong> {{ session('error-recep') ?? '' }}
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
        <div class="table-responsive-sm">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">DOB</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Disease</th>
                        <th scope="col">Address</th>
                        <th scope="col">Status</th>
                        <th scope="col">Create At</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($doctors as $doctor)
                    <tr>
                        <td>{{ $doctor->id }}</td>
                        <td>{{ $doctor->name }}</td>
                        <td>{{ $doctor->gender }}</td>
                        <td>{{ $doctor->dob }}</td>
                        <td>{{ $doctor->phone }}</td>
                        <td>{{ $doctor->disease->diseas_name }}</td>
                        <td>{{ Str::limit($doctor->address,35) }}</td>
                        <td>
                            @if ($doctor->status == 'pending')
                            <button class="btn btn-warning btn-sm">{{ $doctor->status }}</button>
                            @elseif($doctor->status == 'processing')
                            <button class="btn btn-success btn-sm">{{ $doctor->status }}</button>
                            @elseif($doctor->status == 'completed')
                            <span class="btn btn-primary btn-sm">{{ $doctor->status }}</span>
                            @elseif($doctor->status == 'canceled')
                            <button class="btn btn-danger btn-sm">{{ $doctor->status }}</button>
                            @else
                            {{ $doctor->status }}
                            @endif
                        </td>
                        <td>{{ $doctor->created_at }}</td>
                        <td>
                            <a href="{{ route('doctor.edit',['doctor'=>$doctor->id]) }}" class="btn btn-primary btn-sm"><i class="icon-copy dw dw-edit1"></i></a>
                            <a href="" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#show-{{ $doctor->id }}"><i class="icon-copy dw dw-eye"></i></a>
                            @include('doctor.show')
                        </td>
                    </tr>
                </tbody>
                @empty
                <tr>
                    <td colspan="12">
                        <h5>No data</h5>
                    </td>
                </tr>
                @endforelse
            </table>
            <div class="d-flex">
                {{-- {!! $forreceps->links() !!} --}}
                {!! $doctorss->appends(['sort' => 'name'])->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection
