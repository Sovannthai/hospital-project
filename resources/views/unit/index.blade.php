@extends('layouts.admin')
@section('title','Hospital')
@section('content-header','Unit')
@section('content')
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
        <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#create"><i class="icon-copy dw dw-add"> Add New</i></a>
        @include('unit.create')
    </div>
    <div class="pb-20">
        <table class="data-table table hover multiple-select-row nowrap">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort">Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($units as $unit)
                <tr>
                    <td class="table-plus">{{ $unit->name }}</td>
                    <td>
                        <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit-{{ $unit->id }}"><i class="icon-copy dw dw-edit1"></i></a>
                    @include('unit.edit')
                        <form action="{{ route('unit.destroy',['unit'=>$unit->id]) }}" method="POST" class="d-inline-block" id="delete-form-{{ $unit->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $unit->id }})"><i class="icon-copy dw dw-trash1"></i></button>
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
