@extends('layouts.app')
@section('title') Edit @endsection
@section('content')
    <form method="post" action="{{route('posts.update',$postID)}}" class="mt-5">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="Title" class="form-label">Title</label>
            <?php
            if (session()->has('titleError')) {
                echo "<span>" . session()->get('titleError') . "</span>";
                session()->forget('titleError');
            }
            ?>
            <input autofocus required minlength="3" maxlength="100" value="{{$posts->title}}" name="title" type="text"
                   class="@error('title') is-invalid @enderror form-control" id="Title"
                   aria-describedby="emailHelp">
            @error('title')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label @error('description') is-invalid @enderror">Description</label>
            <textarea minlength="20" required maxlength="200" name="description" id="description"
                      class="form-control">{{$posts->description}}</textarea>
            @error('description')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Post Creator</label>
            <input type="text" class="form-control" disabled value="{{$posts->user->name}}">
        </div>
        <input type="submit" class="btn btn-primary" value="Update">
        <a href="{{route('posts.home')}}" class="btn btn-secondary ">Back to Home</a>
    </form>
@endsection
