<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Auth') - Eco Monitoring</title>

    <script>
        (function () {
            try {
                const saved = localStorage.getItem('dash26-theme');
                const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                document.documentElement.setAttribute('data-theme', saved || (prefersDark ? 'dark' : 'light'));
            } catch (e) {
                document.documentElement.setAttribute('data-theme', 'light');
            }
        })();
    </script>

    @vite([
        'resources/scss/app.scss',
        'resources/js/app.js'
    ])
</head>
<body>
    @yield('content')
</body>
</html>
