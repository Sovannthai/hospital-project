@extends('layouts.admin')
@section('title','User Type')
@section('content-header','User Type')
@section('content')
<button href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#create">Add New</button>
@include('usermanagement.usertype.create')
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
                            <a href="#" class="icon-copy fa fa-pencil-square" aria-hidden="true" data-toggle="modal" data-target="#edit-{{ $usertype->id }}"></a>
                            @include('usermanagement.usertype.edit')
                            <a href="{{ route('usermanagement.usertype.destroy',['id'=>$usertype->id]) }}" class="icon-copy fa fa-trash" aria-hidden="true"></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
