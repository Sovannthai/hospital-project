@extends('layouts.admin')
@section('title', 'Diseas')
@section('content-header', 'Diseas Management')
@section('content')
    <button href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#create">Add New</button>
    @include('diseas.create')
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
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($diseases as $diseas)
                        <tr>
                            <td>{{ $diseas->diseas_name }}</td>
                            <td>
                                <a href="#" class="btn btn-primary" aria-hidden="true"
                                    data-toggle="modal" data-target="#edit-{{ $diseas->id }}"><i class="icon-copy dw dw-edit1"></i></a>
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
            <div class="d-flex">
                {{-- {!! $diseases->links() !!} --}}
                {!! $diseases->appends(['sort' => 'diseases'])->links() !!}
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
