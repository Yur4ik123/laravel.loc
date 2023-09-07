@extends('layouts.app')
@section('content')
<div>
    <form action="{{route('posts.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" placeholder="title" name="title" class="form-control" id="title">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea type="text" placeholder="content" name="content" class="form-control" id="content"></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" placeholder="image" name="image" class="form-control" id="image">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
