<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'user_profile';

    protected $fillable = [
        'user_id',
        'jabatan',
        'instansi',
        'nip',
        'bio',
        'telepon',
        'avatar_path'
    ];
}
