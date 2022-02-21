<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{

//home
    public function index()
    {
        $posts = Post::paginate(10);
        if (count($posts) <= 0) {
            return view('posts.empty');
        }
        return view('posts.index', ['posts' => $posts]);
    }


//empty statement
    public function empty()
    {
        return view('posts.empty');
    }

//create post
    public function create()
    {
        $user = User::all();
        return view('posts.create', ['user' => $user]);
    }

    public function store()
    {
        if (request()->has('title') && request()->has('description') && request()->has('user_id')) {

            if (!request()->filled('title')) { //error in title
                session()->put('titleError', 'you must enter post title');
                $user = User::all();
                return view('posts.create', ['user' => $user]);
            } elseif (!request()->filled('description')) { //error in description
                session()->put('descriptionError', 'you must enter post description');
                $user = User::all();
                return view('posts.create', ['user' => $user]);
            } else { //there is no errors
                $requestData = request()->all();
//                for ($i = 3; $i < 103; $i++) {
//                    Post::create([
//                        'title' => "Number $i",
//                        'description' => "This is post number $i",
//                        'user_id' => '3',
//                    ]);
//                }
                Post::create($requestData);
                return to_route('posts.index');
            }
        }
    }

//show post
    public function show($postID)
    {
        $posts = Post::find($postID);
        return view('posts.show', ['posts' => $posts]);
    }


    public function edit($postID)
    {
        $posts = Post::find($postID);
        return view('posts.edit', ['posts' => $posts, 'postID' => $postID]);
    }

    public function update($postID)
    {
        if (request()->has('title') && request()->has('description')
            && !empty($postID) && $postID > 0) {
            if (!request()->filled('title')) { //error in title
                session()->put('titleError', 'you must enter post title');
                $posts = Post::find($postID);
                return view('posts.edit', ['posts' => $posts, 'postID' => $postID]);
            } elseif (!request()->filled('description')) { //error in description
                session()->put('descriptionError', 'you must enter post description');
                $posts = Post::find($postID);
                return view('posts.edit', ['posts' => $posts, 'postID' => $postID]);
            } else { //there is no errors
                //fetch request data
                $fetchData = request()->all();
                $flight = Post::find($postID);
                $flight->title = $fetchData['title'];
                $flight->description = $fetchData['description'];
                $flight->save();
                return to_route('posts.index');
            }
        }
    }

    public function destroy($postID)
    {
        Post::find($postID)->delete();
        return to_route('posts.index');
    }

    //restore deleted columns
    public function showDeleted()
    {
        $posts = Post::onlyTrashed()->get();
        if (count($posts) <= 0) {
            return view('posts.emptyDelete');
        }
        return view('posts.showDeleted', ['posts' => $posts]);
    }

    //to restore deleted column
    public function restore($postID)
    {
        Post::withTrashed()->find($postID)->restore();
        return to_route('posts.showDeleted');

    }

}
