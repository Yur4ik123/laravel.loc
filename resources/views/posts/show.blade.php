@extends('layouts.app')
@section('content')
    <div>
        <div>       {{$post->id}} . {{$post->title}}</div>
        <div>       {{$post->content}}</div>
    </div>
    <div>
        <a class="btn btn-primary m-3" href="{{route('posts.edit', $post->id)}}">Edit</a>
    </div>
    <div>
        <form action="{{route('posts.delete', $post->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger m-3" type="submit">Delete</button>
        </form>

    </div>
    <div>
        <a class="btn btn-primary m-3" href="{{route('posts.index')}}">Back</a>
    </div>
@endsection
