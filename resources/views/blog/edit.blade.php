@extends('layouts.admin')
@section('title','Blog')
@section('content-header','Edit Blog')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('blog.update',['blog'=>$blog->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="form-group col-6">
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $blog->title }}">
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="">Category</label>
                    <select name="category_id" class="form-control">
                        <option name="" id="">Select...</option>
                        @foreach ($blog_categories as $blog_category)
                        <option value="{{ $blog_category->id }}"{{ $blog_category->id == $blog->category_id ?'selected':'' }}>{{ $blog_category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea class="form-control" name="description" id="" rows="8">{{ $blog->description }}</textarea>
            </div>
            <div class="card" style="border: hidden;width:66%;height:250px">
                <div class="img-preview img-banner">
                    <img src="{{ asset('uploads/blogs/'.$blog->image) }}" style="width:auto;height:100%;">
                </div>
                <div class="form-group">
                    <input type="file" name="image" class="form-control" id="file">
                </div>
            </div>
            <div>
                <a href="{{ route('blog.index') }}" class="btn btn-secondary ">Back</a>
                <button type="submit" class="btn btn-primary ml-1">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
