<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AliasFieldname extends Model
{
    protected $table = 'alias_fieldname';

    protected $fillable = [
        'id',
        'tablename',
        'fieldname',
        'alias',
        'status',
        'created_at',
        'updated_at'
    ];

}
