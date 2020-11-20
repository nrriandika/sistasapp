<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisDataBatasWilayah extends Model
{
    protected $table = 'jenis_data_batas_wilayah';

    protected $fillable = [
        'id',
        'nama',
        'nama_tabel_spasial',
        'nama_layer_geoserver',
        'catatan',
        'created_at',
        'updated_at'
    ];
}
