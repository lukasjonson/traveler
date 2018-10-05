@extends('layouts.app')

@section('content')
<div style="background-image: url('https://images.unsplash.com/photo-1533557603879-ebdd7a92e4e8?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=6d08c991169da5df017efdbedb195909&auto=format&fit=crop&w=1950&q=80')" class="page-wrapper welcome-page">

    <div class="welcome-screen">

    <div id="welcome-name"><h1>{{ Config('app.name') }}</h1></div>
    <nav id="welcome-navigation">
            <ul id="welcome-nav-list">
                <li class="welcome-list-item"><a href="/">Hem</a></li>
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