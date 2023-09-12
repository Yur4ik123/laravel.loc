<?php

namespace App\Http\Controllers\Post;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Routing\Controller as BaseController;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create', compact('categories', 'tags') );
    }
}
