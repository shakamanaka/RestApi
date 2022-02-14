<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Players extends Model
{
    protected $fillable = [
        'firstName', 
        'lastName', 
        'position', 
        'positionFull', 
        'rating',
        'id_api' ,
        'nation',
        'club',
        'player_identifier',
        'stat_pac',
        'stat_sho',
        'stat_pas',
        'stat_dri',
        'stat_def',
        'stat_phy',
    ];

    //Agregar scoped query
}
