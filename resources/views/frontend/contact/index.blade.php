@extends('layouts.frontent')
@section('title','Contact')
@section('content')
<div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="banner-section">
        <div class="container text-center wow fadeInUp">
            <nav aria-label="Breadcrumb">
                <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
                    <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact</li>
                </ol>
            </nav>
            <h1 class="font-weight-normal">Contact</h1>
        </div> <!-- .container -->
    </div> <!-- .banner-section -->
</div> <!-- .page-banner -->
{{-- @if (session()->has('store'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Success!</strong> {{ session('store') ?? '' }}
</div>
</div>
@endif
@if (session()->has('error'))
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Error!</strong> {{ session('error') ?? '' }}
</div>
</div>
@endif --}}
<div class="page-section">
    <div class="container">
        <h1 class="text-center wow fadeInUp">Get in Touch</h1>

        <form class="contact-form mt-5" action="{{ route('frontend.add_contact') }}" method="POST">
            @csrf
            <div class="row mb-3">
                <div class="col-sm-6 py-2 wow fadeInLeft">
                    <label for="fullName">Name</label>
                    <input type="text" id="fullName" name="fullName" class="form-control" placeholder="Full name..">
                </div>
                <div class="col-sm-6 py-2 wow fadeInRight">
                    <label for="emailAddress">Email</label>
                    <input type="text" id="email" name="email" class="form-control" placeholder="Email address..">
                </div>
                <div class="col-12 py-2 wow fadeInUp">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" class="form-control" placeholder="Enter subject..">
                </div>
                <div class="col-12 py-2 wow fadeInUp">
                    <label for="message">Message</label>
                    <textarea name="message" id="" class="form-control" rows="8" placeholder="Enter Message.."></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary wow zoomIn">Send Message</button>
        </form>
    </div>
</div>

<div class="maps-container wow fadeInUp">
    <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d1804.5475447299389!2d103.85841867535662!3d13.377530365881583!3m2!1i1024!2i768!4f13.1!5e0!3m2!1skm!2skh!4v1704880108705!5m2!1skm!2skh" width="100%" height="350px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
@endsection
