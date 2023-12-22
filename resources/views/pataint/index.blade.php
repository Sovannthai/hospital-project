@extends('layouts.admin')
@section('title', 'Hospital')
@section('content-header', 'List Pataint')
@section('content')
<style>
    .table {
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
<div class="card-box mb-30">
    <div class="pd-20">
        <a href="" class="btn btn-primary mb-2"  data-toggle="modal" data-target="#create"><i class="icon-copy dw dw-add-user"> Add Pataint</i></a>
        @include('pataint.create')
    </div>
    <div class="pb-20">
        <table class="data-table table hover multiple-select-row nowrap">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">DOB</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Create By</th>
                        <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pataints as $pataint)
                <tr>
                    <td>{{ $pataint->id }}</td>
                        <td>{{ $pataint->name }}</td>
                        <td>{{ $pataint->gender }}</td>
                        <td>{{ $pataint->dob }}</td>
                        <td>{{ $pataint->phone }}</td>
                        <td>{{ $pataint->address }}</td>
                        <td>{{ $pataint->create->name }}</td>
                        <td>
                            <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit-{{ $pataint->id }}"><i class="icon-copy dw dw-edit1"></i></a>
                            @include('pataint.edit')
                            <a href="" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#show-{{ $pataint->id }}"><i class="icon-copy dw dw-eye"></i></a>
                            @include('pataint.show')
                            <form action="{{ route('pataint.destroy',['pataint'=>$pataint->id]) }}" method="POST" class="d-inline-block" id="delete-form-{{ $pataint->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $pataint->id }})"><i class="icon-copy dw dw-trash1"></i></button>
                            </form>
                        </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8">
                        <h4>No data</h4>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<script>
    function confirmDelete(pataint) {
        Swal.fire({
            title: "Are you sure?"
            , text: "You want to delete this record!"
            , icon: "warning"
            , showCancelButton: true
            , confirmButtonColor: "#3085d6"
            , cancelButtonColor: "#d33"
            , confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: "success",
                    title: "Record deleted successfully",
                    showConfirmButton: false,
                    timer: 10000,
                    timerProgressBar: true,
                    position: "center"
                });
                document.getElementById('delete-form-' + pataint).submit();
            }
        });
    }
</script>
@endsection
