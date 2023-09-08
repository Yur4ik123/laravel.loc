@extends('layouts.app')
@section('content')
<div>
    <form action="{{route('posts.update', $post->id)}}" method="post">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="title" class="form-label" >Title</label>
            <input type="text" placeholder="title" name="title" class="form-control" id="title" value="{{$post->title}}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea type="text" placeholder="content" name="content" class="form-control" id="content" >{{$post->title}}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" placeholder="image" name="image" class="form-control" value="{{$post->title}}" id="image">
        </div>
        <div class="mb-3">
            <label  class="form-label">Category</label>
            <select class="form-select" name="category_id" >
                @foreach($categories as $category)
                    <option
                        {{$category->id == $post->category->id ? 'selected': ''}}
                        value="{{$category->id}}">{{$category->title}}
                    </option>
                @endforeach

            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Tags</label>
            <select class="form-select" name="tags[]" multiple aria-label="Default select example">
                @foreach($tags as $tag)
                    <option
                        @foreach($post->tags as $postTag)
                            {{$tag->id == $postTag->id ? 'selected': ''}}
                        @endforeach
                        value="{{$tag->id}}">{{$tag->title}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
