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
                        <div id="video-player" class="img-thumbnail mr-3">
                            <video width="100%" controls>
                                <source src="/videos/featured_video/{{ $blog->featured_video ? $blog->featured_video : '' }}" type="video/mp4">
                                    Your browser does not support the video tag.
                            </video>
                        </div>
                        @endif
                        <div class="media-body">
                            @if($blog->user)
                                Coach: 
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
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                    </li>
                </div>
                @endforeach
            </ul>
        </div>
        
    </div>

@endsection