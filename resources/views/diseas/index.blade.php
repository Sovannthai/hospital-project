@extends('layouts.admin')
@section('title', 'Diseas')
@section('content-header', 'Diseas Management')
@section('content')
@if (session()->has('store'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Success!</strong> {{ session('store') ?? '' }}
</div>
@endif
@if (session()->has('update'))
<div class="alert alert-info alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Success!</strong> {{ session('update') ?? '' }}
</div>
@endif
@if (session()->has('delete'))
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Success!</strong> {{ session('delete') ?? '' }}
</div>
@endif
<div class="card">
    <div class="card-box mb-30">
        <div class="pd-20">
            {{-- <a href="" class="btn btn-primary btn-sm">Add New</a> --}}
            <button href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#create"><i class="icon-copy dw dw-add"> Add New</i></button>
            @include('diseas.create')
        </div>
        <div class="pb-20">
            <table class="data-table table hover multiple-select-row nowrap">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($diseases as $diseas)
                    <tr>
                        <td class="table-plus">{{ $diseas->diseas_name }}</td>
                        <td>
                            <a href="#" class="btn btn-primary" aria-hidden="true" data-toggle="modal" data-target="#edit-{{ $diseas->id }}"><i class="icon-copy dw dw-edit1"></i></a>
                            @include('diseas.edit')
                            <form action="{{ route('diseas.destroy',['id'=>$diseas->id]) }}" method="POST" class="d-inline-block " id="delete-form-{{ $diseas->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $diseas->id }})"><i class="icon-copy dw dw-trash1"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function confirmDelete(disease) {
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
                document.getElementById('delete-form-' + disease).submit();
            }
        });
    }

</script>
@endsection
