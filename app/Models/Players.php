<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Players extends Model
{
    protected $fillable = [
        'firstName', 'lastName', 'position', 'nation','club','player_identifier'
    ];
}
