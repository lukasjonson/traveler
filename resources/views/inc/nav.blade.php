<nav>
    <ul>
        <li><a href="/">Hem</a></li>
        <li><a href="/destinations">Destinationer</a></li>

        @if(Auth::guest())
            <li><a href="/login">Logga in</a></li>
            <li><a href="/register">Registrera dig</a></li>
        @endif
            
        @if(Auth::user())
            <li><a href="/dashboard">Kontrollpanel</a></li>
        @endif
    </ul>
</nav>