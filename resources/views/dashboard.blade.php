@extends('layouts.app')

@section('content')
@include('inc.nav')

<p>Inloggad som {{ Auth::user()->name }}</p>
<a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>


<div>
    <p><a href="/destinations/create">Lägg till destination</a></p>
        <h3>Dina destinationer</h3>
        @foreach($posts as $post)
            <div>
            <h3><a href="/destinations/{{ $post->id }}">{{ $post->title }} </a></h3>
            </div>
        @endforeach
    </div>
@endsection