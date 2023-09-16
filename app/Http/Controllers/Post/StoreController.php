<?php

namespace App\Http\Controllers\Post;

use App\Http\Requests\Post\StoreRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use App\Services\Post\Service;
use Illuminate\Routing\Controller as BaseController;

class StoreController extends BaseController
{
    public function __construct(private Service $service)
    {

    }

    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $post = $this->service->store($data);
        return $post instanceof Post ? new PostResource($post) : $post;
    }
}
