<?php

namespace App\Http\Controllers;

use App\Models\PemilahanSampah;
use App\Models\Lokasi;
use App\Models\KategoriSampah;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $laporan = $this->queryLaporan($request)
            ->latest()
            ->get();

        $lokasi = Lokasi::orderBy('nama_lokasi')->get();

        $kategori = KategoriSampah::orderBy('nama_kategori')->get();

        return view('dashboard.laporan', compact(
            'laporan',
            'lokasi',
            'kategori'
        ));
    }

    public function exportPdf(Request $request)
    {
        $laporan = $this->queryLaporan($request)
            ->latest()
            ->get();

        $filter = [
            'tanggal_awal' => $request->tanggal_awal,
            'tanggal_akhir' => $request->tanggal_akhir,
            'lokasi_id' => $request->lokasi_id,
            'kategori_id' => $request->kategori_id,
        ];

        $pdf = Pdf::loadView('dashboard.laporan_pdf', compact(
            'laporan',
            'filter'
        ))->setPaper('a4', 'landscape');

        return $pdf->download('laporan-pemilahan-sampah.pdf');
    }

    private function queryLaporan(Request $request)
    {
        return PemilahanSampah::with([
            'kategori',
            'lokasi',
            'user'
        ])
        ->when($request->tanggal_awal, function ($query) use ($request) {
            $query->whereDate('tanggal', '>=', $request->tanggal_awal);
        })
        ->when($request->tanggal_akhir, function ($query) use ($request) {
            $query->whereDate('tanggal', '<=', $request->tanggal_akhir);
        })
        ->when($request->lokasi_id, function ($query) use ($request) {
            $query->where('lokasi_id', $request->lokasi_id);
        })
        ->when($request->kategori_id, function ($query) use ($request) {
            $query->where('kategori_id', $request->kategori_id);
        });
    }
}
