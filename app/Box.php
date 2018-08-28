<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    protected $fillable = [
        'icologo', 'title', 'description', 'file'
    ];
}
