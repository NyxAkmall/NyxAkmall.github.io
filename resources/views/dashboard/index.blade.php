@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<section class="hero">

    <div class="hero-text">

        <span class="eyebrow">
            DASHBOARD SISTEM
        </span>

        <h1 class="hero-title">
            Monitoring
            <span class="accent">
                Sampah
            </span>
        </h1>

        <p class="hero-sub">
            Ringkasan data pemilahan sampah berdasarkan kategori, lokasi, dan tren harian.
        </p>

    </div>

</section>

<section class="dashboard-kpi-grid">

    <div class="card dashboard-kpi-card">
        <span class="kpi-label">Total Sampah</span>

        <h2 class="kpi-value">
            {{ $totalSampah }} KG
        </h2>

        <span class="kpi-desc">
            Total keseluruhan sampah
        </span>
    </div>

    <div class="card dashboard-kpi-card">
        <span class="kpi-label">Sampah Organik</span>

        <h2 class="kpi-value text-success">
            {{ $organik }} KG
        </h2>

        <span class="kpi-desc">
            Total sampah organik
        </span>
    </div>

    <div class="card dashboard-kpi-card">
        <span class="kpi-label">Sampah Anorganik</span>

        <h2 class="kpi-value text-danger">
            {{ $anorganik }} KG
        </h2>

        <span class="kpi-desc">
            Total sampah anorganik
        </span>
    </div>

    <div class="card dashboard-kpi-card">
        <span class="kpi-label">Lokasi</span>

        <h2 class="kpi-value">
            {{ $totalLokasi }}
        </h2>

        <span class="kpi-desc">
            Kampus A dan Kampus B
        </span>
    </div>

    <div class="card dashboard-kpi-card">
        <span class="kpi-label">Kategori</span>

        <h2 class="kpi-value">
            {{ $totalKategori }}
        </h2>

        <span class="kpi-desc">
            Organik dan anorganik
        </span>
    </div>

</section>

<section class="dashboard-chart-grid">

    <div class="card dashboard-chart-card">

        <div class="card-head">

            <div class="card-title-wrap">

                <span class="eyebrow">
                    KATEGORI
                </span>

                <h3 class="card-title">
                    Perbandingan Organik dan Anorganik
                </h3>

            </div>

        </div>

        <div class="dashboard-chart-wrapper">
            <canvas
                id="sampahChart"
                data-organik="{{ $organik }}"
                data-anorganik="{{ $anorganik }}">
            </canvas>
        </div>

    </div>

    <div class="card dashboard-chart-card">

        <div class="card-head">

            <div class="card-title-wrap">

                <span class="eyebrow">
                    TREN HARIAN
                </span>

                <h3 class="card-title">
                    Grafik Sampah 7 Hari Terakhir
                </h3>

            </div>

        </div>

        <div class="dashboard-chart-wrapper">
            <canvas
                id="trenHarianChart"
                data-labels='@json($grafikHarianLabel)'
                data-values='@json($grafikHarianData)'>
            </canvas>
        </div>

    </div>

</section>

<section class="grid">

    <div class="col-12">

        <div class="card">

            <div class="card-head">

                <div class="card-title-wrap">

                    <span class="eyebrow">
                        LOKASI
                    </span>

                    <h3 class="card-title">
                        Total Sampah Berdasarkan Lokasi
                    </h3>

                </div>

            </div>

            <div class="table-scroll">

                <table class="table">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Lokasi</th>
                            <th>Total Sampah</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($dataLokasi as $lokasi)

                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td class="cell-name">
                                    {{ $lokasi->nama_lokasi }}
                                </td>

                                <td class="cell-price">
                                    {{ $lokasi->pemilahan_sum_volume_kg ?? 0 }} KG
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="3" class="text-center">
                                    Tidak ada data lokasi
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
