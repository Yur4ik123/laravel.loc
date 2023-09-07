@extends('layouts.app')
@section('content')
    <div>
        <a class="btn btn-primary m-3" href="{{route('posts.create')}}">Add post</a>
    </div>
    <div class="row">
        @foreach($posts as $post)
            <div>
                <a href="{{route('posts.show', $post->id)}}"> {{$post->id}} . {{$post->title}}</a>
            </div>

        @endforeach
    </div>
@endsection
