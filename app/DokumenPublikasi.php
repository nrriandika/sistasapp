<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DokumenPublikasi extends Model
{
    protected $table = 'dokumen_publikasi';

    protected $fillable = [
        'id',
        'nama',
        'user_id',
        'keterangan',
        'path_dokumen',
        'active',
        'created_at',
        'updated_at'
    ];
}
