<?php

namespace App\Http\Controllers;

use App\Models\KategoriSampah;
use App\Models\Lokasi;
use App\Models\PemilahanSampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemilahanController extends Controller
{
    public function index()
    {
        $pemilahan = PemilahanSampah::with([
            'kategori',
            'lokasi'
        ])
        ->latest()
        ->get();

        $kategori = KategoriSampah::all();
        $lokasi = Lokasi::all();

        return view('dashboard.pemilahan', compact(
            'pemilahan',
            'kategori',
            'lokasi'
        ));
    }

    public function create()
    {
        $kategori = KategoriSampah::all();
        $lokasi = Lokasi::all();

        return view('dashboard.create', compact('kategori', 'lokasi'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => ['required', 'date'],
            'volume_kg' => ['required', 'numeric', 'min:1'],
            'status' => ['required', 'in:Diproses,Selesai'],
            'lokasi_id' => ['required', 'exists:lokasi,id'],
            'kategori_id' => ['required', 'exists:kategori_sampah,id'],
        ]);

        $validated['user_id'] = Auth::id();

        PemilahanSampah::create($validated);

        return redirect()
            ->route('pemilahan')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pemilahan = PemilahanSampah::findOrFail($id);
        $kategori = KategoriSampah::all();
        $lokasi = Lokasi::all();

        return view('dashboard.edit', compact('pemilahan', 'kategori', 'lokasi'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal' => ['required', 'date'],
            'volume_kg' => ['required', 'numeric', 'min:1'],
            'status' => ['required', 'in:Diproses,Selesai'],
            'lokasi_id' => ['required', 'exists:lokasi,id'],
            'kategori_id' => ['required', 'exists:kategori_sampah,id'],
        ]);

        $data = PemilahanSampah::findOrFail($id);

        $data->update($validated);

        return redirect()
            ->route('pemilahan')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $data = PemilahanSampah::findOrFail($id);
        $data->delete();

        return redirect()
            ->route('pemilahan')
            ->with('success', 'Data berhasil dihapus');
    }
}
