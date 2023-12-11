@extends('layouts.admin')
@section('title', 'Hospital')
@section('content-header', 'List Pataint')
@section('content')
<style>
    .table {
        display: block;
        overflow-x: auto;
        white-space: nowrap;
    }

</style>
{{-- <a href="{{ route('recep.create') }}" class="btn btn-primary mb-2">+ Add Pataints</a> --}}
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
        <div class="table-responsive-sm">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">DOB</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Disease</th>
                        <th scope="col">Address</th>
                        <th scope="col">Status</th>
                        <th scope="col">Create At</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($nurses as $nurse)
                    <tr>
                        <td>{{ $nurse->id }}</td>
                        <td>{{ $nurse->name }}</td>
                        <td>{{ $nurse->gender }}</td>
                        <td>{{ $nurse->dob }}</td>
                        <td>{{ $nurse->phone }}</td>
                        <td>{{ $nurse->disease->diseas_name }}</td>
                        <td>{{ Str::limit($nurse->address, 35) }}</td>
                        <td>
                            @if ($nurse->status == 'pending')
                            <button class="btn btn-warning btn-sm">{{ $nurse->status }}</button>
                            @elseif($nurse->status == 'processing')
                            <button class="btn btn-success btn-sm">{{ $nurse->status }}</button>
                            @elseif($nurse->status == 'completed')
                            <span class="btn btn-primary btn-sm">{{ $nurse->status }}</span>
                            @elseif($nurse->status == 'canceled')
                            <button class="btn btn-danger btn-sm">{{ $nurse->status }}</button>
                            @else
                            {{ $nurse->status }}
                            @endif
                        </td>
                        <td>{{ $nurse->created_at }}</td>
                        <td>
                            <a href="{{ route('nurse.edit', ['nurse' => $nurse->id]) }}" class="btn btn-primary btn-sm"><i class="icon-copy dw dw-edit1"></i></a>
                            <a href="" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#show-{{ $nurse->id }}"><i class="icon-copy dw dw-eye"></i></a>
                            @include('nurse.show')
                        </td>
                    </tr>
                </tbody>
                @empty
                <tr>
                    <td colspan="12">
                        <h5>No data</h5>
                    </td>
                </tr>
                @endforelse
            </table>
            <div class="d-flex">
                {{-- {!! $forreceps->links() !!} --}}
                {{-- {!! $forreceps->appends(['sort' => 'name'])->links() !!}    --}}
            </div>
        </div>
    </div>
</div>
@endsection
