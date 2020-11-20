<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeriodeDataBatasWilayah extends Model
{
  protected $table = 'periode_databatas_wilayah';

  protected $fillable = [
      'id',
      'idPeriodeData',
      'idJenisDataBatasWilayah',
      'idData',
      'created_at',
      'updated_at'
  ];
}
