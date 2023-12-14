@extends('layouts.admin')
@section('title','User Type')
@section('content-header','User Type')
@section('content')
<button href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#create">Add New</button>
@include('usermanagement.usertype.create')
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
            <table class="table table-bordered table-hover">
            <thead class="table-dark">
                    <tr>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usertypes as $usertype)
                    <tr>
                        <td>{{ $usertype->type_name }}</td>
                        <td>
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#edit-{{ $usertype->id }}"><i class="icon-copy dw dw-edit1"></i></a>
                            @include('usermanagement.usertype.edit')
                            <form action="{{ route('usermanagement.usertype.destroy',['id'=>$usertype->id]) }}" method="POST" class="d-inline-block " id="delete-form-{{ $usertype->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $usertype->id }})"><i class="icon-copy dw dw-trash1"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function confirmDelete(usertype) {
            Swal.fire({
                title: "Are you sure?"
                , text: "You want to delete this record !"
                , icon: "warning"
                , showCancelButton: true
                , confirmButtonColor: "#3085d6"
                , cancelButtonColor: "#d33"
                , confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + usertype).submit();
                }
            });
        }

    </script>
@endsection
