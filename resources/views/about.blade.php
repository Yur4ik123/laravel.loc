@section('content')
    <div>
        @foreach($posts as $post)
            {{$post->title}}<br>
        @endforeach
    </div>
@endsection
