<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeraturanBupatiWalikota extends Model
{
    protected $table = 'peraturan_bupati_walikota';

    protected $fillable = [
        'id',
        'user_id',
        'nama',
        'keterangan',
        'indeks_desa_id',
        'path_dokumen',
        'path_geometry',
        'created_at',
        'updated_at'
    ];
}
