<?php

namespace App\Http\Controllers\Post;

use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;
use App\Services\Post\Service;
use Illuminate\Routing\Controller as BaseController;

class StoreController extends BaseController
{
    public function __construct(private Service $service){

    }
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);
        return redirect()->route('posts.index');
    }
}
