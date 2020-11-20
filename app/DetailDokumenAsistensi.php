<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailDokumenAsistensi extends Model
{
    protected $table = 'detail_dokumen_asistensi';

    protected $fillable = [
        'id',
        'name',
        'description',
        'format',
        'status',
        'created_at',
        'updated_at'
    ];
}
