@extends('layouts.app')

@section('title', 'Monitoring')

@section('content')

<div class="content">

    <section class="hero">

        <div class="hero-text">

            <span class="eyebrow">
                MONITORING DATA
            </span>

            <h1 class="hero-title">
                Monitoring
                <span class="accent">
                    Sampah Kampus
                </span>
            </h1>

            <p class="hero-sub">
                Monitoring seluruh data pemilahan sampah
                dari Kampus A dan Kampus B.
            </p>

        </div>

    </section>

    <section class="grid">

        <div class="col-12">

            <div class="card">

                <div class="card-head">

                    <div class="card-title-wrap">

                        <span class="eyebrow">
                            DATA TABLE
                        </span>

                        <h3 class="card-title">
                            Data Monitoring Sampah
                        </h3>

                    </div>

                </div>

                <div class="table-scroll">

                    <table class="table">

                        <thead>

                            <tr>
                                <th>Tanggal</th>
                                <th>Kategori</th>
                                <th>Lokasi</th>
                                <th>Volume</th>
                                <th>Status</th>
                            </tr>

                        </thead>

                        <tbody>

                            @forelse($dataSampah as $item)

                            <tr>

                                <td class="cell-date">
                                    {{ $item->tanggal }}
                                </td>

                                <td class="cell-name">
                                    {{ $item->kategori->nama_kategori }}
                                </td>

                                <td>
                                    {{ $item->lokasi->nama_lokasi }}
                                </td>

                                <td class="cell-price">
                                    {{ $item->volume_kg }} KG
                                </td>

                                <td>

                                    @if($item->status == 'Selesai')

                                        <span class="tag t-active">
                                            {{ $item->status }}
                                        </span>

                                    @else

                                        <span class="tag t-info">
                                            {{ $item->status }}
                                        </span>

                                    @endif

                                </td>

                            </tr>

                            @empty

                            <tr>

                                <td colspan="5" class="text-center">
                                    Tidak ada data monitoring
                                </td>

                            </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </section>

</div>

@endsection