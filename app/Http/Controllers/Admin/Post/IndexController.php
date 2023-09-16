<?php

namespace App\Http\Controllers\Admin\Post;

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

        return view('admin.posts.index',  compact('posts'));
    }
}
