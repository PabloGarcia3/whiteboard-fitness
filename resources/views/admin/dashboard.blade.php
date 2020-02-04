@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="jumbotron">
        <div id="jumbotron-card">
            @if(Auth::user() && Auth::user()->role_id === 1)
            <h1>Admin Dashboard</h1>
            @elseif(Auth::user() && Auth::user()->role_id === 2)
            <h1>Coach Dashboard</h1>
            @endif
        </div>
    </div>
    {{-- Admin --}}
    @if(Auth::user() && Auth::user()->role_id === 1)
        <div class="col-md-12">
            <a href="{{ route('blogs.create') }}" class="btn btn-primary">Create Blog</a>
            <a href="{{ route('admin.blogs') }}" class="btn btn-primary">Publish Blog</a>
            <a href="{{ route('blogs.trash') }}" class="btn btn-danger">Trashed Blogs</a>
            <a href="{{ route('categories.create') }}" class="btn btn-success">Create Category</a>
            <a href="{{ route('users.index') }}" class="btn btn-success">Manage Users</a>   
        </div>
    {{-- Author --}}
    @elseif(Auth::user() && Auth::user()->role_id === 2)
        <div class="col-md-12">
            <a href="{{ route('blogs.create') }}" class="btn btn-primary">Create Blog</a>
            <a href="{{ route('blogs.trash') }}" class="btn btn-danger">Trashed Blogs</a>  
        </div>
    @endif
    
</div>

@endsection