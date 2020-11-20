<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PembimbingTeknis extends Model
{
  protected $table = 'pembimbing_teknis';

  protected $fillable = [
      'id',
      'nama',
      'posisi',
      'instansi',
      'keterangan',
      'created_at',
      'updated_at'
  ];
}
