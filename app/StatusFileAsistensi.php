<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusFileAsistensi extends Model
{
  protected $table = 'status_file_asistensi';

  protected $fillable = [
      'id',
      'file_asistensi_id',
      'checker_id',
      'status',
      'catatan',
      'created_at',
      'updated_at'
  ];
}
