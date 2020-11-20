<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileAsistensi extends Model
{
    protected $table = 'file_asistensi';

    protected $fillable = [
        'id',
        'id_form_asistensi',
        'id_doc_asistensi',
        'name',
        'catatan',
        'file_name',
        'file_path',
        'created_at',
        'updated_at'
    ];

    public function getFormat()
    {
      return trim(DetailDokumenAsistensi::find($this->id_doc_asistensi)->format);
    }

    public function getStatusAndCatatan()
    {
      return StatusFileAsistensi::where('file_asistensi_id', $this->id)->first();
    }

    public function getDesaName()
    {
      return IndeksDelineasiDesa::find($this->indeks_desa_id)->desa;
    }
}
