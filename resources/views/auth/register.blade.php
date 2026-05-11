@extends('layouts.auth')

@section('title', 'Register')

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
                CREATE ACCOUNT
            </span>

            <h1>
                Buat Akun Baru
                Sistem Monitoring
            </h1>

            <p>
                Registrasi akun admin atau petugas untuk
                mulai menggunakan sistem monitoring sampah
                berbasis web.
            </p>

            <div class="auth-quote">

                Sistem monitoring membantu pengelolaan
                sampah kampus menjadi lebih efisien,
                modern, dan mudah dipantau.

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
                WASTE MANAGEMENT
            </span>

            <span>
                LARAVEL SYSTEM
            </span>

        </div>

    </div>

    {{-- RIGHT SIDE --}}
    <div class="auth-main">

        <div class="auth-main-top">

            <div></div>

            <div class="switch-link">

                Sudah punya akun?

                <a href="{{ route('login') }}">
                    Login
                </a>

            </div>

        </div>

        <div class="auth-card">

            <h2>
                Register Account
            </h2>

            <p class="sub">
                Lengkapi data akun untuk registrasi
                ke sistem monitoring sampah.
            </p>

            @if($errors->any())

            <div class="alert-danger">

                {{ $errors->first() }}

            </div>

            @endif

            <form method="POST"
                  action="{{ route('register.process') }}"
                  class="auth-form">

                @csrf

                <div class="form-group">

                    <label>
                        Nama Lengkap
                    </label>

                    <input type="text"
                           name="name"
                           class="form-control"
                           placeholder="Masukkan nama"
                           required>

                </div>

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

                    <label>
                        Password
                    </label>

                    <input type="password"
                           name="password"
                           class="form-control"
                           placeholder="Masukkan password"
                           required>

                </div>

                <div class="form-group">

                    <label>
                        Konfirmasi Password
                    </label>

                    <input type="password"
                           name="password_confirmation"
                           class="form-control"
                           placeholder="Konfirmasi password"
                           required>

                </div>

                <div class="form-group">

                    <label>
                        Role
                    </label>

                    <select name="role"
                            class="form-control">

                        <option value="admin">
                            Admin
                        </option>

                        <option value="petugas">
                            Petugas
                        </option>

                    </select>

                </div>

                <button type="submit"
                        class="btn btn--primary auth-submit">

                    Register

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