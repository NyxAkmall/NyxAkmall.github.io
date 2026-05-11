<?php

namespace App\Http\Controllers;

use App\Models\PemilahanSampah;
use App\Models\Lokasi;
use App\Models\KategoriSampah;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSampah = PemilahanSampah::sum('volume_kg');

        $organik = PemilahanSampah::whereHas('kategori', function ($query) {
            $query->where('nama_kategori', 'Organik');
        })->sum('volume_kg');

        $anorganik = PemilahanSampah::whereHas('kategori', function ($query) {
            $query->where('nama_kategori', 'Anorganik');
        })->sum('volume_kg');

        $totalLokasi = Lokasi::count();

        $totalKategori = KategoriSampah::count();

        $grafikHarianLabel = [];
        $grafikHarianData = [];

        for ($i = 6; $i >= 0; $i--) {
            $tanggal = Carbon::now()->subDays($i)->format('Y-m-d');

            $grafikHarianLabel[] = Carbon::parse($tanggal)->format('d M');

            $grafikHarianData[] = PemilahanSampah::whereDate('tanggal', $tanggal)
                ->sum('volume_kg');
        }

        $dataLokasi = Lokasi::withSum('pemilahan', 'volume_kg')->get();

        return view('dashboard.index', compact(
            'totalSampah',
            'organik',
            'anorganik',
            'totalLokasi',
            'totalKategori',
            'grafikHarianLabel',
            'grafikHarianData',
            'dataLokasi'
        ));
    }
}
