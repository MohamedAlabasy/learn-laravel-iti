<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    private $posts = [
        ['id' => 1, 'title' => 'first post', 'posted_by' => 'mohamed', 'created_at' => '2009-02-19 10:00:00'],
        ['id' => 2, 'title' => 'second post', 'posted_by' => 'alabasy', 'created_at' => '2015-02-15 05:00:00'],
        ['id' => 3, 'title' => 'third post', 'posted_by' => 'beso', 'created_at' => '2021-03-8 05:00:00'],
        ['id' => 4, 'title' => 'forth post', 'posted_by' => 'ahmed', 'created_at' => '2021-03-8 05:00:00'],
        ['id' => 5, 'title' => 'forth post', 'posted_by' => 'ali', 'created_at' => '2021-03-8 05:00:00'],
    ];
    public function index()
    {
        return view('posts.index', ['posts' => $this->posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function show($postID)
    {
        return view('posts.show', ['postsID' => $postID]);
    }

    public function store()
    {
        return view('posts.store');
    }

    public function edit($postID)
    {
        return view('posts.edit', ['postID' => $postID]);
    }

    public function destroy($postID)
    {
        unset($this->posts[$postID-1]);
        return view('posts.index', ['posts' => $this->posts]);

//        return view('posts.edit', ['postID' => $postID]);
    }

    public function update()
    {

        dd("update");
//        return view('posts.edit');
    }
}
