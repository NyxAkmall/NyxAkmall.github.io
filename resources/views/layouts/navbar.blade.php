<header class="d-topbar">

    <div class="crumbs">
        <button class="hamburger" data-drawer-open aria-label="Buka menu">
            ☰
        </button>

        <span>Eco Monitoring</span>
        <span class="sep">/</span>
        <span class="current">@yield('title')</span>
    </div>

    <div class="topbar-actions">
        <button class="icon-btn" id="themeToggle" type="button" aria-label="Toggle theme"></button>

        <div class="topbar-user">
            <div class="avatar">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>

            <div class="user-meta">
                <div class="user-name">{{ Auth::user()->name }}</div>
                <div class="user-role">{{ ucfirst(Auth::user()->role) }}</div>
            </div>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn--ghost btn-sm">
                Logout
            </button>
        </form>
    </div>

</header>
