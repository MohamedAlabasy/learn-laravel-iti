@extends('layouts.app')
@section('title') Show @endsection
@section('content')
    <div class="card m-4">
        <div class="card-header">
            Post information
        </div>
        <div class="card-body">
            <label style="font-size: 20px;font-weight: bold">Title :&nbsp;</label>
            <label>{{$posts->title}}</label>
            <h5 class="card-title">Description :</h5>
            <p class="card-text">{{$posts->description}}</p>
        </div>
    </div>
     <div class="card m-4">
        <div class="card-header">
            post create information
        </div>
        <div class="card-body" >
            <label style="font-size: 20px;font-weight: bold">Name :&nbsp;</label>
            <label>{{$posts->user->name}}</label>
            <br>
            <label style="font-size: 20px;font-weight: bold">Email :&nbsp;</label>
            <label>{{$posts->user->email}}</label>
            <br>
            <label style="font-size: 20px;font-weight: bold">Create at :&nbsp;</label>
            <label>{{$posts->created_at}}</label>
        </div>

    </div>
    <div class="text-center mt-5 mb-4">
        <a href="{{route('posts.index')}}" class="btn btn-success ">Back to Home</a>
    </div>
@endsection
