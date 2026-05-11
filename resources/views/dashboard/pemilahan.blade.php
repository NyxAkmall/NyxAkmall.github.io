@extends('layouts.app')

@section('title', 'Pemilahan Sampah')

@section('content')

<div class="page-header">

    <div class="page-title">
        <h2>Pemilahan Sampah</h2>
        <p>Kelola data pemilahan sampah kampus</p>
    </div>

</div>

@if(session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>

@endif

<div class="card">

    <div class="card-head">

        <h3 class="card-title">
            Tambah Data Sampah
        </h3>

    </div>

    <form
        action="{{ route('pemilahan.store') }}"
        method="POST"
    >

        @csrf

        <div class="form-grid">

            <div class="form-group">

                <label>Tanggal</label>

                <input
                    type="date"
                    name="tanggal"
                    class="form-control"
                    required
                >

            </div>

            <div class="form-group">

                <label>Volume (KG)</label>

                <input
                    type="number"
                    name="volume_kg"
                    class="form-control"
                    required
                >

            </div>

            <div class="form-group">

                <label>Kategori Sampah</label>

                <select
                    name="kategori_id"
                    class="form-control"
                    required
                >

                    @foreach($kategori as $item)

                    <option value="{{ $item->id }}">
                        {{ $item->nama_kategori }}
                    </option>

                    @endforeach

                </select>

            </div>

            <div class="form-group">

                <label>Lokasi</label>

                <select
                    name="lokasi_id"
                    class="form-control"
                    required
                >

                    @foreach($lokasi as $item)

                    <option value="{{ $item->id }}">
                        {{ $item->nama_lokasi }}
                    </option>

                    @endforeach

                </select>

            </div>

            <div class="form-group">

                <label>Status</label>

                <select
                    name="status"
                    class="form-control"
                    required
                >

                    <option value="Diproses">
                        Diproses
                    </option>

                    <option value="Selesai">
                        Selesai
                    </option>

                </select>

            </div>

        </div>

        <div style="margin-top:20px;">

            <button
                type="submit"
                class="btn btn--primary"
            >
                Tambah Data
            </button>

        </div>

    </form>

</div>

<div class="card" style="margin-top:24px;">

    <div class="card-head">

        <h3 class="card-title">
            Data Pemilahan Sampah
        </h3>

    </div>

    <div class="table-scroll">

        <table class="modern-table">

            <thead>

                <tr>

                    <th>Tanggal</th>
                    <th>Kategori</th>
                    <th>Lokasi</th>
                    <th>Volume</th>
                    <th>Status</th>
                    <th>Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($pemilahan as $item)

                <tr>

                    <td>
                        {{ $item->tanggal }}
                    </td>

                    <td>
                        {{ $item->kategori->nama_kategori }}
                    </td>

                    <td>
                        {{ $item->lokasi->nama_lokasi }}
                    </td>

                    <td>
                        {{ $item->volume_kg }} KG
                    </td>

                    <td>

                        <span class="status-badge">
                            {{ $item->status }}
                        </span>

                    </td>

                    <td>

                        <div class="action-group">

                            <button
                                class="btn btn-sm btn--warning"
                                onclick="toggleEdit({{ $item->id }})"
                            >
                                Edit
                            </button>

                            <form
                                action="{{ route('pemilahan.delete', $item->id) }}"
                                method="POST"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-sm btn--danger"
                                    onclick="return confirm('Hapus data ini?')"
                                >
                                    Hapus
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                <tr
                    id="edit-{{ $item->id }}"
                    style="display:none;"
                >

                    <td colspan="6">

                        <form
                            action="{{ route('pemilahan.update', $item->id) }}"
                            method="POST"
                        >

                            @csrf
                            @method('PUT')

                            <div class="form-grid">

                                <div class="form-group">

                                    <label>Tanggal</label>

                                    <input
                                        type="date"
                                        name="tanggal"
                                        value="{{ $item->tanggal }}"
                                        class="form-control"
                                    >

                                </div>

                                <div class="form-group">

                                    <label>Volume</label>

                                    <input
                                        type="number"
                                        name="volume_kg"
                                        value="{{ $item->volume_kg }}"
                                        class="form-control"
                                    >

                                </div>

                                <div class="form-group">

                                    <label>Status</label>

                                    <select
                                        name="status"
                                        class="form-control"
                                    >

                                        <option
                                            value="Diproses"
                                            {{ $item->status == 'Diproses' ? 'selected' : '' }}
                                        >
                                            Diproses
                                        </option>

                                        <option
                                            value="Selesai"
                                            {{ $item->status == 'Selesai' ? 'selected' : '' }}
                                        >
                                            Selesai
                                        </option>

                                    </select>

                                </div>

                            </div>

                            <div style="margin-top:20px;">

                                <button
                                    type="submit"
                                    class="btn btn--success"
                                >
                                    Update
                                </button>

                            </div>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6">

                        <div class="empty-state">

                            <h3>Belum Ada Data</h3>

                            <p>
                                Silahkan tambahkan data pemilahan sampah
                            </p>

                        </div>

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

<script>

function toggleEdit(id)
{
    const row = document.getElementById('edit-' + id);

    if(row.style.display === 'none')
    {
        row.style.display = 'table-row';
    }
    else
    {
        row.style.display = 'none';
    }
}

</script>

@endsection