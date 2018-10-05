@extends('layouts.app')

@section('content')
@include('inc.nav')

    <div class="single-post-wrapper">
        <div class="single-post-header" style="background-image:url(/storage/post_images/{{ $post->post_image }})">
            <div class="single-post-title">
                <h1>{{ $post->title }}</h1>
            </div>
        </div>
        <article class="single-post-body">
        <div class="single-post-body-text">
            {!! $post->body !!}
        </div>
        <div class="single-post-information">
            <div>
                <span> {{ $post->author }} </span>
                <span> {{ $post->created_at }} </span>
            </div>
            @if(Auth::user())
                <div class="single-post-user-buttons">
                    <a href="/destinations/{{ $post->id }}/edit">Redigera</a>
                    {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST'])!!}
                
                    {{Form::hidden('_method', 'DELETE')}}
                
                    {{Form::submit('Radera')}}
                
                {!!Form::close()!!}
            </div>
                    @endif
        </div>
        </article>

    </div>

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