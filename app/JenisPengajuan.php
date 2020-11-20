<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisPengajuan extends Model
{
  protected $table = 'jenis_pengajuan';

  protected $fillable = [
      'nama',
      'description',
  ];
}
