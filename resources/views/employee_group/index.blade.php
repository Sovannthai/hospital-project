@extends('layouts.admin')
@section('title','Employee Group')
@section('content-header','Employee Group')
@section('content')
<button href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#create"><i class="icon-copy dw dw-add"> Add New</i></button>
@include('employee_group.create')
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
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($emp_groups as $emp_group)
                <tr>
                    <td>{{ $emp_group->type_name }}</td>
                    <td>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input toggle-status" id="customSwitches{{ $emp_group->id }}" data-id="{{ $emp_group->id }}" {{ $emp_group->status ? 'checked' : '' }}>
                            <label class="custom-control-label" for="customSwitches{{ $emp_group->id }}"></label>
                        </div>
                    </td>
                    <td>
                        <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit-{{ $emp_group->id }}"><i class="icon-copy dw dw-edit1"></i></a>
                        @include('employee_group.edit')
                        <form action="{{ route('emp_group.destroy',['emp_group'=>$emp_group->id]) }}" method="POST" class="d-inline-block" id="delete-form-{{ $emp_group->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $emp_group->id }})"><i class="icon-copy dw dw-trash1"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex">
            {{-- {!! $usertypes->appends(['sort' => 'usertypes'])->links() !!} --}}
        </div>
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
                url: '/update-emp_group/' + id
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
    function confirmDelete(emp_group) {
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
                document.getElementById('delete-form-' + emp_group).submit();
            }
        });
    }

</script>
@endsection
