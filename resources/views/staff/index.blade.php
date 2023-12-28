@extends('layouts.admin')
@section('title', 'Hospital')
@section('content-header', 'List Staff')
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
<div class="card-box mb-30">
    <div class="pd-20">
        <a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#create"><i class="icon-copy dw dw-add-user"> Add Staff</i></a>
        @include('staff.create')
    </div>
    <div class="pb-20">
        <table class="data-table table hover nowrap table-responsive">
            <thead>
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Sex</th>
                    <th scope="col">DOB</th>
                    <th scope="col">Position</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Salary</th>
                    <th scope="col">Hired Date</th>
                    <th scope="col">Stop Date</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($staffs as $staff)
                <tr>
                    <td><img src="{{  asset('uploads/users/'.$staff->image) }}" alt="" style="width: 65px; height:70px;"></td>
                    <td>{{ $staff->name }}</td>
                    <td>{{ $staff->sex }}</td>
                    <td>{{ $staff->dob }}</td>
                    <td>{{ $staff->position }}</td>
                    <td>{{ $staff->phone }}</td>
                    <td>$ {{ $staff->salary }}</td>
                    <td>{{ $staff->hired_date }}</td>
                    <td>{{ $staff->stop_date }}</td>
                    <td>{{ Str::limit($staff->address,10) }}</td>
                    <td>
                        <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit-{{ $staff->id }}"><i class="icon-copy dw dw-edit1"></i></a>
                        @include('staff.edit')
                        <a href="" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#show-{{ $staff->id }}"><i class="icon-copy dw dw-eye"></i></a>
                            @include('staff.show')
                        <form action="{{ route('staff.destroy',['staff'=>$staff->id]) }}" method="POST" class="d-inline-block" id="delete-form-{{ $staff->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $staff->id }})"><i class="icon-copy dw dw-trash1"></i></button>
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
                }
                , error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });

</script>
<script>
    function confirmDelete(emp) {
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
                    icon: "success"
                    , title: "Record deleted successfully"
                    , showConfirmButton: false
                    , timer: 10000
                    , timerProgressBar: true
                    , position: "center"
                });
                document.getElementById('delete-form-' + emp).submit();
            }
        });
    }

</script>
@endsection
