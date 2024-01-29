@extends('layouts.frontent')
@section('title','Home')
@section('content')
<style>
    .card-doctor {
        transition: 0.5s;
    }

    .card-doctor:hover {
        transform: scale(1.1);
    }

    .card-service {
        transition: 0.5s;
    }

    .card-service:hover {
        transform: 1.5s;
        transform: translateY(-15px);
    }

</style>
<div class="page-hero bg-image overlay-dark" style="background-image: url(../assets/img/bg_image_1.jpg);margin-top:0px;">
    <div class="hero-section">
        <div class="container text-center wow zoomIn">
            <span class="subhead">Let's make your life happier</span>
            <h1 class="display-4">Healthy Living</h1>
            <a href="{{ route('frontend.add_contact') }}" class="btn btn-primary">Let's Consult</a>
        </div>
    </div>
</div>
<div class="bg-light">
    <div class="page-section py-3 mt-md-n5 custom-index">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4 py-3 py-md-0">
                    <div class="card-service wow fadeInUp">
                        <div class="circle-shape bg-secondary text-white">
                            <span class="mai-chatbubbles-outline"></span>
                        </div>
                        <p><span>Chat</span> with a doctors</p>
                    </div>
                </div>
                <div class="col-md-4 py-3 py-md-0">
                    <div class="card-service wow fadeInUp">
                        <div class="circle-shape bg-primary text-white">
                            <span class="mai-shield-checkmark"></span>
                        </div>
                        <p><span>One</span>-Health Protection</p>
                    </div>
                </div>
                <div class="col-md-4 py-3 py-md-0">
                    <div class="card-service wow fadeInUp">
                        <div class="circle-shape bg-accent text-white">
                            <span class="mai-basket"></span>
                        </div>
                        <p><span>One</span>-Health Pharmacy</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- .page-section -->

    <div class="page-section pb-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 py-3 wow fadeInUp">
                    <h1>Welcome to Your Health <br> Center</h1>
                    <p class="text-grey mb-4">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Accusantium aperiam earum ipsa eius, inventore nemo labore eaque porro consequatur ex aspernatur. Explicabo, excepturi accusantium! Placeat voluptates esse ut optio facilis!</p>
                    <a href="{{ route('frontend.blog') }}" class="btn btn-primary">Learn More</a>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="400ms">
                    <div class="img-place custom-img-1">
                        <img src="../assets/img/bg-doctor.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- .bg-light -->
</div> <!-- .bg-light -->

<div class="page-section">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp">Our Doctors</h1>
        <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
            @foreach ($doctors as $doctor)
            <div class="item">
                <div class="card-doctor">
                    <div class="header">
                        <img src="{{ asset('uploads/users/'.$doctor->image) }}" alt="">
                        <div class="meta">
                            <a href="#"><span class="mai-call"></span></a>
                            <a href="#"><span class="mai-logo-whatsapp"></span></a>
                        </div>
                    </div>
                    <div class="body">
                        <p class="text-xl mb-0">{{ $doctor->name }}</p>
                        <span class="text-sm text-grey">Skill: {{ $doctor->skill }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="page-section bg-light">
    <div class="container">
        <h1 class="text-center wow fadeInUp">Latest News</h1>
        <div class="row mt-5">
            @foreach ($blogs as $blog)
            <div class="col-lg-4 py-2 wow zoomIn">
                <div class="card-blog">
                    <div class="header">
                        <div class="post-category">
                            <a href="#">{{ $blog->category->name }}</a>
                        </div>
                        <a href="" class="post-thumb">
                            <img src="{{ asset('uploads/blogs/'.$blog->image) }}" alt="">
                        </a>
                    </div>
                    <div class="body">
                        <h5 class="post-title"><a href="blog-details.html">{{ $blog->title }}</a></h5>
                        <div class="site-info">
                            <div class="avatar mr-2">
                                <div class="avatar-img">
                                    <img src="{{ asset('uploads/users/'.$blog->create->image) }}" alt="">
                                </div>
                                <span>{{ $blog->create->name }}</span>
                            </div>
                            <span class="mai-time"></span> {{ $blog->created_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-12 text-center mt-4 wow zoomIn">
                <a href="{{ route('frontend.blog') }}" class="btn btn-primary">Read More</a>
            </div>

        </div>
    </div>
</div> <!-- .page-section -->

<div class="page-section">
    <div class="container">
        <h1 class="text-center wow fadeInUp">Make an Appointment</h1>
        @auth
        <form class="main-form">
            <div class="row mt-5 ">
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <input type="text" class="form-control" placeholder="Full name">
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                    <input type="text" class="form-control" placeholder="Email address..">
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                    <input type="datetime-local" class="form-control">
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                    <select name="departement" id="departement" class="custom-select">
                        <option value="general">General Health</option>
                        @foreach ($diseases as $disease)
                        <option value="{{ $disease->id }}">{{ $disease->diseas_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <input type="text" class="form-control" placeholder="Number..">
                </div>
                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
        </form>
         @endauth
    </div>
</div>
@endsection
