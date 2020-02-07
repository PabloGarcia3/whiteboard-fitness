@extends('layouts.app')

@section('content')
    <div class="container">
    <h3>{{ $user->name }}'s Workouts</h3>
    {{-- <p>{{ $user->role->name }}</p> --}}
    <hr>
        <ul class="list-unstyled">
        @foreach($user->blogs as $blog)
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
                        Posted: {{ $blog->created_at->diffForHumans() }}
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
@endsection