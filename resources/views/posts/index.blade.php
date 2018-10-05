@extends('layouts.app')

@section('content')

    <div>
        @foreach($posts as $post)
            <div>
            <h3><a href="/destinations/{{ $post->id }}">{{ $post->title }} </a></h3>
                <p> {{ $post->author }} </p>
                <img style="width:20rem;height:auto" src="storage/post_images/{{ $post->post_image }}" alt="">
            </div>
        @endforeach
    </div>

@endsection