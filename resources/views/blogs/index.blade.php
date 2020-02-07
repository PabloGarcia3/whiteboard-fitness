@extends('layouts.app')

@include('partials.meta_static')

@section('content')

    <div class="container">
        @if(Session::has('blog_created_message'))
            <div class="alert alert-success">
                {{ Session::get('blog_created_message') }}
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    &times;
                </button>
            </div>
        @endif
        {{-- <div class="col-md-4">
            @foreach($categories as $category)
            <h2><a href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a></h2>
            @endforeach
        </div> --}}
        <div class="container" id="home-jumbotron">
            <div class="jumbotron">
                <div class="container" id="jumbotron-card">
                    <h1 class="display-4">Share your Workouts, Learn from Coaches around the World</h1>
                    <hr class="my-4">
                    <p>Follow your favorite coaches and post your own workouts</p>
                    @if(Auth::user())
                    <a class="btn btn-primary btn-lg" href="{{ route('blogs.create') }}" role="button">Post new workout</a>
                    @else
                    <a class="btn btn-primary btn-lg" href="{{ route('register') }}" role="button">Sign Up Here</a>
                    @endif
                </div>
            </div>
        </div>
        @if(Auth::user())
        <div class="container">
            <ul class="list-unstyled">
                @foreach($blogs as $blog)
                <div class="card m-3">
                    <li class="media">
                        @if($blog->featured_image)
                            <img 
                                src="/images/featured_image/{{ $blog->featured_image ? $blog->featured_image : '' }}" 
                                alt="{{ str_limit($blog->title, 50) }}"
                                class="img-thumbnail mr-3 mt-3"
                            >
                        @endif
                        <br>
                        @if($blog->featured_video)
                        <div id="video-player" class="img-thumbnail mr-3 mt-3">
                            <video width="100%" controls>
                                <source src="/videos/featured_video/{{ $blog->featured_video ? $blog->featured_video : '' }}" type="video/mp4">
                                    Your browser does not support the video tag.
                            </video>
                        </div>
                        @endif
                        <div class="media-body">
                            @if($blog->user)
                                <a href="{{ route('users.show', $blog->user->name) }}">
                                    {{ $blog->user->name }}
                                </a> 
                                | Posted: {{ $blog->created_at->diffForHumans() }}
                            @endif
                            <br>
                            @foreach($blog->category as $category)
                                <span><a href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a></span>
                            @endforeach
                            <h2 class="mt-0 mb-1"><a href={{ route('blogs.show', [$blog->id]) }}>{{ $blog->title }}</a></h2>

                            <div class="lead">{!! str_limit($blog->body, 200) !!}</div>
                        </div>
                    </li>
                </div>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

@endsection