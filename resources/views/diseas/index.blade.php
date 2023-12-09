@extends('layouts.admin')
@section('title', 'Diseas')
@section('content-header', 'Diseas Management')
@section('content')
    <button href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#create">Add New</button>
    @if (session()->has('store'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Success!</strong> {{ session('store') ?? '' }}
        </div>
    @endif
    @if (session()->has('update'))
        <div class="alert alert-success alert-dismissible">
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
    @include('diseas.create')
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Create At</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($diseases as $diseas)
                        <tr>
                            <th scope="row">{{ $diseas->id }}</th>
                            <td>{{ $diseas->diseas_name }}</td>
                            <td>{{ $diseas->created_at }}</td>
                            <td>
                                <a href="#" class="icon-copy fa fa-pencil-square" aria-hidden="true"
                                    data-toggle="modal" data-target="#edit-{{ $diseas->id }}"></a>
                                @include('diseas.edit')
                                <a href="{{ route('diseas.destroy', ['id' => $diseas->id]) }}" class="icon-copy fa fa-trash"
                                    aria-hidden="true"></a>
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
@endsection
