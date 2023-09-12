<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\Routing\Controller as BaseController;

class DeleteController extends BaseController
{
    public function __invoke(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');

    }
}
