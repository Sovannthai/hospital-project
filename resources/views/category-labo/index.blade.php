@extends('layouts.admin')
@section('title','Hospital')
@section('content-header','List Pataint')
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td>
                            <a href="" class="btn btn-primary">EDIT</a>
                            <a href="" class="btn btn-danger">DELETE</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
