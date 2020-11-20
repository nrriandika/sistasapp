<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KonsultasiTeknisPembimbingTeknis extends Model
{
  protected $table = 'konsultasi_teknis_pembimbing_teknis';

  protected $fillable = [
      'id',
      'pembimbing_teknis_id',
      'konsultasi_teknis_id',
      'created_at',
      'updated_at'
  ];

  public function konsultasiteknis()
  {
      return $this->belongsTo(KonsultasiTeknis::class);
  }

  public function pembimbing()
  {
      return $this->belongsTo(PembimbingTeknis::class);
  }
}
