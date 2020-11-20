<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratAsistensi extends Model
{
  protected $table = 'surat_asistensi';

  protected $fillable = [
      'id',
      'form_id',
      'id_jenis_pengajuan',
      'status',
      'file_name',
      'file_path',
      'created_at',
      'updated_at'
  ];

  public function pengguna()
  {
  	return $this->belongsTo('App\User');
  }

}
