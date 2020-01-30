@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1>{{ $category->name }}</h1>
        <div class="btn-group">
            <a class="btn btn-warning btn-small mr-5" href="{{ route('categories.edit', $category->id) }}">Edit</a>
            <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                {{ method_field('delete') }}
                <button type="submit" class="btn btn-danger btn-small">
                    Delete
                </button>
                {{ csrf_field() }}
            </form>
        </div>
        <div class="col-md-12">
            @foreach($category->blog as $blog)
            <h3><a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }}</a></h3>
            @endforeach
        </div>
        
    </div>

@endsection