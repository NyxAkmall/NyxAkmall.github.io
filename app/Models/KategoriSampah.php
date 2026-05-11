<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriSampah extends Model
{
    protected $table = 'kategori_sampah';

    protected $fillable = [
        'nama_kategori'
    ];

    public $timestamps = false;

    /*
    |--------------------------------------------------------------------------
    | RELATION
    |--------------------------------------------------------------------------
    */

    public function pemilahan()
    {
        return $this->hasMany(PemilahanSampah::class, 'kategori_id');
    }
}