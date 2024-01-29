@extends('layouts.admin')
@section('title','Hospital')
@section('content-header','Category')
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
        <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#create"><i class="icon-copy dw dw-add"> Add New</i></a>
        @include('product_category.create')
    </div>
    <div class="pb-20">
        <table class="data-table table hover nowrap">
            <thead class="table-secondary">
                <tr>
                    <th class="table-plus datatable-nosort">Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $categorie)
                <tr>
                    <td class="table-plus">{{ $categorie->name }}</td>
                    <td>
                        <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit-{{ $categorie->id }}"><i class="icon-copy dw dw-edit1"></i></a>
                    @include('product_category.edit')
                        <form action="{{ route('categories.destroy',['category'=>$categorie->id]) }}" method="POST" class="d-inline-block" id="delete-form-{{ $categorie->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $categorie->id }})"><i class="icon-copy dw dw-trash1"></i></button>
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
