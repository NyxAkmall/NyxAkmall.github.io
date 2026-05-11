@extends('layouts.app')

@section('title', 'Tambah Data')

@section('content')

<div class="content">

    <section class="hero">

        <div class="hero-text">

            <span class="eyebrow">
                CREATE DATA
            </span>

            <h1 class="hero-title">
                Tambah
                <span class="accent">
                    Data Sampah
                </span>
            </h1>

        </div>

    </section>

    <div class="grid">

        <div class="col-12">

            <div class="card">

                <form action="{{ route('pemilahan.store') }}"
                      method="POST"
                      class="auth-form">

                    @csrf

                    <div class="form-group">

                        <label>Tanggal</label>

                        <input type="date"
                               name="tanggal"
                               class="form-control"
                               required>

                    </div>

                    <div class="form-group">

                        <label>Volume Sampah (KG)</label>

                        <input type="number"
                               name="volume_kg"
                               class="form-control"
                               required>

                    </div>

                    <div class="form-group">

                        <label>Status</label>

                        <select name="status"
                                class="form-control">

                            <option value="Diproses">
                                Diproses
                            </option>

                            <option value="Selesai">
                                Selesai
                            </option>

                        </select>

                    </div>

                    <div class="form-group">

                        <label>Lokasi</label>

                        <select name="lokasi_id"
                                class="form-control">

                            @foreach($lokasi as $item)

                            <option value="{{ $item->id }}">
                                {{ $item->nama_lokasi }}
                            </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="form-group">

                        <label>Kategori Sampah</label>

                        <select name="kategori_id"
                                class="form-control">

                            @foreach($kategori as $item)

                            <option value="{{ $item->id }}">
                                {{ $item->nama_kategori }}
                            </option>

                            @endforeach

                        </select>

                    </div>

                    <button type="submit"
                            class="btn btn--primary">
                        Simpan Data
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection