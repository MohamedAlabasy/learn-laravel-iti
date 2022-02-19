@extends('layouts.app')
@section('content')
    <div class="card m-4">
        <div class="card-header">
            Post information
        </div>
        <div class="card-body">
            <h4 class="card-title">Title :-</h4>
            <h5 class="card-title">Description</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        </div>
    </div>
     <div class="card m-4">
        <div class="card-header">
            post create information
        </div>
        <div class="card-body">
            <h4 class="card-title">Name :- </h4>
            <h4 class="card-title">Email :- </h4>
            <h4 class="card-title">Create at :- </h4>
        </div>

    </div>
    <div class="text-center mt-5 mb-4">
        <a href="{{route('posts.index')}}" class="btn btn-success ">Back to Home</a>
    </div>
@endsection
