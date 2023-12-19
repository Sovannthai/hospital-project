@extends('layouts.admin')
@section('title','Hospital')
@section('content-header','Unit')
@section('content')
<div class="card-box mb-30">
    <div class="pd-20">
        <a href="" class="btn btn-primary btn-sm">Add New</a>
    </div>
    <div class="pb-20">
        <table class="data-table table hover multiple-select-row nowrap">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort">Name</th>
                    <th>Age</th>
                    <th>Office</th>
                    <th>Address</th>
                    <th>Start Date</th>
                    <th>Salart</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="table-plus">Gloria F. Mead</td>
                    <td>25</td>
                    <td>Sagittarius</td>
                    <td>2829 Trainer Avenue Peoria, IL 61602</td>
                    <td>29-03-2018</td>
                    <td>$162,700</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
