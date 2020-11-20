<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolesUser extends Model
{
  protected $table = 'roles_user';

  protected $fillable = [
      'id',
      'user_id',
      'role_id',
      'created_at',
      'updated_at'
  ];

  public function user()
  {
      return $this->belongsTo(Users::class);
  }

  public function role()
  {
      return $this->belongsTo(Roles::class);
  }

}
