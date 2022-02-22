@extends('layouts.app')

@section('title') Deleted Restored @endsection

@section('content')
    <div class="text-center mt-5 mb-4">
        <a href="{{route('posts.home')}}" class="btn btn-success ">Back to Home</a>
    </div>
    <table class="text-center mt-5 mb-4 table table-striped table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($posts as $post)
            <tr>
                <th scope="row">{{$post->id}}</th>
                <td>{{$post->title}}</td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->created_at}}</td>
                <td>
                    <a href="{{route('posts.restored',$post->id)}}" class="btn btn-warning">Restore</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
{{--    {{$posts->links()}}--}}
@endsection
