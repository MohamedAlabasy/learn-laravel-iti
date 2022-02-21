@extends('layouts.app')
@section('title') Empty Statement @endsection
@section('content')
    <div class="text-center mt-5 mb-4">
        <a href="{{route('posts.index')}}" class="btn btn-success ">Back to Home</a>
    </div>

    <img
        src="https://cdn.dribbble.com/users/888330/screenshots/2653750/media/b7459526aeb0786638a2cf16951955b1.png"
        style="position: relative; left: 25%; width: 50%" alt="there is no data to show">
@endsection

