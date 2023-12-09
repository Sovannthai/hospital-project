{{-- <div class="modal fade" id="edit-{{ $user->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Create User</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('usermanagement.user.stores') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="file">File</label>
                        <input type="file" name="image" class="form-control" id="file">
                    </div>
                    <div class="form-group">
                        <label for="">Prefix</label>
                        <input type="text" name="prefix" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Salary</label>
                        <input type="text" name="salary" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">User Type</label>
                        <select name="user_type_id" id="" class="form-control">
                            <option value="">Select type...</option>
                            @foreach ($usertypes as $usertype)
                                <option value="{{ $usertype->id }}">{{ $usertype->type_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <span>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                style="position: relative;left:325px;">Close</button>
                        </span>
                        <button type="submit" class="btn btn-primary"
                            style="position: relative;left:330px;">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}
@extends('layouts.admin')
@section('title', 'Edit')
@section('content-header', 'Edit User')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('usermanagement.user.update',['id'=>$user->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="file">File</label>
                    <input type="file" name="image" class="form-control" id="file">
                </div>
                <div class="form-group">
                    <label for="">Prefix</label>
                    <input type="text" name="prefix" class="form-control" value="{{ $user->prefix }}">
                </div>
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label for="">Salary</label>
                    <input type="text" name="salary" class="form-control" value="{{ $user->salary }}">
                </div>
                <div class="form-group">
                    <label for="">User Type</label>
                    <select name="user_type_id" id="" class="form-control">
                        <option value="">Select type...</option>
                        @foreach ($usertypes as $usertype)
                            <option value="{{ $usertype->id }}" @if($usertype->id === $user->user_type_id) selected @endif>{{ $usertype->type_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <a href="{{ route('usermanagement.user.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
