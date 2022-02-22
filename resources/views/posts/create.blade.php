@extends('layouts.app')
@section('title') Create @endsection
@section('content')

    <form method="post" action="{{route('posts.store')}}" class="mt-5">
        @csrf
        <div class="mb-3">
            {{--            @error('title')--}}
            {{--            <div class="alert alert-danger">{{ $message }}</div>--}}
            {{--            @enderror--}}

            <label for="title" class="form-label">Title</label>
            <input autofocus required minlength="3" maxlength="100" name="title" type="text"
                   class="form-control @error('title') is-invalid @enderror"
                   id="title" aria-describedby="emailHelp">
            @error('title')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">

            <label for="description" class="form-label">Description</label>
            <textarea minlength="20" required maxlength="200" name="description" id="description"
                      class="@error('description') is-invalid @enderror form-control"></textarea>
            @error('description')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="creator" class="form-label">Post Creator</label>
            <select name="user_id" id="creator" class="form-control">
                <optgroup label="select only from">
                    @foreach($user as $creator)
                        <option value="{{$creator->id}}">{{$creator->name}}</option>
                    @endforeach
                </optgroup>

            </select>
        </div>
        <button type="submit" class="btn btn-success">Create</button>
        <a href="{{route('posts.home')}}" class="btn btn-secondary ">Back to Home</a>
    </form>
@endsection
