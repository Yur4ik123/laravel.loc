<?php

namespace App\Http\Controllers\Post;

use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use Illuminate\Routing\Controller as BaseController;

class ShowController extends BaseController
{
    public function __invoke(Post $post)
    {
        return new PostResource($post);
       // return view('posts.show', compact('post'));
    }
}
