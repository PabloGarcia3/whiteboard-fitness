@extends('layouts.app')

@include('partials.meta_dynamic')

@section('content')

    <div class="container-fluid">
        <article>
            <div class="container">
                <h1>{{ $blog->title }}</h1>
                <hr>
                <div class="col-md-12">
                    @if($blog->featured_image)
                        <img 
                            src="/images/featured_image/{{ $blog->featured_image ? $blog->featured_image : '' }}" 
                            alt="{{ str_limit($blog->title, 50) }}"
                            class="img-responsive featured_image"
                        >
                    @endif
                    <br>
                    @if($blog->featured_video)
                    <div id="video-player">
                        <video width="100%" controls>
                            <source src="/videos/featured_video/{{ $blog->featured_video ? $blog->featured_video : '' }}" type="video/mp4">
                              Your browser does not support the video tag.
                       </video>
                    </div>
                    @endif
                </div>
                <div class="col-md-12">
                    <strong>Categories: </strong>
                    @foreach($blog->category as $category)
                        <span><a href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a></span>
                    @endforeach
                    <hr>
                </div>

                @if(Auth::user())
                @if(Auth::user()->role_id === 1 || Auth::user()->role_id === 2 && Auth::user()->id === $blog->user_id)

                <div class="btn-group mb-3">
                    <a class="btn btn-primary btn-xs" href="{{ route('blogs.edit', $blog->id) }}">Edit</a>
                    <form method="post" action="{{ route('blogs.delete', $blog->id) }}">
                        {{ method_field('delete') }}
                        <button type="submit" class="btn btn-danger btn-xs">
                            Delete
                        </button>
                        {{ csrf_field() }}
                    </form>  
                </div>
                @endif
                @endif
            </div>
            <div class="col md 12">
                {!! $blog->body !!}

                @if($blog->user)
                Coach: 
                <a href="{{ route('users.show', $blog->user->name) }}">
                    {{ $blog->user->name }}
                </a> 
                | Posted: {{ $blog->created_at->diffForHumans() }}
                @endif
                <hr>
                <aside>
                    <div id="disqus_thread"></div>
                    <script>
                    (function() {
                        var d = document, s = d.createElement('script');
                        s.src = 'https://whiteboard-1.disqus.com/embed.js';
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                    })();
                    </script>
                </aside>
            </div>
        </article>

        <hr>

    </div>

@endsection