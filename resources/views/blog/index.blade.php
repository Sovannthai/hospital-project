@extends('layouts.admin')
@section('title','Hospital')
@section('content-header','Blog')
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
        @if (auth()->user()->can('create.blog'))
        <a href="{{ route('blog.create') }}" class="btn btn-primary btn-sm"><i class="icon-copy dw dw-add"> Add New</i></a>
        @endif
    </div>
    <div class="pb-20">
        <table class="data-table table hover nowrap">
            <thead class="table-secondary">
                <tr>
                    <th class="table-plus datatable-nosort">Image</th>
                    <th class="table-plus datatable-nosort">Title</th>
                    <th class="table-plus datatable-nosort">Category</th>
                    <th class="table-plus datatable-nosort">Description</th>
                    <th>Created By</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($blogs as $blog)
                <tr>
                    <td class="table-plus">
                        <img src="{{ asset('uploads/blogs/'.$blog->image) }}" style="width: 60px;height:60px;">
                    </td>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->category->name }}</td>
                    <td>{{ Str::limit($blog->description,30) }}</td>
                    <td>{{ $blog->create->name }}</td>
                    <td>
                        @if (auth()->user()->can('edit.blog'))
                        <a href="{{ route('blog.edit',['blog'=>$blog->id]) }}" class="btn btn-primary btn-sm"><i class="icon-copy dw dw-edit1"></i></a>
                        @endif
                        @if (auth()->user()->can('delete.blog'))
                        <form action="{{ route('blog.destroy',['blog'=>$blog->id]) }}" method="POST" class="d-inline-block" id="delete-form-{{ $blog->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $blog->id }})"><i class="icon-copy dw dw-trash1"></i></button>
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
