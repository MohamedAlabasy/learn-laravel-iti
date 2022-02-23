<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function home()
    {
        $posts = Post::all();
        return PostResource::collection($posts);
    }

    public function store(PostRequest $request)
    {
        $requestData = request()->all();
        $posts = Post::create($requestData);
        return new PostResource($posts);
    }


    public
    function show($postID)
    {
        $posts = Post::find($postID);
//        return [
//            'PostID' => $posts['id'],
//            'title' => $posts['title'],
//            'description' => $posts['description'],
//            'created_at' => $posts['created_at'],
//            'user_id' => $posts['user_id'],
//            'null' => $posts['null'],
//        ];
        return new PostResource($posts);
    }
//    public function update($postID, PostRequest $request)
//    {
//        //fetch request data
//        $fetchData = request()->all();
//        $flight = Post::find($postID);
//        $flight->title = $fetchData['title'];
//        $flight->description = $fetchData['description'];
//        $flight->save();
//        return to_route('posts.home');
//
//    }
}

