@extends('layouts.app')

@section('title') Index @endsection

@section('content')
    <div class="text-center mt-5 mb-4">
        <a href="{{route('posts.create')}}" class="btn btn-success ">Create Post</a>
        <a href="{{route('posts.showDeleted')}}" class="btn btn-warning">Deleted Restored</a>
    </div>
    <table class="text-center table table-striped table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col"></th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($posts as $post)
            <tr>
                <th scope="row">{{$post->id}}</th>
                <td>{{$post->title}}</td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->created_at->format('d - M - Y')}}</td>
                <td><a href="{{route('posts.show', $post->id)}}" class="btn btn-info">Show</a></td>
                <td><a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary">Edit</a></td>
                <td>
                    <form method="post" action="{{route('posts.destroy', $post->id)}}">
                        @csrf
                        @method('delete')
                        <input type='submit' class='btn btn-danger' value='Delete'>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{--  for pag  --}}
    <div class="container mt-5 mb-4" style="padding: 0 30%">
        {{$posts->links('pagination::bootstrap-4')}}
    </div>
    <br>
@endsection
