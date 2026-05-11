<aside class="d-sidebar">

    <div class="brand">
        <div class="brand-logo">
            ♻
        </div>

        <div class="brand-text">
            <div class="brand-name">Eco Monitoring</div>
            <div class="brand-tag">WASTE SYSTEM</div>
        </div>
    </div>

    <nav class="nav-section">
        <div class="nav-label">MAIN MENU</div>

        @if(Auth::user()->role === 'admin')
            <a href="{{ route('dashboard') }}"
               class="nav-link {{ request()->routeIs('dashboard') ? 'is-active' : '' }}">
                <span>📊</span>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('monitoring') }}"
               class="nav-link {{ request()->routeIs('monitoring') ? 'is-active' : '' }}">
                <span>📈</span>
                <span>Monitoring</span>
            </a>

            <a href="{{ route('laporan') }}"
               class="nav-link {{ request()->routeIs('laporan') ? 'is-active' : '' }}">
                <span>📄</span>
                <span>Laporan</span>
            </a>
        @endif

        @if(Auth::user()->role === 'petugas')
            <a href="{{ route('pemilahan') }}"
               class="nav-link {{ request()->routeIs('pemilahan*') ? 'is-active' : '' }}">
                <span>♻️</span>
                <span>Pemilahan Sampah</span>
            </a>
        @endif
    </nav>

    <div class="sidebar-footer">
        <div class="workspace">
            <div class="workspace-avatar">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>

            <div class="workspace-text">
                <div class="workspace-name">
                    {{ Auth::user()->name }}
                </div>
                <div class="workspace-role">
                    {{ ucfirst(Auth::user()->role) }}
                </div>
            </div>
        </div>
    </div>

</aside>
