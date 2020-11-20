<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KonsultasiTeknis extends Model
{
  protected $table = 'konsultasi_teknis';

  protected $fillable = [
      'id',
      'submitter_id',
      'judul',
      'keterangan',
      'tanggal',
      'status',
      'supervisor_id',
      'tautan',
      'dokumen_notulensi',
      'created_at',
      'updated_at'
  ];

  public function pembimbing()
  {
      return $this->belongsToMany(PembimbingTeknis::class);
  }

  public function getAllSupervisors()
  {
      return $this->pembimbing()->get();
  }

  public function getAllSupervisorsList()
  {
      return $this->pembimbing()->pluck('pembimbing_teknis.id')->toArray();
  }
}
