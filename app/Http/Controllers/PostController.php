<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Routing\Controller as BaseController;

class PostController extends BaseController
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }
    public function create(){
        return view('posts.create');
    }
    public function store(){
        $data = request()->validate([
            'title'=>'string',
            'content'=>'string',
            'image'=>'string'
        ]);
        Post::create($data);
        return redirect()->route('posts.index');
    }

    public function show(Post $post){
        return view('posts.show', compact('post'));
    }
    public function edit(Post $post){
        return view('posts.edit', compact('post'));
    }
    public function update(Post $post){
        $data = request()->validate([
            'title'=>'string',
            'content'=>'string',
            'image'=>'string'
        ]);
        $post->update($data);
        return redirect()->route('posts.show', $post->id);
    }
    public function destroy(Post $post){
        $post->delete();
        return redirect()->route('posts.index');

    }
}
