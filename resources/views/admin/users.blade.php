@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="jumbotron">
            <h1>Manage Users</h1>
        </div>
        <div class="col-md-12">
            <div class="row">
                @foreach($users as $user)
                    <div class="col-md-4">
                        <form action="{{ route('users.update', $user->id) }}" method="post">
                            {{ method_field('patch') }}
                            <div class="form-group">
                                <input value="{{ $user->name }}" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <select name="role_id" class="form-control">
                                    <option selected>{{ $user->role->name }}</option>
                                    <option value="2">Author</option>
                                    <option value="3">Subscriber</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input value="{{ $user->email }}" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <input value="{{ $user->created_at->diffForHumans() }}" class="form-control" disabled>
                            </div>
                            <button class="btn btn-primary btn-xs col-md-6">
                                Update
                            </button>
                            {{ csrf_field() }}
                        </form>
                        <form action="{{ route('users.destroy', $user) }}" method="post">
                            {{ method_field('delete') }}
                            <button class="btn btn-danger btn-xs col-md-6 mt-1">
                                Delete
                            </button>
                            {{ csrf_field() }}
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection