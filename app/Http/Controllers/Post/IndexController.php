<?php

namespace App\Http\Controllers\Post;

use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Post;
use Illuminate\Routing\Controller as BaseController;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $filterRequest)
    {

        $data = $filterRequest->validated();
        $query = Post::query();

        $filter = app()->make(PostFilter::class, ['queryParams'=>array_filter($data)]);
        $posts = Post::filter($filter)->paginate(10);


        return view('posts.index', compact('posts'));
    }
}
