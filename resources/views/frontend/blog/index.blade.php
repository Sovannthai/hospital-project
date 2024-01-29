@extends('layouts.frontent')
@section('title', 'New')
@section('content')
    <div class="page-banner overlay-dark bg-image"
        style="background-image: url(../assets/img/bg_image_1.jpg);margin-top:0px;">
        <div class="banner-section">
            <div class="container text-center wow fadeInUp">
                <nav aria-label="Breadcrumb">
                    <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
                        <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blog</li>
                    </ol>
                </nav>
                <h1 class="font-weight-normal">News</h1>
            </div> <!-- .container -->
        </div> <!-- .banner-section -->
    </div> <!-- .page-banner -->
    <div class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        @foreach ($blogs as $blog)
                            <div class="col-sm-6 py-3">
                                <div class="card-blog">
                                    <div class="header">
                                        <div class="post-category">
                                            <a href="#">{{ $blog->category->name }}</a>
                                        </div>
                                        <a href="blog-details" class="post-thumb">
                                            <img src="{{ asset('uploads/blogs/' . $blog->image) }}" alt="">
                                        </a>
                                    </div>
                                    <div class="body">
                                        <h5 class="post-title"><a href="blog-details.html">{{ $blog->title }}</a></h5>
                                        <div class="site-info">
                                            <div class="avatar mr-2">
                                                <div class="avatar-img">
                                                    <img src="{{ asset('uploads/users/' . $blog->create->image) }}"
                                                        alt="">
                                                </div>
                                                <span>{{ $blog->create->name }}</span>
                                            </div>
                                            <span class="mai-time"></span>{{ $blog->created_at->diffForHumans() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-12 my-5">
                            @if ($blogs->count() > 0)
                                <nav aria-label="Page Navigation">
                                    <ul class="pagination justify-content-center">
                                        @if ($blogs->onFirstPage())
                                            <li class="page-item disabled" aria-disabled="true">
                                                <span class="page-link">Previous</span>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $blogs->previousPageUrl() }}"
                                                    rel="prev">Previous</a>
                                            </li>
                                        @endif
                                        @for ($i = 1; $i <= $blogs->lastPage(); $i++)
                                            <li class="page-item{{ $blogs->currentPage() === $i ? ' active' : '' }}">
                                                <a class="page-link" href="{{ $blogs->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor
                                        @if ($blogs->hasMorePages())
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $blogs->nextPageUrl() }}"
                                                    rel="next">Next</a>
                                            </li>
                                        @else
                                            <li class="page-item disabled" aria-disabled="true">
                                                <span class="page-link">Next</span>
                                            </li>
                                        @endif
                                    </ul>
                                </nav>
                            @else
                                <div class="alert alert-info text-center">
                                    @if (isset($query_param['search']))
                                        No results found for ' {{ $query_param['search'] }} '. <a
                                            href="{{ url()->current() }}">Show all</a>.
                                    @else
                                        No data found.
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div> <!-- .row -->
                </div>
                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="sidebar-block">
                            <h3 class="sidebar-title">Search</h3>
                            <form role="search" action="{{ url()->current() }}" method="GET" class="search-form">
                                <div class="form-group">
                                    <input type="text" name="search" class="form-control"
                                        placeholder="Type a keyword and hit enter">
                                    <button type="submit" class="btn"><span class="icon mai-search"></span></button>
                                </div>
                            </form>
                        </div>
                        <div class="sidebar-block">
                            <h3 class="sidebar-title">Categories</h3>
                            <ul class="categories">
                                <li><a href="#">Food <span>12</span></a></li>
                                <li><a href="#">Dish <span>22</span></a></li>
                                <li><a href="#">Desserts <span>37</span></a></li>
                                <li><a href="#">Drinks <span>42</span></a></li>
                                <li><a href="#">Ocassion <span>14</span></a></li>
                            </ul>
                        </div>

                        <div class="sidebar-block">
                            <h3 class="sidebar-title">Recent Blog</h3>
                            <div class="blog-item">
                                <a class="post-thumb" href="">
                                    <img src="../assets/img/blog/blog_1.jpg" alt="">
                                </a>
                                <div class="content">
                                    <h5 class="post-title"><a href="#">Even the all-powerful Pointing has no
                                            control</a></h5>
                                    <div class="meta">
                                        <a href="#"><span class="mai-calendar"></span> July 12, 2018</a>
                                        <a href="#"><span class="mai-person"></span> Admin</a>
                                        <a href="#"><span class="mai-chatbubbles"></span> 19</a>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-item">
                                <a class="post-thumb" href="">
                                    <img src="../assets/img/blog/blog_2.jpg" alt="">
                                </a>
                                <div class="content">
                                    <h5 class="post-title"><a href="#">Even the all-powerful Pointing has no
                                            control</a></h5>
                                    <div class="meta">
                                        <a href="#"><span class="mai-calendar"></span> July 12, 2018</a>
                                        <a href="#"><span class="mai-person"></span> Admin</a>
                                        <a href="#"><span class="mai-chatbubbles"></span> 19</a>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-item">
                                <a class="post-thumb" href="">
                                    <img src="../assets/img/blog/blog_3.jpg" alt="">
                                </a>
                                <div class="content">
                                    <h5 class="post-title"><a href="#">Even the all-powerful Pointing has no
                                            control</a></h5>
                                    <div class="meta">
                                        <a href="#"><span class="mai-calendar"></span> July 12, 2018</a>
                                        <a href="#"><span class="mai-person"></span> Admin</a>
                                        <a href="#"><span class="mai-chatbubbles"></span> 19</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- .row -->
        </div> <!-- .container -->
    </div> <!-- .page-section -->
@endsection
