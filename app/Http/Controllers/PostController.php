<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use mysql_xdevapi\Exception;
use Symfony\Component\Console\Input\Input;


class PostController extends Controller
{

    //ask eng noha about that ?
    public function __construct()
    {
        $this->middleware('auth');
    }

//home
    public function home()
    {
        $posts = Post::paginate(10);
        if (count($posts) <= 0) {
            return view('posts.empty');
        }
        return view('posts.home', ['posts' => $posts]);
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

    public function store(PostRequest $request)
    {


        dd(request()->get('user_id'));
        $requestData = request()->all();
        if (Post::where('id', '=', $requestData['user_id'])->exists()) {
            Post::create($requestData);
            return to_route('posts.home');
        }

//        dd($requestData['user_id']);
//                for ($i = 3; $i < 103; $i++) {
//                    Post::create([
//                        'title' => "Number $i",
//                        'description' => "This is post number $i",
//                        'user_id' => '3',
//                    ]);
//                }
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

    public function update($postID, PostRequest $request)
    {
        //fetch request data
        $fetchData = request()->all();
        $flight = Post::find($postID);
        $flight->title = $fetchData['title'];
        $flight->description = $fetchData['description'];
        $flight->save();
        return to_route('posts.home');

    }

    public function destroy($postID)
    {
        Post::find($postID)->delete();
        return to_route('posts.home');
    }

    //restore deleted columns
    public function showDeleted()
    {
//        $deleted_at = Post::whereNotNull('deleted_at')->get();
//        $deleted_at = Post::where('deleted_at','null')->get();
//        dd($deleted_at);
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
