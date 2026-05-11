@extends('layouts.app')

@section('title', 'Laporan')

@section('content')

<section class="hero">

    <div class="hero-text">

        <span class="eyebrow">
            LAPORAN SISTEM
        </span>

        <h1 class="hero-title">
            Laporan
            <span class="accent">
                Monitoring Sampah
            </span>
        </h1>

        <p class="hero-sub">
            Rekap laporan pemilahan sampah berdasarkan tanggal, lokasi, kategori, volume, dan status.
        </p>

    </div>

</section>

<section class="grid">

    <div class="col-12">

        <div class="card">

            <div class="card-head">

                <div class="card-title-wrap">

                    <span class="eyebrow">
                        FILTER DATA
                    </span>

                    <h3 class="card-title">
                        Filter Laporan Sampah
                    </h3>

                </div>

            </div>

            <form method="GET" action="{{ route('laporan') }}" class="filter-form">

                <div class="form-group">
                    <label for="tanggal_awal">
                        Tanggal Awal
                    </label>

                    <input
                        type="date"
                        id="tanggal_awal"
                        name="tanggal_awal"
                        class="form-control"
                        value="{{ request('tanggal_awal') }}">
                </div>

                <div class="form-group">
                    <label for="tanggal_akhir">
                        Tanggal Akhir
                    </label>

                    <input
                        type="date"
                        id="tanggal_akhir"
                        name="tanggal_akhir"
                        class="form-control"
                        value="{{ request('tanggal_akhir') }}">
                </div>

                <div class="form-group">
                    <label for="lokasi_id">
                        Lokasi
                    </label>

                    <select
                        id="lokasi_id"
                        name="lokasi_id"
                        class="form-control">

                        <option value="">
                            Semua Lokasi
                        </option>

                        @foreach($lokasi as $item)

                            <option
                                value="{{ $item->id }}"
                                {{ request('lokasi_id') == $item->id ? 'selected' : '' }}>
                                {{ $item->nama_lokasi }}
                            </option>

                        @endforeach

                    </select>
                </div>

                <div class="form-group">
                    <label for="kategori_id">
                        Kategori
                    </label>

                    <select
                        id="kategori_id"
                        name="kategori_id"
                        class="form-control">

                        <option value="">
                            Semua Kategori
                        </option>

                        @foreach($kategori as $item)

                            <option
                                value="{{ $item->id }}"
                                {{ request('kategori_id') == $item->id ? 'selected' : '' }}>
                                {{ $item->nama_kategori }}
                            </option>

                        @endforeach

                    </select>
                </div>

                <div class="filter-actions">

                    <button type="submit" class="btn btn--primary">
                        Filter
                    </button>

                    <a href="{{ route('laporan') }}" class="btn btn--ghost">
                        Reset
                    </a>

                </div>

            </form>

        </div>

    </div>

    <div class="col-12">

        <div class="card">

            <div class="card-head">

                <div class="card-title-wrap">

                    <span class="eyebrow">
                        REPORT DATA
                    </span>

                    <h3 class="card-title">
                        Data Laporan Sampah
                    </h3>

                </div>

                <a
                    href="{{ route('laporan.export.pdf', request()->query()) }}"
                    class="btn btn--primary">
                    Export PDF
                </a>

            </div>

            <div class="table-scroll">

                <table class="table">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Lokasi</th>
                            <th>Kategori</th>
                            <th>Volume</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($laporan as $item)

                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td class="cell-date">
                                    {{ $item->tanggal }}
                                </td>

                                <td class="cell-name">
                                    {{ $item->lokasi->nama_lokasi ?? '-' }}
                                </td>

                                <td>
                                    {{ $item->kategori->nama_kategori ?? '-' }}
                                </td>

                                <td class="cell-price">
                                    {{ $item->volume_kg }} KG
                                </td>

                                <td>
                                    <span class="status-badge">
                                        {{ $item->status }}
                                    </span>
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="6" class="text-center">
                                    Tidak ada data laporan
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</section>

@endsection
