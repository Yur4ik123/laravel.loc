<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\Routing\Controller as BaseController;

class ShowController extends BaseController
{
    public function __invoke(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
