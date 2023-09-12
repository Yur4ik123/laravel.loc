<?php

namespace App\Http\Controllers\Post;

use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;
use App\Services\Post\Service;
use Illuminate\Routing\Controller as BaseController;

class UpdateController extends BaseController
{
    public function __construct(private Service $service)
    {
    }

    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        $this->service->update($post, $data);

        return redirect()->route('posts.show', $post->id);
    }
}
