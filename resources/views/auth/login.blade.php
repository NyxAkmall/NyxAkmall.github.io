@extends('layouts.auth')

@section('title', 'Login')

@section('content')

<div class="auth-shell">

    {{-- LEFT SIDE --}}
    <div class="auth-aside">

        <div class="auth-brand">

            <div class="logo">
                ♻
            </div>

            <div class="name">
                Eco Monitoring
            </div>

        </div>

        <div class="auth-aside-body">

            <span class="auth-aside-eyebrow">
                SISTEM MONITORING SAMPAH
            </span>

            <h1>
                Monitoring Sampah Kampus
                Lebih Modern & Efisien
            </h1>

            <p>
                Sistem monitoring sampah organik dan anorganik
                berbasis web untuk membantu pengelolaan sampah
                Kampus A dan Kampus B secara realtime.
            </p>

            <div class="auth-quote">

                Monitoring digital membantu proses pengelolaan
                sampah menjadi lebih cepat, transparan,
                dan terstruktur.

                <div class="auth-quote-author">

                    <div class="av">
                        EMS
                    </div>

                    Eco Monitoring System

                </div>

            </div>

        </div>

        <div class="auth-aside-footer">

            <span>
                LARAVEL 12
            </span>

            <span>
                MONITORING SYSTEM
            </span>

        </div>

    </div>

    {{-- RIGHT SIDE --}}
    <div class="auth-main">

        <div class="auth-main-top">

            <div></div>

            <div class="switch-link">

                Belum punya akun?

                <a href="{{ route('register') }}">
                    Register
                </a>

            </div>

        </div>

        <div class="auth-card">

            <h2>
                Login Account
            </h2>

            <p class="sub">
                Masukkan email dan password untuk masuk
                ke sistem monitoring sampah.
            </p>

            @if(session('success'))

            <div class="alert-success">

                {{ session('success') }}

            </div>

            @endif

            @if($errors->any())

            <div class="alert-danger">

                {{ $errors->first() }}

            </div>

            @endif

            <form method="POST"
                  action="{{ route('login.process') }}"
                  class="auth-form">

                @csrf

                <div class="form-group">

                    <label>
                        Email
                    </label>

                    <input type="email"
                           name="email"
                           class="form-control"
                           placeholder="Masukkan email"
                           required>

                </div>

                <div class="form-group">

                    <div class="field-row">

                        <label>
                            Password
                        </label>

                    </div>

                    <input type="password"
                           name="password"
                           class="form-control"
                           placeholder="Masukkan password"
                           required>

                </div>

                <button type="submit"
                        class="btn btn--primary auth-submit">

                    Login

                </button>

            </form>

        </div>

        <div class="auth-main-bottom">

            © {{ date('Y') }}
            Eco Monitoring System

        </div>

    </div>

</div>

@endsection