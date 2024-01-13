@extends('layouts.admin')
@section('title','Hospital')
@section('content-header','Role')
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
    <strong>Updated!</strong> {{ session('update') ?? '' }}
</div>
</div>
@endif
@if (session()->has('error'))
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Error!</strong> {{ session('error') ?? '' }}
</div>
</div>
@endif
<div class="card-box mb-30">
    <div class="pd-20">
        @if (auth()->user()->can('create.role'))
        <a href="{{ route('add_role') }}" class="btn btn-primary btn-sm"><i class="icon-copy dw dw-add"> Add New</i></a>
        @endif
    </div>
    <div class="pb-20">
        <table class="data-table table hover nowrap">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort">Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($roles as $role)
                <tr>
                    <td class="table-plus">{{ $role->name }}</td>
                    <td>
                        @if (auth()->user()->can('edit.role'))
                        <a href="{{ route('edit_role',['id'=>$role->id]) }}" class="btn btn-primary btn-sm"><i class="icon-copy dw dw-edit1"></i></a>
                        @endif
                        @if (auth()->user()->can('delete.role'))
                        <form action="{{ route('destroy_role',['id'=>$role->id]) }}" method="POST" class="d-inline-block" id="delete-form-{{ $role->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $role->id }})"><i class="icon-copy dw dw-trash1"></i></button>
                        </form>
                        @endif
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
    function confirmDelete(role) {
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
                document.getElementById('delete-form-' + role).submit();
            }
        });
    }
</script>

@endsection
