<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Eco Monitoring</title>

    @vite([
        'resources/scss/app.scss',
        'resources/js/app.js'
    ])
</head>
<body>

<div class="content" style="min-height:100vh; display:flex; align-items:center; justify-content:center;">
    <div class="card" style="max-width:720px; width:100%; text-align:center; padding:70px 30px;">
        <span class="eyebrow">ERROR PAGE</span>

        <h1 style="font-size:110px; margin:10px 0; color:var(--primary); font-weight:800; line-height:1;">
            404
        </h1>

        <h2 class="hero-title" style="margin-bottom:12px;">
            Halaman Tidak Ditemukan
        </h2>

        <p class="hero-sub" style="margin:0 auto;">
            Halaman yang kamu cari tidak tersedia atau sudah dipindahkan.
        </p>

        <div style="margin-top:30px; display:flex; gap:12px; justify-content:center; flex-wrap:wrap;">
            @auth
                @if(Auth::user()->role === 'admin')
                    <a href="{{ route('dashboard') }}" class="btn btn--primary">Kembali ke Dashboard</a>
                @else
                    <a href="{{ route('pemilahan') }}" class="btn btn--primary">Kembali ke Pemilahan</a>
                @endif
            @else
                <a href="{{ route('login') }}" class="btn btn--primary">Kembali ke Login</a>
            @endauth

            <a href="{{ url()->previous() }}" class="btn btn--ghost">Halaman Sebelumnya</a>
        </div>
    </div>
</div>

</body>
</html>
