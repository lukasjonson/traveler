@extends('layouts.app')

@section('content')
@include('inc.nav')

    <div>
        <h1>{{ $post->title }}</h1>
        <p> {{ $post->author }} </p>
        <img style="width:50rem;height:auto" src="/storage/post_images/{{ $post->post_image }}" alt="">
        <p>
            {{ $post->body }}
        </p>
    </div>

    @if(Auth::user())
    <p><a href="/destinations/{{ $post->id }}/edit">Redigera</a></p>
    {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST'])!!}

    {{Form::hidden('_method', 'DELETE')}}

    {{Form::submit('Radera')}}

{!!Form::close()!!}
    @endif

    @foreach($post->comments as $comment)
        <div>
        <h4> {{ $comment->name }} </h4>
        <p>
            {{ $comment->comment }}
        </p>
        <p>
            {{ $comment->created_at }}
        </p>
        </div>
    @endforeach

    @include('forms.comments_form')
@endsection