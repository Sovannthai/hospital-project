@extends('layouts.admin')
@section('title','Blog')
@section('content-header','Create Blog')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-6">
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control">
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="">Category</label>
                    <select name="category_id" class="form-control">
                        <option name="" id="">Select...</option>
                        @foreach ($blog_categories as $blog_category)
                        <option value="{{ $blog_category->id }}">{{ $blog_category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea class="form-control" name="description" id="" rows="8"></textarea>
            </div>
            <div class="form-group">
                <label for="file">Blog Image</label>
                <input type="file" name="image" class="form-control " id="file">
            </div>
            <div>
                <a href="{{ route('blog.index') }}" class="btn btn-secondary ">Back</a>
                <button type="submit" class="btn btn-primary ml-1">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
