<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeriodeData extends Model
{
  protected $table = 'periode_data';

  protected $fillable = [
      'id',
      'nama',
      'idJenisDataBatasWilayah',
      'tanggal_periode',
      'catatan',
      'active',
      'created_at',
      'updated_at'
  ];
}
