<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormAsistensi extends Model
{
    protected $table = 'form_asistensi';

    protected $fillable = [
        'id',
        'user_id',
        'name',
        'description',
        'verified',
        'created_at',
        'updated_at'
    ];

    public function getAllFiles()
    {
      return FileAsistensi::where('id_form_asistensi', $this->id)->get();
    }
}
