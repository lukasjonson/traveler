<nav id="main-navigation">
    <ul id="nav-list">
        <li class="list-item"><a href="/">Hem</a></li>
        <li class="list-item"><a href="/destinations">Destinationer</a></li>

        @if(Auth::guest())
            <li class="list-item"><a href="/login">Logga in</a></li>
            <li class="list-item"><a href="/register">Registrera dig</a></li>
        @endif
            
        @if(Auth::user())
            <li class="list-item"><a href="/dashboard">Kontrollpanel</a></li>
        @endif
    </ul>
</nav>