@extends('layouts.admin')
@section('title', 'Hospital')
@section('content-header', 'List Pataint')
@section('content')
<style>
    .table {
        white-space: nowrap;
    }

</style>
<a href="{{ route('pataint.create') }}" class="btn btn-primary mb-2">+ Add Pataints</a>
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
                        <th scope="col">Name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">DOB</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Create At</th>
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
                        <td>{{ $pataint->created_at }}</td>
                        <td>
                            <a href="{{ route('pataint.edit',['pataint'=>$pataint->id]) }}" class="btn btn-primary btn-sm"><i class="icon-copy dw dw-edit1"></i></a>
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
    function confirmDelete(pataintId) {
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
                document.getElementById('delete-form-' + pataintId).submit();
            }
        });
    }
</script>
@endsection
