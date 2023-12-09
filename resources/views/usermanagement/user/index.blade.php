@extends('layouts.admin')
@section('title','User')
@section('content-header','User List')
@section('content')
<a href="" class="btn btn-primary mb-2"  data-toggle="modal" data-target="#create">Add New</a>
@include('usermanagement.user.create')
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="table-dark table-hover">
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Prefix</th>
                        <th>Name</th>
                        <th>User Type</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td><img src="{{ asset('uploads/users/'.$user->image) }}" alt="" style="width: 65px; height:70px;"></td>
                        <td>
                            <div class="d-flex">
                                <div class="dropdown mr-1">
                                    <button type="button" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-expanded="false">
                                      Action
                                    </button>
                                    <div class="dropdown-menu">
                                      {{-- <a class="dropdown-item" href="#">View</a> --}}
                                      <a class="dropdown-item" href="{{ route('usermanagement.user.edit',['id'=>$user->id]) }}">Edit</a>
                                      {{-- @include('usermanagement.user.edit') --}}
                                      <a class="dropdown-item" href="{{ route('usermanagement.user.destroy',['id'=>$user->id]) }}">Delete</a>
                                    </div>
                                  </div>
                            </div>
                        </td>
                        <td>{{ @$user->prefix }}</td>
                        <td>{{@$user->name }}</td>
                        <td>{{ @$user->usertype->type_name }}</td>
                        <td>$ {{ @$user->salary }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
