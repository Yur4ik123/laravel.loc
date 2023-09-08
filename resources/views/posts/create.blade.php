@extends('layouts.app')
@section('content')
    <div>
        <form action="{{route('posts.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input value="{{old('title')}}" type="text" placeholder="title" name="title" class="form-control"
                       id="title">
                @error('title')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea type="text" placeholder="content" name="content" class="form-control"
                          id="content">{{old('content')}}</textarea>
                @error('content')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input value="{{old('image')}}" type="text" placeholder="image" name="image" class="form-control"
                       id="image">
                @error('image')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Category</label>
                <select class="form-select" name="category_id" aria-label="Default select example">
                    @foreach($categories as $category)
                        <option
                            {{old('category_id')==$category->id?'selected':''}}
                            value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach

                </select>
                @error('category_id')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Tags</label>
                <select class="form-select" name="tags[]" multiple aria-label="Default select example">
                    @foreach($tags as $tag)
                        <option
                            value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                </select>

            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
