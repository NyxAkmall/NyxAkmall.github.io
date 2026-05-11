<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PemilahanSampah extends Model
{
    protected $table = 'pemilahan_sampah';

    protected $fillable = [
        'tanggal',
        'volume_kg',
        'status',
        'user_id',
        'lokasi_id',
        'kategori_id'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATION
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriSampah::class);
    }
}