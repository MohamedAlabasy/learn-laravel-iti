@extends('layouts.app')
@section('title') Create @endsection
@section('content')

    <form method="post" action="{{route('posts.store')}}" class="mt-5">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <?php
            if (session()->has('titleError')) {
                echo "<span>" . session()->get('titleError') . "</span>";
                session()->forget('titleError');
            }
            ?>
            <input autofocus required minlength="3" maxlength="100" name="title" type="text" class="form-control"
                   id="title" aria-describedby="emailHelp">

        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <?php
            if (session()->has('descriptionError')) {
                echo "<span>" . session()->get('descriptionError') . "</span>";
                session()->forget('descriptionError');
            }
            ?>
            <textarea name="description" minlength="20" required maxlength="200" id="description"
                      class="form-control"></textarea>
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
    </form>
@endsection
