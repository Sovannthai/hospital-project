@extends('layouts.admin')
@section('title','User')
@section('content-header','User List')
@section('content')
@if (auth()->user()->can('create.role'))
<a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#create"><i class="icon-copy dw dw-add-user"> Add New</i></a>
@include('usermanagement.user.create')
@endif
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
<style>
    .table {
        white-space: nowrap;
    }

</style>
<div class="card">
    <div class="card-body">
        <table class="data-table table hover nowrap ">
            <thead class="table-secondary">
                <tr>
                    <th>Avatar</th>
                    <th>Prefix</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>User Type</th>
                    <th>Salary</th>
                    <th>Skill</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td><img src="{{ asset('uploads/users/'.$user->image) }}" alt="" style="width: 75px; height:80px;"></td>
                    <td>{{ @$user->prefix }}</td>
                    <td>{{@$user->name }}</td>
                    <td>{{ @$user->roles->first()->name }}</td>
                    <td>{{ @$user->usertype->type_name }}</td>
                    <td>$ {{ @$user->salary }}</td>
                    <td>{{ $user->skill }}</td>
                    <td>
                        <div class="d-flex">
                            @if (auth()->user()->can('edit.user'))
                            <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit-{{ $user->id }}"><i class="icon-copy dw dw-edit1"></i></a>
                            @include('usermanagement.user.edit')
                            @endif
                            @if (auth()->user()->can('delete.user'))
                            <form action="{{ route('usermanagement.user.destroy',['id'=>$user->id]) }}" method="POST" class="d-inline-block " id="delete-form-{{ $user->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $user->id }})"><i class="icon-copy dw dw-trash1"></i></button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex">
            {{-- {!! $users->appends(['sort' => 'users'])->links() !!} --}}
        </div>
    </div>
</div>
<script>
    function confirmDelete(userid) {
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
                document.getElementById('delete-form-' + userid).submit();
            }
        });
    }

</script>
@endsection
