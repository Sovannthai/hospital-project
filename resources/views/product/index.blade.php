@extends('layouts.admin')
@section('title','Hospital')
@section('content-header','Product Management')
@section('content')
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
        <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#create"><i class="icon-copy dw dw-add"> Add New</i></a>
        @include('product.create')
    </div>
    <div class="pb-20">
        <table class="data-table table hover multiple-select-row nowrap">
            <thead>
                <tr>
                    <th>Image</th>
                    <th class="table-plus datatable-nosort">Name</th>
                    <th>Code</th>
                    <th>Unit</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                <tr>
                    <td style="width: 25px; height:25px">
                        <img src="{{ asset('uploads/product/'.$product->image) }}" alt="">
                    </td>
                    <td class="table-plus">{{ $product->name }}</td>
                    <td>{{ $product->code }}</td>
                    <td>{{ $product->unit->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>$ {{ $product->price }}</td>
                    <td>{{ Str::limit($product->description,10) }}</td>
                    <td>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input toggle-status" id="customSwitches{{ $product->id }}" data-id="{{ $product->id }}" {{ $product->status ? 'checked' : '' }}>
                            <label class="custom-control-label" for="customSwitches{{ $product->id }}"></label>
                        </div>
                    </td>
                    <td>
                        <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit-{{ $product->id }}"><i class="icon-copy dw dw-edit1"></i></a>
                        @include('product.edit')
                        <a href="" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#show-{{ $product->id }}"><i class="icon-copy dw dw-eye"></i></a>
                        @include('product.show')
                        <form action="{{ route('product.destroy',['product'=>$product->id]) }}" method="POST" class="d-inline-block" id="delete-form-{{ $product->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $product->id }})"><i class="icon-copy dw dw-trash1"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8">
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
                url: '/update-status/' + id
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
    function confirmDelete(pataint) {
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
                document.getElementById('delete-form-' + pataint).submit();
            }
        });
    }

</script>

@endsection
