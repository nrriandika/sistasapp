<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExternalService extends Model
{
    protected $table = 'external_service';

    protected $fillable = [
        'id',
        'nama',
        'user_id',
        'url_service',
        'layer_service',
        'jenis_service',
        'active',
        'created_at',
        'updated_at'
    ];
}
