<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Principles extends Model
{
    public $table = 'am_principles';

    public $fillable = [
        'principle'
    ];
}
