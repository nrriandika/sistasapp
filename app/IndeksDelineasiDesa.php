<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndeksDelineasiDesa extends Model
{
  protected $table = 'indeks_delineasi_desa';

  protected $fillable = [
      'kode_desa',
      'kelurahan',
      'desa',
      'kode_kec',
      'kecamatan',
      'kode_kab',
      'kabupaten',
      'kode_prov',
      'provinsi',
      'tahun',
      'data_dasar',
      'nama_pekerjaan',
      'pelaksana',
      'tahun_2',
      'nama_pekerjaan_2',
      'pelaksana_2',
      'sumber_data',
      'ketersediaan_data',
      'keterangan',
      'created_at',
      'updated_at'
  ];

}
