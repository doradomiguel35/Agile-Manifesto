<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Values extends Model
{
    public $table = 'am_values';

    public $fillable = [
        'value'
    ];
}
