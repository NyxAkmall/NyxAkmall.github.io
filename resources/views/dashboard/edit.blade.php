@extends('layouts.app')

@section('title', 'Edit Data')

@section('content')

<div class="content">

    <section class="hero">

        <div class="hero-text">

            <span class="eyebrow">
                UPDATE DATA
            </span>

            <h1 class="hero-title">
                Edit
                <span class="accent">
                    Data Sampah
                </span>
            </h1>

        </div>

    </section>

    <div class="grid">

        <div class="col-12">

            <div class="card">

                <form action="{{ route('pemilahan.update', $pemilahan->id) }}"
                      method="POST"
                      class="auth-form">

                    @csrf
                    @method('PUT')

                    <div class="form-group">

                        <label>Tanggal</label>

                        <input type="date"
                               name="tanggal"
                               value="{{ $pemilahan->tanggal }}"
                               class="form-control">

                    </div>

                    <div class="form-group">

                        <label>Volume Sampah</label>

                        <input type="number"
                               name="volume_kg"
                               value="{{ $pemilahan->volume_kg }}"
                               class="form-control">

                    </div>

                    <div class="form-group">

                        <label>Status</label>

                        <select name="status"
                                class="form-control">

                            <option value="Diproses"
                                {{ $pemilahan->status == 'Diproses' ? 'selected' : '' }}>
                                Diproses
                            </option>

                            <option value="Selesai"
                                {{ $pemilahan->status == 'Selesai' ? 'selected' : '' }}>
                                Selesai
                            </option>

                        </select>

                    </div>



                    <div class="form-group">
                        <label>Lokasi</label>
                        <select name="lokasi_id" class="form-control" required>
                            @foreach($lokasi as $item)
                                <option value="{{ $item->id }}" {{ $pemilahan->lokasi_id == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_lokasi }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Kategori Sampah</label>
                        <select name="kategori_id" class="form-control" required>
                            @foreach($kategori as $item)
                                <option value="{{ $item->id }}" {{ $pemilahan->kategori_id == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit"
                            class="btn btn--primary">
                        Update Data
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection