@extends('layouts.frontent')
@section('title','Product')
<style>
    .card-doctor{
        transition: 0.5s;
    }
    .card-doctor:hover{
        transform: scale(1.1);
    }
</style>
@section('content')
<div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);margin-top:0px;">
    <div class="banner-section">
        <div class="container text-center wow fadeInUp">
            <nav aria-label="Breadcrumb">
                <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
                    <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Product</li>
                </ol>
            </nav>
            <h1 class="font-weight-normal">Our Product</h1>
        </div> <!-- .container -->
    </div> <!-- .banner-section -->
</div> <!-- .page-banner -->

<div class="page-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row">
                    @foreach ($products as $product)
                    <div class="col-md-6 col-lg-4 py-3 wow zoomIn">
                        <div class="card-doctor">
                            <div class="header post-thumb">
                                <img src="{{ asset('uploads/product/'.$product->image) }}" alt="">
                            </div>
                            <div class="body">
                                <p class="text-xl mb-0">{{ $product->name }}</p>
                                <span>{{ $product->unit->name }}</span> |$ <span>{{ $product->price }}</span>
                                <p class="text-sm text-grey">{{ $product->category->name }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div> <!-- .container -->
</div> <!-- .page-section -->
@endsection
