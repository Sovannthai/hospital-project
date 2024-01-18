@extends('layouts.admin')
@section('title','Contact')
@section('content-header','Contact')
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
    </div>
    <div class="pb-20">
        <table class="data-table table hover nowrap">
            <thead>
                <tr>
                    <th>ID</th>
                    <th class="table-plus datatable-nosort">Name</th>
                    <th class="table-plus datatable-nosort">Email</th>
                    <th class="table-plus datatable-nosort">Subject</th>
                    <th class="table-plus datatable-nosort">Message</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($contacts as $contact)
                <tr>
                    <td>{{ $contact->id }}</td>
                    <td class="table-plus">{{ $contact->fullName }}</td>
                    <td class="table-plus">{{ $contact->email }}</td>
                    <td class="table-plus">{{ $contact->subject }}</td>
                    <td class="table-plus">{{ $contact->message }}</td>
                    <td>
                        <a href="" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#show-{{ $contact->id }}"><i class="icon-copy dw dw-eye"></i></a>
                        @include('contact.show')
                        {{-- @if (auth()->user()->can('delete.labo')) --}}
                        <form action="" method="POST" class="d-inline-block" id="delete-form-{{ $contact->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $contact->id }})"><i class="icon-copy dw dw-trash1"></i></button>
                        </form>
                        {{-- @endif --}}
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
