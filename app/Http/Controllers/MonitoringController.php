<?php

namespace App\Http\Controllers;

use App\Models\PemilahanSampah;

class MonitoringController extends Controller
{
    public function index()
    {
        $dataSampah = PemilahanSampah::with([
            'kategori',
            'lokasi'
        ])
        ->latest()
        ->get();

        return view('dashboard.monitoring', compact('dataSampah'));
    }
}