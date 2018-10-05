@extends('layouts.app')

@section('content')
<div style="background-image: url('https://images.unsplash.com/photo-1508672019048-805c876b67e2?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=bd27a515bce2dade58bc288fde28f290&auto=format&fit=crop&w=1393&q=80')" class="page-wrapper welcome-page">

    <div class="welcome-screen">

    <div id="welcome-name"><h1>{{ Config('app.name') }}</h1></div>
    <nav id="welcome-navigation">
            <ul id="welcome-nav-list">
                <li class="welcome-list-item"><a href="/destinations">Destinationer</a></li>
        
                @if(Auth::guest())
                    <li class="welcome-list-item"><a href="/login">Logga in</a></li>
                    <li class="welcome-list-item"><a href="/register">Registrera dig</a></li>
                @endif
                    
                @if(Auth::user())
                    <li class="welcome-list-item"><a href="/dashboard">Kontrollpanel</a></li>
                @endif
            </ul>
        </nav>
    </div>
</div>
@endsection