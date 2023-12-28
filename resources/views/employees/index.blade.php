@extends('layouts.admin')
@section('title', 'Hospital')
@section('content-header', 'List Employee')
@section('content')
<style>
    .table {
        white-space: nowrap;
    }

</style>
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
        <a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#create"><i class="icon-copy dw dw-add-user"> Add Employee</i></a>
        @include('employees.create')
    </div>
    <div class="pb-20">
        <table class="data-table table hover nowrap table-responsive">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Marital Status</th>
                    <th scope="col">DOB</th>
                    <th scope="col">Group</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Join Date</th>
                    <th scope="col">Address</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($emps as $emp)
                <tr>
                    <td>{{ $emp->id }}</td>
                    <td>{{ $emp->name }}</td>
                    <td>{{ $emp->gender }}</td>
                    <td>{{ $emp->mt_status }}</td>
                    <td>{{ $emp->dob }}</td>
                    <td>{{ $emp->emp_group->type_name }}</td>
                    <td>{{ $emp->phone }}</td>
                    <td>{{ $emp->join_date }}</td>
                    <td>{{ Str::limit($emp->address,10) }}</td>
                    <td>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input toggle-status" id="customSwitches{{ $emp->id }}" data-id="{{ $emp->id }}" {{ $emp->status ? 'checked' : '' }}>
                            <label class="custom-control-label" for="customSwitches{{ $emp->id }}"></label>
                        </div>
                    </td>
                    <td>
                        <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit-{{ $emp->id }}"><i class="icon-copy dw dw-edit1"></i></a>
                        @include('employees.edit')
                        <a href="" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#show-{{ $emp->id }}"><i class="icon-copy dw dw-eye"></i></a>
                        @include('employees.show')
                        <form action="{{ route('employee.destroy',['employee'=>$emp->id]) }}" method="POST" class="d-inline-block" id="delete-form-{{ $emp->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $emp->id }})"><i class="icon-copy dw dw-trash1"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10">
                        <h4>No data</h4>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.toggle-status').change(function() {
            var checkbox = $(this);
            var id = checkbox.data('id');
            var status = checkbox.prop('checked');

            $.ajax({
                url: '/update-emp/' + id
                , type: 'POST'
                , data: {
                    _token: '{{ csrf_token() }}'
                    , status: status
                }
                , success: function(response) {
                    console.log(response);
                    Toast.fire({
                        icon: 'success'
                        , title: 'Status updated successfully'
                    });
                }
                , error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });

    const Toast = Swal.mixin({
        toast: true
        , position: 'top-end'
        , showConfirmButton: false
        , timer: 3000
        , timerProgressBar: true
        , didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });

</script>
<script>
    function confirmDelete(productId) {
        Swal.fire({
            title: "Are you sure?"
            , text: "You won't be able to revert this!"
            , icon: "warning"
            , showCancelButton: true
            , confirmButtonColor: "#3085d6"
            , cancelButtonColor: "#d33"
            , confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Deleted!"
                    , text: "Your file has been deleted."
                    , icon: "success"
                    , showConfirmButton: false
                    , timer: 3000
                    , timerProgressBar: true
                    , position: "center"
                    , didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                document.getElementById('delete-form-' + productId).submit();
            }
        });
    }

</script>

@endsection
