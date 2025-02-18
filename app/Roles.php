<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
  protected $table = 'roles';

  protected $fillable = [
      'id',
      'name',
      'description',
      'created_at',
      'updated_at'
  ];

  public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
