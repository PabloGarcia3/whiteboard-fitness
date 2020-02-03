@extends('layouts.app')

@section('content')
@include('partials.tinymce')
    <div class="container-fluid">
        <div class="jumbotron">
            <div id="jumbotron-card">
            <h1>Create a new workout</h1>
            </div>
        </div>
        <div class="col md 12">
            <form action="{{ route('blogs.store') }}" method="post" enctype="multipart/form-data">
                @include('partials.error-message')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea name="body" class="form-control my-editor">{!! old('body') !!}</textarea>
                </div>
                <div class="form-group form-check form-check-inline">
                    @foreach($categories as $category)
                        <input type="checkbox" value="{{ $category->id }}" name="category_id[]" class="form-check-input">
                        <label class="form-check-label mr-3">{{ $category->name }}</label>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="featured_image">Featured Image</label>
                    <input type="file" name="featured_image" class="form-control">
                    <br>
                    <label for="featured_video">Featured Video</label>
                    <input type="file" name="featured_video" class="form-control">
                    {{-- <label class="btn btn-default">
                        <span class="btn btn-outline btn-sm btn-primary">Featured Image</span>
                        <input type="file" name="featured_image" class="form-control" hidden>
                    </label>
                    <br>
                    <label class="btn btn-default">
                        <span class="btn btn-outline btn-sm btn-primary">Featured Video</span>
                        <input type="file" name="featured_video" class="form-control" hidden>
                    </label> --}}
                </div>
                <div>
                    <button class="btn btn-success" type="submit">
                        Create a new blog
                    </button>
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>

@endsection