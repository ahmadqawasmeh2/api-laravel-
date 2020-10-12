<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class categrioy extends Model
{
    protected $fillable = [
        'id', 'name_en', 'name-ar','nameadd','Active'
    ];
}
